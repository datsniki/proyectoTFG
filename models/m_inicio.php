<div class="banner">
    <section class="container">
        <div>
            <?php
            if (!isset($_SESSION["usuario"])) {
            ?>
                <h1 class="my-5">ENTRENA CON NOSOTROS</h1>
                <h3 class="my-5">En Krato's Gym encontrarás justo lo que necesitas. ¡Ni más, ni menos!</h3>
                <button class="btn btn-light mb-5"><b>INSCRIBETE</b></button>
            <?php
            } else {
            ?>
                <h1 class="my-5">BIENVENIDO A KRATO'S GYM <?php echo '<br><span class="">@' . ucfirst($_SESSION['usuario']) . '</span>' ?></h1>
            <?php
            }
            ?>
        </div>
    </section>
</div>

<div class="container">
    <section class="contenidoMain">
        <h1 class="my-5">ELIGE TU ENTRENAMIENTO IDEAL</h1>
        <h3 class="my-5">Entrenamientos para todo tipo de persona ajustados a tus necesidades</h3>

        <?php
        include "m_entrPred.php";
        ?>

        <?php
        if (!isset($_SESSION["usuario"])) {
        ?>
            <h3 class="my-5">¡O inicia sesión para crear el tuyo propio!</h3>
            <a class="btn btn-dark" href="views/v_login.php"><b>Iniciar Sesion</b></a>
        <?php
        } else {
        ?>
            <h3 class="my-5">¡O crea tu propio entrenamiento!</h3>
            <a class="btn btn-dark" href="#"><b>Mi Entrenamiento</b></a>
        <?php } ?>
        <section class="horario">
            <h1>Horario</h1>
            <h3>Consulta nuestro horario</h3>
            <button class="btn btn-dark mb-3"><b>Horario</b></button>
        </section>
    </section>

</div>