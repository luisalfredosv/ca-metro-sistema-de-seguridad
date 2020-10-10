
$('document').ready(function()
{ 
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			clave: {
			required: true,
			},
			usuario: {
            required: true,
            },
	   },
       messages:
	   {
            clave:{
                      required: "Por favor ingrese su contraseña"
                     },
            usuario: "Por favor ingrese su nombre de usuario",
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'login/login_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Verificando ...');
							},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-login").html('<img src="login/img/ajax-loader.gif"  /> &nbsp; Iniciando ...');
						setTimeout(' window.location.href = "././app.php"; ',500);
					}
					else{
									
						$("#error").fadeIn(1000, function(){						
				$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Iniciar sesión');
									});
					}
			  }
			});
				return false;
		}

});