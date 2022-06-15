<?php
if (isset($_REQUEST['guardar'])) {  //si se le dio click en el boton guardar
    //session_start();
    $idProducto = $_REQUEST['idProd'] ?? ''; //guardo el id que ingrese en mi formulario
    $imgn = addslashes(file_get_contents($_FILES['imagen']['tmp_name'])); //guardo la imagen que ingrese
    include_once "db_TecnoZone.php";
    $con = mysqli_connect($host, $user, $pass, $db);  //hago la conexion a la base de datos
    $query = "UPDATE producto SET  ImagenProducto = '$imgn' WHERE Id_Producto = '$idProducto'";  //ejecuto mi consulta
    $res = mysqli_query($con, $query);
    if ($res) { //si obtuve una respuesta quiere decir que si se realizo correctamente
        echo "Imagen actualizada correctamente";
    } else {  // de otra forma ocurrio un error
        echo "Ha ocurrido un error al actualizar la imagen del producto, intente nuevamente";
    }
}


if (isset($_REQUEST['atras'])) {  //si se dio click en el boton de atras 
    header("location:administrador.php");   //direcciono a la pagina principal del administrador
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilosAlta.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza Imagen</title>
</head>

<body>
    <div class="l-form">
        <form class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form_tittle">Actualizar imagen</h1>
            <div class="form_div">
                <input type="text" name="idProd" class="form_input" placeholder="">
                <label for="" class="form_label">Id del producto</label>
            </div>
            <div class="form_div">
                <label for="" class="form_label">Imagen</label>
                <input type="file" name="imagen" class="form_input">
            </div>
            <div>
                <input type="submit" name="guardar" value="Actualizar imagen" class="form_butom">
                <br>
                <input type="submit" name="atras" value="Regresar" class="form_butom">
            </div>
        </form>
    </div>
</body>

</html>