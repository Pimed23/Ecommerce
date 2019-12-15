var request = null;
var result = "";
var url = "http://localhost/ecommerce/Ecommerce/Web%20Impresoras/php/insertar_datos.php";
////////////////////////////////////////////////////////
function getFormData($form,option){
	var data_output = $form.serialize();
	var string_output = "opcion="+opcion + "&"+ data_output;
	return string_output;
}

function sendData(url,data){
	if(window.XMLHttpRequest){
		request = new XMLHttpRequest();
	}
	else{
		request = new ActiveXObject("Microsoft.XMLHTTP");
	}

	request.onreadystatechange = function(){
		if(request.readyState==4 && request.status==200){
			alert( request.responseText);
			result = request.responseText;
		}
		else{
			console.log(request.readyState);
		}
	}
	request.open("POST",url,true);
	request.responseType = 'text';
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.send(data);
}
////////////////////////////////////////////////////////

$("#formularioinsertarproducto").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formularioinsertarproductoresultado").html( response );
	});
});

$(document).ready(function(){
	$("#formularioinsertarproveedor").submit(function(event){
		event.preventDefault(); 
		var $form = $("#formularioinsertarproveedor");
		var datos = getFormData($form,"proveedor");
		console.log(datos);
	//	sendData(url,datos);
	});
});
$("#formularioinsertarimpre").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formularioinsertarimpreresultado").html( response );
	});
});
$("#formulariobusquedadestockpornombre").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formulariobusquedadestockpornombreresultado").html( response );
	});
});
$("#formularioeliminarproductoporid").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formularioeliminarproductoporidresultado").html( response );
	});
});
$("#formulariobusquedaproductopornombre").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formulariobusquedaproductopornombreresultado").html( response );
	});
});
$("#formularioeliminarusuarioporid").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formularioeliminarusuarioporidresultado").html( response );
	});
});
$("#formulariobusquedausuariopornombre").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formulariobusquedausuariopornombreresultado").html( response );
	});
});
