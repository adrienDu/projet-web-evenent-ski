<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 27/12/16
 * Time: 13:59
 */
include ('head.php');
?>

<body>

<!-- Home -->
<section>
    <div class="background-home parallax-section" id="border-home">
        <div class="container-fluid">
            <div class="row box-home box">
                <div class="style-home col-xs-12">
                    <h1 id="nom-home">Voyage au ski 2017</h1>
                    <p id="desc-home">Pour l'édition 2017 du voyage Ski, nous vous embarquons sur les pistes du Val
                        d'Arly en Haute Savoie.
Au programme : ski, snow, fun, bierres et raclettes !!</p>
                </div>
                <!-- fin row-->
            </div>
            <!-- fin container -->
        </div>
        <!-- fin parallax -->
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 style-bottom">
                <!-- Titre Section -->
                <div class=" col-xs-offset-1 col-sm-offset-1">
                    <h2 class="titlewhite">Organisation</h2>
                </div>
                <br>
                <!-- Contenu Organisation -->
                <!-- Lieu -->
                <div class="col-xs-12 col-sm-offset-2 col-sm-2 txt-orga">
                    <h3 class="title-orga">Où ?</h3>
                    <h4 class="stitle-orga">Praz sur Arly</h4>
                    <p class="desc-orga">Blotti au cœur du Val d'Arly, le village est l’une des portes du tout nouveau
                        domaine
                        skiable Espace Diamant. La station est située à 4 km de Megève et dans le cadre somptueux du
                        Pays du Mont-Blanc.</p>
                </div>
                <!-- Dates -->
                <div class="col-xs-12 col-sm-offset-1 col-sm-2 txt-orga">
                    <h3 class="title-orga">Quand ?</h3>
                    <h4 class="stitle-orga">1e semaine des vacances de février (zone C)</h4>
                    <p class="desc-orga">Départ le dimanche 5 février à 7h30 et retour le samedi 11 février vers
                        19h30.</p>
                </div>
                <!-- Prix -->
                <div class="col-xs-12 col-sm-offset-1 col-sm-2 txt-orga">
                    <h3 class="title-orga">Combien ?</h3>
                    <h4 class="stitle-orga">520€</h4>
                    <p class="desc-orga">Le prix inclus le transport, le logement, le forfait, la location de matériel
                        et les
                        repas.</p>
                </div>
            </div>
            <!-- fin row -->
        </div>
        <!-- fin container -->
    </div>
</section>
<section>
    <div class="container-fluid background-home">
        <div class="row">
            <div class="col-xs-12 style-bottom background-black">
                <!-- Titre Section -->
                <div class=" col-xs-offset-1 col-sm-offset-1">
                    <h2 class="titleblack">Planning</h2>
                </div>
                <br>
                <!-- Contenu Organisation -->
                <!-- J1 -->
                <div class="col-xs-12 col-sm-6">
                    <h3 class="title-plan">Jour 1</h3>
                    <ul class="desc-plan">
                        <li>Rendez-vous à 7h00 à Opéra (côté de l'Apple Store Opéra).</li>
                        <li>Départ 7h30</li>
                        <li>Arrivée à Praz Sur Arly vers 16h</li>
                        <li>Dinner vers 20h</li>
                    </ul>
                    <h3 class="title-plan">Jour 2</h3>
                    <ul class="desc-plan">
                        <li>9h30 : Rendez-vous pour récuppérer chaussures, skis et snow</li>
                        <li>Découverte du domaine avec pique nique sur les pistes le midi.</li>
                        <li>Soirée raclette à 20h30 !</li>
                    </ul>
                    <h3 class="title-plan">Jour 3</h3>
                    <ul class="desc-plan">
                        <li>9h30 : Rendez-vous sur les pistes</li>
                        <li>12h30 : Retour au chalet pour manger</li>
                        <li>Après midi libre</li>
                        <li>Soirée fondue à 20h30 !</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h3 class="title-plan">Jour 4</h3>
                    <ul class="desc-plan">
                        <li>9h30 : Rendez-vous sur les pistes</li>
                        <li>12h30 : Retour au chalet pour manger</li>
                        <li>Après midi patin à glasse à la patinoire de Mégève.</li>
                        <li>Soirée tartiflette à 20h30 !</li>
                    </ul>
                    <h3 class="title-plan">Jour 5</h3>
                    <ul class="desc-plan">
                        <li>9h30 : Rendez-vous sur les pistes</li>
                        <li>12h30 : Retour au chalet pour manger</li>
                        <li>Après-midi ski and snow !</li>
                        <li>Dinner à 20h00</li>
                        <li>Soirée descente aux flambeaux</li>
                    </ul>
                    <h3 class="title-plan">Jour 6</h3>
                    <ul class="desc-plan">
                        <li>9h30 : Rendez-vous sur les pistes</li>
                        <li>Pique nique sur les pistes vers 12h</li>
                        <li>17h30 : Rendez-vous à la loc de ski pour le retour du matériel</li>
                        <li>Soirée raclette, le retour à 20h30 !</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-offset-3 col-sm-6">
                    <h3 class="title-plan">Jour 7</h3>
                    <ul class="desc-plan">
                        <li>Départ du chalet vers 10h00 et arrivée à Paris estimée vers 17h30</li>
                    </ul>
                </div>
            </div>
            <!-- fin row -->
        </div>
        <!-- fin container -->
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 style-bottom">
                <h3 class="title-int">Intéressé ?</h3>
                <div class="btncenter">
                <a class="btn btn-default btn-lg btn-int" href="inscription.php" role="button">Inscris-toi !</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 style-bottom background-black">
                <!-- Titre Section -->
                <div class=" col-xs-offset-1 col-sm-offset-1">
                    <h2 class="titleblack">Contact</h2>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>