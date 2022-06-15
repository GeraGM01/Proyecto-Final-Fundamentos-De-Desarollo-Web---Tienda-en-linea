<?php
if (isset($_REQUEST['guardar'])) {  // si se dio click en el boton de guardar
    session_start();
    //guardo los datos del formulario en una variable 
    $nom = $_REQUEST['nomProd'] ?? ''; 
    $des = $_REQUEST['descripcion'] ?? '';
    $price = $_REQUEST['precio'] ?? '';
    $cant = $_REQUEST['stock'] ?? '';
    $imgn = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    include_once "db_TecnoZone.php";
    $con = mysqli_connect($host, $user, $pass, $db);  // hago la conexion 
    //hago la consulta 
    $query = "INSERT INTO producto(NombreProducto,Descripcion,Precio,Stock,ImagenProducto) VALUES('$nom','$des','$price','$cant','$imgn')";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo "Producto agregado correctamente";
        header("location:administrador.php");
    } else {
        echo "Ha ocurrido un error al agregar el producto, intente nuevamente";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosAlta.css">
    <title>Alta de producto</title>
</head>

<body>
    <div class="l-form">
        <form class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form_tittle">Alta</h1>

            <div class="form_div">
                <input type="text" name="nomProd" class="form_input" placeholder="">
                <label for="" class="form_label">Nombre del producto</label>
            </div>

            <div class="form_div">
                <input type="text" name="descripcion" class="form_input" placeholder="">
                <label for="" class="form_label">Descripcion</label>
            </div>

            <div class="form_div">
                <input type="text" name="precio" class="form_input" placeholder="">
                <label for="" class="form_label">Precio</label>
            </div>

            <div class="form_div">
                <input type="text" name="stock" class="form_input" placeholder="">
                <label for="" class="form_label">Stock</label>
            </div>

            <div class="form_div">
                <input type="file" name="imagen" required="" class="form_input">
            </div>
            <button type="submit" name="guardar" class="form_butom" value="Dar de alta">Dar de alta</button>

        </form>
    </div>

</body>

</html>