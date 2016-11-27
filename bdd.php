<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 26/11/2016
 * Time: 11:48
 */

function connectBDD()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetski;charset=utf8', 'root', '');
    } catch (Exeption $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

function getAll()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM inscription');
    while ($donnees = $data->fetch()) {
        //On affiche l'id et le nom du client en cours
        echo "</TR>";
        echo "<TH> $donnees[idInscript] </TH>";
        echo "<TH> $donnees[nom] </TH>";
        echo "<TH> $donnees[prenom] </TH>";
        echo "<TH> $donnees[dateNais] </TH>";
        echo "<TH> $donnees[sexe] </TH>";
        echo "<TH> $donnees[mail] </TH>";
        echo "<TH> $donnees[tel] </TH>";


        echo "</TR>";


    }
}

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
    $query = $bdd->prepare('INSERT INTO `inscription`(`idInscript`, `nom`, `prenom`, `dateNais`, `sexe`, `mail`, `tel`, `numRue`, `rue`, `CP`, `ville`, `glisse`, `pointure`, `taille`, `niveau`, `etatInscription`, `dateInscription`) VALUES (:idInscript, :nom, :prenom, :dateNais, :sexe, :mail, :tel, :numRue, :rue, :CP, :ville, :glisse, :pointure, :taille, :niveau, :etatInscription, :dateInscription)');
    $query->execute(array(
        `idInscript` => $id,
        `nom` => $nom,
        `prenom` => $prenom,
        `dateNais` => $dateNais,
        `sexe` => $sexe,
        `mail` => $mail,
        `tel` => $tel,
        `numRue` => $numRue,
        `rue` => $rue,
        `CP` => $CP,
        `ville` => $ville,
        `glisse` => $glisse,
        `pointure` => $pointure,
        `taille` => $taille,
        `niveau` => $niveau,
        `etatInscription` => $etatInscription,
        `dateInscription` => $dateInscription
    ));
}

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
