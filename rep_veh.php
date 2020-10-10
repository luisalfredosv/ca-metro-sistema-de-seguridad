<?php include("conect.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Equipos</title>

<!--CSS-->    
<link rel="stylesheet" href="dttb/css/bootstrap.css">
<link rel="stylesheet" href="dttb/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="dttb/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="dttb/bootstrap.min.css.map">


</head>

<body>
    <?php include('menu/menu.php');?>
    <img src="img/logo.png" alt="" style="padding-top:0%; padding-left:2%;">
    <div class="page-header" style="margin-top:-5%; padding-left: 11%;"><h1>Reporte de Vehículos de Empleados<small></small></h1>      
  </div>

<!--     <div class="form-group col-lg-2" style="position: absolute; left: 150px; top: 210px; z-index: 1;" id="">
          
        <input type="text" class="form-control" id="" nombre="" placeholder="Fecha" >                          
    </div>  -->

 

<div class="col-md-12"> 
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 12px;" >
        <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombre y Apellido</th>
            <th>Sexo</th>
            <th>Gerencia</th>
            <th>Cargo</th>
            <th>Telf</th>
            <th>Vehículo</th>
            <th>Placa</th>
            <th>Color</th>
            <th>Marca</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        <tr>
            <th>Cédula</th>
            <th>Nombre y Apellido</th>
            <th>Sexo</th>
            <th>Gerencia</th>
            <th>Cargo</th>
            <th>Telf</th>
            <th>Vehículo</th>
            <th>Placa</th>
            <th>Color</th>
            <th>Marca</th>

        </tr>
        </tfoot>
    </table>        
</div>

<!-- Librerias datatables y js -->
<script src="dttb/js/jquery-1.10.2.js"></script>
<script src="dttb/js/jquery.dataTables.min.js"></script>
<script src="dttb/js/dataTables.bootstrap.min.js"></script>          
<script src="dttb/js/bootstrap.js"></script>

<!-- script ajax -->
<script src="dttb/js/con_rep_veh.js"></script>  

<!-- btn export -->
<script src="dttb/export/dataTables.buttons.min.js"></script>  
<script src="dttb/export/buttons.flash.min.js"></script> 
<script src="dttb/export/jszip.min.js"></script> 
<script src="dttb/export/pdfmake.min.js"></script> 
<script src="dttb/export/vfs_fonts.js"></script> 
<script src="dttb/export/buttons.html5.min.js"></script> 
<script src="dttb/export/buttons.print.min.js"></script> 


<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script> 

</body>
</html>
