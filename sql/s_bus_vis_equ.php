<?php

$cod_vis = $_POST['cod_vis'];
include('conectar.php');
//include('conectar_emp.php');
$query = "SELECT * FROM visitantes WHERE cod_vis='$cod_vis'";

$consulta = mysql_query ($query);
//$row=mysql_fetch_array($consulta);
$data = new stdClass();
if (mysql_num_rows($consulta)>0){

  $row=mysql_fetch_array($consulta);



//$data->cedula  = $row['cedula'];
$data->nom_ape = utf8_encode($row['nom_ape']);
$data->cedula = utf8_encode($row['cedula']);
$data->tip_per = utf8_encode($row['tip_per']);
$data->proc    = utf8_encode($row['proc']);

$data->result = "5";
}else{
$data->result = "6";

}

echo json_encode($data);
?>   

