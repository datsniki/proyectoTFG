<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <div class="form-group col-lg-4">
                <label for="">Label</label>
                <input type="text" class="form-control" id="" name="" required placeholder="">
            </div> -->
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $query = "SELECT * FROM usuarios WHERE cod_usuario = $_SESSION[codusu]";
                $userView = mysqli_fetch_assoc(mysqli_query($conexion, $query));
                ?>
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title"><?php echo ucfirst($userView['nombre']) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-lg-3 col-md-6 m-auto d-flex flex-column justify-content-center align-items-center">
                            <label for="fileUser" id="labelFileUser" class="">
                                <img class="w-100" src="<?php echo $userView['imagenperfil']; ?>" alt="Suba su imagen de perfil">
                                <span id="editIcon" class="editIconO"><i class="fa fa-edit fa-3x"></i></span>
                            </label>
                            <span id="textFile"></span>
                            <input id="fileUser" type="file" name="fileUser" hidden>
                        </div>
                        <div class="col-lg-9 mt-4">
                            <h5>Datos Personales:</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="nombreU">Nombre</label>
                                    <input type="text" class="form-control" id="nombreU" name="nombreU" placeholder="" value="<?php echo $userView['nombre']; ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="apeU">Apellidos</label>
                                    <input type="text" class="form-control" id="apeU" name="apeU" placeholder="" value="<?php echo $userView['apellidos']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="cuotaU">Cuota</label>
                                    <select class="form-control" name="cuotaU" id="cuotaU">
                                        <?php
                                        $numRow = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM cuotas"));
                                        for ($cont = 1; $cont < $numRow + 1; $cont++) {
                                            $consulta = mysqli_query($conexion,  "SELECT * FROM cuotas WHERE cod_cuota=$cont");
                                            $cuota = mysqli_fetch_assoc($consulta);
                                            $name = ucfirst($cuota["nombre"]);
                                            if (!$consulta == NULL) { //Si hay datos con el codigo los mostramos en la tabla
                                                $query = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT cod_cuota FROM usuarios WHERE cod_usuario = $_SESSION[codusu]"));
                                                $selected = $query["cod_cuota"] == $cont ? "selected" : "";
                                                echo "<option $selected value='1'>$name - $cuota[precio]€ </option>";
                                            } else {
                                                $numRow++;
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="newPassU">Nueva Contraseña
                                        <span style="font-size: 0.8em; color: grey;">
                                            1 Mayus, 1 Min, 1 Num, (8-16 Caracteres)</span>

                                    </label>
                                    <input type="password" class="form-control" id="newPassU" name="newPassU" pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="dniU">Dni</label>
                                    <input readonly type="text" class="form-control" id="dniU" name="dniU" placeholder="" value="<?php echo $userView['dni']; ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="telU">Telefono</label>
                                    <input readonly type="text" class="form-control" id="telU" name="telU" placeholder="" value="<?php echo $userView['telefono']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <h5>Datos facturacion:</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="ibanU">IBAN

                                        <span style="font-size: 0.8em; color: grey;">
                                            Formato: AE12 1234 1234 1234 1234</span>
                                    </label>

                                    <input type="text" class="form-control" id="ibanU" name="ibanU" pattern="[A-Z]{2}[0-9]{2}(?:[ ]?[0-9]{4}){4}" placeholder="" value="<?php echo $userView['iban']; ?>">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="direccionU">Direccion</label>
                                    <input type="text" class="form-control" id="direccionU" name="direccionU" placeholder="" value="<?php echo $userView['direccion']; ?>">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="cpU">Codigo Postal</label>
                                    <input type="number" max="99999" min="1000" class="form-control" id="cpU" name="cpU" placeholder="" value="<?php echo $userView['codpostal']; ?>">
                                </div>
                            </div>
                            <h5 class="mt-4">Otros datos:</h5>
                            <hr>
                            <div class="form-row ">
                                <div class="form-group col-lg-4">
                                    <label for="mailU">Correo</label>
                                    <input readonly type="text" class="form-control" id="mailU" name="mailU" placeholder="" value="<?php echo $userView['correo']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="userU">Usuario</label>
                                    <input readonly type="text" class="form-control" id="userU" name="userU" placeholder="" value="<?php echo $userView['usuario']; ?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="dateU">Fecha Nacimiento</label>
                                    <input readonly type="date" class="form-control" id="dateU" name="dateU" placeholder="" value="<?php echo $userView['fecha']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="password" required class="form-control" id="passU" name="passU" placeholder="Introduza su contraseña para confirmar cambios">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="actualizar" class="btn btn-dark">Actualizar</button>
                </div>
            </form>

        </div>
    </div>
</div>