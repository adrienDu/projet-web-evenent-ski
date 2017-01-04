<?php
require('../bdd.php');
include('../head.php');

session_unset();
?>
<!-- CSS -->
<link rel="stylesheet" href="admin.css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Icon -->
<link rel="icon" href="../images/snowflakeicon.png">

<div class="container-fluid background-home">
    <div class="row">
        <div class="col-xs-12 background-black">
            <!-- Titre page Admin -->
            <h1 class="title1">Page administrateur | Voyage au ski</h1><br/>
            <?php
            $data = getAllWaiting();
            $res = $data->rowCount();
            if ($res == 0){
                echo "<h2 class='stitle1'>Aucun utilisateur en attente</h2>";
            }
            else{
            ?>
            <!-- Tableau des utilisateurs en attende de validation -->
            <h2 class="stitle1">Utilisateurs en attente</h2>
            <figure class="formblock">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover tablestyle">
                        <!-- Entêtes -->
                        <thead class="entete">
                        <tr>
                            <th class="thstyle">Nom</th>
                            <th class="thstyle">Prenom</th>
                            <th class="thstyle">Date de naissance</th>
                            <th class="thstyle">Sexe</th>
                            <th class="thstyle">Email</th>
                            <th class="thstyle">Telephone</th>
                            <th class="thstyle">Rue</th>
                            <th class="thstyle">Code postal</th>
                            <th class="thstyle">Ville</th>
                            <th class="thstyle">Ski / Snow</th>
                            <th class="thstyle">Pointure</th>
                            <th class="thstyle">Taille</th>
                            <th class="thstyle">Niveau</th>
                            <th class="thstyle" style="display: none">Etat de l'inscription</th>
                            <th class="thstyle">Date d'inscription</th>
                            <th class="thstyle">Actions</th>
                        </tr>
                        </thead>
                        <!-- Remplissage du tableau -->
                        <?php
                        while ($donnee = $data->fetch()) {
                            echo "</tr>";
                            echo "<td class='tdstyle'> $donnee[nom] </td>";
                            echo "<td class='tdstyle'> $donnee[prenom] </td>";
                            echo "<td class='tdstyle'> $donnee[dateNais] </td>";
                            echo "<td class='tdstyle'> " . valueSexe($donnee['sexe']) . "</td>";
                            echo "<td class='tdstyle'> $donnee[mail] </td>";
                            echo "<td class='tdstyle'> $donnee[tel] </td>";
                            echo "<td class='tdstyle'> $donnee[rue] </td>";
                            echo "<td class='tdstyle'> $donnee[CP] </td>";
                            echo "<td class='tdstyle'> $donnee[ville] </td>";
                            echo "<td class='tdstyle'>" . valueGlisse($donnee['glisse']) . "</td>";
                            echo "<td class='tdstyle'> $donnee[pointure] </td>";
                            echo "<td class='tdstyle'> $donnee[taille] </td>";
                            echo "<td class='tdstyle'>" . valueNiveau($donnee['niveau']) . "</td>";
                            echo "<td style='display: none'>" . valueEtatInscr($donnee['etatInscription']) . "</td>";
                            echo "<td class='tdstyle'> $donnee[dateInscription]</td>";
                            echo "<td class='tdstyle'><a class=\"btn btn-success btn-xs\" href=\"acceptUser.php?id=" . $donnee['idInscript'] . "\"role=\"button\">Accept</a>
                        <a class=\"btn btn-danger btn-xs\" href=\"refuseUser.php?id=" . $donnee['idInscript'] . "\"role=\"button\">Refuser</a>";
                            echo "</tr>";
                        }
                        } ?>
                    </table>
                    <!-- Fin des utilisateurs en attente -->
                </div>
            </figure>

            <!-- Tableau de tous les utilisateurs -->
            <h2 class="stitle1">Tous les utilisateurs</h2>
            <?php
            $data = getAll(); ?>
            <figure class="formblock">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover tablestyle">
                        <!-- Entêtes -->
                        <thead class="entete">
                        <tr>
                            <th class="thstyle">Nom</th>
                            <th class="thstyle">Prenom</th>
                            <th class="thstyle">Date de naissance</th>
                            <th class="thstyle">Sexe</th>
                            <th class="thstyle">Email</th>
                            <th class="thstyle">Telephone</th>
                            <th class="thstyle">Rue</th>
                            <th class="thstyle">Code postal</th>
                            <th class="thstyle">Ville</th>
                            <th class="thstyle">Ski / Snow</th>
                            <th class="thstyle">Pointure</th>
                            <th class="thstyle">Taille</th>
                            <th class="thstyle">Niveau</th>
                            <th class="thstyle">Etat de l'inscription</th>
                            <th class="thstyle">Date d'inscription</th>
                            <th class="thstyle">Actions</th>
                        </tr>
                        </thead>
                        <!-- Remplissage du tabeau -->
                        <?php
                        while ($donnee = $data->fetch()) {
                            echo " </tr > ";
                            echo "<form action='' method='get''>";
                            echo "<td class='tdstyle' style='display: none' id='idUser' name='idInscript' >$donnee[idInscript] ' </td > ";
                            echo "<td class='tdstyle' id='nomUser' name='nom'> $donnee[nom] </td > ";
                            echo "<td class='tdstyle' id='prenomUser' name='prenom'> $donnee[prenom] </td > ";
                            echo "<td class='tdstyle' name='dateNais'> $donnee[dateNais] </td > ";
                            echo "<td class='tdstyle' id='sexeUser' name='sexe'>" . valueSexe($donnee['sexe']) . "</td > ";
                            echo "<td class='tdstyle' name='mail'>$donnee[mail]</td > ";
                            echo "<td class='tdstyle' id='telUser' name='tel'> $donnee[tel] </td > ";
                            echo "<td class='tdstyle' id='rueUser' name='rue'> $donnee[rue] </td > ";
                            echo "<td class='tdstyle' id='CPUser' name='CP'> $donnee[CP] </td > ";
                            echo "<td class='tdstyle' id='villeUser' name='ville'> $donnee[ville] </td > ";
                            echo "<td class='tdstyle' id='glisseUser' name='glisse'>" . valueGlisse($donnee['glisse']) . "</td > ";
                            echo "<td class='tdstyle' id='pointureUser' name='pointure'> $donnee[pointure] </td > ";
                            echo "<td class='tdstyle' id='tailleUser' name='taille'> $donnee[taille] </td > ";
                            echo "<td class='tdstyle' id='niveauUser' name='niveau'>" . valueNiveau($donnee['niveau']) . "</td > ";
                            echo "<td class='tdstyle'>" . valueEtatInscr($donnee['etatInscription']) . " <input type = 'text' id='etatInscripUser' name='etatInscription' value = '$donnee[etatInscription] '  style='display:none'></td > ";
                            echo "<td class='tdstyle'> $donnee[dateInscription] <input name='dateInscrition'type = 'text'  value = '$donnee[etatInscription] ' style='display: none' ></td > ";
                            echo "<td class='tdstyle'><a class=\"btn btn-info btn-xs\" href=\"modif.php?id=" . $donnee['idInscript'] . "\"role=\"button\">Modifier</a></td>
                        </form>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
                <!-- Fonctions pour remplissage du tableau -->
                <?php
                /*Affichage Homme ou Femme*/
                function valueSexe($sexe)
                {
                    if ($sexe == 0) return "Homme";
                    else return "Femme";
                }

                /*Affichage Ski ou Snow*/
                function valueGlisse($glisse)
                {
                    if ($glisse == 0) return "Ski";
                    else return "Snow";
                }

                /*Affichage du niveau d'un utilisateur (débutant, intermédiaire ou expert) */
                function valueNiveau($niveau)
                {
                    if ($niveau == 0) return "Débutant";
                    else if ($niveau == 1) return "Intermediaire";
                    else return "Expert";
                }

                /*Affichage de l'etat d'inscription d'un utilisateur (validé, en attente ou refusé)*/
                function valueEtatInscr($etatInscription)
                {
                    if ($etatInscription == 0) return "En attente";
                    else if ($etatInscription == 1) return "Validé";
                    else return "Refusé";
                }

                ?>
                </table>
            </figure>
            <!-- Fin div background -->
        </div>
        <!-- Fin row -->
    </div>
    <!-- Fin container -->
</div>


