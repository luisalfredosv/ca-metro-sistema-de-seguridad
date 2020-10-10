<?php


include('conectar.php');
include('conectar_emp.php');
$res_cod_vis = $_POST['res_cod_vis'];
$query = "SELECT a.cod_vis, a.cedula, a.nom_ape, a.ced_emp, a.tip_vis, a.are_vis, a.fec_ent, a.hor_ent, a.hor_fv, a.fec_sal, a.hor_sal, a.obs_vis, a.ced_seg, a.carnet, a.proc, a.vehiculo, a.placa, a.marca, a.color, a.obs_veh, a.ent_cnt, a.tip_per,  b.cedula as cedulae, b.nombre as nombree , b.apellido as apellidoe, b.gerencia as gerenciae, c.cedula as cedulas, c.nombre as nombres, c.apellido as apellidos, c.gerencia as gerencias FROM si_visitantes.visitantes as a, empleados.empleado as b, empleados.empleado as c WHERE a.cod_vis LIKE '%$res_cod_vis%'  AND a.ced_emp=b.cedula AND a.ced_seg=c.cedula";


$consulta = mysql_query ($query);
//$row=mysql_fetch_array($consulta);

    if (mysql_num_rows($consulta)>0){

  $row=mysql_fetch_array($consulta);

$data = new stdClass();

$data->cedula  = $row['cedula'];
$data->nom_ape = utf8_encode($row['nom_ape']);
$data->dat_seg = $row['cedulas']." - ".utf8_encode($row['nombres'])." ".utf8_encode($row['apellidos'])." - ".utf8_encode($row['gerencias']);
$data->dat_emp = $row['cedulae']." - ".utf8_encode($row['nombree'])." ".utf8_encode($row['apellidoe'])." - ".utf8_encode($row['gerenciae']);
$data->nom_ape = utf8_encode($row['nom_ape']);
$data->proc    = utf8_encode($row['proc']);
$data->tip_vis = utf8_encode($row['tip_vis']);
$data->are_vis = utf8_encode($row['are_vis']);
//$data->hor_fv  = utf8_encode($row['hor_fv']);
$data->hor_ent = utf8_encode($row['hor_ent']);
//$data->hor_sal = utf8_encode($row['hor_sal']);
$data->obs_vis = utf8_encode($row['obs_vis']);

$fec_sal=$row['fec_sal'];
$fec_sal=substr($fec_sal,8,2)."-".substr($fec_sal,5,2)."-".substr($fec_sal,0,4);
$data->fec_sal = utf8_encode($fec_sal);

$fec_ent=$row['fec_ent'];
$fec_ent=substr($fec_ent,8,2)."-".substr($fec_ent,5,2)."-".substr($fec_ent,0,4);
$data->fec_ent = utf8_encode($fec_ent);
$data->cod_vis = utf8_encode($row['cod_vis']);

$data->carnet = utf8_encode($row['carnet']);
$data->vehiculo = utf8_encode($row['vehiculo']);
$data->placa = utf8_encode($row['placa']);
$data->marca = utf8_encode($row['marca']);
$data->color = utf8_encode($row['color']);
$data->obs_veh = utf8_encode($row['obs_veh']);
$data->hor_fv = utf8_encode($row['hor_fv']);
$data->hor_sal = utf8_encode($row['hor_sal']);
$data->fec_sal = utf8_encode($row['fec_sal']);
$data->ent_cnt = utf8_encode($row['ent_cnt']);
$data->tip_per = utf8_encode($row['tip_per']);

$data->res_cod_vis = utf8_encode($res_cod_vis);
$data->result = "1";

echo json_encode($data);

}else{
echo "5";

}

?>   

