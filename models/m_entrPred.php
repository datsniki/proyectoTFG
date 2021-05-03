<?php
$filas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM entrenamientos"));
//Comprobamos que haya algun ejercicio ya creado
if ($filas == 0) {
    echo "<h5>Aún no hay ningun Entrenamiento</h5>";
} else {
    //Si hay algun ejercicio mostramos una tabla con los datos de la base de datos
?>
    <div class="entrenamientos">
        <?php
        //Recorremos los datos
        for ($cont = 1; $cont < $filas + 1; $cont++) {
            $query = "SELECT * FROM entrenamientos WHERE cod_entrenamiento=$cont";
            $consulta = mysqli_query($conexion, $query);
            $datos = mysqli_fetch_assoc($consulta);
            if (!$datos == NULL) { //Si hay datos con el codigo los mostramos en la tabla
                echo '<div class="m-4">';
                echo '<img src="activos\img\entr1.png" alt="">';
                echo '<h3>' . $datos['nombre'] . '</h3>';
                echo '<p>' . $datos['descripcion'] . '</p>';
                echo '</div>';
            } else {
                $filas++;
            }
        }
        ?>
    </div>
<?php
}
