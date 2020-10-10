<?php 

	include ("conectar.php");

	$consulta = "SELECT * FROM gerencia  ORDER BY cod_ger";
	$result = mysql_query($consulta);
	$option="<option value=''>Seleccione</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_ger']."'>".$fila['gerencia']."</option>");
		
	} 
	echo json_encode($option);

 ?>



 