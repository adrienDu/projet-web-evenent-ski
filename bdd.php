<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 26/11/2016
 * Time: 11:48
 */
//creation d'un uuid unique pour les utilisateurs
function uuid()
{
    //create random number
    do {
        $cstrong = true;
        $bytes = openssl_random_pseudo_bytes(4, $cstrong);
        $uuid = bin2hex($bytes) . "-";

        $bytes = openssl_random_pseudo_bytes(2, $cstrong);
        $uuid = $uuid . bin2hex($bytes) . "-";

        $bytes = openssl_random_pseudo_bytes(2, $cstrong);
        $uuid = $uuid . bin2hex($bytes) . "-";

        $bytes = openssl_random_pseudo_bytes(2, $cstrong);
        $uuid = $uuid . bin2hex($bytes) . "-";

        $cstrong = true;
        $bytes = openssl_random_pseudo_bytes(6, $cstrong);
        $uuid = $uuid . bin2hex($bytes);
    } while (checkUUID($uuid));

    return $uuid;
}

//verification de l'uuid dans la bdd
function checkUUID($uuid)
{
    $bdd = connectBDD();
    $query = $bdd->prepare('SELECT * FROM inscription WHERE idInscript = :id');
    $query->execute(array(':id' => $uuid));
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

//connection a la bdd
function connectBDD()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetski;charset=utf8', 'root', '');
    } catch (Exeption $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

//creation d'un nouvel utilisateur
function newInsc($nom, $prenom, $dateNais, $sexe, $mail, $tel, $numRue, $rue, $CP, $ville, $glisse, $pointure, $taille, $niveau)
{
    //connection a la bdd
    $bdd = connectBDD();
    //creation de l'uid
    $id = uuid();
    //creation de la date du jour
    $dateInscription = date("Y-m-d");
    //etatInscription
    $etatInscription = 0;


    //preparation de la requete
    $query = $bdd->prepare('INSERT INTO inscription(`idInscript`, `nom`, `prenom`, `dateNais`, `sexe`, `mail`, `tel`, `numRue`, `rue`, `CP`, `ville`, `glisse`, `pointure`, `taille`, `niveau`, `etatInscription`, `dateInscription`) VALUES (:idInscript,:nom,:prenom,:dateNais,:sexe,:mail,:tel,:numRue,:rue,:CP,:ville,:glisse,:pointure,:taille,:niveau,:etatInscription,:dateInscription)');
    $query->execute(array(
        'idInscript' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'dateNais' => $dateNais,
        'sexe' => $sexe,
        'mail' => $mail,
        'tel' => $tel,
        'numRue' => $numRue,
        'rue' => $rue,
        'CP' => $CP,
        'ville' => $ville,
        'glisse' => $glisse,
        'pointure' => $pointure,
        'taille' => $taille,
        'niveau' => $niveau,
        'etatInscription' => $etatInscription,
        'dateInscription' => $dateInscription
    ));
}

//recuperation de tous les utilisateurs de la base de donnée
function getAll()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription');
    while ($donnees = $data->fetch()) {
        //On affiche l'id et le nom du client en cours
        echo "</tr>";
        echo "<th> $donnees[idInscript] </th>";
        echo "<th> $donnees[nom] </th>";
        echo "<th> $donnees[prenom] </th>";
        echo "<th> $donnees[dateNais] </th>";
        echo "<th> $donnees[sexe] </th>";
        echo "<th> $donnees[mail] </th>";
        echo "<th> $donnees[tel] </th>";
        echo "</tr>";
        echo "<br />";

    }
}

//recuperation uniquement des utilisateurs non validés
function getAllWaiting()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription WHERE etatInscription = 0 ORDER BY dateInscription ASC');
    while ($donnees = $data->fetch()) {
        // echo \n;
        echo "</tr>";
        echo "<th> $donnees[idInscript] </th>";
        echo "<th> $donnees[nom] </th>";
        echo "<th> $donnees[prenom] </th>";
        echo "<th> $donnees[dateNais] </th>";
        echo "<th> $donnees[sexe] </th>";
        echo "<th> $donnees[mail] </th>";
        echo "<th> $donnees[tel] </th>";
        echo "</tr>";
        echo "<br />";
    }
}


//valid user
function setUserValid($uuid){
    $bdd = connectBDD();
    $query = $bdd->prepare('UPDATE inscription SET	etatInscription=1  WHERE idInscript = :id');
    $query->execute(array('id' => $uuid));

}

//refuse user
function setUserUnvalid($uuid){
    $bdd = connectBDD();
    $query = $bdd->prepare('UPDATE inscription SET	etatInscription=2  WHERE idInscript = :id');
    $query->execute(array('id' => $uuid));
}
//recuperer valid
function setAllValidUser(){
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription WHERE etatInscription = 1 ORDER BY dateInscription ASC');
    return $data;
}
//recuperer refusé
function setAllUnvalidUser(){
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription WHERE etatInscription = 2 ORDER BY dateInscription ASC');
    return $data;
}
//modifier user
function modifyUser(){

}
