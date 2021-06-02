<main class="body">
    <?php
    $filas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM ejercicios"));
    //Comprobamos que haya algun ejercicio ya creado
    if ($filas == 0) {
    ?>
        <div class="d-flex justify-content-center align-items-center h-100 flex-column">
            <img src="activos/img/index/logob.png" alt="">
            <h1 class="text-secondary">No hay ejercicios disponibles en este momento</h1>
            <a href="index.php?seccion=mientrenamiento" class="btn btn-dark">Volver a mis Ejercicios</a>
        </div>
    <?php
    } else {
    ?>
        <div class="container">
            <a href="index.php?seccion=mientrenamiento" class="mt-2 btn btn-dark">Volver a mis Ejercicios</a>
            <?php

            //Recorremos los datos
            for ($cont = 1; $cont < $filas + 1; $cont++) {;
                $datos = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM ejercicios WHERE cod_ejercicio = $cont"));
                if (!$datos == NULL) { //Si hay datos con el codigo los mostramos en la tabla
            ?>
                    <div class="mt-4 card">
                        <form action="" method="POST">
                            <input hidden name="codejer" value='<?php echo $cont ?>'></input>
                            <div class="card-header">
                                <span data-id="id<?php echo $cont ?>" class="verDetalles"><i class="fa fa-angle-down"></i>
                                    <b> <?php echo $datos['nombre'] ?></b> </span>
                                <button type="submit" name="agregar" class="close"><i class="fa fa-plus" aria-hidden="true"></i></button>

                            </div>
                            <div class="card-body id<?php echo $cont ?>" style="display: none;">
                                <p class="card-text"><b>Musculos Trabajados:</b><br><?php echo $datos['musculos'] ?></p>
                                <b> Realizacion:</b>
                                <p class="card-text"><?php echo $datos['realizacion'] ?></p>
                            </div>
                        </form>
                    </div>
            <?php
                } else {
                    $filas++;
                }
            }
            ?>
            <br>

        </div>
    <?php
    }
    ?>
</main>