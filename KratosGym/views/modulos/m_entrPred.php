<?php
if (isset($_POST['detalles'])) {
    echo mensaje("<b>Inicia Sesión para verlos</b>", "danger");
}

$filas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM entrenamientos"));

if ($filas == 0) {
    echo "<h5>Aún no hay ningun Entrenamiento</h5>";
} else {
    //Si hay algun ejercicio mostramos una tabla con los datos de la base de datos
?>
    <span id="noLog"></span>
    <div class="entrenamientos">
        <?php
        for ($cont = 1; $cont < $filas + 1; $cont++) {
            $query = "SELECT * FROM entrenamientos WHERE cod_entrenamiento=$cont";
            $consulta = mysqli_query($conexion, $query);
            $datos = mysqli_fetch_assoc($consulta);
            if (!$datos == NULL) { //Si hay datos con el codigo los mostramos en la tabla
        ?>
                <div class="m-4 bg-dark text-light">
                    <!-- <form action="" method="POST"> -->
                    <input hidden type="text" name="code" value="<?php echo $datos['cod_entrenamiento']; ?>">
                    <img src="<?php echo $datos['imagen']; ?>" alt="">
                    <h3 class="mt-2"> <?php echo $datos['nombre']; ?></h3>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <p><a href="index.php?seccion=entrPred&e=<?php echo $datos['cod_entrenamiento']; ?>" name="detalles" class="btn btn-dark">Ver Detalles</a></p>
                    <?php
                    } else { ?>
                        <p><button class="btn btn-dark detallesEntr">Ver Detalles</button></p>
                    <?php } ?>
                    <!-- </form> -->
                </div>
        <?php
            } else {
                $filas++;
            }
        }
        ?>
    </div>
<?php
}
