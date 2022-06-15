<!DOCTYPE html>
<html lang="en">
<?php
session_start(); //inicio la sesion
if (isset($_REQUEST['sesion']) && $_REQUEST['sesion'] == "cerrar") {  //si se le dio click al boton de cerrar sesion
    session_destroy(); //cierro la sesion con el metodo destroy 
    header("location:iniciarSesion.php"); //despues mando al area de login
}
if (isset($_SESSION['Id_Usuario']) == false) {  //si la sesion no corresponde al usuario entonces no podra entrar
    header("location:iniciarSesion.php"); // y lo mando al login por que la sesion no existe
}
$mod = $_REQUEST['mod'] ?? '';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador TecnoZone</title>
    <link rel="stylesheet" href="estilosAdmin.css">
</head>

<body>
    <?php
    include "menuAdmin.php";
    ?>
    <center>
        <section class="section-3">
            <div class="container">
                <article>
                    <div><a href="administrador.php?mod=&opc=alta"">Dar de alta un producto</a></div> <br>
            </article> <br>
            <article>
                <div><a href=" administrador.php?mod=&opc=consulta">Consultar productos activos</a></div> <br>
                </article> <br>
                <article>
                    <div><a href="administrador.php?mod=&opc=editar">Editar producto</a></div> <br>
                </article> <br>
                <article>
                    <div><a href="administrador.php?mod=&opc=eliminar">Eliminar producto</a></div> <br>
                </article> <br>
                <article>
                    <div><a href="administrador.php?mod=&opc=actualizar">Actualizar Imagen a producto</a></div> <br>
                </article> <br>
                <?php
                if (isset($_REQUEST['opc']) && $_REQUEST['opc'] == "alta") {  //de acuerdo al modulo que le corresponda al boton voy a mandar a una pagina en especifico
                    header("location:alta.php");
                ?>
                <?php
                }

                if (isset($_REQUEST['opc']) && $_REQUEST['opc'] == "consulta") {
                    header("location:consulta.php");
                ?>
                    <?php
                    ?>
                <?php

                }

                if (isset($_REQUEST['opc']) && $_REQUEST['opc'] == "editar") {

                    header("location:editar.php");
                }

                if (isset($_REQUEST['opc']) && $_REQUEST['opc'] == "eliminar") {
                    header("location:eliminar.php");
                ?>

                <?php
                }

                if (isset($_REQUEST['opc']) && $_REQUEST['opc'] == "actualizar") {
                    header("location:actualizarImg.php");
                ?>
                <?php
                }

                ?>
            </div>
        </section>
    </center>
    <!--footer-->
    <footer>
        <div class="contenedorFooter">
            <h1> </h1>
        </div>
    </footer>
    <script src="funciones.js"></script>
</body>

</html>