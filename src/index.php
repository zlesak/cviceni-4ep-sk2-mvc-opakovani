<?php

require_once "db.php";

// ziskani kompletni URL
$url = $_SERVER["REQUEST_URI"];

// defaultni hodnoty
$controller = null;
$akce = null;
$parametry = [];

if(strpos($url, "index.php"))
{
    // oseknuti URL na cast za index.php/
    $odkud = strpos($url, "index.php") + strlen("index.php") + 1;
    $zajimava_url = substr($url, $odkud);

    // rozdeleni ziskane URL na jendotlive polozky oddelene /
    $casti_url = [];
    $casti_url = explode("/", $zajimava_url);

    // nalezeni funkcnich casti v URL
    if(count($casti_url) > 0)
        $controller = $casti_url[0];
    if(count($casti_url) > 1)
        $akce = $casti_url[1];
    if(count($casti_url) > 2)
        for($i = 2; $i < count($casti_url); $i++)
            $parametry[] = $casti_url[$i];
}

require_once "views/layout.php";
