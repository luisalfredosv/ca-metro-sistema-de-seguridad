<?php 

$cdv_int = $_POST['cdv_int'];  
$sal_obj = "1";  
$coment_sal = $_POST['com_sal'];  
$hor_sal = $_POST['hor_sal'];  
$fec_sal = $_POST['fec_sal'];  
$dat_seg = $_POST['dat_seg']; 
$cod_vis = $_POST['cod_vis'];
$fec_sal=substr($fec_sal,6,4)."-".substr($fec_sal,3,2)."-".substr($fec_sal,0,2);
$ced_seg = intval(preg_replace('/[^0-9]+/', '', $dat_seg), 10); 

include('conectar_emp.php');
$consul="SELECT cedula from empleados.empleado where cedula='$ced_seg'";
$result=mysql_query($consul) or die (mysql_error());

if (mysql_num_rows($result)>0){
		include('conectar.php');
		$res = mysql_query("UPDATE si_visitantes.responsables_obj
		SET 
	sal_obj='$sal_obj', 
	coment_sal='$coment_sal', 
	hor_sal='$hor_sal', 
	fec_sal='$fec_sal',
	cod_vis='$cod_vis',
	fec_de_sal=NOW()

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


