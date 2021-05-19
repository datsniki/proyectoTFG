<main class="body">
    <?php
    $filas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM clasecolectiva"));
    //Comprobamos que haya algun ejercicio ya creado
    if ($filas == 0) {
    ?>
        <div class="d-flex justify-content-center align-items-center h-100 flex-column">
            <img src="activos/img/index/logob.png" alt="">
            <h1 class="text-secondary">No hay clases disponibles en este momento</h1>
        </div>
    <?php
    } else {
    ?>
        <div class="container clases">
            <?php
            //Recorremos los datos
            for ($cont = 1; $cont < $filas + 1; $cont++) {
                $datos = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM clasecolectiva WHERE cod_clase = $cont"));
                if (!$datos == NULL) { //Si hay datos con el codigo los mostramos en la tabla
            ?>
                    <form action="" method="POST">
                        <div class="card m-4" style="width: 18rem;">
                            <?php
                            $apuntados = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM usuarios WHERE cod_clase = $cont"));
                            if ($apuntados == $datos['capacidad'])
                                $apuntados = "<span class=text-danger>" . $apuntados . "</span>";

                            $query = "SELECT * FROM usuarios WHERE cod_clase = $cont and cod_usuario = $_SESSION[codusu]";

                            if (mysqli_num_rows(mysqli_query($conexion, $query)) != 1) {
                            ?>
                                <button type="submit" name="apuntame" class="btn btn-dark w-100">Apuntarme</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" name="desapuntame" class="btn btn-danger w-100">Desapuntarme</button>
                            <?php
                            }
                            ?>
                            <input hidden type="text" name="cod_clase" value="<?php echo $datos['cod_clase'] ?>">
                            <img class="card-img-top" src="<?php echo $datos['imagen'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $datos['nombre'] ?></h5>
                                <p class="card-text"><?php echo $datos['descripcion'] ?></p>
                                <p class="card-text"><?php echo "Capacidad de la clase: <b>" . $datos['capacidad'] . "</b>" ?></p>
                                <?php
                                echo '<p class="card-text"> Apuntados actualmente: <b>' . $apuntados . '</b>';
                                ?>
                            </div>
                        </div>
                    </form>

            <?php
                } else {
                    $filas++;
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
</main>