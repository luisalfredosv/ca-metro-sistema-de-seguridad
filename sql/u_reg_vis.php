<?php
//  hor_fv:hor_fv,hor_sal:hor_sal,fec_sal:fec_sal,obs_vis:obs_vis,res_cod_vis:res_cod_vis
//  vehiculo:vehiculo,placa:placa,marca:marca,color:color,obs_veh:obs_veh
      
$met_act = $_POST['met_act'];           
$cod_vis = $_POST['cod_vis'];          

$hor_fv = $_POST['hor_fv'];
$hor_sal = $_POST['hor_sal'];
$fec_sal = $_POST['fec_sal'];
$ent_cnt = $_POST['ent_cnt'];
$vehiculo = $_POST['vehiculo'];

$carnet = $_POST['carnet'];
if ($vehiculo==1) {
$placa ="";
$marca ="";
$color ="";
$obs_veh ="";
}else{

$placa = isset($_REQUEST['placa']) ? $_REQUEST['placa'] : NULL;
$marca = isset($_REQUEST['marca']) ? $_REQUEST['marca'] : NULL;
$color = isset($_REQUEST['color']) ? $_REQUEST['color'] : NULL;
$obs_veh = isset($_REQUEST['obs_veh']) ? $_REQUEST['obs_veh'] : NULL;

}

$dat_emp = $_POST['dat_emp'];
$dat_seg = $_POST['dat_seg'];

$ced_emp = intval(preg_replace('/[^0-9]+/', '', $dat_emp), 10); 
$ced_seg = intval(preg_replace('/[^0-9]+/', '', $dat_seg), 10); 
$fec_sal=str_replace("/","-", $fec_sal);
$fec_sal=substr($fec_sal,6,4)."-".substr($fec_sal,3,2)."-".substr($fec_sal,0,2);

include('conectar_emp.php');
$consulta="SELECT cedula from empleados.empleado where cedula='$ced_emp'";
$resultado=mysql_query($consulta) or die (mysql_error());

$consul="SELECT cedula from empleados.empleado where cedula='$ced_seg'";
$result=mysql_query($consul) or die (mysql_error());

if (mysql_num_rows($result)>0){

if (mysql_num_rows($resultado)>0){
  

include('conectar.php');

	$res = mysql_query("UPDATE si_visitantes.visitantes
	SET
		hor_sal='$hor_sal',
		fec_sal='$fec_sal',
		hor_fv='$hor_fv',
		vehiculo='$vehiculo',
		placa='$placa',
		marca='$marca',
		color='$color',
		obs_veh='$obs_veh',
		met_act='$met_act',
		ent_cnt='$ent_cnt'

	WHERE cod_vis='$cod_vis'");


if(mysql_affected_rows()>0){
	include("conectar.php");
	mysql_query("UPDATE carnet SET estado='$ent_cnt' WHERE id='$carnet'");
	echo "1";
							}else{
								echo "2";

									}


}else{
echo "3";
}
}else{
echo "4";
}

?>