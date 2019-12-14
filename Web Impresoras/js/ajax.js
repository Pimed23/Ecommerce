$("#formularioinsertarproducto").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formularioinsertarproductoresultado").html( response );
	});
});

$("#formularioinsertarproveedor").submit(function(event){
	event.preventDefault(); 
	var post_url = $(this).attr("action");
	var form_data = $(this).serialize();
	
	$.post( post_url, form_data, function( response ) {
	  $("#formularioinsertarproveedorresultado").html( response );
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