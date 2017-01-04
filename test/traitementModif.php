<?php
require('../bdd.php');

/* Fonction de vérification du formulaire */
function validForm()
{
    $bool = array(0, 1);

    $pointures = array(33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46);
    $taille = array(155, 160, 165, 170, 175, 180, 185, 190, 195, 200);
    $niveau = array(0, 1, 2);
    $erreurs = array();

    /* Si tous les champs sont vides */
    if (empty($_GET['nom']) || empty($_GET['prenom']) || empty($_GET['jour']) || empty($_GET['mois']) || empty($_GET['annee'])
        || empty($_GET['mail']) || empty($_GET['tel']) || empty($_GET['rue']) || empty($_GET['cp'])
        || empty($_GET['ville']) || empty($_GET['pointure']) || empty($_GET['taille'])
    ) {
        array_push($erreurs, "- Tous les champs n'ont pas été renseignés !");

    } /* Vérification Nom et Prenom */
    else {
        if (strlen($_GET['nom']) > 100 || strlen($_GET['prenom']) > 100) {
            array_push($erreurs, "- Les noms ou prenoms saisis ne sont pas valides");
        } /*Vérification date de naissance*/
        else {
            $nais = verifDate($_GET['jour'], $_GET['mois'], $_GET['annee']);
            if (!empty($nais)) {
                array_push($erreurs, $nais);
            } /*Vérification Sexe*/
            else {
                if (!in_array($_GET['sexe'], $bool)) {
                    array_push($erreurs, "- Le sexe entré n'est pas proposé");
                } /*Vérification Mail*/
                else {
                    if (!filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
                        array_push($erreurs, "- L'adresse mail saisie n'est pas valide");
                    }
                    if (checkmail($_GET['mail'])) {
                        array_push($erreurs, "- L'adresse email entrée existe déjà");
                    } /* Vérification Telephone*/
                    else {
                        if (!preg_match("#^0[1-8]([-. ]?[0-9]{2}){4}$#", $_GET['tel']) || strlen($_GET['tel']) != 10) {
                            array_push($erreurs, "- Le numéro de téléphone saisi n'est pas valide");
                        } /* Vérification CP*/
                        else {
                            if (!preg_match('#^[0-9]{5}$#', $_GET['cp'])) {
                                array_push($erreurs, "- Le code postal saisi n'est pas valide");
                            } /* Vérification snow/ski*/
                            else {
                                if (!in_array($_GET['glisse'], $bool)) {
                                    array_push($erreurs, "- Ca n'est pas un moyen de glisse valide");
                                } /* Vérification Pointure*/
                                else {
                                    //if (!in_array($_GET['pointure'], $pointures)) {
                                    if (!preg_match('#[33-46]#', $_GET['pointure'])) {
                                        array_push($erreurs, "- La pointure de chaussure entrée n'existe pas");
                                    } /* Vérification de la taille*/
                                    else {
                                        if (!in_array($_GET['taille'], $taille)) {
                                            array_push($erreurs, "- La taille entrée n'existe pas");
                                        } /* Vérification niveau ski/snow*/
                                        else {
                                            if (!in_array($_GET['niveau'], $niveau)) {
                                                array_push($erreurs, "- Le niveau entré n'existe pas");

                                            } /* Validation des données*/
                                            else {
                                                $date = $_GET['annee'] . "-" . $_GET['mois'] . "-" . $_GET['jour'];
                                                modifyUser($_GET['id'],$_GET['nom'], $_GET['prenom'], $date, $_GET['sexe'], $_GET['mail'], $_GET['tel'], $_GET['rue'], $_GET['cp'], $_GET['ville'], $_GET['glisse'], $_GET['pointure'], $_GET['taille'], $_GET['niveau']);
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

/*Fonction de vérification du format de la date*/
function verifDate($j, $m, $a)
{
    if (checkdate($m, $j, $a)) {
        return verifAge($a);
    } else {
        return "- La date saisie n'est pas valide";
    }
}

/*Fonction de vérification age*/
function verifAge($a)
{
    if ($a > 1998) {
        return "- Vous êtes trop jeune";
    } elseif ($a < 1986) {
        //echo $date[0];
        return "- Vous êtes trop vieux";
    } else return "";
}
?>