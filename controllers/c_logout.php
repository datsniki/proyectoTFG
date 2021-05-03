<?php
session_start();

//Cerramos la sesion actual
session_destroy();

//Volvemos al login
header("location: ../index.php");
