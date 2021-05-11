<?php


$filas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM ejercicios"));
//Comprobamos que haya algun ejercicio ya creado
if ($filas == 0) {
    echo "<h5>Aún no hay ningun Entrenamiento</h5>";
} else {
    //Si hay algun ejercicio mostramos una tabla con los datos de la base de datos
?>
    <div class="container">
        <?php include "controllers/c_miejercicios.php"; ?>

        <?php
        //Recorremos los datos
        for ($cont = 1; $cont < $filas + 1; $cont++) {
            $query = "SELECT * FROM ejercicios WHERE cod_ejercicio = $cont";
            $consulta = mysqli_query($conexion, $query);
            $datos = mysqli_fetch_assoc($consulta);
            if (!$datos == NULL) { //Si hay datos con el codigo los mostramos en la tabla
                echo '<form action="" method="POST">';
                echo '<div class="m-4 ejercicios">';
                echo '<input hidden name="codejer" value=' . $cont . '></input>';
                echo '<h3>' . $datos['nombre'] . '</h3>';
                echo '<p>' . $datos['realizacion'] . '</p>';
                echo '<p>' . $datos['musculos'] . '</p>';
                echo '<button name="agregar" class="btn btn-dark" type="submit">Añadir</button>';
                echo '</div>';
                echo '<br>';
                echo '</form>';
            } else {
                $filas++;
            }
        }
        ?>

    </div>
<?php
}
?>