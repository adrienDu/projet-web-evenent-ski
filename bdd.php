<?php

//Fonction de creation d'un uuid unique pour les utilisateurs
function uuid()
{
    //Génération d'un nombre aléatoire
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

//Fonction de vérification de l'uuid dans la bdd
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

//Fonction de connection a la bdd
function connectBDD()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetski;charset=utf8', 'root', '');
    } catch (Exeption $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

//Fonction de creation d'un nouvel utilisateur
function newInsc($nom, $prenom, $dateNais, $sexe, $mail, $tel, $rue, $CP, $ville, $glisse, $pointure, $taille, $niveau)
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
    $query = $bdd->prepare('INSERT INTO inscription(`idInscript`, `nom`, `prenom`, `dateNais`, `sexe`, `mail`, `tel`, `rue`, `CP`, `ville`, `glisse`, `pointure`, `taille`, `niveau`, `etatInscription`, `dateInscription`) VALUES (:idInscript,:nom,:prenom,:dateNais,:sexe,:mail,:tel,:rue,:CP,:ville,:glisse,:pointure,:taille,:niveau,:etatInscription,:dateInscription)');
    $query->execute(array(
        'idInscript' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'dateNais' => $dateNais,
        'sexe' => $sexe,
        'mail' => $mail,
        'tel' => $tel,
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

//Fonction de recuperation de tous les utilisateurs de la base de données
function getAll()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription');
   return $data;
}

//Fonction de récuperation uniquement des utilisateurs non validés
function getAllWaiting()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription WHERE etatInscription = 0 ORDER BY dateInscription ASC');
    return $data;
}

//Fonction de récupération des utilisateurs validés
function getAllValidated()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription WHERE etatInscription = 1 ORDER BY dateInscription ASC');
    return $data;
}

//Fonction de validation d'un utilisateur
function setUserValid($uuid){
    $bdd = connectBDD();
    $query = $bdd->prepare('UPDATE inscription SET	etatInscription=1  WHERE idInscript = :id');
    $query->execute(array('id' => $uuid));
}

//Fonction de refus d'un utilisateur
function setUserUnvalid($uuid){
    $bdd = connectBDD();
    $query = $bdd->prepare('UPDATE inscription SET	etatInscription=2  WHERE idInscript = :id');
    $query->execute(array('id' => $uuid));
}

//Fonction de récupération des utilisateurs validés
function getAllValidUser(){
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription WHERE etatInscription = 1 ORDER BY dateInscription ASC');
    return $data;
}

//Fonction de récupération des utilisateurs refusés
function getAllUnvalidUser(){
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription WHERE etatInscription = 2 ORDER BY dateInscription ASC');
    return $data;
}

//Fonction de récupération des utilisateurs par id
function getUserById($id){
    $bdd = connectBDD();
    $query = $bdd->prepare('SELECT * FROM inscription WHERE idInscript = :idInscript');
    $query->execute(array(':idInscript' => $id));
    return $query;
}

//Fonction de modification d'un utilisateur
function modifyUser($idInscript,$nom, $prenom, $dateNais, $sexe, $mail, $tel, $rue, $CP, $ville, $glisse, $pointure, $taille, $niveau, $etatInscription){
    $bdd = connectBDD();
    $query = $bdd -> prepare('UPDATE `inscription` SET `nom`=:nom,`prenom`=:prenom,`dateNais`=:dateNais,`sexe`=:sexe,`mail`=:mail,`tel`=:tel,`rue`=:rue,`CP`=:CP,`ville`=:ville,`glisse`=:glisse,`pointure`=:pointure,`taille`=:taille,`niveau`=:niveau,`etatInscription`=:etatInscription WHERE idInscript LIKE :idInscript');
    $query -> execute(array(
        'idInscript' => $idInscript,
        'nom' => $nom,
        'prenom' => $prenom,
        'dateNais' => $dateNais,
        'sexe' => $sexe,
        'mail' => $mail,
        'tel' => $tel,
        'rue' => $rue,
        'CP' => $CP,
        'ville' => $ville,
        'glisse' => $glisse,
        'pointure' => $pointure,
        'taille' => $taille,
        'niveau' => $niveau,
        'etatInscription' => $etatInscription,
    ));
}

//Fonction de vérification de l'existance du mail dans la bdd
function checkmail($mail){
    $bdd = connectBDD();
    $query = $bdd->prepare('SELECT * FROM inscription WHERE mail = :mail');
    $query->execute(array(':mail' => $mail));
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
