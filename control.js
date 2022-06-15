// VARIABLES
const listaProdc = document.querySelector('.section-3');

var listaC = new Array();
var sumatoriaP =0;


initAPP();

document.addEventListener('load', initAPP)
	
	function initAPP(){
	listaProdc.addEventListener('click', obtenerProd)
}
	
	// FUNCIONES
	function obtenerProd(e){
		
		if(e.target.classList.contains('agregarCarrito')){
			const prod = e.target.parentElement; 
			extraerDatos(prod);
		}
	}
		
		function extraerDatos(prod){
			// console.log(curso)
			
			const prodElegido = {
				nombre : prod.querySelector('h4').textContent,
					precio : prod.querySelector('p').textContent,
			}
			
			pintarProd(prodElegido);
		}
			
			function pintarProd(prod) {
				
				nombre = prod.nombre;
				precio = prod.precio;
				listaC.push({nombre,precio});
				console.log(listaC)
					console.log(sumatoriaP);
				localStorage.setItem("listaCarrito",JSON.stringify(listaC));
				listaC = JSON.parse(localStorage.getItem("listaCarrito"));
				
				
				
				// Obteniendo el cuerpo de la tabla a donde añadiremos nuestros datos
				let tableBody = document.getElementById('tbody');
				tableBody.innerHTML = ``;
				// Recorriendo los datos de ejemplo
				for (let i = 0; i < listaC.length; i++) {
					// Creando los 'td' que almacenará cada parte de la información del usuario actual
					let name = `<td>${listaC[i].nombre}</td>`;
					let price = `<td>${listaC[i].precio}</td>`;
					tableBody.innerHTML += `<tr>${name + price}</tr>`;
				}
			}
			
			