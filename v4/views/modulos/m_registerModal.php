<?php include "controllers/c_register.php"; ?>
<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title">Bienvenido a Krato's Gym</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section>
                        <h6><b>Datos Personales:</b></h6>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Apellidos">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="usuform">Usuario</label>
                                <input type="text" class="form-control" id="usuform" name="usuform" required placeholder="Nombre de Usuario">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="correo">Email</label>
                                <input type="email" class="form-control" id="correo" name="correo" required placeholder="Correo electronico">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required minlength="4" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="fecha">Fecha Nacimiento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required min="1900-01-01">
                            </div>
                        </div>
                    </section>
                    <section>
                        <hr>
                        <h6><b>Cuotas:</b></h6>
                        <hr>
                        <div class="form-row cuotas">

                            <?php

                            $filas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM cuotas"));
                            //Comprobamos que haya algun ejercicio ya creado
                            if ($filas == 0) {
                                echo "<h5>Aún no hay ninguna cuota</h5>";
                            } else {
                                for ($cont = 1; $cont < $filas + 1; $cont++) {
                                    $datos = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM cuotas WHERE cod_cuota = $cont"));
                                    if (!$datos == NULL) {
                            ?>
                                        <div class="col-md-4 mt-4">
                                            <div class="cuota w-75 m-auto">
                                                <input hidden type="radio" required name="cuota" value="<?php echo $cont ?>">
                                                <img class="w-100" src="<?php echo $datos["imagen"] ?>" alt="" srcset="">
                                                <h4 class="py-3"><?php echo $datos["precio"] . "€ <br>" ?></h4>
                                                <h6 class="pb-3"><?php echo $datos["descripcion"]  ?></h6>
                                            </div>
                                        </div>
                            <?php
                                    } else {
                                        $filas++;
                                    }
                                }
                            }
                            ?>

                        </div>
                    </section>

                    <section id="datosBancarios" style="display: none;">
                        <hr>
                        <h6 class="mt-4"><b>Datos Bancarios:</b></h6>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombreBanc">Nombre completo del Titular</label>
                                <input type="text" required class="form-control" id="nombreBanc" name="nombreBanc" required placeholder="Nombre Completo">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="direccion">Direccion de Facturacion</label>
                                <input type="text" required class="form-control" id="direccion" name="direccion" required placeholder="Direccion">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="codPostal">Cod Postal</label>
                                <input type="text" required max="99999" min="1000" class="form-control" id="codPostal" name="codPostal" required placeholder="Cod Postal">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="iban">Numero de Cuenta - IBAN
                                    <span style="font-size: 0.8em; color: grey;"> (ABXX XXXX XXXX XXXX XXXX)</span>
                                </label>
                                <input type="text" required class="form-control" id="iban" name="iban" required placeholder="ABXX XXXX XXXX XXXX XXXX" pattern="^[A-Z]{2}[0-9]{2}(?:[ ]?[0-9]{4}){4}(?:[ ]?[0-9]{1,2})?$">
                            </div>
                        </div>
                    </section>


                </div>

                <div class="modal-footer">
                    <button type="submit" name="register" class="btn btn-dark">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
</div>