<?php 
$cod = $_POST['cod'];
$cod_int = $_POST['cod_int'];
if ($cod="cod"){
	include ('conectar.php');
		$instruccion = "SELECT cdv_int FROM responsables_obj order by cdv_int desc";
		$consulta = mysql_query ($instruccion);
		$resultado=mysql_fetch_array($consulta);
		$cdv=$resultado['cdv_int'];
		$cdv = intval(preg_replace('/[^0-9]+/', '', $cdv), 10); 
		$cdv=$cdv+1;
		$cdv=str_pad($cdv, 5, "0", STR_PAD_LEFT );
		$cdv_int="CDR"."-".$cdv;


		$data = new stdClass();
		$data->cdv_int = utf8_encode($cdv_int);


if ($cod_int=="") {
		include ('conectar.php');
		$instruccion = "SELECT cod_int FROM responsables_obj order by cod_int desc";
		$consulta = mysql_query ($instruccion);
		$resultado=mysql_fetch_array($consulta);
		$cod=$resultado['cod_int'];
		$cod = intval(preg_replace('/[^0-9]+/', '', $cod), 10); 
		$cod=$cod+1;
		$cod=str_pad($cod, 5, "0", STR_PAD_LEFT );
		$cod_int="CDO"."-".$cod;
		
}

	}
$data->cod_int = utf8_encode($cod_int);
echo json_encode($data);
?>