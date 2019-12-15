<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

$user = "postgres";
$password = "12345678";
$db = "pfinal_impresoras_beta2";
$port = 5432;
$host = "localhost";
$strCnx = "host=$host port=$port dbname=$db user=$user password=$password";
try{
	$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
}catch (Exception $e){
	echo "Exepcion: ",$e->getMessage();
}
$sql_query= "";
$query_result = "";
$resultarray = array();
while($tow=pg_fetch_assoc($query_result)){
	$testarray[] = $row;
}
	echo json_encode($testarray);
?>
