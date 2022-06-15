<!DOCTYPE html>
<html>

<head>
	<title>TecnoBot</title>
	<link rel="stylesheet" type="text/css" href="estilosChat.css">
	<link rel="stylesheet" href="index.css">
</head>

<body>
	<?php
	include_once "menu.php";
	?>
	<br>
	<div id="contenedor">
		<div id="mensajes">
			<div class="bloqueBot">
				<div class="mensajeBot">
					Hola! Soy TecnoBot y estoy aquí para ayudarte a resolver todas tus dudas. <br>
					Por favor indícame el número de opción que deseas consultar <br>
					1. ¿Cómo comprar?<br>
					2. Métodos de pago <br>
					3. Garantías y devoluciones <br>
					4. Información de envíos y paqueterías <br>
					5. ¿Cuentan con sucursales dentro de la República mexicana? <br>
				</div>
			</div>
		</div>
		<div id="contH">
			<div id="bloqueBot" class="bloqueBot">
				<div class="mensajeBot">
					Hola! Soy TecnoBot y estoy aquí para ayudarte a resolver todas tus dudas. <br>
					Por favor indícame el número de opción que deseas consultar <br>
					1. ¿Cómo comprar?<br>
					2. Métodos de pago <br>
					3. Garantías y devoluciones <br>
					4. Información de envíos y paqueterías <br>
					5. ¿Cuentan con sucursales dentro de la República mexicana? <br>
				</div>
			</div>
			<div id="bloqueCliente" class="bloqueCliente">
			</div>
		</div>
		<input id="input" onkeyup="haEnviadoMensaje(event)">

	</div>
	<script type="text/javascript" src="funcionesChat.js"></script>
</body>

</html>