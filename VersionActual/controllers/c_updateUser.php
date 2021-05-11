<?php
require "c_conexion.php";
if (isset($_POST['actualizar'])) {

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];

    //Actualizo la tabla usuarios
    $actualizar = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', usuario ='$usuario', pass ='$password', correo = '$correo', edad = '$edad' WHERE cod_usuario = '$_SESSION[codusu]'";

    $resultado = mysqli_query($conexion, $actualizar);
    //Si no da fallo vuelvo a la vista de usuarios

    if ($resultado) {
        $msg = "<strong>Completado</strong> Se han actualizado sus datos correctamente";
        $value = 'success';
    } else {
        $msg = "<strong>Error</strong> No se han podido actualizar sus datos";
        $value = 'danger';
    }

    echo '<div class="alert mb-0 alert-' . $value . ' alert-dismissible fade show" role="alert">' .
        $msg . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
}
