<?php
require('../bdd.php');
include('../head.php');

$data = getUserById($_GET['id']);
$valeur = $data->fetch();
//modifyUser($_GET['idInscript'],$_GET['nom'], $_GET['prenom'], $date, $_GET['sexe'], $_GET['mail'], $_GET['tel'], $_GET['rue'], $_GET['CP'], $_GET['ville'], $_GET['glisse'], $_GET['pointure'], $_GET['taille'], $_GET['niveau'], $_GET['etatInscription'], $_GET['dateInscription']);
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
                                <?php echo "<input type='text' class='form-control' name='date' value='$valeur[dateNais]' disabled>"; ?>
                            </div>
                        </div>

                        <!— Sexe —>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="intform">Sexe :</label>
                                <div class="radio">
                                    <div class="radio">
                                        <label><input type="radio" name="sexe" value="0" class="intform" disabled <?php if($valeur['sexe'] == 0){ echo "checked"; }?>>Homme</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="sexe" value="1" disabled  <?php if($valeur['sexe'] == 1){ echo "checked";} ?>>Femme</label>
                                    </div>
                               </div>
                            </div>
                        </div>

                        <!— Mail —>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="intform" for="mail">Mail :</label>
                                <?php echo "<input type='text' class='form-control' id='mail' name='mail' value='$valeur[mail]' disabled>"; ?>
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
                                        <label><input type="radio" name="glisse" value="0" class="intform" disabled <?php if($valeur['glisse'] == 0){ echo "checked"; }?>>Ski</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="glisse" value="1" disabled  <?php if($valeur['glisse'] == 1){ echo "checked";} ?>>Snow</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!— Pointure —>
                        <div class="form-group">
                            <label class="intform" for="pointure">Pointure :</label>
                            <select class="form-control" id="pointure" name="pointure">
                                <option></option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                            </select>
                        </div>

                        <!— taille-->
                        <div class="form-group">
                            <label class="intform" for="taille">Taille :</label>
                            <?php echo selectValNiv($valeur['taille']); ?>
                                <option value="155">155cm</option>
                                <option value="160">160cm</option>
                                <option value="165">165cm</option>
                                <option value="170">170cm</option>
                                <option value="175">175cm</option>
                                <option value="180">180cm</option>
                                <option value="185">185cm</option>
                                <option value="190">190cm</option>
                                <option value="195">195cm</option>
                                <option value="200">200cm</option>
                        </div>

                        <!— Niveau —>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="intform">Niveau :</label>
                                <?php echo selectValNiv($valeur['niveau']); ?>
                            </div>
                        </div>

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

/*Modification de la pointure*/
function selectValPoint($pointure)
{

}

/*Modification de la taille*/
function selectValTaille($taille)
{

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
} ?>