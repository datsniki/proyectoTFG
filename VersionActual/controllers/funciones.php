<?php
function mensaje($msg, $value)
{
    return '<div class="alert mb-0 alert-' . $value . ' alert-dismissible fade show" role="alert">' .
        $msg . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>';
}

function cargarListaEjercicios($con)
{

    //$queryA = "SELECT e.* FROM usuario_ejercicio ue INNER JOIN ejercicios e ON ue.cod_ejercicio = e.cod_ejercicio WHERE ue.cod_usuario = $_SESSION[codusu]";
    //$query = "SELECT * FROM ejercicios WHERE cod_ejercicio IN (SELECT cod_ejercicio FROM usuario_ejercicio WHERE cod_usuario = $_SESSION[codusu])";

    $query = "SELECT * FROM ejercicios WHERE cod_ejercicio IN (SELECT cod_ejercicio FROM usuario_ejercicio WHERE cod_usuario = $_SESSION[codusu])";
    $resultados = mysqli_query($con, $query);

    $tabla = [];
    while ($fila = mysqli_fetch_assoc($resultados)) {
        $tabla[] = $fila; // Añade el array $fila al final de $tabla
    }
    return $tabla;
}
