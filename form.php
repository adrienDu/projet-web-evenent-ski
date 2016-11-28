<?php
require_once ("bdd.php");
//var_dump($_GET);
//var_dump(isset($_GET['nom']));

if (empty($_GET['nom']) || empty($_GET['prenom']) || empty($_GET['nais']) || empty($_GET['sexe'])
    || empty($_GET['mail']) || empty($_GET['tel']) || empty($_GET['rue']) || empty($_GET['cp'])
    || empty($_GET['ville']) || empty($_GET['glisse']) || empty($_GET['pointure']) || empty($_GET['taille'])
    || empty($_GET['niveau'])) {
    echo "Tous les champs n'ont pas été renseignés !";

} else {
    if(strlen($_GET['nom'])>100 || strlen($_GET['prenom'])>100){
        echo "Les noms ou prenoms saisis ne sont pas valides";
    }
    else {
        if (strlen($_GET['nais']) != 10) {
            echo "La date de naissance saisie n'est pas valide";
        } else {
            if (!filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
                echo "L'adresse mail saisie n'est pas valide";
            } else {
                if (!preg_match('`[0-9]{10}`', $_GET['tel']) || strlen($_GET['tel']) != 10) {
                    echo "Le numéro de téléphone saisi n'est pas valide";
                } else {
                    if (!preg_match('`[0-9]{5}`', $_GET['cp']) || strlen($_GET['cp']) != 5) {
                        echo "Le code postal saisi n'est pas valide";
                    } else {
                        echo "OK";
                    }
                }
            }
        }
    }
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $nais = $_GET['nais'];
    $sexe = $_GET['sexe'];
    $mail = $_GET['mail'];
    $tel = $_GET['tel'];
    $nrue = $_GET['nrue'];
    $rue = $_GET['rue'];
    $cp = $_GET['cp'];
    $ville = $_GET['ville'];
    $glisse = $_GET['glisse'];
    $pointure = $_GET['pointure'];
    $taille = $_GET['taille'];
    $niveau = $_GET['niveau'];

    newInsc($nom,$prenom,$nais,$sexe,$mail,$tel,$nrue,$rue,$cp,$ville,$glisse,$pointure,$taille,$niveau);

}

?>