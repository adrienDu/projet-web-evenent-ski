<?php

//var_dump($_GET);
//var_dump(isset($_GET['nom']));
$nais = $_GET['nais'];
$bool = array(0, 1);
$pointures = array(33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46);
$taille = array(1.55, 1.60, 1.65, 1.70, 1.75, 1.80, 1.85, 1.9, 1.95, 2.0);
$niveau = array(0, 1,2);

if (empty($_GET['nom']) || empty($_GET['prenom']) || empty($_GET['nais']) || empty($_GET['sexe'])
    || empty($_GET['mail']) || empty($_GET['tel']) || empty($_GET['rue']) || empty($_GET['cp'])
    || empty($_GET['ville']) || empty($_GET['glisse']) || empty($_GET['pointure']) || empty($_GET['taille'])
    || empty($_GET['niveau'])
) {
    echo "Tous les champs n'ont pas été renseignés !";

} else {
    if (strlen($_GET['nom']) > 100 || strlen($_GET['prenom']) > 100) {
        echo "Les noms ou prenoms saisis ne sont pas valides";
    } else {
        $nais = verifDate($_GET['nais']);
        if (!empty($nais)) {
            echo $nais;
        } else {
            if (!in_array($_get['sexe'], $bool)) {
                echo "le sexe entré n'est pas proposé";
            } else {
                if (!filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
                    echo "L'adresse mail saisie n'est pas valide";
                } else {
                    if (!preg_match('`[0 - 9]{10}`', $_GET['tel']) || strlen($_GET['tel']) != 10) {
                        echo "Le numéro de téléphone saisi n'est pas valide";
                    } else {
                        if (!preg_match('`[0 - 9] {5}`', $_GET['cp']) || strlen($_GET['cp']) != 5) {
                            echo "Le code postal saisi n'est pas valide";
                        } else {
                            if (!in_array($_GET['glisse'], $bool)) {
                                echo "ça n'est pas un moyen de glisse";
                            } else {
                                if (!in_array($_GET['pointure'], $pointures)) {
                                    echo "la pointure de chaussure entré n'existe pas";
                                } else {
                                    if (!in_array($_GET['taille'], $taille, true)) {
                                        echo "la taille entré n'existe pas";
                                    } else {
                                        if (!in_array($_GET['niveau'], $niveau)) {
                                            echo "le niveau entré n'existe pas";

                                        } else {

                                        }
                                    }

                                }
                                echo "OK";
                            }
                        }
                    }
                }
            }
        }

    }

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
        return "Vous êtes trop vieux";
    } else return "";

}

?>