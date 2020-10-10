<?php
include("conect.php");
header('Content-Type: text/html; charset="UTF-8"');
//header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
  <head>
    <style type="text/css" media="screen">#tabla1{ width: 50%; float: left; } #tabla2{ width: 50%; float: left; }   #tabla3{ width: 100%; float: left; } .borde{   border: red 1px dotted; }.one{ position: absolute ; left: 40%; top: 32%; z-index: 1; }.two{ position: absolute ; left: 40%; top: 32%; z-index: 2; }    #cam{ position: relative; width: 150px; height: 122px }.two{ position: absolute ; left: 40%; top: 32%; z-index: 2; }   .pie{ position: absolute; margin-top: 570px; margin-left: 36%; } .fail{border: 1px solid red} .ocultar { display: none; };  
    </style>
  
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="script/det_vis.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="js/sweetaler.min.js" type="text/javascript" charset="utf-8" async defer></script>
  
  </head>

    

<?php 
$cod_vis=$_GET['c'];
$cod_vis=base64_decode ($cod_vis);
?>
</head>

    
<?php
$localtime = date("Y-m-d"); 
$fecha_act=substr($localtime,8,2)."-".substr($localtime,5,2)."-".substr($localtime,0,4);
?>

    <title>Sistema de Control de Visitas
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
    <body>
      <?php include('menu/menu.php');?>
      <img src="img/logo.png" alt="" style="padding-top:0%; padding-left:2%;">
      <div class="page-header" style="margin-top:-5%; padding-left: 11%;">  <h1>Detalles de Visitante  <small></small></h1>
        
</div>
      </div>


<div class="container">
  <div class="row" >
    <div class="col-lg-3">
      <label for="usr">Buscar visitante:</label>
      <div class="input-group">
      <input type="text" class="form-control solo-numero" placeholder="Codigo de Visitante" id="res_cod_vis" nombre="res_cod_vis" autofocus>
        <span class="input-group-btn">
          <button class="btn btn-primary" type="button" id="btnBuscar" style="height: 30px;" disabled>Buscar</span></button> 
             <button type="button" class="btn btn-default" id="reload" aria-label="Left Align" style="height: 30px;" disabled>
              <span class="glyphicon glyphicon glyphicon-refresh" aria-hidden="true"></span></button>

        </span>
      </div>
    </div>
 


  <?php
$localtime = date("Y-m-d"); 
$fec_sal=substr($localtime,8,2)."-".substr($localtime,5,2)."-".substr($localtime,0,4);
?>                       
            
