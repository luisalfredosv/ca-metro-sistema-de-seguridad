jQuery(document).ready(function($) {
	
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});
	
//document.oncontextmenu = function(){return false}; // Desabilita click derecho
	// Filtrar input
    $(".solo-numero").keyup(function (){
    this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    $(".letras").keyup(function () {
    this.value=(this.value + '').replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/g, '');
    });               
    $(".buscador").keyup(function () {
    this.value=(this.value + '').replace(/[^a-z0-9A-ZñÑáéíóúÁÉÍÓÚ\s]/g, '');
    }); 
    $(".placa").keyup(function() {
       $(this).val($(this).val().toUpperCase());
       this.value=(this.value + '').replace(/[^a-z0-9A-ZñÑáéíóúÁÉÍÓÚ-\s]/g, '');
    });
    // Fin de filtro  
/*	var today = new Date();           
	var formattedtoday = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
	$("#fec_reg").val(formattedtoday);*/

		  $( function() {
		    function log( message ) {
		      $( "<div>" ).text( message ).prependTo( "#log" );
		      $( "#log" ).scrollTop( 0 );
		    }
		 
		    $( "#con_cod_reg" ).autocomplete({
		      source: function( request, response ) {
		        $.ajax( {
		          url: "sql/s_reg_reg_equ.php",
		          dataType: "json",
		          data: {
		            term: request.term
		          },
		          success: function( data ) {
		            response( data );
		          }
		        } );
		      },
		      /*minLength: 2,*/
		      select: function( event, ui ) {
		        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
		      }
		    });
		  });

			$("#btnLimpiar").click(function(){
			Limpiar(Limpiar);
			});
			$("#Limpiar").click(function(){
			Limpiar(Limpiar);
			});
			$('#reload').click(function() {
			Limpiar(Limpiar);
			});
			function Limpiar(Limpiar) {
			//$("#reg_equ")[0].reset();
			location.reload();
			}

var res_cod_vis=$( "#cod_vis" ).val();    
  $( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#cod_vis" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "sql/s_vis_aut.php",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      /*minLength: 2,*/
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });
  });

		$("#ndb_obj").attr('disabled', 'true');
		$("#cat_obj").change(function(event) {
		var cat_obj = $("#cat_obj").val();
		if(cat_obj==1){
			$('#ndb_obj').removeAttr('disabled', 'false');
			$('#Buscar').removeAttr('disabled', 'false');
			}else{
				$('#ndb_obj').attr('disabled', 'true').val("");
				$('#Buscar').attr('disabled', 'true');
				$('#nom_obj').removeAttr('disabled', 'false');
				$('#ser_obj').removeAttr('disabled', 'false');
				$('#mar_obj').removeAttr('disabled', 'false');
				$('#mod_obj').removeAttr('disabled', 'false');
				$('#des_obj').removeAttr('disabled', 'false');
				$('#pro_obj').removeAttr('disabled', 'false');
				$('#com_obj').removeAttr('disabled', 'false');
				$('#est_obj').removeAttr('disabled', 'false');
				}
		});
       
		$('#hor_reg').attr('disabled', 'true');
		$('#fec_reg').attr('disabled', 'true');
		$('#detsal').css('display', 'none');
		$("#ced_res").change(function() {
		buscar(buscar);	
		});
		$("#tip_per").change(function() {
		buscar(buscar);	
		});
		function buscar(buscar){					 // Buscar visitantes en varias bases de datos //
		var ced_res = $("#ced_res").val();
		var tip_per = $("#tip_per").val();

		if(ced_res!=""){
		      $.ajax({
		        url: 'sql/s_bus_emp.php',
		        type: 'POST',
		        dataType:'json',
		        data: {
		          ced_res:ced_res,tip_per:tip_per
		        }
		          }).done(function(data){
		   		var result = (data.result);
		   		var tip_per= (data.tip_per);
		   		var nom_ape =(data.nom_ape);
					if (result=="1") {
						$('#nya_res').val(data.nom_ape).attr('disabled', 'true');
		    		}else{
		    			$("#nya_res").val("").removeAttr('disabled');
		    		}
		      });
		    }
		}

		$(document).on('change', '#dhf', function() {
		    var dhf = document.getElementById("dhf").checked;
		        if(dhf==true){
		        $('#hor_reg').remove();
		        $('#fec_reg').remove();
		        $('#sfec').remove();
		        $('#shor').remove();
				$('#dfec').append('<div class="input-group"><input type="text" class="form-control" id="fec_reg" value="" placeholder="Fecha"/><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div>');
		        $('#dhor').append('<div class="input-group"><input type="text" class="form-control" id="hor_reg" value="" placeholder="Hora" style="z-index:1;"/><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span></div>');
			      $( "#fec_reg" ).datepicker({
			      minDate: -5, 
			      maxDate: +5,
			      dateFormat: 'dd-mm-yy' 
			      });

			      $('#hor_reg').timeEntry();	

				}else{
				window.location.reload();
				}
		});

		$('#tip_mov').change(function(event) {
		var tip_mov = $('#tip_mov').val();
		if (tip_mov=="2") {
		$('#horareg').css('display', 'none');
		$('#fechareg').css('display', 'none');
		$('#pro').removeClass('col-lg-2').addClass('col-lg-4')
		$('#numbien').removeClass('col-lg-2').addClass('col-lg-4')
		$('#Actualizar').attr('disabled', 'disabled');
		$('#detsal').css('display', 'block');
		}else{
		$('#detsal').css('display', 'none');
		$('#horareg').css('display', 'block');
		$('#fechareg').css('display', 'block');
		$('#pro').removeClass('col-lg-4').addClass('col-lg-2')
		$('#numbien').removeClass('col-lg-4').addClass('col-lg-2')
		$('#Actualizar').attr('disabled', 'disabled');
		}
		});

	$('#Guardar').click(function(){
			var error =0;
			if($('#cat_obj').val()==""){
			$('#cat_obj').css("border", "1px solid red"); var error=error+1;
			}else if($('#cat_obj').val()=="1"){
			
					if($('#ndb_obj').val()==""){
					$('#ndb_obj').css("border", "1px solid red"); var error=error+1;
					}else{
					var ndb_obj = $('#ndb_obj').val();
				}
			}
			var cat_obj = $('#cat_obj').val();
			if($('#cod_int').val()==""){
			$('#cod_int').css("border", "1px solid red"); var error=error+1;
			}else{
			var cod_int = $('#cod_int').val();
			}
			if($('#tip_mov').val()==""){
			$('#tip_mov').css("border", "1px solid red"); var error=error+1;
			}else{
			var tip_mov = $('#tip_mov').val();
			}
			if($('#tip_mov').val()=="2"){
				if($('#hor_sal').val()==""){
				$('#hor_sal').css("border", "1px solid red"); var er_act=er_act+1;
				}else{
				var hor_sal = $('#hor_sal').val();
				}
				if($('#fec_sal').val()==""){
				$('#fec_sal').css("border", "1px solid red"); var er_act=er_act+1;
				}else{
				var fec_sal = $('#fec_sal').val();
				}
				var com_sal = $('#com_sal').val();
			}else if($('#tip_mov').val()=="1"){
				if($('#hor_reg').val()==""){
				$('#hor_reg').css("border", "1px solid red"); var error=error+1;
				}else{
				var hor_reg = $('#hor_reg').val();
				}
				if($('#fec_reg').val()==""){
				$('#fec_reg').css("border", "1px solid red"); var error=error+1;
				}else{
				var fec_reg = $('#fec_reg').val();
				}
				var hor_sal ="";
				var fec_sal ="";
			}
			if($('#nom_obj').val()==""){
			$('#nom_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var nom_obj = $('#nom_obj').val();
			}
			if($('#dec_obj').val()==""){
			$('#dec_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var dec_obj = $('#dec_obj').val();
			}
			if($('#ser_obj').val()==""){
			$('#ser_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var ser_obj = $('#ser_obj').val();
			}
			if($('#mar_obj').val()==""){
			$('#mar_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var mar_obj = $('#mar_obj').val();
			}
			if($('#mod_obj').val()==""){
			$('#mod_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var mod_obj = $('#mod_obj').val();
			}
			if($('#res_obj').val()==""){
			$('#res_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var res_obj = $('#res_obj').val();
			}
			if($('#des_obj').val()==""){
			$('#des_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var des_obj = $('#des_obj').val();
			}
			if($('#pro_obj').val()==""){
			$('#pro_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var pro_obj = $('#pro_obj').val();
			}
			if($('#com_obj').val()==""){
			//$('#com_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var com_obj = $('#com_obj').val();
			}
			if($('#dst_obj').val()==""){
			$('#dst_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var dst_obj = $('#dst_obj').val();
			}
			if($('#tip_per').val()==""){
			$('#tip_per').css("border", "1px solid red"); var error=error+1;
			}else{
			var tip_per = $('#tip_per').val();
			}
			if($('#ced_res').val()==""){
			$('#ced_res').css("border", "1px solid red"); var error=error+1;
			}else{
			var ced_res = $('#ced_res').val();
			}
			if($('#nya_res').val()==""){
			$('#nya_res').css("border", "1px solid red"); var error=error+1;
			}else{
			var nya_res = $('#nya_res').val();
			}
			if($('#pro_obj').val()==""){
			$('#pro_obj').css("border", "1px solid red"); var error=error+1;
			}else{
			var pro_obj = $('#pro_obj').val();
			}
			if($('#cdv_int').val()==""){
			$('#cdv_int').css("border", "1px solid red"); var error=error+1;
			}else{
			var cdv_int = $('#cdv_int').val();
			}
			if($('#pro_res').val()==""){
			$('#pro_res').css("border", "1px solid red"); var error=error+1;
			}else{
			var pro_res = $('#pro_res').val();
			}
			if($('#dat_seg').val()==""){
			$('#dat_seg').css("border", "1px solid red"); var error=error+1;
			}else{
			var dat_seg = $('#dat_seg').val();
			}
			if($('#dat_seg').val()==""){
			$('#dat_seg').css("border", "1px solid red"); var error=error+1;
			}else{
			var dat_seg = $('#dat_seg').val();
			}

			

			if($('#cod_vis').val()==""){
			var cod_vis ="";
			}else{
			var cod_vis = $('#cod_vis').val();
			}

			/* CONSULTA DE CODIGO INTERNO  */
			if (error<=0) {
				 jQuery.post("sql/i_reg_equ.php", {
				ndb_obj:ndb_obj,
				nom_obj:nom_obj,
				cat_obj:cat_obj,
				dec_obj:dec_obj,
				ser_obj:ser_obj,
				mar_obj:mar_obj,
				mod_obj:mod_obj,
				des_obj:des_obj,
				com_obj:com_obj,
				tip_per:tip_per,
				ced_res:ced_res,
				nya_res:nya_res,
				pro_obj:pro_obj,
				dst_obj:dst_obj,
				fec_reg:fec_reg,
				hor_reg:hor_reg,
				cod_int:cod_int,
				cdv_int:cdv_int,
				pro_res:pro_res,
				dat_seg:dat_seg,
				tip_mov:tip_mov,
				com_sal:com_sal,
				cod_vis:cod_vis,
				hor_sal:hor_sal,
				fec_sal:fec_sal				

		            }, function(data, textStatus){
			if(data == 1){
				swal("Mensaje", "Datos guardatos correctamente!", "success",{
				button: false,
				});
				setTimeout(' window.location.href = "reg_con_equ.php"; ',2000);

			}else if (data== 2) {
				swal("Error", "No se pudo guardar!", "error",{
				button: false,
				});
			}else if (data== 3) {
				swal ( "Error" ,  "Disculpe, no se puede guardar su registro porque ud no pertenece a la Gerencia de Seguridad!" ,  "error" ,{
	            button: false,
	            });
			}
			        });
		}else{
		swal("Mensaje", "No se pudo guardar.! haz dejado "+error+" campos vacios!", "error",{
		button: false,
		});	
		}
    });

		$('#ser_obj').blur(function(event){
		var cat_obj = $("#cat_obj").val();
		if (cat_obj!="1" && cat_obj!="") {
		var ser_obj = $('#ser_obj').val();
		if(ser_obj!=""){
		var ser ="ser";
		var cat = $('#cat_obj').val();
		      $.ajax({
		        url: 'sql/s_ser_obj.php',
		        type: 'POST',
		        dataType:'json',
		        data: {
		        	ser:ser,ser_obj:ser_obj,cat:cat
		        }
		              }).done(function(data){
		            var resultado=(data.resultado);
		            if(resultado=="1"){
					$('#nom_obj').val(data.nom_obj).attr('disabled', 'true');
					$('#cod_int').val(data.cod_int).attr('disabled', 'true');
					$('#ser_obj').val(data.ser_obj);
					$('#mar_obj').val(data.mar_obj).attr('disabled', 'true');
					$('#mod_obj').val(data.mod_obj).attr('disabled', 'true');
					$('#des_obj').val(data.des_obj).attr('disabled', 'true');
					$('#pro_obj').val(data.pro_obj).attr('disabled', 'true');
					$('#com_obj').val(data.com_obj).attr('disabled', 'true');
					$('#est_obj').val(data.est_obj).attr('disabled', 'true');
					}else if(resultado=="0"){
					$('#nom_obj').val(data.nom_obj).removeAttr('disabled', 'false');
					$('#cod_int').val(data.cod_int).attr('disabled', 'true');
					//$('#ser_obj').val(data.ser_obj);
					$('#mar_obj').val(data.mar_obj).removeAttr('disabled', 'false');
					$('#mod_obj').val(data.mod_obj).removeAttr('disabled', 'false');
					$('#des_obj').val(data.des_obj).removeAttr('disabled', 'false');
					$('#pro_obj').val(data.pro_obj).removeAttr('disabled', 'false');
					$('#com_obj').val(data.com_obj).removeAttr('disabled', 'false');
					$('#est_obj').val(data.est_obj).removeAttr('disabled', 'false');	
					}else if(resultado=="88"){
							swal ( "Error" ,  "No se puede registrar el equipo de serial N° "+ser_obj+", porque alguien lo tiene registrado! " ,  "error" ,{
							button: false,
							});
							$('#ser_obj').val("");
					}
				});
		    }
		   }
		});

		$("#ndb_obj").blur(function() {
		bndb(bndb);
		});

		function bndb(bndb){
		var ndb_obj = $('#ndb_obj').val();
		var cat = $('#cat_obj').val();
		if(ndb_obj!=""){
		      $.ajax({
		        url: 'sql/s_bus_ndb.php',
		        type: 'POST',
		        dataType:'json',
		        data: {
		          		ndb_obj:ndb_obj,cat:cat
		        }
		              }).done(function(data){
		              	var result = (data.result);
						if (result==1) {
							$('#nom_obj').val(data.nom_obj).attr('disabled', 'true');
							$('#cod_int').val(data.cod_int).attr('disabled', 'true');
							$('#ser_obj').val(data.ser_obj).attr('disabled', 'true');
							$('#mar_obj').val(data.mar_obj).attr('disabled', 'true');
							$('#mod_obj').val(data.mod_obj).attr('disabled', 'true');
							$('#des_obj').val(data.des_obj).attr('disabled', 'true');
							$('#pro_obj').val(data.pro_obj).attr('disabled', 'true');
							$('#com_obj').val(data.com_obj).attr('disabled', 'true');
							$('#est_obj').val(data.est_obj).attr('disabled', 'true');
						}else if(result==2){
							$('#nom_obj').val("").removeAttr('disabled', 'false');
							$('#cod_int').val("").attr('disabled', 'disabled');
							$('#ser_obj').val("").removeAttr('disabled', 'false');
							$('#mar_obj').val("").removeAttr('disabled', 'false');
							$('#mod_obj').val("").removeAttr('disabled', 'false');
							$('#des_obj').val("").removeAttr('disabled', 'false');
							$('#pro_obj').val("").removeAttr('disabled', 'false');
							$('#com_obj').val("").removeAttr('disabled', 'false');
							$('#est_obj').val("").removeAttr('disabled', 'false');
						}else if(result==88) {
							swal ( "Error" ,  "No se puede registrar el bien N° "+ndb_obj+", porque alguien lo tiene registrado! " ,  "error" ,{
							button: false,
							});
							$('#ndb_obj').val("");
						}else if(result==55) {
						//alert("No existe este equipo");
						}
		      });
		    }
		}

	$('#ced_res').blur(function(event){
		codigos();
	});
	function codigos() {
	
	var ced_res = $('#ced_res').val();
	var cod_int = $('#cod_int').val();
	if(ced_res!=""){
	var cod ="cod";
	      $.ajax({
	        url: 'sql/s_cdr_int.php',
	        type: 'POST',
	        dataType:'json',
	        data: {
	        	cod:cod,cod_int:cod_int
	        }
	              }).done(function(data){
			$('#cdv_int').val(data.cdv_int);
			var cod_int=(data.cdv_int);
			if (cod_int!="") {
				$('#cod_int').val(data.cod_int);
			}
	      });
	    }
	}

$("#btnBuscar").click(function(event) {
$('#reg_equ')[0].reset();
$('#detsal').css('display', 'block');

var con_cod_reg = $('#con_cod_reg').val();
if(con_cod_reg!=""){
      $.ajax({
        url: 'sql/s_bus_equ.php',
        type: 'POST',
        dataType:'json',
        data: {
          		con_cod_reg:con_cod_reg
        }
              }).done(function(data){
              	var result = (data.result);

				if (result=="1") {
				$('#mov').remove();
				$('#pro').removeClass('col-lg-2').addClass('col-lg-4')
				$("#btnBuscar").attr('disabled', 'disabled');
				$("#Guardar").attr('disabled', 'disabled');
				$("#con_cod_reg").attr('disabled', 'disabled');
				var ent_obj = (data.ent_obj);
              	var sal_obj = (data.sal_obj);
              	$("#dhf").attr("disabled", "true");

				if (ent_obj=="1" && sal_obj=="0") {
					$('#Actualizar').removeAttr('disabled');
					$('#msjalter').remove();
					$('#alert').append('<div class="alert alert-danger" id="msjalter"><strong>Alerta!</strong> Sin registro de salida</div>');
					$('#fec_reg').remove();
					$('#hor_reg').remove();
					$('#shor').remove();				
					$('#sfec').remove();
					$('#if').remove();
					$('#ih').remove();
					$('#dhor').append('<div class="input-group"><input type="text" class="form-control" id="hor_reg"  placeholder="Introduce la hora correspondiente"><span class="input-group-addon" id="shor"><i class="glyphicon glyphicon-time" id="ih"></i></span></div>');
					$('#dfec').append('<div class="input-group"><input type="text" class="form-control" id="fec_reg"  placeholder="Introduce la fecha correspondiente"><span class="input-group-addon" id="sfec"><i class="glyphicon glyphicon-calendar" id="if"></i></span></div>');
					$('#com_sal').val(data.coment_sal);
					$('#fec_reg').val(data.fec_reg).attr('disabled', 'disabled');	
					$('#hor_reg').val(data.hor_reg).attr('disabled', 'disabled');
					$('#fec_reg').val(data.fec_reg).attr('disabled', 'disabled');
					$('#com_sal').val(data.coment_sal);
				}else if(ent_obj=="1" && sal_obj=="1"){
					$("#dhfas").attr("disabled", "true");
					$("#Actualizar").attr("disabled", "true");
					$('#fec_reg').remove();
					$('#hor_reg').remove();
					$('#shor').remove();				
					$('#sfec').remove();
					$('#if').remove();
					$('#ih').remove();
					$('#dhor').append('<div class="input-group"><input type="text" class="form-control" id="hor_reg"  placeholder="Introduce la hora correspondiente"><span class="input-group-addon" id="shor"><i class="glyphicon glyphicon-time" id="ih"></i></span></div>');
					$('#dfec').append('<div class="input-group"><input type="text" class="form-control" id="fec_reg"  placeholder="Introduce la fecha correspondiente"><span class="input-group-addon" id="sfec"><i class="glyphicon glyphicon-calendar" id="if"></i></span></div>');
					$('#msjalter').remove();
					$('#alert').append('<div class="alert alert-success" id="msjalter"><strong>Mensaje!</strong> con registro de salida</div>');
					$('#hor_sal').remove();
					$('#shsal').remove();
					$('#fec_sal').remove();
					$('#sfes').remove();
					$('#hsal').append('<input type="text" class="form-control" id="hor_sal" ><span class="input-group-addon" id="shsal"><i class="glyphicon glyphicon-time"></i></span>');
					$('#fsal').append('<input type="text" class="form-control" id="fec_sal" ><span class="input-group-addon" id="sfes"><i class="glyphicon glyphicon-calendar"></i></span>');
					$('#hor_sal').val(data.hor_sal).attr('disabled', 'disabled');
					$('#hor_reg').val(data.hor_reg).attr('disabled', 'disabled');
					$('#fec_sal').val(data.fec_sal).attr('disabled', 'disabled');
					$('#com_sal').val(data.coment_sal).attr('disabled', 'disabled');
					$('#fec_reg').val(data.fec_reg).attr('disabled', 'disabled');	
					$('#com_sal').val(data.coment_sal).attr('disabled', 'disabled');
					$('#fec_reg').val(data.fec_reg).attr('disabled', 'disabled');
				}else if(ent_obj=="0" && sal_obj=="2"){
					$('#Guardar').remove();
					$('#botones').append('<button type="button" class="btn btn-primary" id="save_ent">Guardar</button>');
					


					$('#dhf').removeAttr('disabled');
					$('#save_ent').removeClass('save_ent');
					$('#msjalter').remove();
					$('#alert').append('<div class="alert alert-warning" id="msjalter"><strong>Alerta!</strong> "Este es un registro de salida", Que no tiene una entrada! </div>');


					$('#hor_sal').remove();
					$('#shsal').remove();
					$('#fec_sal').remove();
					$('#sfes').remove();
					$('#hsal').append('<input type="text" class="form-control" id="hor_sal" ><span class="input-group-addon" id="shsal"><i class="glyphicon glyphicon-time"></i></span>');
					$('#fsal').append('<input type="text" class="form-control" id="fec_sal" ><span class="input-group-addon" id="sfes"><i class="glyphicon glyphicon-calendar"></i></span>');

					$('#hor_sal').val(data.hor_sal).attr('disabled', 'disabled');
					$('#fec_sal').val(data.fec_sal).attr('disabled', 'disabled');
					$('#com_sal').val(data.coment_sal).attr('disabled', 'disabled');





				}else if(ent_obj=="1" && sal_obj=="2"){

					$('#Guardar').remove();
					$('#botones').append('<button type="button" class="btn btn-primary" id="save_ent">Guardar</button>');
					

					$('#dhf').attr('disabled', 'disabled');
					$('#dhfas').attr('disabled', 'disabled');
					$('#save_ent').attr('disabled', 'disabled');
					
					$('#save_ent').removeClass('save_ent');
					$('#msjalter').remove();
					$('#alert').append('<div class="alert alert-success" id="msjalter"><strong>Mensaje!</strong> "Este es un registro de salida" y ya tiene una entrada ! </div>');


					$('#hor_sal').remove();
					$('#shsal').remove();
					$('#fec_sal').remove();
					$('#sfes').remove();
					$('#hsal').append('<input type="text" class="form-control" id="hor_sal" ><span class="input-group-addon" id="shsal"><i class="glyphicon glyphicon-time"></i></span>');
					$('#fsal').append('<input type="text" class="form-control" id="fec_sal" ><span class="input-group-addon" id="sfes"><i class="glyphicon glyphicon-calendar"></i></span>');

					$('#hor_sal').val(data.hor_sal).attr('disabled', 'disabled');
					$('#fec_sal').val(data.fec_sal).attr('disabled', 'disabled');

					$('#fec_reg').remove();
					$('#hor_reg').remove();
					$('#shor').remove();				
					$('#sfec').remove();
					$('#if').remove();
					$('#ih').remove();
					$('#dhor').append('<div class="input-group"><input type="text" class="form-control" id="hor_reg"  placeholder="Introduce la hora correspondiente"><span class="input-group-addon" id="shor"><i class="glyphicon glyphicon-time" id="ih"></i></span></div>');
					$('#dfec').append('<div class="input-group"><input type="text" class="form-control" id="fec_reg"  placeholder="Introduce la fecha correspondiente"><span class="input-group-addon" id="sfec"><i class="glyphicon glyphicon-calendar" id="if"></i></span></div>');
					
					$('#hor_reg').val(data.hor_reg).attr('disabled', 'disabled');
					$('#fec_reg').val(data.fec_reg).attr('disabled', 'disabled');
					$('#cod_vis').val(data.cod_vis).attr('disabled', 'disabled');
					$('#com_sal').val(data.coment_sal).attr('disabled', 'disabled');
					$('#fec_reg').val(data.fec_reg).attr('disabled', 'disabled');
					
				}else{
					swal ( "Error" ,  "Algo salio mal en la consulta, Se han desabilitado los botones" ,  "error" ,{
					button: false,
					});
					$('#Guardar').attr('disabled', 'disabled');
					$('#Actualizar').attr('disabled', 'disabled');
				}			
				$('#tip_mov').val(data.ent_obj).attr('disabled', 'disabled');
				$('#cdv_int').val(data.cdv_int).attr('disabled', 'disabled');
				$('#cod_int').val(data.cod_int).attr('disabled', 'disabled');
				$('#ced_res').val(data.ced_res).attr('disabled', 'disabled');
				$('#nya_res').val(data.nya_res).attr('disabled', 'disabled');
				$('#tip_per').val(data.tip_per).attr('disabled', 'disabled');
				$('#pro_res').val(data.pro_res).attr('disabled', 'disabled');
				$('#dst_obj').val(data.dst_obj).attr('disabled', 'disabled');
				
						
				$('#est_obj').val(data.est_obj).attr('disabled', 'disabled');
				$('#cat_obj').val(data.cat_obj).attr('disabled', 'disabled');
				$('#ser_obj').val(data.ser_obj).attr('disabled', 'disabled');
				$('#mar_obj').val(data.mar_obj).attr('disabled', 'disabled');
				$('#mod_obj').val(data.mod_obj).attr('disabled', 'disabled');
				$('#ndb_obj').val(data.ndb_obj).attr('disabled', 'disabled');
				$('#des_obj').val(data.des_obj).attr('disabled', 'disabled');
				$('#pro_obj').val(data.pro_obj).attr('disabled', 'disabled');
				$('#nom_obj').val(data.nom_obj).attr('disabled', 'disabled');
				$('#com_obj').val(data.com_obj).attr('disabled', 'disabled');
				$('#hor_sal').val(data.hor_sal).attr('disabled', 'disabled');	
				

				
				

				}else{
					$('#msjalter').remove();
					swal ( "Error" ,  "No existen datos del código ingresado!" ,  "error" ,{
					button: false,
					});				
				}
      		});
    	}else{
		$('#msjalter').remove();
		swal ( "Error" ,  "Introduce el código del Responsable" ,  "error" ,{
		button: false,
		});	
    	}
});
		$('#hor_sal').attr('disabled', 'disabled');
		$('#fec_sal').attr('disabled', 'disabled');
		$('#Actualizar').attr('disabled', 'disabled');
		$('#hor_sal').timeEntry();

		$(document).on('change', '#dhfas', function() {
		    var dhfas = document.getElementById("dhfas").checked;
		        if(dhfas==true){
				$('#hor_sal').remove();
				$('#shsal').remove();
				$('#fec_sal').remove();
				$('#sfes').remove();
				$('#hsal').append('<input type="text" class="form-control" id="hor_sal" name=""><span class="input-group-addon" id="shsal"><i class="glyphicon glyphicon-time"></i></span>');
				$('#fsal').append('<input type="text" class="form-control" id="fec_sal" name=""><span class="input-group-addon" id="sfes"><i class="glyphicon glyphicon-calendar"></i></span>');
				$( "#fec_sal" ).datepicker({
				minDate: -5, 
				maxDate: +5,
				dateFormat: 'dd-mm-yy' 
				});
				$('#hor_sal').timeEntry();	
				}else{
				window.location.reload();
				}
		});

			$("#Actualizar").click(function(event) {
			var er_act=0;
			if($('#cdv_int').val()==""){
			$('#cdv_int').css("border", "1px solid red"); var er_act=er_act+1;
			}else{
			var cdv_int = $('#cdv_int').val();
			}
			if($('#hor_sal').val()==""){
			$('#hor_sal').css("border", "1px solid red"); var er_act=er_act+1;
			}else{
			var hor_sal = $('#hor_sal').val();
			}
			if($('#fec_sal').val()==""){
			$('#fec_sal').css("border", "1px solid red"); var er_act=er_act+1;
			}else{
			var fec_sal = $('#fec_sal').val();
			}
			var com_sal = $('#com_sal').val();
			if($('#dat_seg').val()==""){
			$('#dat_seg').css("border", "1px solid red"); var er_act=er_act+1;
			}else{
			var dat_seg = $('#dat_seg').val();
			}
			if (er_act<=0) {
				jQuery.post("sql/u_reg_equ.php", {
					cdv_int:cdv_int,
					hor_sal:hor_sal,
					fec_sal:fec_sal,
					com_sal:com_sal,
					dat_seg:dat_seg,
					cod_vis:cod_vis
					}, function(data, textStatus){
						if(data == 1){
							swal("Mensaje", "Datos Actualizados Correctamente!", "success",{
							button: false,
							});
							setTimeout(' window.location.href = "reg_con_equ.php"; ',2000);
						}else if (data== 2) {
							swal("Error", "No se pudo Actualizar!"+er_act, "error",{
							button: false,
							});
						}else if (data== 3) {
							swal ( "Error" ,  "Disculpe, no se puede guardar su registro porque ud no pertenece a la Gerencia de Seguridad!" ,  "error" ,{
							button: false,
							});
						}
					});
				}else{
					swal("Error", "Ocurrio "+er_act+" error, no deje campos vacios", "error",{
					button: false,
					});
				}
			});



		$('#save_ent').click(function(event) {
				var er_ent = 0;
				if($('#cdv_int').val()==""){
				$('#cdv_int').css("border", "1px solid red"); er_ent+1;
				}else{
				var cdv_int = $('#cdv_int').val();
				}
				if($('#hor_reg').val()==""){
				$('#hor_reg').css("border", "1px solid red"); er_ent+1;
				}else{
				var hor_reg = $('#hor_reg').val();
				}
				if($('#fec_reg').val()==""){
				$('#fec_reg').css("border", "1px solid red"); er_ent+1;
				}else{
				var fec_reg = $('#fec_reg').val();
				}
				if($('#dat_seg').val()==""){
				$('#dat_seg').css("border", "1px solid red"); er_ent+1;
				}else{
				var dat_seg = $('#dat_seg').val();
				}
				if($('#cod_vis').val()==""){
				var cod_vis ="";
				}else{
				var cod_vis = $('#cod_vis').val();
				}
				if (er_ent<=0) {
				jQuery.post("sql/u_reg_ent.php", {
				cdv_int:cdv_int,
				fec_reg:fec_reg,
				hor_reg:hor_reg,
				dat_seg:dat_seg,
				cod_vis:cod_vis
				}, function(data, textStatus){
					if(data == 1){
						swal("Mensaje", "Se ha registrado la entrada correctamente!", "success",{
						button: false,
						});
						setTimeout(' window.location.href = "reg_con_equ.php"; ',2000);

					}else if (data== 2) {
						swal("Error", "No se pudo registrar la entrada!", "error",{
						button: false,
						});
					}else if (data== 3) {
						swal ( "Error" ,  "Disculpe, no se puede guardar su registro porque ud no pertenece a la Gerencia de Seguridad!" ,  "error" ,{
			            button: false,
			            });
					}
			    });
			}else{
				swal("Mensaje", "No se pudo guardar.! haz dejado "+er_ent+" campos vacios!", "error",{
				button: false,
				});	
			}
	});

		$('#cod_vis').change(function(event){
		buscarV(buscarV);
		});


			var cod_vis = $('#cod_vis').val();
			var crct = cod_vis.length;

		 	if(crct>=13){
			buscarV(buscarV);
		 	}else{
				$('#nya_res').val("").removeAttr('disabled');
				$('#ced_res').val("").removeAttr('disabled');
				$('#tip_per').val("").removeAttr('disabled');
				$('#pro_res').val("").removeAttr('disabled');
			}


		function buscarV(buscarV) {	
			var cod_vis = $('#cod_vis').val();
		      $.ajax({
		        url: 'sql/s_bus_vis_equ.php',
		        type: 'POST',
		        dataType:'json',
		        data: {
		          		cod_vis:cod_vis
		        }
		              }).done(function(data){
			              	var result = (data.result);
			              	if(result == "5"){
								$('#nya_res').val(data.nom_ape).attr('disabled', 'disabled');
								$('#ced_res').val(data.cedula).attr('disabled', 'disabled');
								$('#tip_per').val(data.tip_per).attr('disabled', 'disabled');
								$('#pro_res').val(data.proc).attr('disabled', 'disabled');
								codigos();
							}else{
								$('#nya_res').val("").removeAttr('disabled');
								$('#ced_res').val("").removeAttr('disabled');
								$('#tip_per').val("").removeAttr('disabled');
								$('#pro_res').val("").removeAttr('disabled');
								$('#cod_vis').val("")
								err();

							}
		              	});
		    

	}



		function err() {
		swal ( "Error" ,  "Disculpe, el codigo de visitante no existe en los registros!" ,  "error" ,{
	    button: false,
	    });
		}

}); //FIN