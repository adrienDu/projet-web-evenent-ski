<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 30/11/2016
 * Time: 09:27
 */

require_once ('head.php');
require_once ('form.php');
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
            <?php

            ?>
            <div class="styleform">

                <form action="form.php" method="get">
                    <!-- Nom -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="nom">Ton Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                    </div>

                    <!-- Prenom -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="prenom">Prenom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                    </div>

                    <!-- Date naissance -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Ta date de naissance (seules les personnes majeures
                                peuvent se joindre a l'aventure) :</label>
                            <input type="date" class="form-control" id="nais" name="nais" value="JJ/MM/AAAA">
                        </div>
                    </div>

                    <!-- Sexe -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform">Sexe :</label>
                            <div class="radio">
                                <label><input type="radio" name="sexe" value="0">Homme</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="sexe" value="1">Femme</label>
                            </div>
                        </div>
                    </div>

                    <!-- Mail -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="mail">Mail :</label>
                            <input type="email" class="form-control" id="mail" name="mail">
                        </div>
                    </div>

                    <!-- Tel -->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="tel">Telephone :</label>
                            <input type="tel" class="form-control" id="tel" name="tel">
                        </div>
                    </div>

                    <!-- addresse -->
                    <!-- rue-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="adresse">Adresse :</label>
                            <input type="text" class="form-control" id="adresse" name="rue">
                        </div>
                    </div>
                    <!-- CP-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="cp">Code postale :</label>
                            <input type="text" class="form-control" id="cp" name="cp">
                        </div>
                    </div>
                    <!-- Ville-->
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="intform" for="ville">Ville :</label>
                            <input type="text" class="form-control" id="ville" name="ville">
                        </div>
                    </div>

                    <!-- Ski Snow -->
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

                    <!-- Chaussure -->
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

                    <!-- taille-->
                    <div class="form-group">
                        <label class="intform" for="taille">Taille :</label>
                        <select class="form-control" id="taille" name="taille">
                            <option></option>
                            <option value="1,55">155cm</option>
                            <option value="1,60">160cm</option>
                            <option value="1,65">165cm</option>
                            <option value="1,70">170cm</option>
                            <option value="1,75">175cm</option>
                            <option value="1,80">180cm</option>
                            <option value="1,85">185cm</option>
                            <option value="1,90">190cm</option>
                            <option value="1,95">195cm</option>
                            <option value="2">200cm</option>
                        </select>
                    </div>


                    <!-- Niveau -->
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

                    <!-- Validation Formulaire -->
                    <p>NB: Tous les champs sont obligatoires !</p>
                    <div class="btncenter style-bottom">
                        <input class="btn btn-default" type="submit" name="send" value="Envoyer !">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php

