<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <link rel="stylesheet" href="estilosDetalle.css">
    <link rel="stylesheet" href="index.css">

    <style>
        .botonP {
            display: inline;
            margin-left: auto;
            padding: .75rem 2rem;
            outline: none;
            border: none;
            background-color: rgb(0, 48, 153);
            color: #fff;
            font-size: 1 rem;
            border-radius: .5rem;
            cursor: pointer;
            transition: .3s;
        }

        .botonP:hover {
            box-shadow: 0 10px 36px gray;
        }
    </style>
</head>

<body>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;

    include_once "db_TecnoZone.php";
    ?>

    <?php

    if (session_start()) {
        include_once "menu.php";
    }
    ?>
    <?php

    $IdClien = $_SESSION['Id_Cliente'] ?? '';
    date_default_timezone_set('America/Mexico_City');
    $fecha_actual = date("Y-m-d H:i:s");
    include_once "db_TecnoZone.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    $query = "INSERT INTO venta(Id_Cliente,Fecha) VALUES('$IdClien','$fecha_actual')";
    $res = mysqli_query($con, $query);
    if (!$res) {
        echo "Ha ocurrido un error al realizar la compra";
    } else {
        $asunto = "Confirmacion de compra";
        $correoClien = $_SESSION['CorreoCliente']; //sera al correo al que se encviara el correo, que en este caso va a ser al que el usuario dio de alta en el registro
        $mensaje = "Hola " . $_SESSION['NombreCliente'] . " Tu pedido se ha relizado correctamente. " . "se ha relizado correctamente. " . "\nEspera muy pronto tus productos";
        mail($correoClien, $asunto, $mensaje);
    }
    ?>
    <div class="l-form">
        <div class="contenedor">
            <div>
                <h1>Listo <?php echo $_SESSION['NombreCliente'] ?> Se ha realizado con exito tu compra</h1>
            </div>
            <br>
            <br>
            <div>
                <h1>En breve recibiras un correo electronico</h1>
            </div>
            <div>
                <br>
                <h3>Selecciona la opcion que quieras realizar</h3> <br>
                <form method="POST">
                    <button type="submit" name="salir" class="botonP" value="Cerrar">Regresar</button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_REQUEST['salir'])) {
            header("location:index.php");
        }
        ?>

</body>

</html>