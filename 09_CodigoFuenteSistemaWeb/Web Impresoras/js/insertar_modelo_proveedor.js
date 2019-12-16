//PREPARANDO LAS VARIABLES PARA LA CONEXION CON EL SERVIDOR
//var request = null;
//var result = "";
var url = "http://25.6.206.241/ecommerce/Ecommerce/Web%20Impresoras/php/insertar_datos.php";
////////////////////////////////////
function getFormData($form,option){
	var data_output = $form.serialize();
	var string_output = "opcion="+option + "&"+ data_output;
	return string_output;
}

function sendData(url,data){
	var request = null;
	var result = "";
	if(window.XMLHttpRequest){
		request = new XMLHttpRequest();
	}
	else
		request = new ActiveXObject("Microsoft.XMLHTTP");

	request.onreadystatechange = function(){
		if(request.readyState==4 && request.status==200){
			alert( request.responseText);
			result = request.responseText;
		}
		else
			console.log(request.readyState);
	}
	request.open("POST",url,true);//el valor true es asincrono, false asincrono
	request.responseType = 'text';
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.send(data);
}

/////////////////////////////////////////////////

$(document).ready(function() {
    $('#formularioinsertarproducto').submit(function(event) {
        event.preventDefault();
		var nombreimage  = document.getElementById("fileSelect").value.split("\\").pop();		
		if(nombreimage){
			var $form = $("#formularioinsertarproducto");
			var datos = getFormData($form,"modelo_impresora");
			datos = datos + "&path_imagen="+nombreimage;
			console.log(datos);
			sendData(url,datos);
			
			//INSERT IMAGE///
			var formData = new FormData();
			formData.append("photo",document.getElementById("fileSelect").files[0]);
			var xhrimage = new XMLHttpRequest();
			xhrimage.open("POST", "./php/handle_file_upload.php");
			
			xhrimage.send(formData);
			
			///VINCULANDO IMAGEN Y MODELO
		}
			
		else{
			alert("ingrese imagen");
		}
//		console.log(result.responseText);
		////////////
	});
});


$(document).ready(function() {
    $('#formularioinsertarproveedor').submit(function(event) {		
    	event.preventDefault();
		var $form = $("#formularioinsertarproveedor");
		var datos = getFormData($form,"proveedor");
		console.log(datos);
		sendData(url,datos);	
	});
});

