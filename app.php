<?php
include("conect.php");

header('Content-Type: text/html; charset="UTF-8"');
//header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
<head>

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<style>
  html { overflow:hidden; };
</style>
<title>Sistema de Control de Visitas</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php include('menu/menu.php');

include('sql/conectar.php');
include('sql/conectar_emp.php');


$query = "SELECT a.cod_vis, a.cedula, a.nom_ape, a.ced_emp, a.tip_vis, a.are_vis, a.fec_ent, a.hor_ent, a.hor_fv, a.fec_sal, a.hor_sal, a.obs_vis, a.ced_seg, a.carnet, a.proc, a.vehiculo, a.placa, a.marca, a.color, a.obs_veh,  b.cedula as cedulae, b.nombre as nombree , b.apellido as apellidoe, b.gerencia as gerenciae, c.cedula as cedulas, c.nombre as nombres, c.apellido as apellidos, c.gerencia as gerencias, d.cod_area, d.desc_area  FROM si_visitantes.visitantes as a, empleados.empleado as b, empleados.empleado as c, si_visitantes.areas2 as d WHERE a.ced_emp=b.cedula AND a.ced_seg=c.cedula AND fec_sal='0000-00-00' AND hor_sal=''  AND a.are_vis = d.cod_area";

$consulta = mysql_query ($query);
$cod_vis = isset($_REQUEST['cod_vis']) ? $_REQUEST['cod_vis'] : NULL;
$n = isset($_REQUEST['n']) ? $_REQUEST['n'] : NULL;
?>


<div class="row">
  <div class="col-lg-1">
    <img src="img/logo.png" >
  </div>
  <div class="col-lg-5">
    <div class="page-header"><h1>Monitor de Visitantes <small></small></h1>
    </div>
  </div>
</div>
<?php include("mon_vis.php"); ?>

<footer></footer>

</body>
</html>
