<nav class="header navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="activos/img/index/logow.png" style="width:150px" alt="KratosGym">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="h5 navbar-nav ml-auto">
                <li class="pl-4 nav-item text-right">
                    <a class='nav-link' href="index.php">
                        <span class='menuOption <?php echo $active = !isset($_GET["seccion"]) ? "active" : ""; ?>'> Inicio </span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['usuario'])) {
                ?>
                    <li class="pl-4 nav-item text-right">
                        <a class="nav-link" href="index.php?seccion=clases">
                            <span class='menuOption <?php echo $active = $_GET['seccion'] == "clases" ? "active" : "";  ?>'> Clases Colectivas </span>
                        </a>
                    </li>
                    <li class="pl-4 nav-item text-right">
                        <a class=' nav-link' href="index.php?seccion=mientrenamiento">
                            <span class='menuOption <?php echo $active = $_GET['seccion'] == "mientrenamiento" || $_GET['seccion'] == "ejercicios" ? "active" : "";  ?>'> Mi entrenamiento </span>
                        </a>
                    </li>
                <?php
                }
                ?>
                <li class="pl-4 nav-item text-right">
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class='menuOption 
                                <?php
                                if ($_GET['seccion'] == "contacto" || $_GET['seccion'] == "instalaciones") {
                                    echo "active";
                                }
                                ?>'> Nosotros </span>
                        </a>

                        <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item nav-item" href="index.php?seccion=contacto">Contacto</a>
                            <a class="dropdown-item nav-item" href="index.php?seccion=instalaciones">Instalaciones</a>
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
                        <div class="btn-group">
                            <button type="button" class="btn btn-light" id="login" data-toggle="modal" data-target="#modalLogin">
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
require_once "m_loginModal.php";
require_once "m_registerModal.php";
if (isset($_SESSION['usuario'])) {
    require_once "m_userView.php";
}
