//nos devuelve el contenido con el id especificado en el html
m = document.getElementById('mensajes')
input = document.getElementById('input')
bloqueBot = document.getElementById('bloqueBot')
bloqueCliente = document.getElementById('bloqueCliente')


//Funcion que nos verifica si el usuario ha enviado un mensaje, recibe el evento enter
//y verifica si se ha dado enter, en caso de ser verdadera la condicion vamos a leer el
//mensaje y recuperamos el texto en una variable para pasarla a una funcion que nos procesa
//ese mensaje.
function haEnviadoMensaje(evento) {

	if(evento.key === "Enter"){  //verificamos si se ha pulsado la tecla enter 
		mensajes.innerHTML += bloqueCliente.outerHTML  //leemos el mensaje que escribio el usuario
		var texto1 = input.value;  //recuperamos el texto que escrubio el usuario en una variable
		console.log(texto1)
		procesaMensaje(input.value.toLowerCase())  //mandamos llamar a esta funcion para que procese el mensaje y de una respuesta
		input.value = ""  //reseteamos la variable
	}
}

//funcion que procesa el mensaje, recibe como parametros el mensaje que se ha enviado
//y mientras no sea cadena vacia entonces nos va a devolver el texto y las etiquetas 
//para enviarlas a la funcion que nos va a determinar la respuesta.

//Funcion que nos ayuda a determinar la respuesta en concreto para cada una de las preguntas que se le programaron al 
//bot, esto lo hace mediante una opcion que es la que va a introducir el usuario
function procesaMensaje(msj){

	if(msj!=""){  // si no es una cadena vacia hacemos lo siguiente
		mensajes.innerHTML += bloqueBot.outerHTML 
		mensajes.lastChild.childNodes[1].textContent = respuesta(msj)
		var texto = respuesta(msj);
		console.log(texto);
	}

}


//Funcion que nos ayuda a determinar la respuesta en concreto para cada una de las preguntas que se le programaron al 
//bot, esto lo hace mediante una opcion que es la que va a introducir el usuario
function respuesta(msj) {
	console.log(msj);

	switch(msj)
	{
		case "1":
			return "Es muy fácil.\n1. Tienes que agregar tu producto al carrito posteriormente inicia sesión con tu cuenta y llena los datos correspondientes que se te pedirán \n 2. Confirma tu pedido \n 3. Recibe tu pedido";
		break;
		case "2":
			return "Para tu mayor comodidad, contamos con diferentes métodos de pago, algunos los podrás realizar en efectivo (OXXO, SPEI, Pago en efectivo) y también en línea con tarjeta de crédito o débito (Tarjeta crédito o débito, PayPal, Mercado Pago)";
		break;
		case "3":
			return "En TecnoZone cuentas con 1 año de garantía por defectos de fabricación directamente con nosotros, para mayor información sobre el proceso de devolución deberás comunicarte con nosotros y un agente te ayudará en el proceso.";
		break;
		case "4":
			return "Nosotros trabajamos con el servicio de DHL día siguiente por lo que recibirás tu producto 24 horas después de haber sido enviado.";
		break;
		case "5":
			return "Actualmente no contamos con sucursales físicas, pero no te preocupes muy pronto tendremos en tu estado";
		break;
		default:
			return "Lo siento, no pude entender, ingresa una opcion correcta"
		break;
	}
}
