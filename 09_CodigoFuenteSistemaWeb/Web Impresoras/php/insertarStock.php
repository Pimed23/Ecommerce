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
////////////////////////////////////////////////
$modelo_impresora = pg_escape_string($_POST['modelo_impresora']);
$precio = (float)($_POST['precio']);
$existencias = (int)($_POST['existencias']);
$id_stock = pg_escape_string($_POST['id_stock']);

$sql_query = "SELECT insertar_stock('".$id_stock."',".$existencias.",".$precio.",'".$modelo_impresora."');";
$query_result = pg_query($cnx,$sql_query);
$result = pg_fetch_result($query_result,0,0);
echo $result;
