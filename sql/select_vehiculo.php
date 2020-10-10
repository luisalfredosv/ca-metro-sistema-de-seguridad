<?php 
	include ("conectar.php");

	$consulta =" SELECT * FROM vehiculo WHERE cod_veh!='0' order by cod_veh";
	$result = mysql_query($consulta);
	$option="<option value='0'>No</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_veh']."'>".$fila['tip_veh']."</option>");
		
	} 
	echo json_encode($option);
 ?>
