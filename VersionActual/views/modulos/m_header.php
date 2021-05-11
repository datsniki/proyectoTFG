<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kratos Gym</title>
    <link rel="stylesheet" href="activos/lib/styles.css">
    <script src="activos\lib\jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="header navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="activos/img/logow.png" style="width:150px" alt="KratosGym">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="h5 navbar-nav ml-auto">
                    <li class="pl-4 nav-item text-right">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <li class="pl-4 nav-item text-right">
                            <a class="nav-link" href="index.php?seccion=clases">Clases*</a>
                        </li>
                        <li class="pl-4 nav-item text-right">
                            <a class="nav-link" href="index.php?seccion=mientrenamiento">Mi entrenamiento</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="pl-4 nav-item text-right">
                        <div class="dropdown show">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nosotros
                            </a>

                            <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="index.php?seccion=horario">Horario</a>
                                <a class="dropdown-item" href="index.php?seccion=contacto">Contacto</a>
                                <a class="dropdown-item" href="index.php?seccion=instalaciones">Instalaciones</a>
                            </div>
                        </div>
                    </li>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <li class="pl-4 nav-item text-right">
                            <!-- Icono User -->
                            <a href="index.php?seccion=userview" class="fa fa-user fa-2x text-light" data-toggle="modal" data-target="#modalUser"></a>
                        </li>
                        <li class="pl-4 nav-item text-right">
                            <!-- Icono LogOut -->
                            <a href="controllers/c_logout.php" class="fa fa-sign-out fa-2x text-light" aria-hidden="true"></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <!-- Button trigger modal -->
                        <li class="pl-5 nav-item text-right">
                            <!-- <a class="btn btn-light" data-toggle="modal" data-target="#modalLogin">
                                <b>Iniciar Sesion</b>
                            </a> -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalLogin">
                                    <b>Iniciar Sesión</b>
                                </button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalRegister">
                                    <b>Registro</b>
                                </button>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    require_once 'controllers/funciones.php';
    require_once "m_loginModal.php";
    require_once "m_registerModal.php";
    if (isset($_SESSION['usuario'])) {
        require_once "m_userView.php";
    }
