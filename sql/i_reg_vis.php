<?php
       
$ci = $_POST['ci'];
$nyav = $_POST['nyav'];
$tdv = $_POST['tdv'];
$area = $_POST['area'];
$fec_ent = $_POST['fa'];
$hor_ent = $_POST['ha'];
$dat_emp = $_POST['dat_emp'];
$dat_seg = $_POST['dat_seg'];
$obs_vis = $_POST['obs_vis'];
$cod_vis = $_POST['cod_vis'];
$proc = $_POST['proc'];
$tip_per = $_POST['tip_per'];

$ced_emp = intval(preg_replace('/[^0-9]+/', '', $dat_emp), 10); 
$ced_seg = intval(preg_replace('/[^0-9]+/', '', $dat_seg), 10); 
$fec_ent=substr($fec_ent,6,4)."-".substr($fec_ent,3,2)."-".substr($fec_ent,0,2);

$vehiculo = $_POST['vehiculo'];
$placa = $_POST['placa'];
$marca = $_POST['marca'];
$color = $_POST['color'];
$obs_veh = $_POST['obs_veh'];
$carnet = $_POST['carnet'];
$met_reg = $_POST['met_reg'];

include('conectar_emp.php');
$consulta="SELECT cedula from empleados.empleado where cedula='$ced_emp'";
$resultado=mysql_query($consulta) or die (mysql_error());

$consul="SELECT cedula from empleados.empleado where cedula='$ced_seg'";
$result=mysql_query($consul) or die (mysql_error());

if (mysql_num_rows($result)>0){
if (mysql_num_rows($resultado)>0){
  
include('conectar.php');
	$res = mysql_query(" INSERT INTO si_visitantes.visitantes (cedula,nom_ape,ced_emp,tip_vis,are_vis,fec_ent,hor_ent,obs_vis,ced_seg,cod_vis,proc,vehiculo,placa,marca,color,obs_veh,carnet,met_reg,tip_per) VALUES ('$ci','$nyav','$ced_emp','$tdv','$area','$fec_ent','$hor_ent','$obs_vis','$ced_seg','$cod_vis','$proc','$vehiculo','$placa','$marca','$color','$obs_veh','$carnet','$met_reg','$tip_per')");
if(mysql_affected_rows()>0){

include("conectar.php");
mysql_query("UPDATE carnet SET estado='0' WHERE id='$carnet'");	
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