<?php 
$ser_obj=$_POST["ser_obj"];
$ndb_obj=$_POST["ndb_obj"];
$cat=$_POST["cat"];
$cod=$_POST["cod"];

if ($cod!="") {
include('conectar.php');
$query = "SELECT * FROM objetos WHERE cod_int='$cod'";
$consulta = mysql_query ($query);
//$row=mysql_fetch_array($consulta);
$data = new stdClass();
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
	$data->cat_obj = utf8_encode($row['cat_obj']);
}else{
	$data->result = 3;
} 

}else{
include('conectar.php');
$query = "SELECT * FROM objetos WHERE cat_obj='$cat' AND ndb_obj='$ndb_obj'";
$consulta = mysql_query ($query);
//$row=mysql_fetch_array($consulta);
$data = new stdClass();
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
	$data->cat_obj = utf8_encode($row['cat_obj']);
}else{
	$data->result = 3;
} 
}



echo json_encode($data);

?>