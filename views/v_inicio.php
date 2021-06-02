<main class="body">
    <div class="banner">
        <section class="container">
            <div>
                <?php
                if (!isset($_SESSION["usuario"])) {
                ?>
                    <h1 class="my-5">ENTRENA CON NOSOTROS</h1>
                    <h3 class="my-5">En Krato's Gym encontrarás justo lo que necesitas. ¡Ni más, ni menos!</h3>
                    <a class="btn btn-light mb-5" href="" data-toggle="modal" data-target="#modalRegister">
                        <b>INSCRIBETE</b>
                    </a>
                <?php
                } else {
                    $nombre = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE cod_usuario = $_SESSION[codusu]"));
                ?>
                    <h1 class="my-5">BIENVENIDO A KRATO'S GYM <?php echo '<br><span class="">' . ucfirst($nombre['nombre']) . '</span>' ?></h1>

                <?php
                }
                ?>
            </div>
        </section>
    </div>

    <div class="container">
        <section class="contenidoMain">
            <h1 class="my-5">DIFERENTES ENTRENAMIENTOS PARA TODOS</h1>
            <h3 class="my-5">¡¡Entrenamientos generales para los que estén empezando!!</h3>

            <?php
            include "modulos/m_entrPred.php";
            ?>

            <?php
            if (!isset($_SESSION["usuario"])) {
            ?>
                <h3 class="my-5">¡Inicia sesión para verlos o para crear el tuyo propio!</h3>
                <a class="mb-4 btn btn-dark" href="" data-toggle="modal" data-target="#modalLogin">
                    <b>Iniciar Sesion</b>
                </a>
            <?php
            } else {
            ?>
                <h3 class="my-5">¡O crea tu propio entrenamiento!</h3>
                <a class="btn btn-dark" href="index.php?seccion=mientrenamiento"><b>Mi Entrenamiento</b></a>
            <?php } ?>
            <hr class="my-4">
            <section class="text-light bg-dark rounded mt-4 p-4 w-75 mx-auto">
                <h3>Consulta informacion sobre nosotros</h3>
                <h2>y nuestro Horario de visita</h2>
                <a href="index.php?seccion=contacto" class="w-75 btn btn-light mb-3"><b>Informacion y Horario</b></a>
            </section>
        </section>
        <br>
    </div>
</main>