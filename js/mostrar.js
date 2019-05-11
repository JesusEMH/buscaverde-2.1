console.log('js insertado correctamente');

function mostrarOcultar(id){
var elemento = document.getElementById(id);
if(!elemento) {
return true;
}
if (elemento.style.display == "none") {
elemento.style.display = "block"
} else {
elemento.style.display = "none"
};
return true;
};

$(document).ready(function (){

	console.log("jquery y la web cargados...");
	$("#boton-mostrar").show();
	$('#boton-mostrar').click(function(){
		$('#form-agregar').show('fast');

	});
});