<?php

include('conectar.php');

$searchTerm = $_GET['term'];
$query = "SELECT * FROM visitantes WHERE cod_vis LIKE '%$searchTerm%' ORDER BY cod_vis ASC limit 5";

$consulta = mysql_query ($query);
/*$row=mysql_fetch_array($consulta);
$data[] = utf8_encode($row['cedula'])." - ".utf8_encode($row['nom_ape']);
echo json_encode($data);*/

if (mysql_num_rows($consulta) > 0) {
	while ($row = mysql_fetch_array($consulta)) {
$data = utf8_encode($row['cod_vis']);
$datos[] = $data;
//$dat=$datos;
	}
	echo json_encode($datos);
}

?>    
