<?php

include('conectar.php');

$searchTerm = $_GET['term'];

$query = "SELECT * FROM color WHERE cod_col LIKE '%$searchTerm%' ORDER BY cod_col ASC";

$consulta = mysql_query ($query);
/*$row=mysql_fetch_array($consulta);
$data[] = utf8_encode($row['cod_col']);
echo json_encode($data);*/


if (mysql_num_rows($consulta) > 0) {
	while ($row = mysql_fetch_array($consulta)) {
$data = utf8_encode($row['cod_col']);
$datos[] = $data;
//$dat=$datos;
	}
	echo json_encode($datos);
}






?>    
