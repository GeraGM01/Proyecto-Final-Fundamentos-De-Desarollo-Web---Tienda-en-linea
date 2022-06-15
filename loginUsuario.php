<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosAlta.css">
    <title>Iniciar sesion</title>
</head>
<style>
    *,
    ::before,
    ::after {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-size: 1rem;
    }

    h1 {
        margin: 0;
    }

    .l-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form {
        width: 360px;
        padding: 4rem 2rem;
        box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
    }

    .form_tittle {
        font-weight: 400;
        margin-bottom: 3rem;
    }

    .form_div {
        position: relative;
        height: 48px;
        margin-bottom: 1.5rem;
    }

    .form_input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-size: 1rem;
        border: 1px solid gray;
        border-radius: .5rem;
        outline: none;

        background: none;
    }

    .form_label {
        position: absolute;
        left: 1rem;
        top: 1rem;
        padding: 0 .25rem;
        background-color: #fff;
        color: #80868B;
        font-size: 1rem;
        transition: .3s;
    }

    .form_butom {
        display: block;
        margin-left: auto;
        padding: .75rem 2rem;
        outline: none;
        border: none;
        background-color: rgb(0, 48, 153);
        color: #fff;
        font-size: 1rem;
        border-radius: .5rem;
        cursor: pointer;
        transition: .3s;
    }

    .form_butom:hover {
        box-shadow: 0 10px 36px rgba(0, 0, 0, .15);
    }

    .form_input:focus+.form_label {
        top: -.5rem;
        left: .8rem;
        color: rgb(0, 48, 153);
        font-size: .75rem;
        font-weight: 500;
        z-index: 10;
    }

    .form_input:not(:placeholder-shown).form_input:not(:focus)+.form_label {
        top: -.5rem;
        left: .8rem;
        font-size: .75rem;
        font-weight: 500;
        z-index: 10;
    }

    .form_input:focus {
        border: 1.5px solid rgb(0, 48, 153);
    }
</style>

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
            <p><a href="crearCuentaUsuario.php">Crear una cuenta</p>
            <p><a href="">Restablece tu contraseña</a></p>
            <?php
            if (isset($_REQUEST['login'])) {
                session_start();
                $email = $_REQUEST['email'] ?? '';
                $contra = $_REQUEST['pass'] ?? '';
                include_once "db_TecnoZone.php";
                $con = mysqli_connect($host, $user, $pass, $db);
                $query = "SELECT Id_Cliente,Nombre,Correo from cliente where Correo= '" . $email . "' and Pass='" . $contra . "'";
                $res = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($res);
                if ($row) {
                    $_SESSION['Id_Cliente'] = $row['Id_Cliente'];
                    $_SESSION['CorreoCliente'] = $row['Correo'];
                    $_SESSION['NombreCliente'] = $row['Nombre'];
                    header("location:index.php");
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