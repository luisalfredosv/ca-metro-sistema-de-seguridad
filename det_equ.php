<?php include("conect.php"); 


$cod = isset($_GET['c']) ? $_GET['c'] : NULL;
$cod= base64_decode($cod);
?>

<html>
  <head>

</style>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/tm/jquery.timeentry.css">

    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script async defer src="js/jquery-ui.js" type="text/javascript" charset="utf-8"></script> 
    <script async defer src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script async defer src="js/sweetaler.min.js" type="text/javascript" charset="utf-8"></script>
    <script async defer src="script/det_equ.js" type="text/javascript" charset="utf-8"></script>


<title>Sistema de Control de Visitas     
</title>    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">    
</head>   

<body>
  <?php include('menu/menu.php');?>      
  <img src="img/logo.png" alt="" style="padding-top:0%; padding-left:2%;">      
  <div class="page-header" style="margin-top:-5%; padding-left: 11%;"><h1>Detalles de equipos<small></small></h1>   

  </div> 



  <form class="" action="det_equ.php" name="det_equ" method="post" ENCTYPE="multipart/form-data" id="det_equ" >        
    <div class="container"><h4>Datos del Material</h4>         
      <div class="row">

<input type="hidden" id="cod" value="<?php echo $cod ?>">

<div class="form-group col-lg-3" id="">              
<label for="">Propiedad de:                
</label>                 
<select  name="cat_obj" class="form-control" id="cat_obj" autofocus>                  
<?php
      include ('sql/conectar.php');
       //3.- ASIGNAR LA VARIABLE SQL EN PARTICULAR
      echo "<option value='0'>- Seleccione -</option>";
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

<div class="form-group col-lg-3" id="numbien">
<label for="">N° de bien:               
</label>    
<input type="text" class="form-control solo-numero" id="ndb_obj" nombre="ndb_obj" disabled>                          
</div> 


<div class="form-group col-lg-3">              
<label for="">Codigo de Material:               
</label>                 
<input type="text" class="form-control" id="cod_int" name="cod_int" disabled>              
</div>
</div>

<div class="row">
<div class="form-group col-lg-3"> 
<label for="">S/N:               
</label> 
<input type="text" class="form-control placa" id="ser_obj" name="ser_obj" disabled>               
</div>  

<div class="form-group col-lg-3" >              
<label for="">Nombre:               
</label>              
<input type="text" class="form-control Letras" id="nom_obj" name="nom_obj" disabled>              
</div>   
                   
<div class="form-group col-lg-3">              
<label for="">Marca:               
</label>                 
<input type="text" class="form-control Letras" id="mar_obj" name="mar_obj" disabled>              
</div>     
</div>

<div class="row">
<div class="form-group col-lg-3">              
<label for="">Modelo:               
</label>                 
<input type="text" class="form-control placa" id="mod_obj" name="mod_obj" disabled>              
</div>

<div class="form-group col-lg-3">              
<label for="">Procedencia del Objeto:               
</label>                 
<input type="text" class="form-control Letras" id="pro_obj" name="pro_obj" disabled>              
</div> 


<div class="form-group col-lg-3">              
<label for="">Comentario sobre el objeto:               
</label>                 
<input type="text" class="form-control Letras" id="com_obj" name="com_obj" disabled>              
</div>    
</div>
<div class="row">          
<div class="form-group col-lg-9">              
<label for="">Descripción:               
</label>                 
<input type="text" class="form-control Letras" id="des_obj" name="des_obj" disabled>              
</div>          
</div>

<div class="row">
<div class="form-group col-lg-6">        
<!-- <a href="rep_equ.php" class="btn btn-primary">Regresar</a> -->
<button class="btn btn-danger" id="limpiar">Limpiar</button>
</div>
</div>

<!-- nom_obj   cod_int   cat_obj   ser_obj   mar_obj   mod_obj   ndb_obj   des_obj   pro_obj   com_obj   est_obj -->



      </div>
    </form>   


  </body>
</html>
