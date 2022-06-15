<?php
if (isset($_REQUEST['guardar'])) {
    session_start();
    $idProducto = $_REQUEST['idProd'] ?? '';
    include_once "db_TecnoZone.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    $query = "DELETE FROM producto WHERE Id_Producto = '$idProducto'";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo "Producto eliminado correctamente";
    } else {
        echo "Ha ocurrido un error al eliminar el producto, intente nuevamente";
    }
}

if (isset($_REQUEST['atras'])) {
    header("location:administrador.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilosAlta.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
</head>

<body>
    <div class="l-form">
        <form class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form_tittle">Eliminar producto</h1>

            <div class="form_div">
                <input type="text" name="idProd" class="form_input" placeholder="">
                <label for="" class="form_label">Id del producto</label>
            </div>
            <input type="submit" name="guardar" value="Eliminar" class="form_butom">
            <br>
            <input type="submit" name="atras" value="Regresar" class="form_butom">
        </form>
    </div>
</body>

</html>