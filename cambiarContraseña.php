<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosAlta.css">
    <title>Cambiar contraseña</title>
</head>

<body>
    <div class="l-form">
        <form class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form_tittle">Actualizar contraseña</h1>

            <div class="form_div">
                <input type="text" name="correoUser" class="form_input" placeholder="">
                <label for="" class="form_label">Ingresa tu correo</label>
            </div>

            <div class="form_div">
                <input type="password" name="contraAnt" class="form_input" placeholder="">
                <label for="" class="form_label">Ingresa tu contraseña anterior</label>
            </div>

            <div class="form_div">
                <input type="password" name="contraNueva" class="form_input" placeholder="">
                <label for="" class="form_label">Ingresa tu contraseña nueva</label>
            </div>

            <button type="submit" name="guardar" class="form_butom" value="Registrarse">Aceptar</button> <br>
            <button type="submit" name="regresar" class="form_butom" value="regresar">Regresar</button> <br>
            <?php
            if (isset($_REQUEST['regresar']) || isset($_REQUEST['aceptar']) || isset($_REQUEST['error'])) {
                header("location:index.php");
            }
            ?>
            <?php
            if (isset($_REQUEST['guardar'])) {
                $correoU = $_REQUEST['correoUser'] ?? '';
                $contraAntigua = $_REQUEST['contraAnt'] ?? '';
                $contraNueva = $_REQUEST['contraNueva'] ?? '';
                include_once "db_TecnoZone.php";
                $con = mysqli_connect($host, $user, $pass, $db);
                $query = "UPDATE cliente SET  Pass = '$contraNueva' WHERE Pass = '$contraAntigua'";
                $res = mysqli_query($con, $query);
                if ($res && mysqli_affected_rows($con) != 0) {
            ?>
                    <button type="submit" name="aceptar" class="form_butom" value="regresar">Aceptar</button>
                    <p>Contraseña actualizada correctamente</p>
                <?php
                    $con = 0;
                } else {
                ?>
                    <button type="submit" name="error" class="form_butom" value="regresar">Regresar</button> <br>
                    <p>Ha ocurrido un error al actualizar la contraseña, intenta nuevamente</p>
            <?php
                }
            }

            ?>
        </form>
    </div>

</body>

</html>