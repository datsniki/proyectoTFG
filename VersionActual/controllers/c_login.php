<?php
require 'c_conexion.php';
if (isset($_POST['enviar'])) {

    $user = $_POST['usuario'];
    $password =  $_POST['password'];

    //Hacemos una consulta para saber si hay algún usuario que coincida tanto el usuario como la clave
    $query = "SELECT * FROM usuarios WHERE usuario = '$user ' AND pass = '$password'";
    $consulta = mysqli_query($conexion, $query);

    //Si existe alguno igualamos el usuario a $_SESSION y pasa a la vista del Inicio
    if (mysqli_num_rows($consulta) > 0) {
        $fila = mysqli_fetch_assoc($consulta);
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['codusu'] = $fila['cod_usuario'];
        header("Location: index.php");
    } else {
        $msg = "<strong>Datos Incorrectos</strong> Revisa tus credenciales e intenta iniciar sesión de nuevo.";
        echo mensaje($msg, "danger");
    }
}
