<main class="body">
    <?php
    //Obetemos lista de ejercicios del usuario
    $query = "SELECT * FROM usuario_ejercicio WHERE cod_usuario = $_SESSION[codusu]";
    $resultados = mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultados) == 0) {
    ?>
        <div class="noejer container">
            <h3>Aún no tienes ejercicios.</h3>
            <a class="text-dark" href="index.php?seccion=ejercicios">
                <i class=" fa fa-plus-circle fa-4x"></i>
            </a>
        </div>
    <?php
        // Mostramos los ejercicios del usuario
    } else {
        $lista = cargarListaEjercicios($conexion, "usuario_ejercicio", "cod_usuario", $_SESSION["codusu"]);

    ?>
        </div>
        <div class="container mb-4">
            <a class="text-dark" href="index.php?seccion=ejercicios">
                <i class=" fa fa-plus-circle fa-3x"></i>
            </a>
            <?php

            for ($i = 0; $i < count($lista); $i++) {
                $realizado = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM usuario_ejercicio WHERE cod_ejercicio = " . $lista[$i]['cod_ejercicio'] . " and cod_usuario = $_SESSION[codusu]"));

                $color = $realizado['realizado'] ? "alert-success" : "";
                $simbolo = $realizado['realizado'] ? '&#8855' : '&check;';
            ?>
                <div class="mt-4 card">
                    <form action="" method="POST">
                        <input hidden name="codejer" value="<?php echo $lista[$i]['cod_ejercicio'] ?>"></input>
                        <div class="card-header <?php echo $color ?>"> <?php echo $lista[$i]['nombre'] ?>
                            <button type="submit" name="eliminar" class="close">
                                <span aria-hidden="true">&times;</span></button>
                            <button type="submit" name="realizado" class="close btnRealizado">
                                <span aria-hidden="true"><?php echo $simbolo ?>&nbsp;&nbsp;</span></button>
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

            ?>
        </div>
        <?php
        if (mysqli_num_rows($resultados) >= 4) {
        ?>
            <div class="noejer">
                <a class="text-dark" href="index.php?seccion=ejercicios">
                    <i class=" fa fa-plus-circle fa-3x"></i>
                </a>
            </div>
        <?php
        }
        ?>

    <?php
    }
    ?>
</main>