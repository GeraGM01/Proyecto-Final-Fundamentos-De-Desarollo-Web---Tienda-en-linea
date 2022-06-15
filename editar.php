<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosAlta.css">
    <title>Actualizar producto</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['guardar'])) {
        session_start();

        $idProducto = $_REQUEST['idProd'] ?? '';
        $nom = $_REQUEST['nomProd'] ?? '';
        $des = $_REQUEST['descripcion'] ?? '';
        $price = $_REQUEST['precio'] ?? '';
        $cant = $_REQUEST['stock'] ?? '';
        include_once "db_TecnoZone.php";
        $con = mysqli_connect($host, $user, $pass, $db);
        //$query = "UPDATE producto SET  NombreProducto = '$nom', Descripcion = '$des', Precio = '$price', Stock = '$cant' WHERE Id_Producto = '$idProducto'";
        if ($des == '' && $price == '' && $cant == '') {
            $query = "UPDATE producto SET  NombreProducto = '$nom' WHERE Id_Producto = '$idProducto'";
        }
        if ($nom == '' && $price == '' && $cant == '') {
            $query = "UPDATE producto SET  Descripcion = '$des' WHERE Id_Producto = '$idProducto'";
        }
        if ($nom == '' && $des == '' && $cant == '') {
            $query = "UPDATE producto SET  Precio = '$price' WHERE Id_Producto = '$idProducto'";
        }
        if ($nom == '' && $price == '' && $des == '') {
            $query = "UPDATE producto SET  Stock = '$cant' WHERE Id_Producto = '$idProducto'";
        }
        $res = mysqli_query($con, $query);
        if ($res) {
            echo "Producto actualizado correctamente";
        } else {
            echo "Ha ocurrido un error al actualizar el producto, intente nuevamente";
        }
    }

    if (isset($_REQUEST['atras'])) {
        header("location:administrador.php");
    }
    ?>
    <br>

    <div class="l-form">
        <form class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form_tittle">Editar producto</h1>
            <div class="form_div">
                <input type="text" name="idProd" class="form_input">
                <label for="" class="form_label">Id del producto</label>
            </div>

            <div class="form_div">
                <input type="text" name="nomProd" class="form_input">
                <label for="" class="form_label">Nombre del producto</label>
            </div>

            <div class="form_div">
                <input type="text" name="descripcion" class="form_input">
                <label for="" class="form_label">Descripcion</label>
            </div>

            <div class="form_div">
                <input type="text" name="precio" class="form_input">
                <label for="" class="form_label">Precio</label>
            </div>

            <div class="form_div">
                <input type="text" name="stock" class="form_input">
                <label for="" class="form_label">Stock</label>
            </div>
            <input type="submit" name="guardar" value="Actualizar" class="form_butom">
            <br>
            <input type="submit" name="atras" value="Regresar" class="form_butom">
        </form>
    </div>

</body>

</html>