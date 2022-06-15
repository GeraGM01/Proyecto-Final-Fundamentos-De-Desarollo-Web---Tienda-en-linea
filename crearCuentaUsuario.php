<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosAlta.css">
    <title>Crear cuenta</title>
</head>

<body>
    <div class="l-form">
        <form class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form_tittle">Registro de usuario</h1>

            <div class="form_div">
                <input type="text" name="nomUser" class="form_input" placeholder="">
                <label for="" class="form_label">Nombre</label>
            </div>

            <div class="form_div">
                <input type="text" name="correoUser" class="form_input" placeholder="">
                <label for="" class="form_label">Correo</label>
            </div>

            <div class="form_div">
                <input type="password" name="contraseñaUser" class="form_input" placeholder="">
                <label for="" class="form_label">Contraseña</label>
            </div>
            <button type="submit" name="guardar" class="form_butom" value="Registrarse">Registrarse</button> <br>
            <button type="submit" name="regresar" class="form_butom" value="regresar">Regresar</button> <br>
            <?php
            if (isset($_REQUEST['regresar']) || isset($_REQUEST['aceptar']) || isset($_REQUEST['error'])) {  // mando al index si se selecciona el boton de regresar
                header("location:index.php");
            }
            ?>
            <?php
            if (isset($_REQUEST['guardar'])) {
                $nomUsuario = $_REQUEST['nomUser'] ?? '';
                $correoUsuario = $_REQUEST['correoUser'] ?? '';
                $contraUsuario = $_REQUEST['contraseñaUser'] ?? '';
                include_once "db_TecnoZone.php";
                $con = mysqli_connect($host, $user, $pass, $db);
                $query = "INSERT INTO cliente(Nombre,Correo,Pass) VALUES('$nomUsuario','$correoUsuario','$contraUsuario')";
                $res = mysqli_query($con, $query);
                if ($res) {
            ?>
                    <button type="submit" name="aceptar" class="form_butom" value="regresar">Aceptar</button>
                    <p>Registro completado exitosamente</p>
                <?php
                } else {
                ?>
                    <button type="submit" name="error" class="form_butom" value="regresar">Regresar</button> <br>
                    <p>Ha ocurrido un error al registrarte, intenta nuevamente</p>
            <?php
                }
            }

            ?>
        </form>
    </div>

</body>

</html>