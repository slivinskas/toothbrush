<?php
/**
 * Created by PhpStorm.
 * User: slivinskas
 * Date: 2017-03-11
 * Time: 07:56
 */
$config =  include_once ("config.php");
include_once ("libary/DB.class.php");

$db = new DB($config->host,$config->user,$config->pass,$config->db);

/*
 * $_GET["start"] // šepetėlio numeris
 * return //valymo numeris
 *
 * */
if(isset($_GET["start"])){
    echo $db->setStart($_GET["start"]);
    exit;
}

/*
 * $_GET["endtime"] // valymo numeris
 * $_GET["period"] // valymo trukmė
 *
 * */
if(isset($_GET["endtime"])&&isset($_GET["period"])){
    $db->setEnd($_GET["endtime"],$_GET["period"]);
    echo "end";
    exit;
}

// return // visi duomenys
if(isset($_GET["getdata"])){
    echo json_encode($db->getStatistic());
    exit;
}

echo "Nieko";