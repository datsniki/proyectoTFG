<?php

/*
Si recibimos Agregar comprobaremos si el usuario ya tiene ese ejercicio
Si no lo tiene se agregara y mandara mensaje de completado
Si ya tiene el ejercicio saltara un alert como que ya lo tiene
*/

if (isset($_POST['agregar'])) {

    $codigo = $_POST['codejer'];

    $comprobar = "SELECT * FROM usuario_ejercicio WHERE cod_usuario='$_SESSION[codusu]' and cod_ejercicio='$codigo'";

    $comprobarRegistro = mysqli_query($conexion, $comprobar);

    if (mysqli_num_rows($comprobarRegistro) > 0) {
        $msg = "<strong>Error</strong> Ya tienes ese ejercicio";
        $value = 'danger';
    } else {
        $query = "INSERT INTO usuario_ejercicio (cod_usuario, cod_ejercicio) VALUES ('$_SESSION[codusu]', '$codigo')";
        $consulta = mysqli_query($conexion, $query);

        if ($consulta) {
            $msg = "<strong>Correcto</strong> Ejercicio añadido correctamente";
            $value = 'success';
        } else {
            $msg = "<strong>Error</strong> No se ha podido añadir el ejercicio";
            $value = 'danger';
        }
    }
    echo mensaje($msg, $value);
}

/*
Si recibimos Eliminar se eliminara el ejercicio
En caso de que ocurra algun error se alertara de que no se pudo eliminar
*/

if (isset($_POST['eliminar'])) {
    $codigo = $_POST['codejer'];

    $query = "DELETE FROM usuario_ejercicio WHERE cod_usuario='$_SESSION[codusu]' and cod_ejercicio='$codigo'";

    $consulta = mysqli_query($conexion, $query);

    if ($consulta) {
        $msg = "<strong>Correcto</strong> Ejercicio eliminado correctamente";
        $value = 'success';
    } else {
        $msg = "<strong>Error</strong> No se ha podido eliminar el ejercicio";
        $value = 'danger';
    }

    $lista = cargarListaEjercicios($conexion, "usuario_ejercicio", "cod_usuario", $_SESSION["codusu"]);

    echo mensaje($msg, $value);
}

/*
Si recibimos Realizado se comprueba el estado actual del ejercicio
y se cambia al estado contrario
*/

if (isset($_POST['realizado'])) {
    $codigo = $_POST['codejer'];

    $realizado = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM usuario_ejercicio WHERE cod_ejercicio = '$codigo' and cod_usuario = $_SESSION[codusu]"));

    $swap = $realizado['realizado'] == "0" ? 1 : 0;

    $query = "UPDATE usuario_ejercicio SET realizado = $swap WHERE cod_usuario = '$_SESSION[codusu]' and cod_ejercicio ='$codigo'";

    $consulta = mysqli_query($conexion, $query);
}

/*
Actualizaremos los datos del usuario con los nuevos datos introducidos
Se comprobaran las credenciales para realizar los cambios
*/

if (isset($_POST['actualizar'])) {

    $user = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM usuarios"));

    $nombre = $_POST['nombreU'];
    $apellidos = $_POST['apeU'];
    $usuario = $_POST['userU'];
    $iban = $_POST['ibanU'];
    $direccion = $_POST['direccionU'];
    $cuota = $_POST['cuotaU'];
    $cpostal = $_POST['cpU'];

    $password = password_hash($_POST['passU'], PASSWORD_DEFAULT);

    if ($_POST['newPassU'] == "") {
        $newPassword = $password;
    } else {
        $newPassword = password_hash($_POST['newPassU'], PASSWORD_DEFAULT);
    }

    if (comprobarCredenciales($conexion, $usuario, $_POST['passU'])) {
        $image = $_FILES['fileUser']['name'] == "" ? $user['imagenperfil'] : uploadFile($_FILES, $usuario, $user['imagenperfil']);

        $actualizar = "UPDATE usuarios SET cod_cuota = '$cuota', nombre = '$nombre', apellidos = '$apellidos', pass ='$newPassword', iban = '$iban', direccion = '$direccion', imagenperfil = '$image', codpostal = '$cpostal'  WHERE cod_usuario = '$_SESSION[codusu]'";

        $consulta = mysqli_query($conexion, $actualizar);

        if ($consulta) {
            $msg = "<strong>Completado</strong> Se han actualizado sus datos correctamente";
            $value = 'success';
        } else {
            echo mysqli_error($conexion);
            $msg = "<strong>Error</strong> No se han podido actualizar sus datos";
            $value = 'danger';
        }
        echo mensaje($msg, $value);
    } else {
        $msg = "<strong>Contraseña Incorrecta</strong> Revisa tus credenciales e intenta actualizar tus datos de nuevo.";
        echo mensaje($msg, "danger");
    }
}

/*
Si recibimos Apuntame se comprueba la capacidad de la clase 
y se apunta al usuario a la calse seleccionada
*/

if (isset($_POST['apuntame'])) {
    $codClase = $_POST['cod_clase'];

    $apuntados = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM usuarios WHERE cod_clase = $codClase"));
    $consulta = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT capacidad FROM clasecolectiva WHERE cod_clase = $codClase"));

    if ($apuntados < $consulta['capacidad']) {
        $query = "UPDATE usuarios SET cod_clase = '$codClase' WHERE cod_usuario = '$_SESSION[codusu]'";

        $consulta = mysqli_query($conexion, $query);

        if ($consulta) {
            $msg = "<strong>Completado</strong> Ha sido apuntado correctamente a la clase";
            $value = 'success';
        } else {
            $msg = "<strong>Error</strong> No se ha podido apuntar";
            $value = 'danger';
        }
    } else {
        $msg = "<strong>Error</strong> Capacidad maxima alcanzada";
        $value = 'danger';
    }

    echo mensaje($msg, $value);
}

/*
Si recibimos desapuntame se desapunta al usuario de la clase seleccionada
*/

if (isset($_POST['desapuntame'])) {
    $codClase = $_POST['cod_clase'];
    $query = "UPDATE usuarios SET cod_clase = null WHERE cod_usuario = '$_SESSION[codusu]'";
    $consulta = mysqli_query($conexion, $query);

    if ($consulta) {
        $msg = "<strong>Completado</strong> Ha sido desapuntado correctamente";
        $value = 'success';
    } else {
        $msg = "<strong>Error</strong> No se ha podido desapuntar";
        $value = 'danger';
    }
    echo mysqli_error($conexion);
    echo mensaje($msg, $value);
}
