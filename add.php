<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 29.3.2020.
 * Time: 22.05
 */

define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');

define('DB_NAME', 'radio');



/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

$query = "INSERT INTO news values (NULL,'".$_REQUEST['tittle']."', '".$_REQUEST['desc']."', '".$_REQUEST['img']."')";
$link->query($query);

header("Location: index.php");
die();