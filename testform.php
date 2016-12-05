<?php
/**
 * Created by PhpStorm.
 * User: adrien
 * Date: 28/11/2016
 * Time: 10:46
 */
function verifDate($date)
{

    if (preg_match('#^([0-9]{4})([-])([0-9]{2})\2([0-9]{2})$#', $date, $m) == 1 && checkdate($m[3], $m[4], $m[2])) {
        echo "date valide";
    } else {
        echo "date non valide";
    }


}
$dateInscription = date("Y-m-d");
echo $dateInscription;
verifDate($dateInscription);
