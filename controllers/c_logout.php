<?php
//Cerramos la sesion actual
//Volvemos al login

session_start();
session_destroy();
header("location: ../index.php");
