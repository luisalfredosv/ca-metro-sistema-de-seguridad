<?php
	
	include ("conectar.php");

	$consulta = "SELECT a.cod_vis, a.cedula, a.nom_ape, a.obs_vis, a.vehiculo, a.fec_ent, a.hor_ent, a.fec_sal, a.hor_sal, a.are_vis, a.marca, a.color, a.placa, b.cod_area, b.desc_area, c.cod_veh, c.tip_veh FROM si_visitantes.visitantes as a, si_visitantes.areas as b, si_visitantes.vehiculo as c WHERE a.are_vis=b.cod_area AND a.vehiculo=c.cod_veh AND a.vehiculo=c.cod_veh";
	$registro = mysql_query($consulta);
	
	$tabla = "";
	
	while($row = mysql_fetch_array($registro)){		

		// $editar = '<a href=\"edicionUsuario.php?a='.$row['cod_vis'].'&b='.$row['cedula'].'&c='.$row['nom_ape'].'&d='.$row['cedula'].'&e='.$row['cedula'].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
		// $eliminar = '<a href=\"actionDelete.php?id='.$row['cod_vis'].'\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
		
		 $detalles = '<a href=\"det_vis.php?c='.base64_encode($row['cod_vis']).'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalles\" class=\"btn btn-primary\">Detalles<i class=\"\" aria-hidden=\"true\"></i></a>';
		

		$fec_ent=$row['fec_ent'];
		$fec_ent=substr($fec_ent,8,2)."-".substr($fec_ent,5,2)."-".substr($fec_ent,0,4);
		$hor_ent=utf8_encode($row['hor_ent']);
		//$dat_ent=$fec_ent." | ".$hor_ent;

$fecsal="";

		$fec_sal=$row['fec_sal'];
		$fec_sal=substr($fec_sal,8,2)."-".substr($fec_sal,5,2)."-".substr($fec_sal,0,4);
		$hor_sal=utf8_encode($row['hor_sal']);
		//$dat_sal=$fec_sal." | ".$hor_sal;

	if($fec_sal=="00-00-0000" AND $hor_sal==""){		
	$estatus = '<button class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-thumbs-down\" aria-hidden=\"true\"></span></button>';
	}else{
	$fecsal=$fec_sal;
	$estatus = '<button class=\"btn btn-success\"><span class=\"glyphicon glyphicon-thumbs-up\" aria-hidden=\"true\"></span></button>';
	}


		$tabla.='{
				  "cod_vis":"'.utf8_encode($row['cod_vis']).'",
				  "cedula":"'.utf8_encode($row['cedula']).'",
				  "nom_ape":"'.utf8_encode($row['nom_ape']).'",
				  "obs_vis":"'.utf8_encode($row['obs_vis']).'",
				  "vehiculo":"'.utf8_encode($row['tip_veh']).'",
				  "placa":"'.utf8_encode($row['placa']).'",
				  "color":"'.utf8_encode($row['color']).'",
				  "fec_ent":"'.utf8_encode($fec_ent).'",
				  "hor_ent":"'.utf8_encode($hor_ent).'",
				  "fec_sal":"'.utf8_encode($fecsal).'",
				  "hor_sal":"'.utf8_encode($hor_sal).'",
				  "are_vis":"'.utf8_encode($row['desc_area']).'",
				  "estatus":"'.utf8_encode($estatus).'",
				  "acciones":"'.utf8_encode($detalles).'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>



