<?php

include('conectar_emp.php');

$searchTerm = $_GET['term'];

$query = "SELECT * FROM empleado WHERE  statu='Activo' AND nombre LIKE '%$searchTerm%' OR apellido LIKE '%$searchTerm%' OR cedula LIKE '%$searchTerm%'  ORDER BY nombre ASC limit 5";

$consulta = mysql_query ($query);
//$row=mysql_fetch_array($consulta);




if (mysql_num_rows($consulta) > 0) {
	while ($row = mysql_fetch_array($consulta)) {
$data = $row['cedula']." - ".utf8_encode($row['nombre'])." ".utf8_encode($row['apellido'])." - ".utf8_encode($row['gerencia']);
$datos[] = $data;
//$dat=$datos;
	}
	echo json_encode($datos);
}


?>    


