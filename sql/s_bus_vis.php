<?php

$bus_ci = $_POST['bus_ci'];
include('conectar.php');
//include('conectar_emp.php');
$query = "SELECT * FROM visitantes WHERE cedula='$bus_ci'";

$consulta = mysql_query ($query);
//$row=mysql_fetch_array($consulta);

if (mysql_num_rows($consulta)>0){

  $row=mysql_fetch_array($consulta);

$data = new stdClass();

//$data->cedula  = $row['cedula'];
$data->nom_ape = utf8_encode($row['nom_ape']);
//$data->proc    = utf8_encode($row['proc']);

echo json_encode($data);

}else{
echo "5";

}

?>   

