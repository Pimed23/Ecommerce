var url= "http://25.6.206.241/ecommerce/Ecommerce/Web%20Impresoras/php/";
var selectedMarca = [];
var selectedTipo = [];
var multiArray = [['#'],['#']];
$(document).ready(function(){
	$('#formulariologin').submit(function(event){
		event.preventDefault();
		var form = $("#formulariologin");
		console.log("loginpushbutton");
		var username = document.getElementById("usuario").value;
		var contrasena = document.getElementById("contrasena").value;
		var datos = "username="+username+"&password="+contrasena;
		console.log(datos);
		var post_url = url + "confirmarLogin.php";
		console.log(post_url);
		$.post(post_url, datos,function(response){
			console.log(document.cookie);
			if(response === 'FALSE')
				$("#responselogin").html('<strong>Contraseña incorrecta o Usuario no existe</strong><br><strong>Intente Nuevamente</strong>');
			else if(response === 'ADMIN'){
				window.open("./crudnuevo.html","_self",false);
				//save data of this guy
			}
			else if(response === 'USER'){
				window.open("./cabecera.html","_self",false);
				//save data of this guy
			}
		});
	});
	$('#formularioinsertarstock').submit(function(event){
		event.preventDefault();
//		var form = $("#formularioinsertartstock");
		var datos = $(this).serialize(); 
		console.log(datos);
		var post_url = url + "insertarStock.php";
		$.post(post_url, datos,function(response){
			alert(response);	
		});
	});
	$('.marca').click(function(){
		var filtroname = $(this).attr('name');
		if($(this).prop('checked')==true){
			console.log("selecting " +filtroname);
			if(selectedMarca.indexOf(filtroname)<0){
				selectedMarca.push(filtroname);
				multiArray[0].push(filtroname);
			}
		}
		else{
			console.log("unselecting "+$(this).attr('name'));
			selectedMarca.splice(selectedMarca.indexOf(filtroname),1);
			multiArray[0].splice(multiArray[0].indexOf(filtroname),1);
		}
		var post_url = url + "impresoraFiltros.php";
		//var jsonSM = selectedMarca.join(",");
	//	console.log(jsonSM);
		//jsonSM = "marca,"+jsonSM + "," + "tipo," +selectedTipo.join(",");
//		console.log(precio);
		//var jsonSM = multiArray.join(",");
		$.post(post_url,{data: multiArray}, function(response){
			$("#cajas").html(response);
		});
	});
	$('.tipoImpresora').click(function(){		
		var filtroname = $(this).attr('name');
		if($(this).prop('checked')==true){
			console.log("selecting " +filtroname);
			if(selectedTipo.indexOf(filtroname)<0){
				selectedTipo.push(filtroname);
				multiArray[1].push(filtroname);
			}
		}
		else{
			console.log("unselecting "+$(this).attr('name'));
			selectedTipo.splice(selectedMarca.indexOf(filtroname),1);
			multiArray[1].splice(multiArray[1].indexOf(filtroname),1);
		}
		//console.log(selectedMarca);
		//console.log(selectedTipo);
		console.log(multiArray);
		var post_url = url + "impresoraFiltros.php";
		$.post(post_url,{data: multiArray}, function(response){
			$("#cajas").html(response);
		});
		/*if($(this).attr('name') === 'Impresora')
			console.log("basica");
		if($(this).attr('name') === 'Multifuncional')
			console.log("multi");*/

	});

});
$(document).ready(function(){
    var filtroname = $(this).attr('name');
        var post_url = url + "impresoraFiltros.php";
        //var jsonSM = selectedMarca.join(",");
    //    console.log(jsonSM);
        //jsonSM = "marca,"+jsonSM + "," + "tipo," +selectedTipo.join(",");
        console.log(multiArray);
        //var jsonSM = multiArray.join(",");
        $.post(post_url,{data: multiArray}, function(response){
            $("#cajas").html(response);
        });
    });
