<?php

//Conexion con la base de datos

$host = "localhost";
$user = "root";
$password = "";
$db = "kratosgym";

// error_reporting(0);

if (mysqli_connect($host, $user, $password, $db)) {
    $conexion = mysqli_connect($host, $user, $password, $db);
}
