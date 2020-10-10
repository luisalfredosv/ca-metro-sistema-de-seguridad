<?php
   include("conect.php");
   header('Content-Type: text/html; charset="UTF-8"');
   //header('Content-Type: text/html; charset=ISO-8859-1');
   ?>
<html>
   <head>

      <link rel="stylesheet" href="css/bootstrap.css">



   </head>


   <title>Sistema de Control de Visitas
   </title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   </head>
   <body>
<?php include('menu/menu.php');?>
<div class="row">
  <div class="col-lg-1">
    <img src="img/logo.png" >
  </div>
  <div class="col-lg-5">
    <div class="page-header"><h1>Gestión de Usuarios <small></small></h1>
    </div>
  </div>
</div>

<form class="" action="gst_usr.php" name="gst_usr" method="post" ENCTYPE="multipart/form-data" id="gst_usr">
  <div class="container">
    <div class="row">


<div  class="form-group col-lg-4"> 


    <div class="input-group" >
      <input type="text" class="form-control solo-numero" placeholder="Buscar Responsable" id="buscar" nombre="buscar">
      <span class="input-group-btn">

      <button class="btn btn-primary" type="button" id="btnBuscar" style="height: 30px;">Buscar</button>
      <button class="btn btn-danger" type="button" id="btnLimpiar" style="height: 30px;">Limpiar</button>

      </span>
    </div>

 

<label for="">Cédula:
</label>  
<input type="text" class="form-control" id="ced_usr" nombre="ced_usr" >
     
<label for="">Nombres y Apellidos:
</label>  
<input type="text" class="form-control" id="nom_ape" nombre="nom_ape" >
   
<label for="">Gerencia:
</label>  
<select  name="gerencia" class="form-control" id="gerencia"></select> 

   
<label for="">Nivél:
</label>  
<select  name="niv_usr" class="form-control" id="niv_usr">
  <option value="0">- Seleccione -</option>
  <option value="1">Adminstrador</option>
  <option value="2">Gestor</option>
  <option value="3">Visualizador</option>
</select> 
   
<label for="">Nombre de usuario:
</label>  
<input type="text" class="form-control" id="nom_usr" nombre="nom_usr" >
    
<label for="">Contraseña:
</label>  
<input type="text" class="form-control" id="cont_usr" nombre="cont_usr" >
   
<label for="">Confirmar contraseña:
</label>  
<input type="text" class="form-control" id="conf_usr" nombre="conf_usr" >
</div> 
       
    </div>

                      
          <div class="btn-group" >                

            <button type="button" class="btn btn-success" id="" >Guardar</button>      
            <button type="button" class="btn btn-primary" id="">Actualizar</button>                          
            <button type="button" class="btn btn-danger" id="">Limpiar</button>   
            
                
                      
          </div>


  </div>
</form>

      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js" type="text/javascript"></script>
      <script src="js/sweetaler.min.js" type="text/javascript"></script>
      <script src="script/gst_usr.js" type="text/javascript"></script>


   </body>
</html>
