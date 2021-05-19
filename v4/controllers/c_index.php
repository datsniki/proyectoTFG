<?php



if (isset($_GET['seccion'])) {
    $seccion = $_GET['seccion'];
} else $seccion = "";

//Mostramos diferentes vistas dependiendo del valor de Seccion
//En caso de no tener permisos o no existir volvemos al inicio

switch ($seccion) {
    case 'instalaciones':
        include "views/v_instalaciones.php";
        break;
    case 'contacto':
        include "views/v_contacto.php";
        break;
    case 'entrenamiento':
        include "views/v_entrenamiento.php";
        break;
    case 'clases':
        if (isset($_SESSION['usuario'])) {
            include "views/v_clases.php";
        } else {
            include "views/v_inicio.php";
        }
        break;
    case 'ejercicios':
        include "views/v_ejercicios.php";
        break;
    case 'mientrenamiento':
        if (isset($_SESSION['usuario'])) {
            include "views/v_miEjercicios.php";
        } else {
            include "views/v_inicio.php";
        }
        break;
    case 'userview':
        if (isset($_SESSION['usuario'])) {
            include "views/v_userView.php";
        } else {
            include "views/v_inicio.php";
        }
        break;
    case 'entrPred':
        if (isset($_SESSION['usuario'])) {
            include "views/v_entrPred.php";
        } else {
            include "views/v_inicio.php";
        }
        break;
    default:
        include "views/v_inicio.php";
}
