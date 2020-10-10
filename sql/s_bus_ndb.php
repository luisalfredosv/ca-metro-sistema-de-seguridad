<?php

$ndb_obj = $_POST['ndb_obj'];
$cat = $_POST['cat'];
include('conectar.php');
//include('conectar_emp.php');
//$ndb_obj = strlen($ndb_obj);
$ndb_obj = trim(substr('0000'.$ndb_obj,-4));
$data = new stdClass();

$verif ="SELECT a.cod_int, a.ent_obj, a.sal_obj, b.cod_int, b.ndb_obj 
FROM si_visitantes.responsables_obj as a, si_visitantes.objetos as b 
WHERE a.cod_int=b.cod_int AND a.ent_obj='1' AND a.sal_obj='0' AND b.ndb_obj='$ndb_obj' 
OR a.cod_int=b.cod_int AND a.ent_obj='0' AND a.sal_obj='2' AND b.ndb_obj='$ndb_obj' ";

$cons = mysql_query ($verif);
if (mysql_num_rows($cons)>0){ //ERROR EL EQUIPO LO TIENE ASIGNADO UN VISITANTE 
$data->result = 88;
}else{ // CONSULTA EL EQUIPO EN LA BD

	include('conectar.php');
	$query = "SELECT * FROM objetos WHERE ndb_obj='$ndb_obj' AND cat_obj='1' AND est_obj='1'";

	$consulta = mysql_query ($query);
	//$row=mysql_fetch_array($consulta);

	if (mysql_num_rows($consulta)>0){

	$row=mysql_fetch_array($consulta);
	$data->result = 1;
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

		$data->result = 0;
		include ('conectar.php');
		$instruccion = "SELECT cod_int FROM responsables_obj order by cod_int desc";
		$consulta = mysql_query ($instruccion);
		$resultado=mysql_fetch_array($consulta);
		$cod=$resultado['cod_int'];
		$cod = intval(preg_replace('/[^0-9]+/', '', $cod), 10); 
		$cod=$cod+1;
		$cod=str_pad($cod, 5, "0", STR_PAD_LEFT );
		$cod_int="CDO"."-".$cod;
		$data->cod_int = utf8_encode($cod_int);

	}

}



echo json_encode($data);

?>   

