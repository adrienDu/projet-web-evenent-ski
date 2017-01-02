<?php
require_once '../bdd.php';
require_once '../vendor/autoload.php';

// init Silex app
$app = new Silex\Application();

//connection a la base de données
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'dbname' => 'projetski',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ),
));

// route pour "/users" affiche tous les utilisateurs
$app->get('/users', function () use ($app) {
    $sql = "SELECT * FROM inscription";
    $inscrits = $app['db']->fetchAll($sql);

    return $app->json($inscrits);
});

// route pour tous les utilisateurs en attente
$app->get('/users/waiting', function () use ($app) {
    $sql = "SELECT * FROM inscription WHERE etatInscription = 0 ORDER BY dateInscription ASC";
    $insrits = $app['db']->fetchall($sql);

    return $app->json($insrits);
});

// route pour tous les utilisateurs accepté
$app->get('/users/accepted', function () use ($app) {
    $sql = "SELECT * FROM inscription WHERE etatInscription = 1 ORDER BY dateInscription ASC";
    $insrits = $app['db']->fetchall($sql);

    return $app->json($insrits, 200);
});

// route pour tous les utilisateurs refusé
$app->get('/users/refused', function () use ($app) {
    $sql = "SELECT * FROM inscription WHERE etatInscription = 2 ORDER BY dateInscription ASC";
    $insrits = $app['db']->fetchall($sql);

    return $app->json($insrits, 200);
});

//route pour recuperer un utilisateur a partir de son id
$app->get('/users/{id}', function ($id) use ($app) {
    $sql = "SELECT * FROM inscription WHERE idInscript = ?";
    $user = $app['db']->fetchAssoc($sql, array((String)$id));

    if (empty($user)) {
        $app->abort(204);
    } else {
        return $app->json($user, 200);
    }
});

//route pour accepter un utilisateur
$app->put('/users/{id}/accept', function ($id) use ($app) {
    $sql = "SELECT * FROM inscription WHERE idInscript = ?";
    $user = $app['db']->fetchAssoc($sql, array((String)$id));
    if (empty($user)) {
        $app->abort(404);
    } else {

        if ($user['etatInscription'] != 0) {
            $app->abort(405);
        } else {
            $sql = "UPDATE inscription SET	etatInscription=1  WHERE idInscript = ?";
            $app['db']->executeUpdate($sql, array((String)$id));
            return http_response_code(200);
        }
    }
});

//route pour refuser un utilisateur
$app->put('/users/{id}/refuse', function ($id) use ($app) {
    $sql = "SELECT * FROM inscription WHERE idInscript = ?";
    $user = $app['db']->fetchAssoc($sql, array((String)$id));
    if (empty($user)) {
        $app->abort(404);
    } else {

        if ($user['etatInscription'] != 0) {
            $app->abort(405);
        } else {
            $sql = "UPDATE inscription SET	etatInscription=2  WHERE idInscript = ?";
            $app['db']->executeUpdate($sql, array((String)$id));
            return http_response_code(200);
        }
    }
});

//route pour creer un utilisateur
$app->post('/creer',function(Request $request) use ($app) {
    $app['debug'] = true;
    $id = uuid();

    //creation de la date du jour
    $dateInscription = date("Y-m-d");
    //etatInscription
    $etatInscription = 0;
    $user = array(
        'idInscript' => $id,
        'nom' => $request->get('nom'),
        'prenom' => $request->get('prenom'),
        'dateNais' => $request->get('dateNais'),
        'sexe' => $request->get('sexe'),
        'mail' => $request->get('mail'),
        'tel' => $request->get('tel'),
        'rue' => $request->get('rue'),
        'CP' => $request->get('CP'),
        'ville' => $request->get('ville'),
        'glisse' => $request->get('glisse'),
        'pointure' => $request->get('pointure'),
        'taille' => $request->get('taille'),
        'niveau' => $request->get('niveau'),
        'etatInscription' => $etatInscription,
        'dateInscription' => $dateInscription
    );

    $app['db']->insert('inscription', $user);
    $userid = $app->json($user);

    return "inscription".$app['db']->lastinsertId()."effectue avec succée<br> $userid";


});
// default route
$app->get('/', function () {
    return "List of avaiable methods:
  - /users - renvois une liste de tous les utilisateurs;
  - /users/waiting : renvois une liste de tous les utilisateurs en attente de validation;
  - /users/accepted : renvois une liste de tous les utilisateurs validé;
  - /users/refused : renvois une liste de tous les utilisateurs refusé;
  - /users/{id} : renvois les informations de l'utilisateur et retourne un 204 si il n'existe pas;
  
  ";
});


$app->run();