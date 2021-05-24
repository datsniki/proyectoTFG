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

// Carga la lista de ejercicios de la tabla deseada
function cargarListaEjercicios($con, $table, $col, $cod)
{

    $query = "SELECT * FROM ejercicios WHERE cod_ejercicio IN (SELECT cod_ejercicio FROM $table WHERE $col = $cod)";

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

function uploadFile($img, $usu, $imgActual)
{
    $target_dir = "activos/img/usuarios/";
    $array = explode(".", basename($img["fileUser"]["name"]));

    $target_file = $target_dir .  $usu . "." . $array[count($array) - 1];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Comprobamos si el archivo subido es una imagen
    $check = getimagesize($img["fileUser"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo mensaje("El archivo no es una imagen.", "danger");
        return $imgActual;
    }

    // CComprobamos el tamaño de la imagen
    if ($img["fileUser"]["size"] > 500000) {
        echo mensaje("El tamaño de la imagen es muy grande.", "danger");
        $uploadOk = 0;
    }

    // Permitimos los siguientes formatos de imagen
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo mensaje("Formatos de imagen permitidos: JPG, PNG, JPEG, GIF", "danger");
        $uploadOk = 0;
    }

    // Si $uploadOk es 0 no se sube la imagen
    if ($uploadOk == 0) {
        echo mensaje("No se ha actualizado la imagen.", "danger");
        // Si todo está bien sube la imagen
    } else {
        if (move_uploaded_file($img["fileUser"]["tmp_name"], $target_file)) {
            echo mensaje("Se ha actualizado su imagen", "success");
        } else {
            echo mensaje("Ha ocurrido un error al subir su imagen.", "danger");
        }
    }

    return $target_file;
}
