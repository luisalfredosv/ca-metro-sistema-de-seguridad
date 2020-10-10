<?php 

$ser = $_POST['ser'];
$ser_obj = $_POST['ser_obj'];
$cat = $_POST['cat'];
$data = new stdClass();
if ($ser="ser"){

	include ('conectar.php');
	$verif ="SELECT a.cod_int, a.ent_obj, a.sal_obj, b.cod_int, b.ser_obj, b.cat_obj 
			 FROM si_visitantes.responsables_obj as a, si_visitantes.objetos as b 
			 WHERE a.cod_int=b.cod_int AND a.ent_obj='1' AND a.sal_obj='0' AND b.cat_obj!='1' AND b.ser_obj='$ser_obj' 
			 OR  a.cod_int=b.cod_int AND a.ent_obj='0' AND a.sal_obj='2' AND b.cat_obj!='1' AND b.ser_obj='$ser_obj'";
	$cons = mysql_query ($verif);
	if (mysql_num_rows($cons)>0){

	$data->resultado = "88";

	}else{


				include ('conectar.php');
			$query = "SELECT * FROM objetos WHERE ser_obj='$ser_obj' AND cat_obj!='1' AND est_obj='1'";

			$consulta = mysql_query ($query);
			//$row=mysql_fetch_array($consulta);
			
			if (mysql_num_rows($consulta)>0){

			$row=mysql_fetch_array($consulta);

			$data->resultado = "1";

			$data->nom_obj = utf8_encode($row['nom_obj']);
			$data->cod_int = utf8_encode($row['cod_int']);
			$data->ser_obj = utf8_encode($row['ser_obj']);
			$data->mar_obj = utf8_encode($row['mar_obj']);
			$data->mod_obj = utf8_encode($row['mod_obj']);
			$data->des_obj = utf8_encode($row['des_obj']);
			$data->pro_obj = utf8_encode($row['pro_obj']);
			$data->com_obj = utf8_encode($row['com_obj']);
			$data->est_obj = utf8_encode($row['est_obj']);


			}else{

			$data->resultado = "0";


			}

			
	}
	echo json_encode($data);

}

?>