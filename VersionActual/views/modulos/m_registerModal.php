<?php include "controllers/c_register.php"; ?>
<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Bienvenido a Krato's Gym</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="nombre" required placeholder="Nombre">
                    <br>
                    <input type="text" class="form-control" name="apellidos" required placeholder="Apellidos">
                    <br>
                    <input type="text" class="form-control" name="usuario" required placeholder="Nombre de Usuario">
                    <br>
                    <input type="password" class="form-control" name="password" required minlength="4" placeholder="Contraseña">
                    <br>
                    <input type="email" class="form-control" name="correo" required placeholder="Correo electronico">
                    <br>
                    <input type="number" class="form-control" name="edad" required min="0" max="99" placeholder="Edad">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="register" class="btn btn-dark">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
</div>