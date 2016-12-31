<?php
require_once "bdd.php";

function get_userById($id)
{
    $app_info = array();
    $data = getUserById()


    return $app_info;
}

function get_app_list()
{
    //normally this info would be pulled from a database.
    //build JSON array
    $app_list = array(array("id" => 1, "name" => "Web Demo"), array("id" => 2, "name" => "Audio Countdown"), array("id" => 3, "name" => "The Tab Key"), array("id" => 4, "name" => "Music Sleep Timer"));

    return $app_list;
}

$possible_url = array("get_app_list", "get_app");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
    switch ($_GET["action"])
    {
        case "get_app_list":
            $value = get_app_list();
            break;
        case "get_app":
            if (isset($_GET["id"]))
                $value = get_app_by_id($_GET["id"]);
            else
                $value = "Missing argument";
            break;
    }
}

//return JSON array
exit(json_encode($value));
?>