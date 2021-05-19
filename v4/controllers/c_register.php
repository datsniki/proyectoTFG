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

    $error = false;

    $query = "INSERT INTO usuarios (nombre, apellidos, cod_cuota, usuario, correo, pass, fecha, direccion, codpostal, iban) 
            VALUES ('$nombre', '$apellidos', '$cuota', '$usuario', '$correo', '$password', '$fecha', '$direccion', '$codpostal', '$iban')";


    // Se verifica si el usuario y el correo existen ya en la base de datos
    // Si existen no dejará registrarse

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
