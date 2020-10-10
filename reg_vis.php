<?php
   include("conect.php");
   header('Content-Type: text/html; charset="UTF-8"');
   //header('Content-Type: text/html; charset=ISO-8859-1');
   ?>
<html>
   <head>
      <link rel="stylesheet" href="css/jquery-ui.min.css">
      <link rel="stylesheet" href="css/jquery-ui.structure.css">
      <link rel="stylesheet" href="css/jquery-ui.theme.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="js/tm/jquery.timeentry.css">
      <link rel="stylesheet" href="css/estilos.css">
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/jquery-ui.js" type="text/javascript"></script>
      <script src="js/bootstrap.min.js" type="text/javascript"></script>
      <script src="js/tm/jquery.plugin.js" type="text/javascript"></script>
      <script src="js/tm/jquery.timeentry.js" type="text/javascript"></script>
      <script src="js/reloj.js" type="text/javascript"></script>
      <script src="js/sweetaler.min.js" type="text/javascript"></script>
      <script src="script/webcam.js" type="text/javascript"></script>
      <script src="script/reg_vis.js" type="text/javascript"></script>  

   </head>
   <?php
      $localtime = date("Y-m-d"); 
      $fecha_act=substr($localtime,8,2)."-".substr($localtime,5,2)."-".substr($localtime,0,4);
      ?>
   <title>Sistema de Control de Visitas
   </title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   </head>
   <body onload="mueveReloj()">
      <?php include('menu/menu.php');?>
      <img src="img/logo.png" alt="" style="padding-top:0%; padding-left:2%;">
      <div class="page-header" style="margin-top:-5%; padding-left: 11%;">
         <h1>Registrar Entrada de Visitante <small></small></h1>
      </div>
      <form class="" action="reg_vis.php" name="reg_vis" method="post" ENCTYPE="multipart/form-data" id="reg_vis">
         <div class="container">
            <h4 style="margin-left: 0.5%;">Datos del visitante</h4>
            <div class="checkbox">
               <label title="Si desactivas y vuelves a activar la fecha y hora automaticas se recargara la pagina" >
               <input type="checkbox" id="dhf" value="" name="dhf" >
               Desactivar hora y fecha automáticas del sistema!
               </label>
            </div>
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

                  <div class="btn-group" style="margin-left: 20px; ">       
                     <button type="button" class="btn btn-default" id="webcam">Camara
                     <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                     </button>      
                     <button type="button" class="btn btn-default" id="Capturar">Capturar</button>            
                     <button type="button" class="btn btn-default" id="Nueva">Nueva</button>
                  </div>
               </div>
               <div class="form-group col-lg-2">
                  <label for="sel1">Código de visita
                  </label>
                  <?php
                     $cod_vis =  isset($_REQUEST['cod_vis']) ?  $_REQUEST['cod_vis'] : NULL;
                     include ('sql/conectar.php');
                     $instruccion = "SELECT cod_vis FROM visitantes order by cod_vis desc";
                     $consulta = mysql_query ($instruccion);
                     $resultado=mysql_fetch_array($consulta);
                     $cod=$resultado['cod_vis'];
                     $cod = intval(preg_replace('/[^0-9]+/', '', $cod), 10); 
                     $cod=$cod+1;
                     $cod=str_pad($cod, 5, "0", STR_PAD_LEFT );
                     $cod_vis="VIS-MTV"."-".$cod;
                     ?>
                     <input type="text" class="cod_vis form-control" id="cod_vis" nombre="cod_vis" value="<?php echo "$cod_vis";?>" readonly>

               </div>
               <div  class="form-group col-lg-2">
                  <label for="usr">Fecha:
                  </label>
                  <div id="divf" class="input-group">  
                     <input type="text" class="form-control" id="fa" nombre="fa" value="<?php echo "$fecha_act";?>"  readonly >
                     <span class="input-group-addon" id="sf">
                     <i class="glyphicon glyphicon-calendar" id="gi"></i>
                     </span>
                  </div>
               </div>
               <div  class="form-group col-lg-2">
                  <label for="usr">Hora:
                  </label>
                  <div class="input-group bootstrap-timepicker timepicker" id="divbt">
                     <input type="text" class="form-control" name="reloj" size="10" id="ha" readonly>
                     <span class="input-group-addon" id="sh">
                     <i class="glyphicon glyphicon-time" id="gi"></i>
                     </span>
                  </div>
               </div>
               <div  class="form-group col-lg-2"> 
                  <label for="">Tipo de personal:               
                  </label>                 
                  <select  name="tip_per" class="form-control" id="tip_per" autofocus>                  
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
                  <select  name="vehiculo" class="form-control" id="vehiculo" class="vehiculo"> 
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
$cod_vis = base64_encode($cod_vis);
?>
<a href="reg_con_equ.php?c=<?php echo $cod_vis ?>" target="_blank" title="Para registrar un equipo al visitante primero registra la visita y luego el botón se activará y podrás realizar el registro de equipos.." disabled><button type="button" id="reg_equ"  class="btn btn-primary" disabled>Registrar</button></a>

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
               <button type="button" class="btn btn-danger" id="btnLimpiarde" style="height: 29px;">Borrar
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
          </div></div>
            <!-- <td>
               <label for="sel1">N&#176;</label>
               </td> -->
            <div id="itdf"></div>
      </form>
      </div>
      <div class="form-group" align="center">
         <div class="btn-group" id="btn">           
            <button type="button" class="btn btn-default" id="Guardar">Guardar
            </button>        
            <button type="button" class="btn btn-danger" id="btnLimpiar">Limpiar
            </button>  
                
         </div>
      </div>
   </body>
</html>