<form class="" action="con_vis.php" name="con_vis" method="post" ENCTYPE="multipart/form-data" id="con_vis">
          <div class="col-lg-2" id="one">
          <label for="usr">Hora de fin de visita:</label>
          <div class="input-group">
            <input type="text" class="form-control con_vis" id="hor_fv" name="hor_fv"  placeholder="Hora">
            <span class="input-group-addon" id="sf1">
                      <i class="glyphicon glyphicon-time" id="gi1"></i>
               </span> 
          </div>
          </div>


          <div class="col-lg-2" id="two">
          <label for="usr">Hora de salida:</label>
          <div class="input-group">
            <input type="text" class="form-control" name="reloj" id="hor_sal">
                <span class="input-group-addon" id="sf2">
                      <i class="glyphicon glyphicon-time" id="gi2"></i>
               </span>
          </div>
          </div>

          <div class="col-lg-2" id="tree">
          <label for="usr">Fecha de salida:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="fec_sal" name="" value="<?php echo $fec_sal ?>">
               <span class="input-group-addon" id="sf3">
                      <i class="glyphicon glyphicon-calendar" id="gi3"></i>
               </span>
            </div>
          </div> 
               
          <div class="col-lg-3" id="mensaje">
            
          </div>
          


    </div>
  </div>


  <hr>


    <div class="container" style="margin-top: -30px;">
      
        <div class="checkbox">
          <label>
            <input type="checkbox" id="dhf" value="" name="dhf" >
            Desactivar hora y fecha automáticas del sistema!
          </label>
        </div>  
        <h4 style="margin-left: 0.5%;">Datos del visitante</h4>



            <div class="row">
               <div  class="form-group col-lg-3">
                  <h6 style="float: right; margin-right:0% ;">Haz click en el boton "Camara" para activarla!</h6>
                  <!--<span class="glyphicon glyphicon-camera" aria-hidden="true" style="font-size: 3cm;  left:13%; top:40%;" ></span> -->
                  <div class="cam" id="cam">
                     <video id="video" class="one" width="150" height="122" autoplay="autoplay">
                     </video>
                     <canvas id="canvas" class="two" name="fichero" width="150" height="122" >
                     </canvas>
                     <!--  <img src="img/ft.jpg" alt="" width="" height=""> -->
                     <input name="hidden_data" id='hidden_data' type="hidden" />
                  </div>
                  <br>  
                  <br>
                  <br>  
                  <br>

                  <div class="btn-group" style="margin-left: 20px;">       
                     <button type="button" class="btn btn-default" id="webcam" disabled>Camara
                     <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                     </button>      
                     <button type="button" class="btn btn-default" id="Capturar" disabled>Capturar</button>            
                     <button type="button" class="btn btn-default" id="Nueva" disabled>Nueva</button>
                  </div>
               </div>
               <div class="form-group col-lg-2">
                  <label for="sel1">Código de visita
                  </label>
                  <?php
                     //$cod_vis =  isset($_REQUEST['cod_vis']) ?  $_REQUEST['cod_vis'] : NULL;
                     // include ('sql/conectar.php');
                     // $instruccion = "SELECT cod_vis FROM visitantes order by cod_vis desc";
                     // $consulta = mysql_query ($instruccion);
                     // $resultado=mysql_fetch_array($consulta);
                     // $cod=$resultado['cod_vis'];
                     // $cod = intval(preg_replace('/[^0-9]+/', '', $cod), 10); 
                     // $cod=$cod+1;
                     // $cod=str_pad($cod, 5, "0", STR_PAD_LEFT );
                     // $cod_vis="VIS-MTV"."-".$cod;
                     ?>
                     <input type="text" class="cod_vis form-control" id="cod_vis" nombre="cod_vis" value="<?php echo "$cod_vis";?>" readonly>

               </div>
               <div  class="form-group col-lg-2">
                  <label for="usr">Fecha:
                  </label>
                  <div id="divf" class="input-group">  
                     <input type="text" class="form-control" id="fa" nombre="fa" value=""  readonly >
                     <span class="input-group-addon" id="sf">
                     <i class="glyphicon glyphicon-calendar" id="gi"></i>
                     </span>
                  </div>
               </div>
               <div  class="form-group col-lg-2">
                  <label for="usr">Hora:
                  </label>
                  <div class="input-group bootstrap-timepicker timepicker" id="divbt">
                     <input type="text" class="form-control" name="" size="10" id="ha" readonly>
                     <span class="input-group-addon" id="sh">
                     <i class="glyphicon glyphicon-time" id="gi"></i>
                     </span>
                  </div>
               </div>
               <div  class="form-group col-lg-2"> 
                  <label for="">Tipo de personal:               
                  </label>                 
                  <select  name="tip_per" class="form-control" id="tip_per" disabled>                  
                  <?php
                     include ('sql/conectar.php');
                      //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
                     echo "<option value=$tip_per>- Seleccione -</option>";
                      $sql="SELECT * FROM tip_per order by id";
                      //4.- EJECUTAR CONSULTA
                      $resultado=mysql_query($sql);
                      //echo"error:".mysql_error()."<br />\n";
                      while ($filas=mysql_fetch_array($resultado))
                      {
                          if($tip_per==$filas[0])
                          {
                              $s="selected";
                          }
                          else
                          {
                              $s='';
                          }
                          echo "<option value=\"$filas[0]\" $s>$filas[1]</option>";
                      }
                                 ?>               
                  </select>
               </div>

               <div  class="form-group col-lg-2"> 
                  <label for="sel1">C.I:
                  </label>  
                  <input type="text" class="form-control solo-numero" id="ci" nombre="ci">  
               </div>
               <div  class="form-group col-lg-4">     
                  <label for="sel1">Nombres y Apellidos:
                  </label>  
                  <input type="text" class="form-control letras" id="nyav" nombre="nyav" >
               </div>
                <div  class="form-group col-lg-2">           
                  <label for="sel1">Tipo de visita
                  </label>
                  <select  name="tdv" class="form-control" id="tdv"> 
                  <?php
                     include ('sql/conectar.php');
                      //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
                     echo "<option value=$tdv>- Seleccione -</option>";
                      $sql="SELECT * FROM tdv order by id";
                      //4.- EJECUTAR CONSULTA
                      $resultado=mysql_query($sql);
                      //echo"error:".mysql_error()."<br />\n";
                      while ($filas=mysql_fetch_array($resultado))
                      {
                          if($tdv==$filas[1])
                          {
                              $s="selected";
                          }
                          else
                          {
                              $s='';
                          }
                          echo "<option value=\"$filas[1]\" $s>$filas[2]</option>";
                      }
                     ?>
                  </select>
               </div>


               <div id="divh" class="input-group">
               </div>
               <div  class="form-group col-lg-4"> 
                  <label for="sel1">Procedencia:
                  </label>  
                  <input type="text" class="form-control letras" id="proc" nombre="proc" > 
               </div>
               
               <div  class="form-group col-lg-2"> 
                  <label for="sel1">Carnet:
                  </label>
                  <select  name="carnet" class="form-control" id="carnet">
                  <?php
                     include ('sql/conectar.php');
                      //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
                     echo "<option value=$carnet>- Seleccione -</option>";
                      $sql="SELECT * FROM carnet WHERE estado='1' order by id";
                      //4.- EJECUTAR CONSULTA
                      $resultado=mysql_query($sql);
                      //echo"error:".mysql_error()."<br />\n";
                      while ($filas=mysql_fetch_array($resultado))
                      {
                          if($carnet==$filas[0])
                          {
                              $s="selected";
                          }
                          else
                          {
                              $s='';
                          }
                          echo "<option value=\"$filas[0]\" $s>$filas[1]</option>";
                      }
                     ?>
                  </select>
               </div>


               <div  class="form-group col-lg-2"> 
                  <label for="sel1">Vehículo:
                  </label>
                  <select  name="vehiculo" class="form-control" id="vehiculo" class="vehiculo" disabled> 
                  <?php
                     include ('sql/conectar.php');
                      //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
                     //echo "<option value=$vehiculo>- Seleccione -</option>";
                      $sql="SELECT * FROM vehiculo order by id";
                      //4.- EJECUTAR CONSULTA
                      $resultado=mysql_query($sql);
                      //echo"error:".mysql_error()."<br />\n";
                      while ($filas=mysql_fetch_array($resultado))
                      {
                          if($vehiculo==$filas[1])
                          {
                              $s="selected";
                          }
                          else
                          {
                              $s='';
                          }
                          echo "<option value=\"$filas[1]\" $s>$filas[2]</option>";
                      }
                     ?>
                  </select> 
               </div>
               <div  class="form-group col-lg-3"> 
                  <label for="usr">Placa:
                  </label>  
                  <input type="text" class="form-control" id="placa" nombre="placa" >
               </div>
               <div  class="form-group col-lg-3"> 
                  <label for="sel1">Marca:
                  </label>
                  <select  name="marca" class="form-control" id="marca">
                  <?php
                     include ('sql/conectar.php');
                      //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
                     echo "<option value=$marca>- Seleccione -</option>";
                      $sql="SELECT * FROM aut_mar order by id";
                      //4.- EJECUTAR CONSULTA
                      $resultado=mysql_query($sql);
                      //echo"error:".mysql_error()."<br />\n";
                      while ($filas=mysql_fetch_array($resultado))
                      {
                          if($marca==$filas[1])
                          {
                              $s="selected";
                          }
                          else
                          {
                              $s='';
                          }
                          echo "<option value=\"$filas[1]\" $s>$filas[2]</option>";
                      }
                     ?>
                  </select>
               </div>
               <div  class="form-group col-lg-2"> 
                  <label for="sel1">Color:
                  </label>
                  <input type="text" class="form-control letras" id="color" nombre="color"> 
               </div>
