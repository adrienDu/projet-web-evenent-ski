<?php

include('head.php');
require_once('form.php');
$boolErr = false;
?>
<body>
<div class="container-fluid background-home">
    <div class="row">
        <div class="col-xs-12 fontform background-black">
            <h1 class="titleform"> Formulaire d'inscription pour le voyage au SKI 2017 </h1>
            <p class="presform"> Afin de nous rejoindre dans ce magnifique voyage au ski, nous aurions besoin de
                quelques informations
                sur
                toi. Merci de prendre le temps de remplir ce formulaire, tu recevera un mail de confirmation avec toutes
                les
                infos necessaires.</p>
            <h2 class="presform">Pour commencer on a besoin de savoir qui tu es :</h2>
            <div class="styleform">

                <form action="" method="get">
                    <!— Nom —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="nom">Ton Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                    </div>

                    <!— Prenom —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="prenom">Prenom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                    </div>

                    <!— Date naissance —>
                    <div class="col-xs-12">
                        <label class="intform">Ta date de naissance (seules les personnes majeures
                            peuvent se joindre a l'aventure) :</label>
                        <div class="form-inline" style="margin-top: 10px; margin-left: 15px; margin-bottom: 15px">
                            <label class="intform" for=""> Jour :</label>
                            <select class="form-control" id="" name="jour">
                                <option></option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>

                            <label class="intform" style="margin-left: 15px">Mois:</label>
                            <select class="form-control" id="" name="mois">
                                <option></option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>

                            <label class="intform" style="margin-left: 15px">Annee:</label>
                            <select class="form-control" id="" name="annee">
                                <option></option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                            </select>
                        </div>
                    </div>

                    <!— Sexe —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Sexe :</label>
                            <div class="radio">
                                <label><input type="radio" name="sexe" value="0" class="intform">Homme</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="sexe" value="1">Femme</label>
                            </div>
                        </div>
                    </div>

                    <!— Mail —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="mail">Mail :</label>
                            <input type="email" class="form-control" id="mail" name="mail">
                        </div>
                    </div>

                    <!— Tel —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="tel">Telephone :</label>
                            <input type="tel" class="form-control" id="tel" name="tel">
                        </div>
                    </div>

                    <!— addresse —>
                    <!— rue-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="adresse">Adresse :</label>
                            <input type="text" class="form-control" id="adresse" name="rue">
                        </div>
                    </div>
                    <!— CP-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="cp">Code postale :</label>
                            <input type="text" class="form-control" id="cp" name="cp">
                        </div>
                    </div>
                    <!— Ville-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="ville">Ville :</label>
                            <input type="text" class="form-control" id="ville" name="ville">
                        </div>
                    </div>

                    <!— Ski Snow —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Avec quoi tu glisses ?</label>
                            <div class="radio">
                                <label><input type="radio" name="glisse" value="0">Ski</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="glisse" value="1">Snow</label>
                            </div>
                        </div>
                    </div>

                    <!— Chaussure —>
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
                        <select class="form-control" id="taille" name="taille">
                            <option></option>
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
                        </select>
                    </div>
                    <!— Niveau —>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Niveau :</label>
                            <div class="radio">
                                <label><input type="radio" name="niveau" value="0">Débutant</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="niveau" value="1">Intermédiaire</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="niveau" value="2">Expert</label>
                            </div>
                        </div>
                    </div>

                    <!— Validation Formulaire —>
                    <p>NB: Tous les champs sont obligatoires !</p>
                    <div class="btncenter style-bottom">
                        <input class="btn btn-default" type="submit" name="submit" value="Envoyer !">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
if (isset($_GET['submit'])) {
    $erreur = validForm();
    if(!empty($erreur)) {
        ?>
        <div class="alert alert-danger" id="stickyErreur">
            <strong>Error!</strong></br> <a href="#" class="alert-link">

                <?php
                for ($i = 0; $i < count($erreur); $i++) {
                    echo $erreur[$i];
                }

                ?>
            </a>
        </div>
        <?php

    }
    else echo "merci de vous être inscrit";
}