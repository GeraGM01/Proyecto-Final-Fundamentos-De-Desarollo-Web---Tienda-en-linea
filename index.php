<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoZone</title>
    <link rel="stylesheet" href="index.css">
    <style>
        button {
            text-decoration: none;
            font-weight: 40;
            font-size: 15px;
            color: #fff;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 5px;
            padding-right: 5px;
            background-color: rgb(0, 48, 153);
            border-radius: 5px;
            border-color: rgb(0, 48, 153);
        }
    </style>
    <?php
    session_start();
    ?>
</head>

<body>
    <?php
    include_once "db_TecnoZone.php";
    $con = mysqli_connect($host, $user, $pass, $db)
    ?>
    <?php
    include_once "menu.php";  //incluyo el menu para que se muestre de acuerdo a si se inicio sesion o no
    ?>
    <section class="section-3">
        <div class="container">
            <?php
            $simboloPesos = "$";
            $con = mysqli_connect($host, $user, $pass, $db);
            $query = mysqli_query($con, "SELECT *FROM producto"); //ejecuto mi consulta
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                while ($datos = mysqli_fetch_array($query)) {  //con este ciclo recorro todos los productos
            ?>
                    <article id="<?php echo $datos['Id_Producto'] ?>">
                        <h4 class="lineHT"> <?php echo $datos['NombreProducto'] ?> </h4>
                        <img class="imagenP" src="data:image/jpg;base64, <?php echo base64_encode($datos['ImagenProducto']) ?>">
                        <p class="lineH"><?php echo $simboloPesos . $datos['Precio'] ?></p>
                        <br>
                        <div><a href="detallesProducto.php?mod=&modulo=<?php echo $datos['Id_Producto'] ?>">Ver más</a></div> <br> <br>
                        <button class="agregarCarrito">Añadir</button>
                    </article>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <!--footer-->
    <footer>
        <div class="contenedorFooter">
            <?php
            include_once "carrito.php";
            ?>
        </div>
    </footer>
    <script src="control.js"></script>
</body>

</html>