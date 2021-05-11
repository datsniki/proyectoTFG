<?php include "controllers/c_login.php"; ?>
<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- controllers/c_login.php -->
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Iniciar Sesion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="usuario" required placeholder="Nombre de Usuario">
                    <br>
                    <input type="password" class="form-control" name="password" required placeholder="Contraseña">
                    <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="enviar" class="btn btn-dark">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</div>