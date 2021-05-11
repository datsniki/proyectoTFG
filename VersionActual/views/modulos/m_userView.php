<?php include "controllers/c_updateUser.php"; ?>

<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo 'Hola <span class="">' . ucfirst($_SESSION['usuario']) . '</span>!' ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                $query = "SELECT * FROM usuarios WHERE cod_usuario = $_SESSION[codusu]";
                $datos = mysqli_fetch_assoc(mysqli_query($conexion, $query));
                ?>
                <div class="modal-body">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required placeholder="Nombre" value="<?php echo $datos['nombre']; ?>">
                    <br>
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" required placeholder="Apellidos" value="<?php echo $datos['apellidos']; ?>">
                    <br>
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" required placeholder="Nombre de Usuario" readonly value="<?php echo $datos['usuario']; ?>">
                    <br>
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" name="password" required placeholder="Contraseña" value="<?php echo $datos['pass']; ?>">
                    <br>
                    <label for="correo">Correo electronico:</label>
                    <input type="email" class="form-control" name="correo" required placeholder="Correo electronico" readonly value="<?php echo $datos['correo']; ?>">
                    <br>
                    <label for="edad">Edad:</label>
                    <input type="number" class="form-control" name="edad" required min="0" max="99" placeholder="Edad" value="<?php echo $datos['edad']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="actualizar" class="btn btn-dark">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>