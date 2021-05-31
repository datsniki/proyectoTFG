<?php

/*
Se verificarán los datos del usuario comprobado que el usuario y correo sean unicos
Una vez comprobado se llevara a cabo el registro
Dependiendo del resultado se le mostrara un mensaje de Completado o Error
*/

if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuform'];
    $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    $correo = $_POST['correo'];
    $fecha = $_POST['fecha'];
    $cuota = $_POST['cuota'];
    $direccion = $_POST['direccion'];
    $codpostal = $_POST['codPostal'];
    $iban = $_POST['iban'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $error = false;

    if ($cuota != "") {
        $query = "INSERT INTO usuarios (nombre, apellidos, usuario, cod_cuota, correo, telefono, pass, fecha, direccion, codpostal, iban, dni) 
        VALUES ('$nombre', '$apellidos', '$usuario', '$cuota', '$correo', '$telefono', '$password', '$fecha', '$direccion', '$codpostal', '$iban', '$dni')";
    } else {
        $query = "INSERT INTO usuarios (nombre, apellidos, usuario, cod_cuota, correo, telefono, pass, fecha, direccion, codpostal, iban, dni) 
             VALUES ('$nombre', '$apellidos', '$usuario', '$correo', NULL, '$telefono', '$password', '$fecha', '$direccion', '$codpostal', '$iban', '$dni')";
    }

    // Se verifica si el usuario, correo, telf o dni existen ya en la base de datos
    // Si existen no dejará registrarse
    $msg = "<strong>Revise los siguientes campos:</strong>";

    $verificarUsuario = mysqli_query($conexion,  "SELECT * FROM usuarios WHERE usuario = '$usuario'");
    if (mysqli_num_rows($verificarUsuario) > 0) {
        $msg .= "- <b>Nombre de usuario</b>: Ya resgistrado";
        $value = 'danger';
        $error = true;
    }
    $verificarDni = mysqli_query($conexion, "SELECT * FROM usuarios WHERE dni = '$dni'");
    if (mysqli_num_rows($verificarDni) > 0) {
        $msg .= "- <b>DNI</b>: Ya resgistrado";
        $value = 'danger';
        $error = true;
    }
    $verificarCorreo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if (mysqli_num_rows($verificarCorreo) > 0) {
        $msg .= "- <b>Correo electronico</b>: Ya resgistrado";
        $value = 'danger';
        $error = true;
    }
    $verificarTelf = mysqli_query($conexion, "SELECT * FROM usuarios WHERE telefono = '$telefono'");
    if (mysqli_num_rows($verificarTelf) > 0) {
        $msg .= "- <b>Telefono</b>: Ya resgistrado";
        $value = 'danger';
        $error = true;
    }

    if (!$error) {
        $consulta = mysqli_query($conexion, $query);
        if ($consulta) {
            $msg = "<strong>Bienvenido</strong> Inicie sesión con su usuario y contraseña";
            $value = 'success';
        } else {
            echo mysqli_error($conexion);
            $msg = "<strong>Error</strong> No se ha podido registrar en el sistema";
            $value = 'danger';
        }
    }

    echo mensaje($msg, $value);
}
