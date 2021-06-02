<main class="body">
    <?php
    $codEntrenamiento = $_REQUEST['e'];
    // Obtenemos los datos del entrenamiento solicitado
    $query = "SELECT * FROM entrenamientos_ejercicios WHERE cod_entrenamiento = $codEntrenamiento";
    $consulta = mysqli_query($conexion, $query);

    ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <?php
                $datos = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM entrenamientos WHERE cod_entrenamiento=$codEntrenamiento"));
                ?>
                <img class="w-100" src="<?php echo $datos['imagen']; ?>" alt="">
                <h3 class="p-3 bg-dark text-center text-light"><?php echo $datos['nombre']; ?></h3>
                <p style="border: 2px solid grey;" class="rounded py-4 px-2 bg-light">
                    <?php echo $datos['descripcion']; ?>
                </p>
            </div>
            <div class="col-lg-9 col-md-8">
                <?php
                // Si el entrenamiento no tiene ningun ejercicio
                if (mysqli_num_rows($consulta) == 0) {
                ?>
                    <div class="d-flex justify-content-center text-center align-items-center h-100 flex-column">
                        <img src="activos/img/index/logob.png" alt="">
                        <h1 class="text-secondary">Este entrenamiento no Tiene ejercicios actualmente</h1>
                        <a href="index.php" class="btn btn-dark">Volver al Inicio</a>
                    </div>
                <?php
                    //Si si tiene ejercicios los mostramos
                } else {
                    $lista = cargarListaEjercicios($conexion, "entrenamientos_ejercicios", "cod_entrenamiento", $codEntrenamiento);
                ?>


                    <h3 class="px-4">Ejercicios del Entrenamiento:</h3>
                    <?php
                    for ($i = 0; $i < count($lista); $i++) {
                    ?>
                        <div class="m-4 card">
                            <form action="" method="POST">
                                <input hidden name="codejer" value="<?php echo $lista[$i]['cod_ejercicio'] ?>"></input>
                                <div class="card-header"> <?php echo $lista[$i]['nombre'] ?>
                                    <button type="submit" name="agregar" class="close"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><b>Musculos Trabajados:</b><br><?php echo $lista[$i]['musculos'] ?></p>
                                    <b> <span data-id="id<?php echo $i ?>" class="verDetalles"><i class="fa fa-angle-down"></i> Realizacion </span></b>
                                    <p style="display: none;" class="id<?php echo $i ?> card-text"><?php echo $lista[$i]['realizacion'] ?></p>
                                </div>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</main>