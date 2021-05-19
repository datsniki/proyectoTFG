<?php

// Creara un alert con el mensaje y valor introducidos
function mensaje($msg, $value)
{
    return '<div class="w-100 m-auto text-center alert mb-0 alert-' . $value . ' alert-dismissible fade show" role="alert">' .
        $msg . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>';
}

// Carga la lista de ejercicios del usuario logueado
function cargarListaEjercicios($con, $table, $col, $cod)
{

    $query = "SELECT * FROM ejercicios WHERE cod_ejercicio IN (SELECT cod_ejercicio FROM $table WHERE $col = $cod)";

    // $query = "SELECT * FROM ejercicios WHERE cod_ejercicio IN (SELECT cod_ejercicio FROM usuario_ejercicio WHERE cod_usuario = $_SESSION[codusu])";

    $resultados = mysqli_query($con, $query);
    echo mysqli_error($con);
    $tabla = [];
    while ($fila = mysqli_fetch_assoc($resultados)) {
        $tabla[] = $fila; // Añade el array $fila al final de $tabla
    }
    return $tabla;
}

// Comprueba las credenciales del usuario 
function comprobarCredenciales($con, $user, $passwd)
{
    $query = "SELECT * FROM usuarios WHERE usuario = '$user'";

    if (mysqli_num_rows(mysqli_query($con, $query)) == 1) {
        $passDB = mysqli_fetch_assoc(mysqli_query($con, $query));

        if (password_verify($passwd, $passDB['pass'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