<div  class="form-group col-lg-3">
                    <label for="usr" >Registrar Equipos al visitante:
                  </label> <br>


<?php 
$cod_vis =  isset($_REQUEST['cod_vis']) ?  $_REQUEST['cod_vis'] : NULL;
?>
<!-- reg_con_equ.php?c=<?php echo $cod_vis ?>
 -->
<button type="button" id="reg_equ"  class="btn btn-primary" title="Para registrar un equipo al visitante primero registra la visita y luego el botón se activará y podrás realizar el registro de equipos.." disabled>Registrar</button>

</div>



               <div  class="form-group col-lg-4"> 
                  <label for="usr">Observación del Vehiculo:
                  </label>  
                  <input type="text" class="form-control buscador" id="obs_veh" nombre="obs_veh" > 
               </div>

               <div  class="form-group col-lg-4"> 
                  <label for="sel1">Area de visita:
                  </label>
                  <select  name="areas" class="form-control" id="area"> 
                  <?php
                     include ('sql/conectar.php');
                      //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
                     echo "<option value=$areas>- Seleccione -</option>";
                      $sql="SELECT * FROM areas order by id";
                      //4.- EJECUTAR CONSULTA
                      $resultado=mysql_query($sql);
                      //echo"error:".mysql_error()."<br />\n";
                      while ($filas=mysql_fetch_array($resultado))
                      {
                          if($areas==$filas[1])
                          {
                              $s="selected";
                          }
                          else
                          {
                              $s='';
                          }
                          echo "<option value=\"$filas[1]\" $s>$filas[2]</option>";
                      }
                     ?>
                  </select>
               </div>

            </div>





            <div  class="row">
            <div  class="form-group col-lg-11">
            <h4>Datos del solicitado por el visitante</h4>
            <label for="sel1">Nombre/Apellido/Cédula
            </label>    
            <div class="input-group">        
               <input type="text" class="form-control buscador" id="dat_emp" nombre="dat_emp" >      
               <span class="input-group-btn">          
               <button type="button" class="btn btn-danger" id="btnLimpiarde" style="height: 29px;" disabled>Borrar
               </button>      
               </span>    
            </div>
            <?php
               $name=$_SESSION['user_name'];
               $cedula=$_SESSION['user_cedula'];
               $apellido=$_SESSION['user_apellido'];
               $gerencia=$_SESSION['user_gerencia'];
               ?>
            <input type="hidden" class="form-control" id="dat_seg" nombre="dat_seg" readonly value="<?php echo"$cedula - $name $apellido - $gerencia"?>">
            <label for="sel1">Observación:
            </label>
            <input type="text" class="form-control" id="obs_vis" nombre="obs_vis" >
            <br>
           <div class="col-lg-5" style="margin-left: -1%;">
           <label >
            <input type="checkbox" id="ent_cnt" value="1" name="ent_cnt" >
           El visitante entregó el carnet?</label>
            
          </div>

          </div></div>
            <!-- <td>
               <label for="sel1">N&#176;</label>
               </td> -->
            <div id="itdf"></div>




      </form>
      </div>
        <div class="form-group" align="center">                  
          <div class="btn-group">              
 <a href="rep_vis.php" class="btn btn-primary">Regresar</a>           
        
            </div>    
        </div>
      
   </body>
</html>
