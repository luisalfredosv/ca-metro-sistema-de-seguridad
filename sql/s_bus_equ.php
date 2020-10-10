<?php

include('conectar.php');
//include('conectar_emp.php');
$con_cod_reg = $_POST['con_cod_reg'];
$query = "SELECT a.nom_obj,a.cod_int,a.cat_obj,a.ser_obj,a.mar_obj,a.mod_obj,a.ndb_obj,a.des_obj,a.pro_obj,a.com_obj,a.est_obj,b.cdv_int,b.cod_int,b.ced_res,b.nya_res,b.tip_per,b.pro_res,b.ent_obj,b.sal_obj,b.dst_obj,b.hor_reg,b.fec_reg,b.cod_vis,b.hor_sal,b.fec_sal,b.fec_de_reg,b.fec_de_sal,b.ced_seg,b.est_obj,b.coment_sal FROM objetos as a, responsables_obj as b WHERE b.cod_int=a.cod_int AND b.cdv_int LIKE '%$con_cod_reg%'";

 

$consulta = mysql_query ($query);
$data = new stdClass();
if (mysql_num_rows($consulta)>0){
$row=mysql_fetch_array($consulta);

		$data->cdv_int =$row['cdv_int'];
		$data->cod_int = utf8_encode($row['cod_int']);
		$data->ced_res = utf8_encode($row['ced_res']);
		$data->nya_res = utf8_encode($row['nya_res']);
		$data->tip_per = utf8_encode($row['tip_per']);
		$data->pro_res = utf8_encode($row['pro_res']);

		$data->dst_obj = utf8_encode($row['dst_obj']);
		$data->hor_reg = utf8_encode($row['hor_reg']);

		$fec_reg=$row['fec_reg'];
		$fec_reg=substr($fec_reg,8,2)."-".substr($fec_reg,5,2)."-".substr($fec_reg,0,4);
		$data->fec_reg =  utf8_encode($fec_reg);

		$data->hor_sal = utf8_encode($row['hor_sal']);

		$fec_sal=$row['fec_sal'];
		$fec_sal=substr($fec_sal,8,2)."-".substr($fec_sal,5,2)."-".substr($fec_sal,0,4);
		$data->fec_sal =  utf8_encode($fec_sal);

		$data->est_obj = utf8_encode($row['est_obj']);
		$data->nom_obj = utf8_encode($row['nom_obj']);
		$data->cat_obj = utf8_encode($row['cat_obj']);
		$data->ser_obj = utf8_encode($row['ser_obj']);
		$data->mar_obj = utf8_encode($row['mar_obj']);
		$data->mod_obj = utf8_encode($row['mod_obj']);
		$data->ndb_obj = utf8_encode($row['ndb_obj']);
		$data->des_obj = utf8_encode($row['des_obj']);
		$data->pro_obj = utf8_encode($row['pro_obj']);
		$data->com_obj = utf8_encode($row['com_obj']);
		$data->cod_vis = utf8_encode($row['cod_vis']);





		$data->ent_obj = utf8_encode($row['ent_obj']);
		$data->sal_obj = utf8_encode($row['sal_obj']);

		$data->fec_de_reg = utf8_encode($row['fec_de_reg']);
		$data->fec_de_sal = utf8_encode($row['fec_de_sal']);
		$data->coment_sal = utf8_encode($row['coment_sal']);
		$data->ced_seg = utf8_encode($row['ced_seg']);

		$data->result = "1";


}else{
	
$data->result = "0";

}

echo json_encode($data);

?>   

