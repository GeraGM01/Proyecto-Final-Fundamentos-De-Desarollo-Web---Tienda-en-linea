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

    if (session_start()) {
        include_once "menu.php";
    }
    ?>
    <div class="l-form">
        <div class="contenedor">
            <div>
                <h1>Bienvenido <?php echo $_SESSION['NombreCliente'] ?></h1>
            </div>
            <br>
            <br>
            <div>
                <h3>Selecciona la opcion que quieras realizar</h3> <br>
                <form method="POST">
                    <button type="submit" name="salir" class="botonP" value="Cerrar">Cerrar sesion</button>
                </form>
            </div> <br>
            <div>
                <form method="POST">
                    <button type="submit" name="cambiarContra" class="botonP" value="Cambiar">Cambiar contraseña</button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_REQUEST['salir'])) {
            session_destroy();
            header("location:index.php");
        }
        ?>

        <?php
        if (isset($_REQUEST['cambiarContra'])) {
            header("location:cambiarContraseña.php");
        }
        ?>

</body>

</html>