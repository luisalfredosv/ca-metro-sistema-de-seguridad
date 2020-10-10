<?php
include("conect.php");
//header('Content-Type: text/html; charset="UTF-8"');
//header('Content-Type: text/html; charset=ISO-8859-1');
$localtime = date("Y-m-d"); 
$fecha_act=substr($localtime,8,2)."-".substr($localtime,5,2)."-".substr($localtime,0,4);
$fecha_act_sal=substr($localtime,8,2)."-".substr($localtime,5,2)."-".substr($localtime,0,4);


$cod_vis=isset($_REQUEST['c']) ?  $_REQUEST['c'] : NULL;

if (strpos($cod_vis, 'VIS-MTV') !== false) {
  $cod_vis=$cod_vis;  
}else{
  if ($cod_vis=="") { 
  }else{
    $cod_vis=base64_decode($cod_vis);
  }
}



?>
<html>
  <head>

<script>

  function wrapper(wrapper) {
    var now = new Date();    
    var months = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    var days = new Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    var date = now.getDate();
    var year = now.getFullYear();
    var month = now.getMonth();
    var day = now.getDay();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    m      = (hour > 12    )? m="P.M.": m="A.M.";
    hour   = ( hour > 12   )? hour-12: hour;
    hour   = ( hour < 10   )? "0"+  hour : hour;
    minute = ( minute < 10 )? "0"+  minute : minute;
    second = ( second < 10 )? "0"+  second : second;
    //var datetime = ''+days[day]+' '+months[month]+' '+date+' '+year+' '+ hour +':'+ minute +':'+ second;
    //$('#wrapper').html(datetime);
    var datetime =hour +':'+ minute +':'+ second+' '+m;    
    document.reg_equ.h_sal.value=datetime;
    setTimeout("wrapper()",1000)
    }

</script>
<style>
  .save_ent{
    display: none;
    visibility: hidden;
  }
</style>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/tm/jquery.timeentry.css">

    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script async defer src="script/reg_con_equ.js" type="text/javascript" charset="utf-8"></script>
    <script async defer src="js/jquery-ui.js" type="text/javascript" charset="utf-8"></script> 
    <script async defer src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/tm/jquery.plugin.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/tm/jquery.timeentry.js" type="text/javascript" charset="utf-8"></script> 
    <script async defer src="js/reloj3.js" type="text/javascript" charset="utf-8"></script>
    <script async defer src="js/sweetaler.min.js" type="text/javascript" charset="utf-8"></script>


<title>Sistema de Control de Visitas     
</title>    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">    
</head>   

<body onload="mueveReloj();wrapper();" id="body">
  <?php include('menu/menu.php');?>      
  <img src="img/logo.png" alt="" style="padding-top:0%; padding-left:2%;">      
  <div class="page-header" style="margin-top:-5%; padding-left: 11%;"><h1>Registrar Entrada/Salida Material<small></small></h1>      
  </div> 

<span id="liveclock" style="position:absolute;left:0;top:0;"></span>
<div class="container" >
  <div class="row col-lg-6">
    <div class="input-group" style="width: 400px">
      <input type="text" class="form-control solo-numero" placeholder="Buscar Responsable" id="con_cod_reg" nombre="con_cod_reg">
      <span class="input-group-btn">

      <button class="btn btn-primary" type="button" id="btnBuscar" style="height: 28px;">Buscar</button>
      <button class="btn btn-danger" type="button" id="btnLimpiar" style="height: 28px;">Limpiar</button>
      

      <button type="button" class="btn btn-default" id="reload" aria-label="Left Align">
      <span class="glyphicon glyphicon glyphicon-refresh" aria-hidden="true"></span>
      </button>
      </span>
    </div>
  </div>
</div> 



  <form class="" action="reg_equ.php" name="reg_equ" method="post" ENCTYPE="multipart/form-data" id="reg_equ" >        
    <div class="container"><h4>Datos del Material</h4>
 <div class="checkbox">
<label title="Si desactivas y vuelves a activar la fecha y hora automaticas se recargara la pagina" >
  <input type="checkbox" id="dhf" value="" name="dhf" >
  Desactivar hora y fecha automáticas del sistema!
