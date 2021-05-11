<?php

if (isset($_POST['agregar'])) {

    $codigo = $_POST['codejer'];

    $comprobar = "SELECT * FROM usuario_ejercicio WHERE cod_usuario='$_SESSION[codusu]' and cod_ejercicio='$codigo'";

    //Verificamos que el usuario no exista
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

    $lista = cargarListaEjercicios($conexion);

    echo mensaje($msg, $value);
}
