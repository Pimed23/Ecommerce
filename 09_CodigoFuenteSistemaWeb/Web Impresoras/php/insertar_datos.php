<?php
///////CONEXION A LA BASE DE DATOS/////////
error_reporting(E_ALL);
ini_set("display_errors",1);

$user = "postgres";
$password = "12345678";
$db = "pfinal_impresoras_beta2";
$port = 5432;
$host = "25.6.206.241";
$strCnx = "host=$host port=$port dbname=$db user=$user password=$password";
try{
	$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());}catch (Exception $e){
	echo "Exepcion: ", $e->getMessage();
}

/////VARIABLE QUE USAREMOS DURANTE LA CONEXION///////////
$sql_query = "";
$query_result = "";
$result = "";

////////////////////////////////////////////////////////
if(isset($_POST['opcion'])){
	$opcion = $_POST['opcion'];
	////INSERTANDO DATOS DEPENDIENDO EL CASO///////
	//AGREGAR MAS CASOS PARA MAS INSERCIONES
	switch ($opcion){
		case 'login':
			try{
				$username = pg_escape_string($_POST['username']);
				$password = pg_escape_string($_POST['password']);
				$id_tipo_usuario = (int)($_POST['id_tipo_usuario']);
			
				$sql_query = "SELECT insertar_login('" . $username . "','" . $password . "'," . $id_tipo_usuario . ");";
			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;
		case 'empresa':
			try{
				$correo_electronico = pg_escape_string($_POST['correo_electronico']);
				$direccion = pg_escape_string($_POST['direccion']);
				$distrito = pg_escape_string($_POST['distrito']);
				$departamento = pg_escape_string($_POST['departamento']);
				$codigo_postal = (int)($_POST['codigo_postal']);
				$referencia = pg_escape_string($_POST['referencia']);
				$login_cliente = pg_escape_string($_POST['login_cliente']);
				$ruc = pg_escape_string($_POST['ruc']);
				$rubro = pg_escape_string($_POST['rubro']);
				$tipo_regimen = pg_escape_string($_POST['tipo_regimen']);
				$razon_social = pg_escape_string($_POST['razon_social']);
				$nombre_comercial = pg_escape_string($_POST['nombre_comercial']);
			
				$sql_query = "SELECT insertar_empresa('" . $correo_electronico . "','" . $direccion . "','" . $distrito . "','" . $departamento . "'," . $codigo_postal . ",'" . $referencia . "','" . $login_cliente . "','" . $ruc . "','" . $rubro . "','" . $tipo_regimen . "','" . $razon_social . "','" . $nombre_comercial . "');";
			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;	
		case 'persona':
			try{
				$correo_electronico = pg_escape_string($_POST['correo_electronico']);
				$direccion = pg_escape_string($_POST['direccion']);
				$distrito = pg_escape_string($_POST['distrito']);
				$departamento = pg_escape_string($_POST['departamento']);
				$codigo_postal = (int)($_POST['codigo_postal']);
				$referencia = pg_escape_string($_POST['referencia']);
				$login_cliente = pg_escape_string($_POST['login_cliente']);
				$dni = pg_escape_string($_POST['dni']);
				$fecha_nacimiento = date($_POST['fecha_nacimiento']);
				$nombre = pg_escape_string($_POST['nombre']);
				$p_apellido = pg_escape_string($_POST['p_apellido']);
				$s_apellido = pg_escape_string($_POST['s_apellido']);
				$sexo = pg_escape_string($_POST['sexo']);

				$sql_query = "SELECT insertar_persona('" . $correo_electronico . "','" . $direccion . "','" . $distrito . "','" . $departamento . "'," . $codigo_postal . ",'" . $referencia . "','" . $login_cliente . "','" . $dni . "','" . $fecha_nacimiento . "','" . $nombre . "','" . $p_apellido . "','" . $s_apellido . "','" . $sexo ."');";
			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;	
		case 'admin':
			try{
				$id_admin = (int)($_POST['id_admin']);
				$nombre = pg_escape_string($_POST['nombre']);
				$p_apellido = pg_escape_string($_POST['p_apellido']);
				$s_apellido = pg_escape_string($_POST['s_apellido']);
				$cargo = pg_escape_string($_POST['cargo']);
				$login_admin = pg_escape_string($_POST['login_admin']);
			
				$sql_query = "SELECT insertar_admin(" . $id_admin . ",'" . $nombre . "','" . $p_apellido . "','" .$s_apellido. "','" . $cargo . "','" . $login_admin . "');";
			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;
		case 'modelo_impresora':
			try{
				$modelo_impresora = pg_escape_string($_POST['modelo_impresora']);
				$marca = pg_escape_string($_POST['marca']);
				$nombre_comercial = pg_escape_string($_POST['nombre_comercial']);
				$tipo_impresora = pg_escape_string($_POST['tipo_impresora']);
				$tipo_color_impresora = pg_escape_string($_POST['tipo_color_impresora']);
				$tipo_cartucho = pg_escape_string($_POST['tipo_cartucho']);
				$alto = (float)($_POST['alto']);
				$ancho = (float)($_POST['ancho']);
				$profundidad = (float)($_POST['profundidad']);
				$capacidad = (int)($_POST['capacidad']);
				$velocidad = (float)($_POST['velocidad']);
				$descripcion = pg_escape_string($_POST['descripcion']);
				$path_imagen = pg_escape_string($_POST['path_imagen']);	

				$sql_query = "SELECT insertar_modelo_impresora('" . $modelo_impresora . "','" . $marca . "','" . $nombre_comercial . "','" . $tipo_impresora . "','" . $tipo_color_impresora ."','" . $tipo_cartucho . "'," . $alto . "," . $ancho . "," . $profundidad . ", " . $capacidad . ", " . $velocidad. ",'" . $descripcion . "','" .$path_imagen ."');";
				//$query_result = pg_query($cnx,$sql_query);
				//$result = pg_fetch_result($query_result,0,0);
				//uploadImg()
				/*if($sql_query == "Se registro exitosamente"){
					uploadImg();		
				}*/
			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;
		case 'impresora':
			try{
				$num_serie = pg_escape_string($_POST['num_serie']);
				$color = pg_escape_string($_POST['color']);
				$garantia = (int)($_POST['garantia']);
				$modelo_impresora = pg_escape_string($_POST['modelo_impresora']);
			
				$sql_query = "SELECT insertar_impresora('" . $num_serie . "','" . $color . "'," . $garantia . ",'". $modelo_impresora ."');";
			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;	
		case 'proveedor':
			try{
				$ruc = pg_escape_string($_POST['ruc']) ;
				$nombre_comercial = pg_escape_string($_POST['nombre_comercial']);
				$nombre_contacto = pg_escape_string($_POST['nombre_contacto']);
				$p_apellido_contacto = pg_escape_string($_POST['p_apellido_contacto']);
				$s_apellido_contacto = pg_escape_string($_POST['s_apellido_contacto']);
				$observaciones = pg_escape_string($_POST['observaciones']);
			
				$sql_query = "SELECT insertar_proveedor('" . $ruc . "','" . $nombre_comercial . "','" . $nombre_contacto . "','" . $p_apellido_contacto ."','" . $s_apellido_contacto . "', '" . $observaciones . "');";
			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;	
		case 'stock':
			try{
				$id_stock = pg_escape_string($_POST['id_stock']);
				$existencias = (int)($_POST['existencias']);
				$precio = (floatval)($_POST['precio']);
				$modelo_impresora = pg_escape_string($_POST['modelo_impresora']);
			
				$sql_query = "SELECT insertar_stock('" . $id_stock . "'," . $existencias . "," . $precio . ",'" . $modelo_impresora . "');";

			}
			catch(Exception $e){
				echo "Excepcion: ", $e->getMessage();
			}
			break;
	}
	///////////MENSAJE DE CONFIRMACION COMO RESPUESTA/////////////
	if(!$sql_query)
		$result = "sql_query vacio";
	else{
		$query_result = pg_query($cnx,$sql_query);
		$result = pg_fetch_result($query_result,0,0);
		if($result == "Se registro exitosamente")
			echo "done\n";
	}
	echo $result;
}else{
	echo "no envio una opcion";
}



/////TEST///////
//$table = "login";

////TESTING CONEXION///////
//$query = "SELECT * FROM ". $table .";";
//$query_result = pg_query($cnx,$query);
//$testarray = array();
//while($row=pg_fetch_assoc($query_result)){
//	$testarray[] = $row;
//}
//echo json_encode($testarray);

///////FIN DE LA CONEXION///
pg_close($cnx);

///////////////////////////
?>

