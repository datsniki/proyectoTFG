<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kratos Gym</title>
    <link rel="stylesheet" href="activos/lib/styles.css">
    <script src="activos\lib\jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    session_start();
    require_once "controllers/c_conexion.php";

    if (isset($conexion)) {
        require_once 'controllers/funciones.php';
        require_once "views/modulos/m_header.php";
        require_once "controllers/c_controllers.php";
        require_once "controllers/c_index.php";
        require_once "views/modulos/m_footer.php";
    } else {
        include "views/modulos/nodb.php";
    }
    ?>
    <script src="activos\lib\script.js"></script>
</body>

</html>