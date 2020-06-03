var acc = document.getElementsByClassName("boton_titulo_seccion");		//Se crea la primer variable
var i;					//Se crea la segunda variable

for (i = 0;  i<acc.length; i++) {			//Creamos el ciclo repetitivo for
	acc[i].addEventListener("click", function () {
		this.classList.toggle("active");
		var pane1 = this.nextElementSibling;		//Se crea otra variable
		if (pane1.style.display === "block") {		//Se hace comparacion
			pane1.style.display = "none";
		}else{					//Que se hara si no se cum'pl,e la condicion 
			pane1.style.display = "block";
		}	
	});
}