</label>
</div>           
      <div class="row">
            <div class="form-group col-lg-2" id="mov">              
  <label for="">Movimiento:               
  </label>                 
  <select  name="tip_mov" class="form-control" id="tip_mov">                  
          <?php
        include ('sql/conectar.php');
         //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
        //echo "<option value=$tip_mov>- Seleccione -</option>";
         $sql="SELECT * FROM mov_obj order by id";
         //4.- EJECUTAR CONSULTA
         $resultado=mysql_query($sql);
         //echo"error:".mysql_error()."<br />\n";
         while ($filas=mysql_fetch_array($resultado))
         {
             if($mov_obj==$filas[0])
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

          <div class="form-group col-lg-2" id="pro">              
            <label for="">Propiedad de:                
            </label>                 
            <select  name="cat_obj" class="form-control" id="cat_obj">                  
<?php
                  include ('sql/conectar.php');
                   //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
                  echo "<option value=$cat_obj>- Seleccione -</option>";
                   $sql="SELECT * FROM cat_obj order by id";
                   //4.- EJECUTAR CONSULTA
                   $resultado=mysql_query($sql);
                   //echo"error:".mysql_error()."<br />\n";
                   while ($filas=mysql_fetch_array($resultado))
                   {
                       if($cat_obj==$filas[0])
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

          <div class="form-group col-lg-2" id="numbien">
            <label for="">N° de bien:               
            </label>    
              <input type="text" class="form-control solo-numero" id="ndb_obj" nombre="ndb_obj" >                          
            </div> 


                       
          <div  class="form-group col-lg-2" id="horareg" >              
            <label for="">Hora:               
            </label>  
            <div class="input-group " id="dhor">                 
            <input type="text" class="form-control" id="hor_reg" name="reloj" >
            <span class="input-group-addon" id="shor">
              <i class="glyphicon glyphicon-time" id="ih"></i></span> 

            </div>           
          </div>              
          <div class="form-group col-lg-2" id="fechareg">              
            <label for="">Fecha:               
            </label> 
            <div class="input-group " id="dfec">                
            <input type="text" class="form-control" id="fec_reg" name="fec_reg" value="<?php echo"$fecha_act"; ?>">
             <span class="input-group-addon" id="sfec">
              <i class="glyphicon glyphicon-calendar" id="if"></i></span>  

          </div>
        </div>  


          <div class="form-group col-lg-2">              
            <label for="">Codigo de Material:               
            </label>                 
            <input type="text" class="form-control" id="cod_int" name="cod_int" disabled>              
          </div>
            


            <div class="form-group col-lg-3"> 
                      
            <label for="">S/N:               
            </label> 
                   
            <input type="text" class="form-control placa" id="ser_obj" name="ser_obj" >               

          </div>  

          <div class="form-group col-lg-3" >              
            <label for="">Nombre:               
            </label>              
            <input type="text" class="form-control Letras" id="nom_obj" name="nom_obj" >              
          </div>   




            
            
          <div class="form-group col-lg-3">              
            <label for="">Marca:               
            </label>                 
            <input type="text" class="form-control Letras" id="mar_obj" name="mar_obj" >              
          </div>        

          <div class="form-group col-lg-3">              
            <label for="">Modelo:               
            </label>                 
            <input type="text" class="form-control placa" id="mod_obj" name="mod_obj" >              
          </div>                  
          
          <div class="form-group col-lg-4">              
            <label for="">Procedencia del Objeto:               
            </label>                 
            <input type="text" class="form-control Letras" id="pro_obj" name="pro_obj" >              
          </div> 


          <div class="form-group col-lg-3">              
            <label for="">Comentario sobre el objeto:               
            </label>                 
            <input type="text" class="form-control Letras" id="com_obj" name="com_obj" >              
          </div>              
          <div class="form-group col-lg-3">              
            <label for="">Descripción:               
            </label>                 
            <input type="text" class="form-control Letras" id="des_obj" name="des_obj" >              
          </div>          
          

          <div class="form-group col-lg-2">              
            <label for="">Cod Responsable:               
            </label>                 
            <input type="text" class="form-control" id="cdv_int" name="cdv_int" disabled>              
          </div>


           </div>
            <div class="row"><h4 style="margin-left: 15px;">Datos del Responsable</h4>
            
            <div class="form-group col-lg-3">              
            <label for="">Tipo de personal:               
            </label>                 
            <select  name="tip_per" class="form-control" id="tip_per">                  
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

          <div class="form-group col-lg-2">              
            <label for="">Codigo de Visitante:               
            </label>                 
            <input type="text" class="form-control Placa" id="cod_vis" name="cod_vis" value="<?php echo $cod_vis ?>" > 

          </div> 


            <div class="form-group col-lg-3">              
            <label for="">Cedula:               
            </label>                 
            <input type="text" class="form-control solo-numero" id="ced_res" name="ced_res" >              
            </div>





          <div class="form-group col-lg-4"> 
            <label for="">Nombre y Apellido:               
            </label>                 
            <input type="text" class="form-control Letras" id="nya_res" name="nya_res" > 

           </div> 

          <div class="form-group col-lg-3">              
            <label for="">Procedencia:               
            </label>                 
            <input type="text" class="form-control Letras" id="pro_res" name="pro_res" > 

          </div> 



            <div class="form-group col-lg-4">              
            <label for="">Destino:               
            </label>                 
<!--             <input type="text" class="form-control Letras" id="dst_obj" name="dst_obj" >   -->
            <select  name="dst_obj" class="form-control" id="dst_obj">


  


<?php
include ('sql/conectar.php');
 //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
echo "<option value=$dst_obj>- Seleccione -</option>";
 $sql="SELECT * FROM areas2 order by id";
 //4.- EJECUTAR CONSULTA
 $resultado=mysql_query($sql);
 //echo"error:".mysql_error()."<br />\n";
 while ($filas=mysql_fetch_array($resultado))
 {
     if($dst_obj==$filas[1])
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
         
<div class="row" id="detsal"><h4 style="margin-left: 15px;">Datos de Salida</h4>
 <div class="checkbox" style="margin-left: 15px;">
<label title="Si desactivas y vuelves a activar la fecha y hora automaticas se recargara la pagina" >
  <input type="checkbox" id="dhfas" value="" name="dhfas" >
  Desactivar hora y fecha automáticas del sistema!
</label>
</div>              

        <div  class="form-group col-lg-2" >              
            <label for="">Hora de Salida:               
            </label>  
            <div class="input-group " id="hsal">                 
            <input type="text" class="form-control" id="hor_sal" name="h_sal" >
            <span class="input-group-addon" id="shsal">
            <i class="glyphicon glyphicon-time"></i></span> 

            </div>           
        </div>              
        <div class="form-group col-lg-2">              
            <label for="">Fecha de Salida:               
            </label> 
            <div class="input-group " id="fsal">                
            <input type="text" class="form-control" id="fec_sal" name="fec_sal" value="<?php echo"$fecha_act_sal"; ?>">
            <span class="input-group-addon" id="sfes">
            <i class="glyphicon glyphicon-calendar"></i></span>  

            </div>
        </div>
        <div class="form-group col-lg-3">              
          <label for="">Comentario de Salida:               
          </label>                 
          <input type="text" class="form-control Letras" id="com_sal" name="com_sal" >              
        </div> 
        <div class="col-lg-5" id="alert">
                   
        </div>
          
</div>



        <div class="form-group" align="center">                  
          <div class="btn-group" >                
            <br>
            <button type="button" class="save_ent btn btn-primary" id="save_ent" >Guardar</button>      
            <button type="button" class="btn btn-default" id="Guardar">Guardar</button>
            <button type="button" class="btn btn-default" id="Actualizar">Actualizar</button>                          
            <button type="button" class="btn btn-danger" id="Limpiar">Limpiar</button>   
            
                
                      
          </div>
        </div> 


<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"></span>

  <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
  <strong>Informacion!</strong> El registro de equipos en este formulario es de entrada y salida verifique el movimiento antes de realizar cualquier registro y evite errores! <!-- <a href="con_equ.php">Registrar Salida</a> -->
</div>



      </div> 

<?php
$name=$_SESSION['user_name'];
$cedula=$_SESSION['user_cedula'];
$apellido=$_SESSION['user_apellido'];
$gerencia=$_SESSION['user_gerencia'];
?>

                <input type="hidden" class="form-control" id="dat_seg" nombre="dat_seg" readonly value="<?php echo"$cedula - $name $apellido - $gerencia"?>">     
    </form>   


  </body>
</html>
