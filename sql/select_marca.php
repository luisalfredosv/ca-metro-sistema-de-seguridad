<?php 

$vehiculo = $_POST['vehiculo'];

if ($vehiculo=="2") {
	include ("conectar.php");	
	$consulta ="SELECT * FROM aut_mar WHERE tip='2' order by cod_mar";
	$result = mysql_query($consulta);
	$option="<option value='0'>- Seleccione -</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_mar']."'>".$fila['tip_mar']."</option>");
		
	} 

}elseif($vehiculo=="3"){
	include ("conectar.php");	
	$consulta ="SELECT * FROM aut_mar WHERE tip='3' order by cod_mar";
	$result = mysql_query($consulta);
	$option="<option value='0'>- Seleccione -</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_mar']."'>".$fila['tip_mar']."</option>");
}
}elseif($vehiculo=="4"){
	include ("conectar.php");	
	$consulta ="SELECT * FROM aut_mar WHERE tip='4' order by cod_mar";
	$result = mysql_query($consulta);
	$option="<option value='0'>- Seleccione -</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_mar']."'>".$fila['tip_mar']."</option>");
}
}elseif($vehiculo=="5"){
	include ("conectar.php");	
	$consulta ="SELECT * FROM aut_mar WHERE tip='5' order by cod_mar";
	$result = mysql_query($consulta);
	$option="<option value='0'>- Seleccione -</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_mar']."'>".$fila['tip_mar']."</option>");
}	
}elseif($vehiculo=="6"){
	include ("conectar.php");	
	$consulta ="SELECT * FROM aut_mar WHERE tip='6' order by cod_mar";
	$result = mysql_query($consulta);
	$option="<option value='0'>- Seleccione -</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_mar']."'>".$fila['tip_mar']."</option>");
}
}elseif($vehiculo=="7"){
	include ("conectar.php");	
	$consulta ="SELECT * FROM aut_mar WHERE tip='7' order by cod_mar";
	$result = mysql_query($consulta);
	$option="<option value='0'>- Seleccione -</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_mar']."'>".$fila['tip_mar']."</option>");
	}
	
}

echo json_encode($option);
 ?>