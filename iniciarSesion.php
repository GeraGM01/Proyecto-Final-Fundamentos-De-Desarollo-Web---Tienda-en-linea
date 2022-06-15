<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosAlta.css">
    <title>Iniciar sesion</title>
</head>

<body>
    <div class="l-form">
        <form class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form_tittle">Iniciar sesion</h1>

            <div class="form_div">
                <input type="text" name="email" class="form_input" placeholder="">
                <label for="" class="form_label">Correo</label>
            </div>

            <div class="form_div">
                <input type="password" name="pass" class="form_input" placeholder="">
                <label for="" class="form_label">Contraseña</label>
            </div>
            <button type="submit" name="login" class="form_butom">Iniciar sesion</button>

            <?php
            if (isset($_REQUEST['login'])) {
                session_start(); //inicio la sesion
                //guardo email y vontraseña en una variable
                $email = $_REQUEST['email'] ?? '';
                $contra = $_REQUEST['pass'] ?? '';
                include_once "db_TecnoZone.php";
                $con = mysqli_connect($host, $user, $pass, $db);
                //ejecuto mi consulta
                $query = "SELECT Id_Usuario,Correo,Nombre from usuario where Correo= '" . $email . "' and Pass='" . $contra . "'";
                $res = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($res);
                if ($row) {  // si se ejecuto bien la consulta guardo mis variables de sesion
                    $_SESSION['Id_Usuario'] = $row['Id_Usuario'];
                    $_SESSION['Correo'] = $row['Correo'];
                    $_SESSION['Nombre'] = $row['Nombre'];

                    header("location:administrador.php");
                } else {
            ?>
                    <div class="form_div">
                        <center> <?php echo "Datos incorrectos" ?> </center>
                    </div>
            <?php

                }
            }
            ?>

        </form>
    </div>

</body>

</html>