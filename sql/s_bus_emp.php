<?php

$ced_res = isset($_REQUEST['ced_res']) ? $_REQUEST['ced_res'] : NULL;
$tip_per = isset($_REQUEST['tip_per']) ? $_REQUEST['tip_per'] : NULL;
$resul = isset($_REQUEST['resul']) ? $_REQUEST['resul'] : NULL;
$consulta = isset($_REQUEST['consulta']) ? $_REQUEST['consulta'] : NULL;
$nom_ape ="";

include('conectar_emp.php');
include('conectar.php');
//include('conectar_emp.php');
$data = new stdClass();
$data->tip_per = $tip_per;

if($tip_per=="1"){

$query = "SELECT * FROM empleados.empleado WHERE cedula='$ced_res'";
$consulta = mysql_query ($query);
if (mysql_num_rows($consulta)>0){
	
$row=mysql_fetch_array($consulta);
$nom_ape = utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']);
	}
}elseif($tip_per=="3"){
$query = "SELECT * FROM empleados.comision WHERE cedula='$ced_res'";
$consulta = mysql_query ($query);
if (mysql_num_rows($consulta)>0){
	
$row=mysql_fetch_array($consulta);
$nom_ape = utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']);
	}
}elseif($tip_per=="5"){
$query = "SELECT * FROM empleados.hp WHERE cedula='$ced_res'";
$consulta = mysql_query ($query);
if (mysql_num_rows($consulta)>0){
	
$row=mysql_fetch_array($consulta);
$nom_ape = utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']);
	}
}elseif($tip_per=="6"){
$query = "SELECT * FROM empleados.pasante WHERE cedula='$ced_res'";
$consulta = mysql_query ($query);
if (mysql_num_rows($consulta)>0){
	
$row=mysql_fetch_array($consulta);
$nom_ape = utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']);
	}
}elseif($tip_per=="7"){
$query = "SELECT * FROM empleados.servicio WHERE cedula='$ced_res'";
$consulta = mysql_query ($query);
if (mysql_num_rows($consulta)>0){
	
$row=mysql_fetch_array($consulta);
$nom_ape = utf8_encode($row['nombre'])." ".utf8_encode($row['apellido']);
	}
}elseif(/*$tip_per=="2" OR */$tip_per=="4" OR $tip_per=="6"){
$query = "SELECT * FROM si_visitantes.responsables_obj WHERE ced_res='$ced_res'";
$consulta = mysql_query ($query);
if (mysql_num_rows($consulta)>0){
	
$row=mysql_fetch_array($consulta);
$nom_ape = utf8_encode($row['nya_res']);
	}
}

$data->nom_ape=$nom_ape;

	if (mysql_num_rows($consulta)>0) {
		$data->result = 1;
	}else{
		$data->result = 0;
	}

echo json_encode($data);

?>   