<?php
session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: app.php");
}

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control de acceso</title>
<link href="login/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="login/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="login/js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="login/js/validation.min.js"></script>
<link href="login/css/style.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="login/js/script.js"></script>
<script src="login/js/bootstrap.min.js"></script>
</head>

<body>
    
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
       <h3 style="color: #0B92D1;">Sistema de gestión de Visitantes &nbsp;<span class="glyphicon glyphicon-lock"></span></h3>
        <span class="" ></span>
        <hr>        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" style="height: 34px;"/>
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Contraseña" name="clave" id="clave" />
        </div>
       
     	<hr/>
        <h6 style="color: #000000" id="msj" align="center"></h6>
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login" style="width: 150px">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Iniciar sesión
			</button> 
        </div>  
      
      </form>

    </div>
    
</div>
<script>
var es_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
if(es_chrome){
}else{
$("#msj").html("Se recomienda usar Google Chrome");
}

</script>
    
</body>
</html>

