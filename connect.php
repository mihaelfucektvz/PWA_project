<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$basename = "leparisien";

$dbc = mysqli_connect(
    $servername,
    $username,
    $password,
    $basename
) or die("Greška kod spajanja.");

mysqli_set_charset($dbc,"utf8");

?>