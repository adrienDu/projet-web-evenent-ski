<?php
/**
 * Created by PhpStorm.
 * User: Mae
 * Date: 20/12/2016
 * Time: 20:17
 */
require('../bdd.php');
include('../head.php');

$data = getAllWaiting();
$res = $data->rowCount();
if ($res == 0){
    echo "<h1>Aucun utilisateurs en attente</h1>";
}
else{
?>
<h1>Utilisateurs en attente</h1>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de naissance</th>
        <th>Sexe</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Rue</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>Ski / Snow</th>
        <th>Pointure</th>
        <th>Taille</th>
        <th>Niveau</th>
        <th style="display: none">Etat de l'inscription</th>
        <th>Date d'inscription</th>
        <th>Actions</th>
    </tr>
    <?php
    while ($donnee = $data->fetch()) {
        echo "</tr>";
        echo "<td> $donnee[nom] </td>";
        echo "<td> $donnee[prenom] </td>";
        echo "<td> $donnee[dateNais] </td>";
        echo "<td> " . valueSexe($donnee['sexe']) . "</td>";
        echo "<td> $donnee[mail] </td>";
        echo "<td> $donnee[tel] </td>";
        echo "<td> $donnee[rue] </td>";
        echo "<td> $donnee[CP] </td>";
        echo "<td> $donnee[ville] </td>";
        echo "<td>" . valueGlisse($donnee['glisse']) . "</td>";
        echo "<td> $donnee[pointure] </td>";
        echo "<td> $donnee[taille] </td>";
        echo "<td>" . valueNiveau($donnee['niveau']) . "</td>";
        echo "<td style='display: none'>" . valueEtatInscr($donnee['etatInscription']) . "</td>";
        echo "<td> $donnee[dateInscription]</td>";
        echo "<td><a class=\"btn btn-success\" href=acceptUser.php?id=" . $donnee['idInscript'] . " role=\"button\">Accept</a><a class=\"btn btn-danger\" href=refuseUser.php?id=" . $donnee['idInscript'] . " role=\"button\">Refuser</a>";
        echo "</tr>";
        echo "<br />";
    }

    echo "</table>";
    } ?>
    <h1>Tous les utilisateurs</h1>
    <?php
    $data = getAll(); ?>
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Sexe</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Rue</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Ski / Snow</th>
            <th>Pointure</th>
            <th>Taille</th>
            <th>Niveau</th>
            <th>Etat de l'inscription</th>
            <th>Date d'inscription</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($donnee = $data->fetch()) {
            echo "</tr>";
            echo "<td><input type='text' value='$donnee[nom] ' disabled> </td>";
            echo "<td><input type='text' value='$donnee[prenom]' disabled> </td>";
            echo "<td><input type='text' value='$donnee[dateNais]' disabled>  </td>";
            echo "<td><input type='text' value='" . valueSexe($donnee['sexe']) . "' disabled> </td>";
            echo "<td><input type='text' value='$donnee[mail] ' disabled> </td>";
            echo "<td><input type='text' value='$donnee[tel] ' disabled> </td>";
            echo "<td> <input type='text' value='$donnee[rue]' disabled> </td>";
            echo "<td> <input type='text' value='$donnee[CP]' disabled> </td>";
            echo "<td><input type='text' value='$donnee[ville]' disabled>  </td>";
            echo "<td><input type='text' value='" . valueGlisse($donnee['glisse']) . "' disabled></td>";
            echo "<td><input type='text' value='$donnee[pointure]' disabled>  </td>";
            echo "<td><input type='text' value='$donnee[taille]' disabled>  </td>";
            echo "<td><input type='text' value='" . valueNiveau($donnee['niveau']) . "' disabled></td>";
            echo "<td>" . valueEtatInscr($donnee['etatInscription']) . "</td>";
            echo "<td>$donnee[dateInscription]</td>";
            echo "<td>" . afficheButton($donnee['idInscript'], $donnee['etatInscription']) . "<button type=\"button\" class=\"btn btn-info\">Info</button>

</td>";
            echo "</tr>";
            echo "<br />";
        }
        ?>
    </table>

    <?php

    function valueSexe($sexe)
    {
        if ($sexe == 0) return "homme";
        else return "femme";
    }

    function valueGlisse($glisse)
    {
        if ($glisse == 0) return "ski";
        else return "snow";
    }

    function valueNiveau($niveau)
    {
        if ($niveau == 0) return "debutant";
        else if ($niveau == 1) return "intermediaire";
        else return "expert";
    }

    function valueEtatInscr($etatInscription)
    {
        if ($etatInscription == 0) return "En attente";
        else if ($etatInscription == 1) return "Validé";
        else return "Refusé";
    }

    function afficheButton($idUser, $etatUser)
    {
        if ($etatUser == 1) {
            return "<a class=\"btn btn-danger\" href=refuseUser.php?id=" . $idUser . " role=\"button\">Refuser</a>";
        } else {
            return "<a class=\"btn btn-success\" href=acceptUser.php?id=" . $idUser . " role=\"button\">Accept</a>";

        }
    }

    ?>

    <script type="text/javascript">
        function modifier() {

        }
    </script>


