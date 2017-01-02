<?php
require('../bdd.php');
newInsc($_GET['idInscript'],$_GET['nom'], $_GET['prenom'], $date, $_GET['sexe'], $_GET['mail'], $_GET['tel'], $_GET['rue'], $_GET['CP'], $_GET['ville'], $_GET['glisse'], $_GET['pointure'], $_GET['taille'], $_GET['niveau'], $_GET['etatInscription'], $_GET['dateInscription']);
//header('Location: admin.php');