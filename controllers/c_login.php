<?php
require 'c_conexion.php';

session_start();

$user = $_POST['usuario'];
$password =  $_POST['password'];

//Hacemos una consulta para saber si hay algún usuario que coincida tanto el usuario como la clave
$query = "SELECT * FROM usuarios WHERE usuario = '$user ' AND pass = '$password'";
$consulta = mysqli_query($conexion, $query);

//Si existe alguno igualamos el usuario a $_SESSION y pasa a la vista del Inicio
if (mysqli_num_rows($consulta) > 0) {
    $_SESSION['usuario'] = $user;
    header("location: ../index.php");
} else { //Si no existe volvemos al login
    echo "no log";
}
