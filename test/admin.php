<?php
require('../bdd.php');
include('../head.php');
?>
<!-- CSS -->
<link rel="stylesheet" href="admin.css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../images/snowflakeicon.png">

<div class="container-fluid background-home">
    <div class="row">
        <div class="col-xs-12 background-black">
            <h1 class="title">Page administrateur | Voyage au ski</h1><br/>
            <?php
            $data = getAllWaiting();
            $res = $data->rowCount();
            if ($res == 0){
                echo "<h1 class='title'>Aucun utilisateur en attente</h1>";
            }
            else{
            ?>
            <h1 class="title">Utilisateurs en attente</h1>
            <div class="table-responsive">
                <table class="table table-condensed tablestyle">
                    <thead class="entete">
                    <tr>
                        <th class="thstyle">Nom</th>
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
                    </thead>
                    <?php
                    while ($donnee = $data->fetch()) {
                        echo "</tr>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[nom] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[prenom] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[dateNais] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> " . valueSexe($donnee['sexe']) . "</td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[mail] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[tel] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[rue] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[CP] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[ville] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'>" . valueGlisse($donnee['glisse']) . "</td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[pointure] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[taille] </td>";
                        echo "<td class='tdstyle whitefonttdstyle'>" . valueNiveau($donnee['niveau']) . "</td>";
                        echo "<td style='display: none'>" . valueEtatInscr($donnee['etatInscription']) . "</td>";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[dateInscription]</td>";
                        echo "<td class='tdstyle whitefonttdstyle'><a class=\"btn btn-success btn-xs\" href=\"acceptUser.php?id=\"" . $donnee['idInscript'] . " role=\"button\">Accept</a>
                        <a class=\"btn btn-danger btn-xs\" href=\"refuseUser.php?id=\"" . $donnee['idInscript'] . " role=\"button\">Refuser</a>";
                        echo "</tr>";
                    }

                    } ?>
                </table>
            </div>
            <h1 class="title">Tous les utilisateurs</h1>
            <?php
            $data = getAll(); ?>
            <div class="table-responsive">
                <table class="table table-condensed table-hover tablestyle">
                    <thead class="entete">
                    <tr>
                        <th class="thstyle">Nom</th>
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
                    </thead>
                    <?php
                    while ($donnee = $data->fetch()) {
                        echo " </tr > ";
                        echo "<form action='' method='get''>";
                        echo "<td class='tdstyle' style='display: none' ><input type = 'text' name='idInscript' value = '$donnee[idInscript] '  > </td > ";
                        echo "<td class='tdstyle' ><input type = 'text' name='nom' value = '$donnee[nom] '  > </td > ";
                        echo "<td class='tdstyle'><input type = 'text' name='prenom' value = '$donnee[prenom]'  > </td > ";
                        echo "<td class='tdstyle'><input type = 'text' name='dateNais' value = '$donnee[dateNais]'  >  </td > "; //ne se modifie pas, a passer en type normal
                        echo "<td class='tdstyle'><input type = 'text' name='sexe' value = '" . valueSexe($donnee['sexe']) . "' disabled > </td > "; //ne se modifie pas, a passer en type normal
                        echo "<td class='tdstyle'><input type = 'text' name='mail'value = '$donnee[mail] '  > </td > ";
                        echo "<td class='tdstyle'><input type = 'text' name='tel'value = '$donnee[tel] '  > </td > ";
                        echo "<td class='tdstyle'> <input type = 'text' name='rue'value = '$donnee[rue]'  > </td > ";
                        echo "<td class='tdstyle'> <input type = 'text' name='CP'value = '$donnee[CP]'  > </td > ";
                        echo "<td class='tdstyle'><input type = 'text' name='ville'value = '$donnee[ville]'  >  </td > ";
                        echo "<td class='tdstyle'><input type = 'text' name='glisse'value = '" . valueGlisse($donnee['glisse']) . "' disabled ></td > "; //reproduire selectValNiv en modifiant le contenue
                        echo "<td class='tdstyle'><input type = 'text' name='pointure' value = '$donnee[pointure]'  >  </td > "; //reproduire selectValNiv en modifiant le contenue
                        echo "<td class='tdstyle'><input type = 'text' name='taille' value = '$donnee[taille]'  >  </td > "; //reproduire selectValNiv en modifiant le contenue
                        echo selectValNiv($donnee['niveau']);
                        echo "<td class='tdstyle whitefonttdstyle'> " . valueEtatInscr($donnee['etatInscription']) . " <input name='etatInscription'type = 'text'  value = '$donnee[etatInscription] '  style='display:none'></td > ";
                        echo "<td class='tdstyle whitefonttdstyle'> $donnee[dateInscription] <input name='dateInscrition'type = 'text'  value = '$donnee[etatInscription] ' style='display: none' ></td > ";
                        echo "<td class='tdstyle'> " . afficheButton($donnee['idInscript'], $donnee['etatInscription']) . "
                        <input type='submit' class='btn btn-info btn-xs'>Modifier</button></td>
                        </form>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
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

            function selectValNiv($niveau)
            {
                if ($niveau == 0) {
                    return "<td class='tdstyle'><select class='form-control' id='niveau' name='niveau'>
                            <option value=$niveau>" . valueNiveau($niveau) . "</option>
                            <option value=1>Intermediaire</option>
                            <option value=2>Expert</option></td > ";
                } else if ($niveau == 1) {
                    return "<td class='tdstyle'><select class='form-control' id='niveau' name='niveau'>
                            <option value=$niveau>" . valueNiveau($niveau) . "</option>
                            <option value=0>Debutant</option>
                            <option value=2>Expert</option></td > ";
                } else if ($niveau == 2) {
                    return "<td class='tdstyle'><select class='form-control' id='niveau' name='niveau'>
                            <option value=$niveau>" . valueNiveau($niveau) . "</option>
                            <option value=0>Debutant</option>
                            <option value=1>intermediaire</option></td > ";
                }
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
                    return "<a class=\"btn btn-danger btn-xs\" href=refuseUser.php?id=" . $idUser . " role=\"button\">Refuser</a>";
                } else {
                    return "<a class=\"btn btn-success btn-xs\" href=acceptUser.php?id=" . $idUser . " role=\"button\">Accepter
                    </a>";
                }
            }

            ?>
            </table>
        </div>
    </div>
</div>


