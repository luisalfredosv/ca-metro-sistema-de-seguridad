
<?php
include('conectar.php');
include('conectar_emp.php');
$res_cod_vis = $_POST['res_cod_vis'];
$query = "SELECT a.cod_vis, a.cedula, a.nom_ape, a.ced_emp, a.tip_vis, a.are_vis, a.fec_ent, a.hor_ent, a.hor_fv, a.fec_sal, a.hor_sal, a.obs_vis, a.ced_seg, a.carnet, a.proc, a.vehiculo, a.placa, a.marca, a.color, a.obs_veh,  b.cedula as cedulae, b.nombre as nombree , b.apellido as apellidoe, b.gerencia as gerenciae, c.cedula as cedulas, c.nombre as nombres, c.apellido as apellidos, c.gerencia as gerencias FROM si_visitantes.visitantes as a, empleados.empleado as b, empleados.empleado as c WHERE a.cod_vis LIKE '%$res_cod_vis%'  AND a.ced_emp=b.cedula AND a.ced_seg=c.cedula";


$consulta = mysql_query ($query);
//$row=mysql_fetch_array($consulta);

    if (mysql_num_rows($consulta)>0){

  $row=mysql_fetch_array($consulta);

$data = new stdClass();

$data->nom_ape = utf8_encode($row['nom_ape']);
$data->proc    = utf8_encode($row['proc']);
$data->tip_vis = utf8_encode($row['tip_vis']);
$data->are_vis = utf8_encode($row['are_vis']);


echo json_encode($data);

}else{
echo "3";

}
?>   

