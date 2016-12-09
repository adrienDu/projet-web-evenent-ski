<?php

require('bdd.php');

function validForm()
{

    $bool = array(0, 1);
    $pointures = array(33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46);
    $taille = array(1.55, 1.60, 1.65, 1.70, 1.75, 1.80, 1.85, 1.9, 1.95, 2.0);
    $niveau = array(0, 1, 2);
    $erreurs = array();

    if (empty($_GET['nom']) /*|| empty($_GET['prenom']) || empty($_GET['nais']) || empty($_GET['sexe'])
        || empty($_GET['mail']) || empty($_GET['tel']) || empty($_GET['rue']) || empty($_GET['cp'])
        || empty($_GET['ville']) || empty($_GET['pointure']) || empty($_GET['taille'])*/
    ) {
        array_push($erreurs, "Tous les champs n'ont pas été renseignés !");

    } else {
        if (strlen($_POST['nom']) > 100 || strlen($_POST['prenom']) > 100) {
            array_push($erreurs, "Les noms ou prenoms saisis ne sont pas valides");
        } else {
            $nais = verifDate($_GET['nais']);
            if (!empty($nais)) {
                array_push($erreurs, $nais);
            } else {
                if (!in_array($_GET['sexe'], $bool)) {
                    array_push($erreurs, "le sexe entré n'est pas proposé");
                } else {
                    if (!filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
                        array_push($erreurs, "L'adresse mail saisie n'est pas valide");
                    } else {
                        if (!preg_match('[0 - 9]{10}', $_GET['tel']) || strlen($_GET['tel']) != 10) {
                            array_push($erreurs, "Le numéro de téléphone saisi n'est pas valide");
                        } else {
                            if (!preg_match('[0 - 9] {5}', $_GET['cp']) || strlen($_GET['cp']) != 5) {
                                array_push($erreurs, "Le code postal saisi n'est pas valide");
                            } else {
                                if (!in_array($_GET['glisse'], $bool)) {
                                    array_push($erreurs, "ça n'est pas un moyen de glisse");
                                } else {
                                    if (!in_array($_GET['pointure'], $pointures)) {
                                        array_push($erreurs, "la pointure de chaussure entré n'existe pas");
                                    } else {
                                        if (!in_array($_GET['taille'], $taille, true)) {
                                            array_push($erreurs, "la taille entré n'existe pas");
                                        } else {
                                            if (!in_array($_GET['niveau'], $niveau)) {
                                                array_push($erreurs, "le niveau entré n'existe pas");

                                            } else {
                                                newInsc($_POST['nom'], $_POST['prenom'], $_POST['nais'], $_POST['sexe'], $_POST['mail'], $_POST['tel'], $_POST['rue'], $_POST['CP'], $_POST['ville'], $_POST['glisse'], $_POST['pointure'], $_POST['taille'], $_POST['niveau']);
                                                array_push($erreurs, "tout est bon)");
                                            }
                                        }

                                    }
                                }
                            }
                        }
                    }
                }
            }

        }


    }
    return $erreurs;


}


function verifDate($date)
{
    $dateDiv = explode("-", $date);
    if (preg_match('#^([0-9]{4})([/-])([0-9]{2})\2([0-9]{2})$#', $date) == 1 && checkdate($dateDiv[1], $dateDiv[2], $dateDiv[0])) {
        return verifAge($date);
    } else {
        return "la date saisie n'est pas valide";
    }
}

function verifAge($date)
{
    if ($date[0] > 1998) {
        return "vous êtes trop jeune";
    } elseif ($date[0] < 1986) {
        //echo $date[0];
        return "Vous êtes trop vieux";
    } else return "";
}
function refilOldValue(){

}

?>