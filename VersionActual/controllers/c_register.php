<?php

require 'c_conexion.php';

if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];

    $error = false;

    $query = "INSERT INTO usuarios (nombre, apellidos, usuario, correo, pass, edad) 
            VALUES ('$nombre', '$apellidos', '$usuario', '$correo', '$password', '$edad')";


    $verUser = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

    $verificarUsuario = mysqli_query($conexion, $verUser);
    if (mysqli_num_rows($verificarUsuario) > 0) {
        $msg = "<strong>Nombre de usuario en uso</strong> El nombre de usuario deseado ya está en uso, intente con otro nombre.";
        $value = 'danger';
        $error = true;
    }

    $verCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";

    $verificarCorreo = mysqli_query($conexion, $verCorreo);
    if (mysqli_num_rows($verificarCorreo) > 0) {
        $msg = "<strong>Correo en uso</strong> Correo ya registrado, intente con otro correo.";
        $value = 'danger';
        $error = true;
    }

    if (!$error) {
        $consulta = mysqli_query($conexion, $query);

        if ($consulta) {
            $msg = "<strong>Bienvenido</strong> Inicie sesión con su usuario y contraseña";
            $value = 'success';
        } else {
            $msg = "<strong>Error</strong> No se ha podido registrar en el sistema";
            $value = 'danger';
        }
    }

    echo mensaje($msg, $value);
}
