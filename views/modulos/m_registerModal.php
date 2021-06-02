<?php include "controllers/c_register.php"; ?>
<!-- Modal registro -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST" id="formRegistro">
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
                            <div class="form-group col-lg-4">
                                <label for="nombre">Nombre *</label>
                                <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="apellidos">Apellidos *</label>
                                <input type="text" required class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="dni">DNI *
                                    <span id="dniAlert" style="font-size: 0.8em; color: grey;"></span>
                                </label>
                                <input type="text" required pattern="[0-9]{8}[A-Za-z]{1}" class="form-control" id="dni" name="dni" placeholder="Dni">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-4">
                                <label for="usuform">Usuario *</label>
                                <input type="text" required class="form-control" id="usuform" name="usuform" placeholder="Nombre de Usuario">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="correo">Email *</label>
                                <input type="email" required class="form-control" id="correo" name="correo" placeholder="Correo electronico">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="telefono">Telefono *
                                    <span id="telfAlert" style="font-size: 0.8em; color: grey;"></span>
                                </label>
                                <input type="text" required pattern="(?:[ ]?[0-9]{3}){3}" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-4">
                                <label for="fecha">Fecha Nacimiento *</label>
                                <input type="date" required class="form-control" id="fecha" name="fecha" min="1900-01-01">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="password">Contraseña *

                                </label>
                                <input type="password" maxlength="16" required pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}" class="form-control" id="password" name="password" placeholder="Contraseña">
                                <span id="passAlert" style="font-size: 0.8em; color: grey;"></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="password2"> Repetir Contraseña *
                                </label>
                                <input type="password" required pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}" class="form-control" id="password2" name="password2" placeholder="Repetir Contraseña">
                                <span id="passAlert2" style="font-size: 0.8em; color: red;"></span>
                            </div>
                        </div>
                    </section>
                    <section>
                        <hr>
                        <h6><b>Cuotas: </b><span id="passAlert" style="font-size: 0.8em; color: grey;">Seleccione 1 Para continuar</span></h6>
                        <hr>
                        <div class="form-row cuotas">

                            <?php

                            $filas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM cuotas"));

                            //Comprobamos que haya cuotas
                            if ($filas == 0) {
                                echo "<h5>Aún no hay ninguna cuota</h5>";
                                echo '<input type="radio" required name="cuota" id="radioNoCuota" value="">';
                            } else {
                                // Mostramos las cuotas registradas en la base de datos
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
                            <div class="form-group col-lg-4">
                                <label for="nombreBanc">Nombre completo del Titular *</label>
                                <input type="text" required class="form-control" id="nombreBanc" name="nombreBanc" placeholder="Nombre Completo">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="direccion">Direccion de Facturacion *</label>
                                <input type="text" required class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="codPostal">Cod Postal * </label>
                                <input type="number" required max="99999" min="1000" class="form-control" id="codPostal" name="codPostal" placeholder="Cod Postal">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="iban">Numero de Cuenta - IBAN *
                                    <span id="ibanAlert" style="font-size: 0.8em; color: grey;"></span>
                                </label>
                                <input type="text" required class="form-control" id="iban" name="iban" placeholder="ABXX XXXX XXXX XXXX XXXX" pattern="[A-Z]{2}[0-9]{2}(?:[ ]?[0-9]{4}){4}">
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <span id="registerAlert" style="font-size: 1em; color: red;" class="ml-4"></span>
                    <button type="submit" id="register" name="register" class="btn btn-dark">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
</div>