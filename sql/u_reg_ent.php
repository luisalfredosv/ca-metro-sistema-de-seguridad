<?php 
$cdv_int = $_POST['cdv_int'];  
$ent_obj = "1";    
$hor_reg = $_POST['hor_reg'];  
$fec_reg = $_POST['fec_reg'];  
$dat_seg = $_POST['dat_seg']; 
$cod_vis = $_POST['cod_vis']; 
$fec_reg=substr($fec_reg,6,4)."-".substr($fec_reg,3,2)."-".substr($fec_reg,0,2);
$ced_seg = intval(preg_replace('/[^0-9]+/', '', $dat_seg), 10); 

include('conectar_emp.php');
$consul="SELECT cedula from empleados.empleado where cedula='$ced_seg'";
$result=mysql_query($consul) or die (mysql_error());

if (mysql_num_rows($result)>0){
		include('conectar.php');
		$res = mysql_query("UPDATE si_visitantes.responsables_obj
		SET 
	ent_obj='$ent_obj', 
	hor_reg='$hor_reg', 
	fec_reg='$fec_reg',
	cod_vis='$cod_vis',
	fec_de_reg=NOW()

		WHERE cdv_int='$cdv_int'");


		if(mysql_affected_rows()>0){
			echo "1";
		}else{
			echo "2";
		}



}else{
	echo "3";
}

?>


