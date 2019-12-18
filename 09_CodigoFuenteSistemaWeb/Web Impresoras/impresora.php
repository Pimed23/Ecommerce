<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cabecera</title>
<link rel="stylesheet" href="css/impre.css" type="text/css"/>
<script src="jquery-3.4.1.js"></script>
<script src="js/slider.js"></script>
</head>

<body>
    <script language=”php”>
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
//$model = $_GET['modelo'];
if(isset($_GET['modelo'])){
	$modelo = $_GET['modelo'];
	$sql_query = "SELECT * from modelo_impresora where modelo_impresora='".$modelo."';";
	$query_result = pg_query($cnx,$sql_query);
	$modelarray = array();
	$modelo_impresora;
	$marca;
	$nombre_comercial;
	$tipo_impresora;
	$tipo_color_impresora;
	$tipo_cartucho;
	$alto;
	$ancho;
	$profundidad;
	$capacidad;
	$velocidad;
	$descripcion; 
	$path;
	while($row = pg_fetch_assoc($query_result)){
		$modelarray[] = $row;
	}
	$count = 0;
	foreach($modelarray as $row){
		foreach($row as $column){
			if($count ==0)
				$modelo_impresora = $column;
			if($count ==1)
				$marca = $column;
			if($count ==2)
				$nombre_comercial = $column;
			if($count ==3)
				$tipo_impresora = $column;
			if($count ==4)
				$tipo_color_impresora = $column;
			if($count ==5)
				$tipo_cartucho = $column;
			if($count ==6)
				$alto = $column;
			if($count ==7)
				$ancho = $column;
			if($count ==8)
				$profundidad = $column;
			if($count ==9)
				$capacidad = $column;
			if($count ==10)
				$velocidad = $column;
			if($count ==11)
				$descripcion = $column;
			if($count ==12)
				$path = $column;
		}
		$count = $count + 1;
	}
	$count = 0;
    </script>
    
    <div id="cabecera">
        <div id="c_logo">
            
        </div>
        <ul id="c_menu">
            <li>LOGIN</li>
            <li>SOPORTE</li>
            <li>PARA EL TRABAJO</li>
            <li>PARA EL HOGAR</li>
        </ul>

    </div>
    <div id="cuerpo">
        <h1 id="nombre">Nombre impresora</h1>
        <div id="separ">-</div>
        <div id="cuerpoimpre">
            <div id="imagen">
                <img id="imagenimpre" src="images/impre.png"/>
            </div>
            <div id="datos">
                <ul>
                    <li>Marca:<script language=”php”> print($marca) </script></li>
                    <li>Modelo:<script language=”php”> print($modelo_impresora) </script> </li>
                    <li>Tipo:<script language=”php”>p print($tipo_impresora) </script></li>
                    <li>Cartuchos:<script language=”php”> print($tipo_cartucho) </script></li>
                    <li>Dimensiones: <script language=”php”> print($ancho)</script>/<?php print($profundidad)?>/<?php print($alto)?></li>
                    <li>Capacidad<script language=”php”> print($capacidad) </script></li>
                    <li>Velocidad<script language=”php”> print($velocidad) </script></li>
                    <li>Descripcion:<script language=”php”> print($descripcion) </script> </li>
                </ul>
            </div>
            <div id="comprar">
                <h2>Precio: $<script language=”php”> $_GET['precio'] </script></h2>
                <div id="comprarbot">
                    Comprar
                </div>
            </div>
        </div>
        <div id="separ">-</div>
        <h1 id="nombre">Reseñas del Producto</h1>
        <div id="resenaswrap">
            <div id="resenatotal">
                <div id="estrellastotal"><img src="images/5estrellas.png"/> </div>
            </div>
            <div id="resenas">
                <h1>Reseñas:</h1>
                <div class="resenabox">
                    <div id="estrellas"><img src="images/1estrellas.png"/> </div>
                    <div id="usuarioestrellas">Juan Perez - 10/30/1231</div>
                    <div id="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div>
                </div>
            </div>
        </div>
    </div>
    <footer style="background: #1e1e26">
        <div class="container-footer">
            <img class="imglogofooter" src="images/Sin%20t%C3%ADtulo.png" />
             <div class="container-social-icon">
                 <a href=""><img class="img-red-footer" src="images/logo%20fb.png" /></a>
                 <a href=""><img class="img-red-footer" src="images/logo%20twitter.png" /></a>
                 <a href=""><img class="img-red-footer" src="images/logo%20google.png" /></a>
             </div>
        </div>
    </footer>
</body>
</html>  
