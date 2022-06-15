<?php
include "db_TecnoZone.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Responsive</title>

    <link rel="stylesheet" href="estilosDetalle.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    include_once "db_TecnoZone.php";
    $con = mysqli_connect($host, $user, $pass, $db)
    ?>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="enlace">
            <h1>TecnoZone</h1>
        </a>
        <ul>
            <li><a class="active" href="index.php">Inicio</a></li>
            <li><a href="#">Nosotros</a></li>
            <li><a href="#">Chat</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Carrito</a></li>
        </ul>
    </nav>
    <div class="l-form">
        <div class="contenedor">
            <?php
            $simboloPesos = "$";
            $con = mysqli_connect($host, $user, $pass, $db);
            $mod = $_GET['modulo'];  //obtengo el modulo de mi direccion
            $query = mysqli_query($con, "SELECT *FROM producto WHERE Id_Producto = $mod");  // de acuerdo al modulo que es el id, imprimo ese producto en especifico
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                while ($datos = mysqli_fetch_array($query)) {
                    $varId = $datos['NombreProducto'];
            ?>
                    <script>
                        <?php
                        echo "var jsvar ='$varId';";
                        ?>
                    </script>

                    <div>
                        <h1><?php echo $datos['NombreProducto'] ?></h1>
                    </div>
                    <br>
                    <div>
                        <img class="imagenP" src="data:image/jpg;base64, <?php echo base64_encode($datos['ImagenProducto']) ?>">
                    </div>
                    <br>
                    <div>
                        <h3><?php echo $simboloPesos . $datos['Precio'] ?></h3>
                    </div> <br>
                    <div>
                        <p id="texto"><?php echo $datos['Descripcion'] ?></p> <br>
                    </div>
                    <br>
                    <button class="form_butom" onclick="agregarProductoAlCarrito(jsvar);">Añadir al carrito</button>
            <?php
                }
            }

            ?>

        </div>

        <script src="funciones.js"></script>
        <script>
            var totalCarrito = 0;
            var productos = 0;
            var listProd = new Array();

            function agregarProductoAlCarrito(precioProducto) {
                productos += 1;
                window.localStorage.setItem('listProd', precioProducto);
                listProd.push(precioProducto);
                console.log(window.localStorage.getItem('array'))


            }
        </script>
</body>

</html>