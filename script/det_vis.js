jQuery(document).ready(function($) {
  
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});
  
  var cod_vis = $('#cod_vis').val();
  if(cod_vis!=""){
      $.ajax({
        url: 'sql/s_det_con_vis.php',
        type: 'POST',
        dataType:'json',
        data: {
          cod_vis:cod_vis
        }
              }).done(function(data){
                var hor_fv =(data.hor_fv);
                var hor_sal =(data.hor_sal);
                var fec_sal =(data.fec_sal);

                if ((hor_sal=="") && (hor_fv=="") && (fec_sal=="00-00-0000")) {
                  $('#mensaje').append('<a href="#" id="menj" class="list-group-item list-group-item-danger">Sin registro de salida!</a>');
                  //$('#two').append('<div class="input-group"><input type="text" name="reloj" class="form-control" id="hor_sal"  placeholder="Introduce la hora correspondiente" disabled><span class="input-group-addon" id="gi2"><i class="glyphicon glyphicon-time" id="sf2"></i></span></div>');
                  $('#dhf').removeAttr("disabled");
                  $('#hor_fv').removeAttr('disabled');
                  $('#fec_sal').val(data.fec_sal).attr('disabled', 'true');
                  $('#sal').remove();


                }else{
                  
                  $('#mensaje').append('<a href="#" id="menj" class="list-group-item list-group-item-success">Con registro de salida!</a>');
                  //$('#two').append('<div class="input-group"><input type="text" name="" class="form-control" id="hor_sal"  placeholder="Introduce la hora correspondiente" disabled><span class="input-group-addon" id="gi2"><i class="glyphicon glyphicon-time" id="sf2"></i></span></div>');
                  $('#hor_sal').val(data.hor_sal).attr('disabled', 'true');
                  $('#hor_fv').attr('disabled', 'true');
                  $('#fec_sal').val(data.fec_sal).attr('disabled', 'true');
                }
                $('#dhf').attr('disabled', 'disabled' );

                $('#ci').val(data.cedula).attr('disabled', 'disabled');;
                $('#nyav').val(data.nom_ape).attr('disabled', 'disabled');;
                $('#dat_seg').val(data.dat_seg).attr('disabled', 'disabled');;
                $('#dat_emp').val(data.dat_emp).attr('disabled', 'disabled');;
                $('#proc').val(data.proc).attr('disabled', 'disabled');;
                $('#tdv').val(data.tip_vis).attr('disabled', 'disabled');;
                $('#area').val(data.are_vis).attr('disabled', 'disabled');;
                $('#datepicker').val(data.fec_sal).attr('disabled', 'disabled');;
                $('#hor_fv').val(data.hor_fv).attr('disabled', 'disabled');;
                $('#ha').val(data.hor_ent).attr('disabled', 'disabled');;
                $('#obs_vis').val(data.obs_vis).attr('disabled', 'disabled');;
                $('#fa').val(data.fec_ent).attr('disabled', 'disabled');;
                $('#hor_sal').val(data.hor_sal).attr('disabled', 'disabled');;
                $('#res_cod_vis').val(data.res_cod_vis).attr('disabled', 'disabled');;
                $('#cod_vis').val(data.cod_vis).attr('disabled', 'disabled');;
        				$('#carnet').val(data.carnet).attr('disabled', 'disabled');;
        				$('#vehiculo').val(data.vehiculo).attr('disabled', 'disabled');;
        				$('#placa').val(data.placa).attr('disabled', 'disabled');;
        				$('#marca').val(data.marca).attr('disabled', 'disabled');;
        				$('#color').val(data.color).attr('disabled', 'disabled');;
        				$('#obs_veh').val(data.obs_veh).attr('disabled', 'disabled');;
                $('#res_cod_vis').val(data.res_cod_vis).attr('disabled', 'disabled');;
                $('#hor_fv').val(data.hor_fv).attr('disabled', 'disabled');;
        
                var result= (data.result);


        				var cedula=(data.cedula);
        				var cod_vis=(data.cod_vis);

                var ent_cnt = (data.ent_cnt);
                if (ent_cnt = 1) {
                  $("#ent_cnt").attr('disabled', 'true').prop('checked', 'true');
                }
                
                // VALIDAR SI EXISTE LA FOTO //
                
        				document.getElementById("ced_foto").src = "fotos/"+cedula+".png"; 
                if(data == 5) {

                swal ( "Error" ,  "No existen datos del código ingresado!" ,  "error" ,{
                button: false,
                });

                }  

            });
      }else{

        swal ( "Error" ,  "Introduce el código del visitante" ,  "error" ,{
        button: false,
        });
    }

});




