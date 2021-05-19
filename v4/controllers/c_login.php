<?php

if (isset($_POST['enviar'])) {

    $user = $_POST['usuario'];

    /*Comprobamos las credenciales, Si son correctas vamos al Index
    con la vista de usuario logeado, si no mostrará error de datos incorrectos
    */
    if (comprobarCredenciales($conexion, $user, $_POST['password'])) {
        $query = "SELECT * FROM usuarios WHERE usuario = '$user'";
        $consulta = mysqli_fetch_assoc(mysqli_query($conexion, $query));

        $_SESSION['usuario'] = $consulta['usuario'];
        $_SESSION['codusu'] = $consulta['cod_usuario'];
        header("Location: index.php");
    } else {
        $msg = "<strong>Datos Incorrectos</strong> Revisa tus credenciales e intenta iniciar sesión de nuevo.";
        echo mensaje($msg, "danger");
    }
}
