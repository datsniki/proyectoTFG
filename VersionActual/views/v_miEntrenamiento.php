<?php


$query = "SELECT * FROM usuario_ejercicio WHERE cod_usuario = $_SESSION[codusu]";

$resultados = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultados) == 0) {
?>
    <div class="noejer container">
        <h3>Aún no tienes ejercicios.</h3>
        <a class="text-dark" href="index.php?seccion=ejercicios">
            <i class=" fa fa-plus-circle fa-5x"></i>
        </a>
    </div>
<?php
} else {
    $lista = cargarListaEjercicios($conexion);
?>
    </div>
    <div class="container">
        <?php include 'controllers/c_miejercicios.php'; ?>
        <div class=" misejercicios">
            <?php
            // for ($i = 0; $i < count($lista); $i++) {
            //     echo '<div class="mt-4"><div class="card"><div class="card-body">';
            //     echo '<form action="" method="POST">';
            //     echo '<button type="submit" name="eliminar" class="close">
            //     <span aria-hidden="true">&times;</span></button>';
            //     echo '<button type="submit" name="eliminar" class="close">
            //     <span aria-hidden="true">&check;&nbsp;&nbsp;</span></button>';
            //     echo '<input hidden name="codejer" value=' . $lista[$i]['cod_ejercicio'] . '></input>';
            //     echo '<h5 class="card-title"> ' . $lista[$i]['nombre'] . '</h5>';
            //     echo '<p class="card-text"><b>Musculos Trabajados:</b><br>' . $lista[$i]['musculos'] . '</p>';
            //     echo '<b> <span data-id=id' . $i . ' class="verRealizacion"><i class="fa fa-angle-down"></i> Realizacion </span></b>';
            //     echo '<p style="display: none;" class="id' . $i . ' card-text">' . $lista[$i]['realizacion'] . '</p>';
            //     echo '</div></div></div>';
            // }

            for ($i = 0; $i < count($lista); $i++) {
                echo '<div class="mt-4 card">';
                echo '<form action="" method="POST">';
                echo '<input hidden name="codejer" value=' . $lista[$i]['cod_ejercicio'] . '></input>';
                echo '<div class="card-header"> ' . $lista[$i]['nombre'];
                echo '<button type="submit" name="eliminar" class="close">
                <span aria-hidden="true">&times;</span></button>';
                echo '<button type="submit" name="eliminar" class="close">
                <span aria-hidden="true">&check;&nbsp;&nbsp;</span></button>';
                echo '</div>';
                echo ' <div class="card-body">
                <p class="card-text"><b>Musculos Trabajados:</b><br>' . $lista[$i]['musculos'] . '</p>
                <b> <span data-id=id' . $i . ' class="verRealizacion"><i class="fa fa-angle-down"></i> Realizacion </span></b>
                <p style="display: none;" class="id' . $i . ' card-text">' . $lista[$i]['realizacion'] . '</p>
                    </div>';

                echo '</form></div>';
            }

            ?>
        </div>
    </div>
    <div class="noejer container">
        <h3>Agrega más ejercicios.</h3>
        <a class="text-dark" href="index.php?seccion=ejercicios">
            <i class=" fa fa-plus-circle fa-5x"></i>
        </a>
    </div>
<?php
}
?>