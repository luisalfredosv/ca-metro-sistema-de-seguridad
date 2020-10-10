<?php 

/* objetos  */
$nom_obj = isset($_REQUEST['nom_obj']) ? $_REQUEST['nom_obj'] : NULL;
$cat_obj = isset($_REQUEST['cat_obj']) ? $_REQUEST['cat_obj'] : NULL;
$com_obj = isset($_REQUEST['com_obj']) ? $_REQUEST['com_obj'] : NULL;
$des_obj = isset($_REQUEST['des_obj']) ? $_REQUEST['des_obj'] : NULL;
$mar_obj = isset($_REQUEST['mar_obj']) ? $_REQUEST['mar_obj'] : NULL;
$ndb_obj = isset($_REQUEST['ndb_obj']) ? $_REQUEST['ndb_obj'] : NULL;
$mod_obj = isset($_REQUEST['mod_obj']) ? $_REQUEST['mod_obj'] : NULL;
$ser_obj = isset($_REQUEST['ser_obj']) ? $_REQUEST['ser_obj'] : NULL;
$pro_obj = isset($_REQUEST['pro_obj']) ? $_REQUEST['pro_obj'] : NULL;
$cdv_int = isset($_REQUEST['cdv_int']) ? $_REQUEST['cdv_int'] : NULL;

/* responsables_obj */
$pro_res  = isset($_REQUEST['pro_res'])  ? $_REQUEST['pro_res']  : NULL;
$cod_int  = isset($_REQUEST['cod_int'])  ? $_REQUEST['cod_int']  : NULL;
$hor_reg  = isset($_REQUEST['hor_reg'])  ? $_REQUEST['hor_reg']  : NULL;
$fec_reg  = isset($_REQUEST['fec_reg'])  ? $_REQUEST['fec_reg']  : NULL;
$dst_obj = isset($_REQUEST['dst_obj']) ? $_REQUEST['dst_obj'] : NULL;
$tip_per = isset($_REQUEST['tip_per']) ? $_REQUEST['tip_per'] : NULL;
$ced_res = isset($_REQUEST['ced_res']) ? $_REQUEST['ced_res'] : NULL;
$nya_res = isset($_REQUEST['nya_res']) ? $_REQUEST['nya_res'] : NULL;
$tip_mov = isset($_REQUEST['tip_mov']) ? $_REQUEST['tip_mov'] : NULL;
$dat_seg = isset($_REQUEST['dat_seg']) ? $_REQUEST['dat_seg'] : NULL;
$coment_sal = isset($_REQUEST['com_sal']) ? $_REQUEST['com_sal'] : NULL;

$cod_vis = isset($_REQUEST['cod_vis']) ? $_REQUEST['cod_vis'] : NULL;

$ced_seg = intval(preg_replace('/[^0-9]+/', '', $dat_seg), 10); 

$fec_reg=substr($fec_reg,6,4)."-".substr($fec_reg,3,2)."-".substr($fec_reg,0,2);


$hor_sal = isset($_REQUEST['hor_sal']) ? $_REQUEST['hor_sal'] : NULL;
$fec_sald = isset($_REQUEST['fec_sal']) ? $_REQUEST['fec_sal'] : NULL;

$fec_sal=substr($fec_sald,6,4)."-".substr($fec_sald,3,2)."-".substr($fec_sald,0,2);


$objetos = isset($_REQUEST['objetos']) ? $_REQUEST['objetos'] : NULL;
$responsables = isset($_REQUEST['responsables']) ? $_REQUEST['responsables'] : NULL;
// VERIFICA QUE EL USUARIO LOGUEADO SEA DE LA GERENCIA DE SEGURIDAD
include('conectar_emp.php');
$consul="SELECT cedula from empleados.empleado where cedula='$ced_seg'";
$result=mysql_query($consul) or die (mysql_error());

if (mysql_num_rows($result)>0){

// INSERTA EL OBJETO

	include('conectar.php');
	$query_obj = mysql_query("INSERT INTO si_visitantes.objetos(nom_obj, cod_int, cat_obj, com_obj, des_obj, mar_obj, ndb_obj, mod_obj, ser_obj, est_obj, pro_obj) VALUES('$nom_obj','$cod_int', '$cat_obj', '$com_obj','$des_obj','$mar_obj','$ndb_obj', '$mod_obj', '$ser_obj','1','$pro_obj') ON DUPLICATE KEY UPDATE com_obj = VALUES(com_obj)");


		if(mysql_affected_rows()>0){
		$objetos="obj_OK";
			}else{
// VERIFICA SI INSERTO
				include('conectar.php');
				$consulta = mysql_query ("SELECT cod_int FROM si_visitantes.objetos WHERE cod_int='$cod_int'");
	    		if (mysql_num_rows($consulta)>0){
	  			//$row=mysql_fetch_array($consulta);
	  			$objetos="obj_OK";
		  			}else{
				  			$objetos="obj_ER";
				  			}

				}


// INSERTA EL RESPONSABLE

if ($tip_mov=="2") {
	include('conectar.php');
	$query_res = mysql_query("INSERT INTO si_visitantes.responsables_obj(cdv_int ,cod_int,cod_vis, hor_sal, fec_sal, sal_obj, dst_obj, tip_per, ced_res, nya_res, pro_res, est_obj, fec_de_sal, ced_seg, coment_sal) VALUES ('$cdv_int','$cod_int','$cod_vis','$hor_sal','$fec_sal','$tip_mov','$dst_obj','$tip_per','$ced_res','$nya_res','$pro_res','1',NOW() ,'$ced_seg', '$coment_sal')");	
}elseif($tip_mov=="1"){
	include('conectar.php');
	$query_res = mysql_query("INSERT INTO si_visitantes.responsables_obj(cdv_int ,cod_int,cod_vis, hor_reg, fec_reg, ent_obj, dst_obj, tip_per, ced_res, nya_res, pro_res, est_obj,fec_de_reg ,ced_seg) VALUES ('$cdv_int','$cod_int','$cod_vis','$hor_reg','$fec_reg','$tip_mov','$dst_obj','$tip_per','$ced_res','$nya_res','$pro_res','1',NOW() ,'$ced_seg')");	
}






		if(mysql_affected_rows()>0){
		$responsables="res_OK";
			}else{
			$responsables="res_ER";
			}

				$res_ins="";
				if ($objetos=="obj_OK" AND $responsables=="res_OK") {
					echo "1"; //CORRECTO
				}else{
					echo "2";	//ERROR
				}

}else{
	echo "3"; //ERROR 
}


?>
