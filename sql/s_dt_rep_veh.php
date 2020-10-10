<?php
	
	include ("conectar.php");

	$consulta = "SELECT a.cedula, a.vehiculo, a.placa, a.marca, a.color,
				b.cedula, b.nombre, b.apellido, b.sexo, b.gerencia, b.cargo,  b.tlf,
				c.cod_veh, c.tip_veh,
				d.cod_mar, d.tip_mar 
				FROM si_visitantes.visitantes as a, empleados.empleado as b,
				     si_visitantes.vehiculo as c, si_visitantes.aut_mar as d
			    WHERE a.cedula=b.cedula AND a.vehiculo=c.cod_veh AND a.marca=d.cod_mar AND a.vehiculo >'0' 
			    GROUP BY a.cedula";


	$registro = mysql_query($consulta);
	
	$tabla = ""; 
	
	while($row = mysql_fetch_array($registro)){	


$cedula=utf8_encode($row['cedula']);
$nom_ape=utf8_encode($row['nombre'])."".utf8_encode($row['apellido']);
$sexo=utf8_encode($row['sexo']);
$gerencia=utf8_encode($row['gerencia']);
$cargo=utf8_encode($row['cargo']);
$tlf=utf8_encode($row['tlf']);
$vehiculo=utf8_encode($row['tip_veh']);
$placa=utf8_encode($row['placa']);
$color=utf8_encode($row['color']);
$marca=utf8_encode($row['tip_mar']);

	// 	$tabla.='{
	// 				"cedula":"'.$cedula.'",
	// 				"nom_ape":"'.$nom_ape.'",
	// 				"sexo":"'.$sexo.'", 
	// 				"gerencia":"'.$gerencia.'",
	// 				"cargo":"'.$cargo.'",
	// 				"tlf":"'.$tlf.'",
	// 				"vehiculo":"'.$vehiculo.'",
	// 				"placa":"'.$placa.'",
	// 				"marca":"'.$marca.'",

	// 			},';		
	// }	

	// //eliminamos la coma que sobra
	// $tabla = substr($tabla,0, strlen($tabla) - 1);
	// echo '{"data":['.$tabla.']}';	


		$tabla.='{
				  "cedula":"'.($cedula).'",
				  "nom_ape":"'.($nom_ape).'",
				  "sexo":"'.($sexo).'",
				  "gerencia":"'.($gerencia).'",
				  "cargo":"'.($cargo).'",
				  "tlf":"'.($tlf).'",
				  "vehiculo":"'.($vehiculo).'",
				  "placa":"'.($placa).'",
				  "color":"'.($color).'",
				  "marca":"'.($marca).'"

				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	



?>



