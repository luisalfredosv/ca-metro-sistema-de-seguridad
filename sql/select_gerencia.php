<?php 
	include ("conectar_emp.php");

	$consulta =" SELECT * FROM gerencia  order by cod_ger";
	$result = mysql_query($consulta);
	$option="<option value='0'>- Seleccione -</option>";
	while($fila = mysql_fetch_array($result)){
		$option.=utf8_encode("<option value='".$fila['cod_ger']."'>".$fila['gerencia']."</option>");
		
	} 
	echo json_encode($option);
 ?>
