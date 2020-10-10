<?php
include('conectar_emp.php');
   
$searchTerm = $_GET['term'];
$val="Gerencia de Seguridad";

$query ="SELECT * FROM empleados.empleado WHERE  nombre LIKE '%$searchTerm%' AND gerencia='$val' OR apellido LIKE '%$searchTerm%' AND gerencia='$val' OR cedula LIKE '%$searchTerm%' AND gerencia='$val' ORDER BY nombre ASC";
$consulta = mysql_query ($query);
$row=mysql_fetch_array($consulta);
 $data[] = $row['cedula']." - ".utf8_encode($row['nombre'])." ".utf8_encode($row['apellido'])." - ".utf8_encode($row['gerencia']);
    

    echo json_encode($data);

?>    
