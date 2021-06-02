<main class="body container ">
    <?php
    // Introducimos en la tabla contacto los datos del usuario que ha contactado
    if (isset($_POST['contacto'])) {

        $nombre = $_POST['nomCompleto'];
        $correo = $_POST['mail'];
        $telefono = $_POST['telefono'];
        $asunto = $_POST['asunto'];

        $query = mysqli_query($conexion, "INSERT INTO consulta (nombrecompleto, correo, telefono, asunto) VALUES ('$nombre', '$correo', '$telefono', '$asunto')");

        if ($query) {
            echo mensaje("<strong>Recibido</strong> Contactaremos con usted lo antes posible", "success");
        } else {
            echo mensaje("<strong>Error</strong> No ha sido posible mandar su solicitud", "danger");
        }
    }
    ?>
    <div class="my-4 contacto">
        <div>
            <h3 class="font-weight-bold">Contacta con nosotros o</h3>
            <h1 class="font-weight-bold">ven a visitarnos</h1>
            <div class="mt-4">
                <h5 class="pt-4"><i class="fa fa-map"></i> Direccion:</h5>
                <h4 class="font-weight-bold">Avenida de los Imanes, 26 10001 CÁCERES</h4>
            </div>
            <div class="mt-4">
                <h5 class="pt-4"> <i class="fa fa-clock-o"></i> Horario Atención:</h5>
                <h6>Lunes a Viernes:</h6>
                <h4 class="font-weight-bold"><i class="fa fa-clock-o"></i>7:30 - 23 h </h4>
                <h6>Sabados y Domingos:</h6>
                <h4 class="font-weight-bold"><i class="fa fa-clock-o"></i>10 - 14:30 y 17 - 21:30 h</h4>
            </div>
            <div class="mt-4">
                <h5 class="pt-4"> <i class=" fa fa-phone"></i> Telefono y mail:</h5>
                <h4 class="font-weight-bold">924 786 438 </h4>
                <h4 class="font-weight-bold">atencioncliente@kratosgym.com</h4>
            </div>
            <br>
        </div>
        <div class="contactanos bg-dark rounded">
            <h3 class="font-weight-bold">Si quieres más informacion <br> ponte en contacto con nosotros</h3>
            <form action="" method="POST">
                <input name="nomCompleto" class="form-control-lg w-100 m-1" required placeholder="Nombre y Apellidos" type="text"><br>
                <input name="mail" class="form-control-lg w-100 m-1" required placeholder="Mail" type="email"><br>
                <input name="telefono" class="form-control-lg w-100 m-1" required placeholder="Teléfono (123 123 123)" type="tel" pattern="(?:[ ]?[0-9]{3}){3}"><br>
                <textarea name="asunto" rows="5" style="height:100%;" class="form-control-lg w-100 m-1" required placeholder="¿Que te interesa?" type="text"></textarea><br><br>
                <button name="contacto" type="submit" class="w-100 btn btn-dark"><b>Enviar</b></button>
            </form>
        </div>
    </div>
</main>