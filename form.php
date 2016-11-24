<?php
var_dump($_GET);
var_dump(isset($_GET['nom']));

if (empty($_GET['nom']) || empty($_GET['prenom']) || empty($_GET['nais']) || empty($_GET['sexe'])
    || empty($_GET['mail']) || empty($_GET['tel']) || empty($_GET['rue']) || empty($_GET['cp'])
    || empty($_GET['ville']) || empty($_GET['glisse']) || empty($_GET['pointure']) || empty($_GET['taille'])
    || empty($_GET['niveau'])) {
    echo "ERREUR : tous les champs n'ont pas ete renseignés.";

} else {
    echo "OK";
    /* $nom = $_POST['nom'];
     $prenom = $_POST['prenom'];
     $nais = $_POST['nais'];
     $sexe = $_POST['sexe'];
     $mail = $_POST['mail'];
     $tel = $_POST['tel'];
     $rue = $_POST['rue'];
     $cp = $_POST['cp'];
     $ville = $_POST['ville'];
     $glisse = $POST['glisse'];
     $pointure = $_POST['pointure'];
     $taille = $_POST['taille'];
     $niveau = $_POST['niveau'];
    */

}
?>