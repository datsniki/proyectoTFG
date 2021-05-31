<?php include "controllers/c_login.php"; ?>
<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="iconoLogin bg-dark">
                    <span class="fa fa-user-o"></span>
                </div>

                <h3 class="text-center my-4">Iniciar Sesion</h3>
                <form action="" method="POST" class="d-flex flex-column align-items-center">
                    <div class="w-75">
                        <input type="text" class="form-control mb-4" id="usuario" name="usuario" required placeholder="Nombre de Usuario">

                        <input type="password" class="form-control  mb-4" name="password" required placeholder="Contraseña">

                        <input type="checkbox" class="mb-4 recordarUsu" id="recordarUsu" name="recordarUsu" checked> <label for="recordarUsu">Recordar Usuario</label>

                        <button type="submit" name="enviar" class="form-control btn btn-dark px-3 sendLogin">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>