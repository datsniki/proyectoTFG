<?php

if (isset($_GET['seccion'])) {
    $seccion = $_GET['seccion'];
} else $seccion = "";

switch ($seccion) {
    case 'instalaciones':
        include "views/v_instalaciones.php";
        break;
    case 'horario':
        include "views/v_horario.php";
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
            //include "views/v_inicio.php";
        }
        break;
    case 'ejercicios':
        include "views/v_ejercicios.php";
        break;
    case 'mientrenamiento':
        if (isset($_SESSION['usuario'])) {
            include "views/v_miEntrenamiento.php";
        } else {
            //include "views/v_inicio.php";
        }
        break;
    case 'userview':
        if (isset($_SESSION['usuario'])) {
            include "views/v_userView.php";
        } else {
            //include "views/v_inicio.php";
        }
        break;
    default:
        include "views/v_inicio.php";
}
