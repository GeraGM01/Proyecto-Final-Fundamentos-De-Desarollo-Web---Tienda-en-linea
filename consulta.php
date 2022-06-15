<?php
include "db_TecnoZone.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="estilosConsulta.css">
  <link rel="stylesheet" href="estilosAdmin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
</head>

<body>
  <?php
  include "menuAdmin.php";
  ?>
  <section class="section-3">
    <h2>Productos activos</h2>
    <div id="wrapper">
      <table class=round_table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Imagen</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $simboloPesos = "$";
          $con = mysqli_connect($host, $user, $pass, $db);
          $query = mysqli_query($con, "SELECT *FROM producto");
          $resultado = mysqli_num_rows($query);
          if ($resultado > 0) {
            while ($datos = mysqli_fetch_array($query)) {
          ?>
              <tr>
                <td data-label="Id"> <?php echo $datos['Id_Producto'] ?></td>
                <td data-label="Producto"> <?php echo $datos['NombreProducto'] ?></td>
                <td data-label="Descripcion"> <?php echo $datos['Descripcion'] ?></td>
                <td data-label="Precio"> <?php echo $simboloPesos . $datos['Precio'] ?></td>
                <td data-label="Stock"> <?php echo $datos['Stock'] ?></td>
                <td data-label="Imagen"><img class="imagenP" height="70px" src="data:image/jpg;base64, <?php echo base64_encode($datos['ImagenProducto']) ?>"></td>
              </tr>
          <?php
            }
          }
          ?>
  </section>


































</body>

</html>