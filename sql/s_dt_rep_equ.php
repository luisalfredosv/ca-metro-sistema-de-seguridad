<?php
	
	include ("conectar.php");

	$consulta = "SELECT a.cdv_int, a.cod_int, a.nya_res, a.ced_res, a.tip_per, a.ent_obj, a.sal_obj, a.fec_reg, a.hor_reg, a.fec_sal, a.hor_sal, a.dst_obj, b.nom_obj, b.cod_int as cod_equ, b.ser_obj, b.mar_obj, b.mod_obj, c.cat_obj, d.cod_area, d.desc_area as area, e.id, e.tip_per as personal FROM si_visitantes.responsables_obj as a, si_visitantes.objetos as b, si_visitantes.cat_obj as c, si_visitantes.areas2 as d, si_visitantes.tip_per as e WHERE a.cod_int=b.cod_int AND a.tip_per=e.id AND b.cat_obj=c.id AND a.dst_obj= d.cod_area GROUP BY a.cdv_int";

	$registro = mysql_query($consulta);
	
	$tabla = "";
	
	while($row = mysql_fetch_array($registro)){		
		
		 $detalles = '<a href=\"det_equ.php?c='.base64_encode($row['cod_equ']).'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalles\" class=\"btn btn-primary\">Detalles<i class=\"\" aria-hidden=\"true\"></i></a>';
		
 $fec_ent =  isset($_REQUEST['fec_ent']) ?  $_REQUEST['fec_ent'] : NULL;
  $hor_ent =  isset($_REQUEST['hor_ent']) ?  $_REQUEST['hor_ent'] : NULL;

   $fec_sal =  isset($_REQUEST['fec_sal']) ?  $_REQUEST['fec_sal'] : NULL;
    $hor_sal =  isset($_REQUEST['hor_sal']) ?  $_REQUEST['hor_sal'] : NULL;

		$fec_ent=$row['fec_reg'];
		$fec_ent=substr($fec_ent,8,2)."-".substr($fec_ent,5,2)."-".substr($fec_ent,0,4);
		$hor_ent=utf8_encode($row['hor_reg']);
		//$dat_ent=$fec_reg." | ".$hor_reg;



		$fec_sal=$row['fec_sal'];
		$fec_sal=substr($fec_sal,8,2)."-".substr($fec_sal,5,2)."-".substr($fec_sal,0,4);
		$hor_sal=utf8_encode($row['hor_sal']);
		//$dat_sal=$fec_sal." | ".$hor_sal;

		$cat_obj = utf8_encode($row['cat_obj']);

	if($fec_sal=="00-00-0000" AND $hor_sal=="" OR $fec_ent=="00-00-0000" AND $hor_ent==""){		
	$notific = '<button class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-thumbs-down\" aria-hidden=\"true\"></span></button>';
		if ($fec_ent=="00-00-0000") {
			$fec_ent="";
		}
		if ($fec_sal=="00-00-0000") {
			$fec_sal="";
		}

	}else{
	$notific = '<button class=\"btn btn-success\"><span class=\"glyphicon glyphicon-thumbs-up\" aria-hidden=\"true\"></span></button>';
	}



$tip_per=$row['tip_per'];
 
		$tabla.='{
					"cdv_int":"'.utf8_encode($row['cdv_int']).'",
					"ced_res":"'.utf8_encode($row['ced_res']).'",
					"nya_res":"'.utf8_encode($row['nya_res']).'",
					"tip_per":"'.utf8_encode($row['personal']).'", 
					"dst_obj":"'.utf8_encode($row['area']).'",
					"nom_obj":"'.utf8_encode($row['nom_obj']).'",
					"cod_equ":"'.utf8_encode($row['cod_equ']).'",
					"cat_obj":"'.$cat_obj.'",
					"ser_obj":"'.utf8_encode($row['ser_obj']).'",
					"mar_obj":"'.utf8_encode($row['mar_obj']).'",
					"mod_obj":"'.utf8_encode($row['mod_obj']).'",
					"fec_ent":"'.utf8_encode($fec_ent).'",
					"hor_ent":"'.utf8_encode($hor_ent).'",
					"fec_sal":"'.utf8_encode($fec_sal).'",
					"hor_sal":"'.utf8_encode($hor_sal).'",
					"notific":"'.utf8_encode($notific).'",
					"acciones":"'.utf8_encode($detalles).'"

				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>



