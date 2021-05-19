<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo 'Hola ' . ucfirst($_SESSION['usuario']) ?></h5>
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
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required value="<?php echo $datos['nombre']; ?>">
                    <br>
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required value="<?php echo $datos['apellidos']; ?>">
                    <br>
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Nombre de Usuario" readonly value="<?php echo $datos['usuario']; ?>">
                    <br>
                    <label for="newPassword">Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="newPassword" placeholder="Nueva Contraseña" value="">
                    <br>
                    <label for="correo">Correo electronico:</label>
                    <input type="email" class="form-control" name="correo" placeholder="Correo electronico" readonly value="<?php echo $datos['correo']; ?>">
                    <br>
                    <label for="edad">Fecha Nacimiento:</label>
                    <input type="date" class="form-control" name="fecha" readonly value="<?php echo $datos['fecha']; ?>">
                    <hr>
                    <label for="password">Confirmar Cambios:</label>
                    <input type="password" class="form-control" name="password" required placeholder="Contraseña">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="actualizar" class="btn btn-dark">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>