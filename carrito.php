<?php
if (isset($_SESSION['Id_Cliente']) == true) {  #si no hay ningun cliente loggeado muestrame la parte de login
?>
  <div class="l-form">
    <div class="contenedor">
      <table class=round_table>
        <thead>
          <tr>
            <th>Producto</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
      </table>
      <div><a href="">Vaciar</a></div> <br>
      <div><a href="formPago.php">Pagar</a></div>
    <?php
  } else {
    ?>

    <?php
  }
    ?>