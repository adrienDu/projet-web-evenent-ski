<?php
require('traitementModif.php');
require_once('../bdd.php');
include('../head.php');

session_start();
if (empty($_SESSION['id'])) {
    $_SESSION['id'] = $_GET['id'];
}

$data = getUserById($_SESSION['id']);
$valeur = $data->fetch();
?>
<!-- CSS -->
<link rel="stylesheet" href="admin.css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Icon -->
<link rel="icon" href="../images/snowflakeicon.png">

<body>
<div class="container-fluid background-home">
    <div class="row">
        <div class="col-xs-12">
            <h1>Modification d'un utilisateur</h1>
            <div class="well center-block" style="max-width:600px">
                <!-- Formulaire -->
                <form action="" method="get">
                    <!— Nom —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="nom">Ton Nom :</label>
                            <?php echo "<input type='text' class='form-control' id='nom' name='nom' value='$valeur[nom]'>"; ?>
                        </div>
                    </div>

                    <!— Prenom —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="prenom">Prenom :</label>
                            <?php echo "<input type='text' class='form-control' id='prenom' name='prenom' value='$valeur[prenom]'>"; ?>
                        </div>
                    </div>

                    <!— Date naissance —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Date de naissance :</label>
                            <?php echo "<input type='text' class='form-control' name='date' value='$valeur[dateNais]' readonly>"; ?>
                        </div>
                    </div>

                    <!— Sexe —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Sexe :</label>
                            <div class="radio">
                                <div class="radio">
                                    <label><input type="radio" name="sexe" value="0" class="intform"
                                                  readonly <?php if ($valeur['sexe'] == 0) {
                                            echo "checked";
                                        } ?>>Homme</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="sexe" value="1"
                                                  readonly <?php if ($valeur['sexe'] == 1) {
                                            echo "checked";
                                        } ?>>Femme</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!— Mail —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="mail">Mail :</label>
                            <?php echo "<input type='text' class='form-control' id='mail' name='mail' value='$valeur[mail]' readonly>"; ?>
                        </div>
                    </div>

                    <!— Tel —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="tel">Telephone :</label>
                            <?php echo "<input type='text' class='form-control' id='tel' name='tel' value='0$valeur[tel]'>"; ?>
                        </div>
                    </div>

                    <!— Addresse —>
                    <!— Rue-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="adresse">Adresse :</label>
                            <?php echo "<input type='text' class='form-control' id='rue' name='rue' value='$valeur[rue]'>"; ?>
                        </div>
                    </div>
                    <!— CP-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="cp">Code postal :</label>
                            <?php echo "<input type='text' class='form-control' id='cp' name='cp' value='$valeur[CP]'>"; ?>
                        </div>
                    </div>
                    <!— Ville-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="ville">Ville :</label>
                            <?php echo "<input type='text' class='form-control' id='ville' name='ville' value='$valeur[ville]'>"; ?>
                        </div>
                    </div>

                    <!— Ski / Snow —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Ski ou snow ?</label>
                            <div class="radio">
                                <div class="radio">
                                    <label><input type="radio" name="glisse" value="0" class="intform"
                                                  readonly <?php if ($valeur['glisse'] == 0) {
                                            echo "checked";
                                        } ?>>Ski</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="glisse" value="1"
                                                  readonly <?php if ($valeur['glisse'] == 1) {
                                            echo "checked";
                                        } ?>>Snow</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!— Pointure —>
                    <div class="form-group">
                        <label class="intform" for="pointure">Pointure :</label>
                        <select class="form-control" id="pointure" name="pointure">
                           <?php echo "<option value='$valeur[pointure]'>$valeur[pointure]</option>";
                            valuePointure($valeur['pointure']);
                           ?>

                        </select>
                    </div>

                    <!— taille-->
                    <div class="form-group">
                        <label class="intform" for="taille">Taille :</label>
                        <select class="form-control" id="taille" name="taille">
                        <?php  echo "<option value='$valeur[taille]'>$valeur[taille] cm</option>";
                         valueTaille($valeur['taille']); ?>
                        </select>

                    </div>

                    <!— Niveau —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Niveau :</label>
                            <?php echo
                            selectValNiv($valeur['niveau']); ?>
                        </div>
                    </div>

                   <?php echo "<input style='display: none' name='id' value='$_SESSION[id]'>"; ?>

                    <!— Validation Formulaire —>
                    <p>NB: Tous les champs sont obligatoires !</p>
                    <div class="btncenter style-bottom">
                        <a class="btn btn-info" href="admin.php" role="button">Retour</a>
                        <input class="btn btn-success" type="submit" name="submit" value="Envoyer !">
                    </div>
                </form>
            </div>

        </div>
        <!-- fin row -->
    </div>
    <!-- fin container -->
</div>
</body>

<?php

/*Affichage Homme ou Femme*/
function valueSexe($sexe)
{
    if ($sexe == 0) return "homme";
    else return "femme";
}

/*Affichage Ski ou Snow*/
function valueGlisse($glisse)
{
    if ($glisse == 0) return "ski";
    else return "snow";
}

/*Modification du niveau*/
function selectValNiv($niveau)
{
    if ($niveau == 0) {
        return "<td class='tdstyle'>
    <select class='form-control input-sm selectstyle' id='niveau' name='niveau'>
        <option value=$niveau>" . valueNiveau($niveau) . "</option>
        <option value=1>Intermediaire</option>
        <option value=2>Expert</option>
    </select>
</td > ";
    } else if ($niveau == 1) {
        return "<td class='tdstyle'>
    <select class='form-control input-sm selectstyle' id='niveau' name='niveau'>
        <option value=$niveau>" . valueNiveau($niveau) . "</option>
        <option value=0>Debutant</option>
        <option value=2>Expert</option>
    </select>
</td > ";
    } else if ($niveau == 2) {
        return "<td class='tdstyle'>
    <select class='form-control input-sm selectstyle' id='niveau' name='niveau'>
        <option value=$niveau>" . valueNiveau($niveau) . "</option>
        <option value=0>Debutant</option>
        <option value=1>Intermediaire</option>
    </select>
</td > ";
    }
}

/*Affichage du niveau */
function valueNiveau($niveau)
{
    if ($niveau == 0) return "debutant";
    else if ($niveau == 1) return "intermediaire";
    else return "expert";
}

//affichage valeur pointure
function valuePointure($pointure){
    for($i=33; $i<=46; $i++){
        if($i == $pointure){$i++;}
       echo "<option value='$i'>$i</option>";
    }
}

//affichage valeurs tailles
function valueTaille($taille){
    for($i=155; $i<=200; $i+=5){
        if($i == $taille){$i+=5;}
        echo "<option value='$i'>$i cm</option>";
    }
}
/* Erreur */
if (isset($_GET['submit'])) {
    $erreur = validForm();
    if (!empty($erreur)) {
        ?>
        <div class="alert alert-danger" id="stickyErreur">
            <strong>Error!</strong></br>
            <a href="#" class="alert-link">
                <?php
                for ($i = 0; $i < count($erreur); $i++) {
                    echo $erreur[$i];
                }
                ?>
            </a>
        </div>
        <?php
    } /* OK */
    else {
        session_unset();
        session_destroy();
        echo "<meta http-equiv='refresh' content='1; url=admin.php' />";
        ?>
        <div class="alert alert-success" id="stickyErreur">
            <strong>Utilisateur modifié</strong></br>
            <a href="" class="alert-link">
            </a>
        </div>
        <?php
    }

} ?>
</html>
