<?php
//////////////////////CNX
error_reporting(E_ALL);
ini_set("display_errors",1);

$user = "postgres";
$password = "12345678";
$db = "pfinal_impresoras_beta2";
$port = 5432;
$host = "25.6.206.241";
$strCnx = "host=$host port=$port dbname=$db user=$user password=$password";
try{
	$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
}catch (Exception $e){
	echo "Exepcion: ", $e->getMessage();
}
////////////////////////////
$sql_query = "select m.modelo_impresora,s.precio,m.path_imagen from stock s
inner join modelo_impresora m on s.modelo_impresora = m.modelo_impresora ";
$query_result = "";
$result = "";

///////////////////////////
	$querymarca ="";
	$querytipo = "";
	if(isset($_POST['data'])){
		$data = $_POST['data'];
	//	print_r($data);
		if(sizeof($data[0])>1 && sizeof($data[1])==1){
				$querymarca = $querymarca ."marca='";
				if(sizeof($data[0])>2){
					for($i=1; $i < sizeof($data[0]) -1; $i++){
						$querymarca = $querymarca .$data[0][$i]."' or marca='";	
					}
					$querymarca = $querymarca .$data[0][sizeof($data[0])-1]."'";
				}
				else
					$querymarca = $querymarca .$data[0][1]."'";			
				$sql_query = $sql_query ."where " . $querymarca;
		}
		else if(sizeof($data[1])>1 && sizeof($data[0])==1){	
				$querytipo = $querytipo ."tipo_impresora='";
				if(sizeof($data[1])>2){
					for($i=1; $i < sizeof($data[1]) -1; $i++){
						$querytipo = $querytipo .$data[1][$i]."' or tipo_impresora='";
					}
					$querytipo = $querytipo .$data[1][sizeof($data[1])-1]."'";
				}
				else
					$querytipo= $querytipo .$data[1][1]."'";			
				$sql_query = $sql_query ."where " .$querytipo;
		}
		else if(sizeof($data[0])>1 && sizeof($data[1])>1){
				$querymarca = $querymarca ."marca='";
				if(sizeof($data[0])>2){
					for($i=1; $i < sizeof($data[0]) -1; $i++){
						$querymarca = $querymarca .$data[0][$i]."' or marca='";	
					}
					$querymarca = $querymarca .$data[0][sizeof($data[0])-1]."'";
				}
				else
					$querymarca = $querymarca .$data[0][1]."'";			
								
				$querytipo = $querytipo ."tipo_impresora='";
				if(sizeof($data[1])>2){
					for($j=1; $j < sizeof($data[1]) -1; $j++){
						$querytipo = $querytipo .$data[1][$j]."' or tipo_impresora='";
					}
					$querytipo = $querytipo .$data[1][sizeof($data[1])-1]."'";
				}
				else
					$querytipo= $querytipo .$data[1][1]."'";			
				$sql_query = "select m.modelo_impresora,s.precio,m.path_imagen from stock s inner join modelo_impresora m on s.modelo_impresora = m.modelo_impresora where ".$querymarca." intersect select m.modelo_impresora,s.precio,m.path_imagen from stock s inner join modelo_impresora m on s.modelo_impresora = m.modelo_impresora where ".$querytipo.";";
		}
	}
	$sql_query = $sql_query.";";	
//	echo $sql_query;
	$query_result = pg_query($cnx,$sql_query);
	$impresoraarray = array();
	while($row=pg_fetch_assoc($query_result)){
		$impresoraarray[] = $row;
	}
	$count = 0;
	$countmodel = 0;
	$modelname;
	$imagenpath = "http://25.6.206.241/upload/";
	$precio;
	foreach($impresoraarray as $modelo){
		foreach($modelo as $value){
			if($countmodel == 0){
				$modelname = $value;
			}
			else if($countmodel == 1){
				$precio = strval($value);
			}
			else if($countmodel == 2){
				$image = $imagenpath.$value;
			}
			$countmodel = $countmodel + 1;
		}
		$countmodel = 0;
		if($count==0){
            echo "<div id='wrapper'>";
        }
          echo "<div class='cajaprin'>";
          echo "<div class='imagen'><img src='".$image."'></div>";
          echo "<div class='texto'><h2>".$modelname."</h2>";
          echo "<h3>".$precio."</h3>";
          echo "<h3 id='cajaver'><a href='impresora.php?modelo=".$modelname."&precio=".$precio."'>Ver más</a></h3></div>";
          echo "</div>";
         if($count==2){
             echo "</div>";
         }
          if($count<2){
              echo "<div class='division'>-</div>";
          }else{
             $count=0;
         }
		$count=$count+1;
     }  	
//	echo json_encode($impresoraarray);

?>
