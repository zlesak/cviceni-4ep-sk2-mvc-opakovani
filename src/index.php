<?php

require_once "db.php";

// ziskani kompletni URL
$url = $_SERVER["REQUEST_URI"];

// defaultni hodnoty
$controller = null;
$akce = null;
$parametry = [];

$kde_zacina_index_php = strpos($url, "index.php");

if($kde_zacina_index_php)
{
    // cast URL pred index.php
    $zakladni_url = substr($url, 0, $kde_zacina_index_php);

    // oseknuti URL na cast za index.php/
    $zacatek_zajimave_casti_url = $kde_zacina_index_php + strlen("index.php") + 1;
    $zajimava_cast_url = substr($url, $zacatek_zajimave_casti_url);

    // rozdeleni ziskane URL na jendotlive polozky oddelene /
    $casti_url = [];
    $casti_url = explode("/", $zajimava_cast_url);

    // nalezeni funkcnich casti v URL
    if(count($casti_url) > 0)
        $controller = $casti_url[0];
    if(count($casti_url) > 1)
        $akce = $casti_url[1];
    if(count($casti_url) > 2)
        for($i = 2; $i < count($casti_url); $i++)
            $parametry[] = $casti_url[$i];
}
else
{
    $zakladni_url = $url;
}

require_once "views/layout.php";
