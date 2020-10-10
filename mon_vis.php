
<div class="col-lg-3">
	<a href="reg_vis.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registrar Visita</a>
  <a href="app.php" class="btn btn-default">Actualizar</a>
</div>
<div class="col-md-12 ">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Panel de Visitantes</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                   <!--  <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button> -->
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list" style="font-size: 12px;">
                  <thead>
                    <tr>
                        <th>N°<em class="fa fa-cog"></em></th>
                        <th class="hidden-xs" width="90">Código</th>
                        <th>Nombre y Apellido</th>
                        <th>Destino</th>
                        <th width="90">Entrada</th>
                        <th>Registrado por:</th>
                        <th>Visita a:</th>
                        <th>Observación</th>
                        <th>Detalles</th>
                    </tr> 
                  </thead>
                    <tbody>
                      <tr>
<?php while( $row=mysql_fetch_array($consulta)){ 
$n=$n+1;
$fec_ent=$row['fec_ent'];
$fec_ent=substr($fec_ent,8,2)."-".substr($fec_ent,5,2)."-".substr($fec_ent,0,4);
$cod_vis=base64_encode($row['cod_vis']) ;
?>
            <tr>
                <td> <?php echo $n; ?> </td>
                <td> <?php echo $row['cod_vis']; ?> </td>
                <td> <?php echo $row['nom_ape']; ?> </td>
                <td> <?php echo utf8_encode($row['desc_area']); ?> </td>
                <td> <?php echo $fec_ent." ".$row['hor_ent']; ?> </td>
                <td> <?php echo utf8_encode($row['nombres'])." ".utf8_encode($row['apellidos']); ?> </td>
                <td> <?php echo utf8_encode($row['nombree'])." ".utf8_encode($row['apellidoe']); ?> </td>
                <td> <?php echo $row['obs_vis']; ?> </td>
                <td><a href="con_vis.php?c=<?php echo ("$cod_vis");?>" class="btn btn-primary">Detalles</a> </td>
            </tr>
<?php 
} 

if ($n<=0) {
$msj="No hay visitantes dentro de las instalaciones...";
}else{
$msj="Acá se muestran los visitantes que aún no han salido...";
}
?>
                    </tr>
                  </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-12"><?php echo $msj ?>
                  </div>
                </div>
              </div>
            </div>

</div>
