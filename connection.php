<?php

$host = "localhost";
$user = "lllcuser";
$password = "qwert123";
$dataBase = "data";

function connectDatabase() {
    global $host, $user, $password, $dataBase;
    $con = mysqli_connect($host, $user, $password, $dataBase);
    mysqli_set_charset($con,"utf8");
    return $con;
}