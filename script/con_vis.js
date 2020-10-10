jQuery(document).ready(function($) {

$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});

  
$("#vehiculo").change(function(event) {
  var vehiculo = $("#vehiculo").val();
   $("#marca").val("");
    $.ajax({
       url:"sql/select_marca.php",
       type:'POST',
       dataType:'json',
       data: {
              vehiculo:vehiculo
            },
       success: function(response)
       {
         $('#marca').html(response);
       }
    });
});
 

                $('#ci').attr('disabled', 'disabled');
                $('#nyav').attr('disabled', 'disabled');
                $('#dat_seg').attr('disabled', 'disabled');
                $('#dat_emp').attr('disabled', 'disabled');
                $('#proc').attr('disabled', 'disabled');
                $('#tdv').attr('disabled', 'disabled');
                $('#area').attr('disabled', 'disabled');
                $('#datepicker').attr('disabled', 'disabled');
                $('#ha').attr('disabled', 'disabled');
                $('#obs_vis').attr('disabled', 'disabled');
                $('#fa').attr('disabled', 'disabled');
                $('#cod_vis').attr('disabled', 'disabled');
                $('#carnet').attr('disabled', 'disabled');
                //$('#obs_veh').attr('disabled', 'disabled');
                $('#btnLimpiarde').attr('disabled', 'disabled');
                //$('#Actualizar').attr('disabled', 'disabled');
                $('#hor_sal').attr('disabled', 'disabled');
                $("#fec_sal" ).attr('disabled', 'disabled');

                $('#placa').attr('disabled', 'disabled' );
                $('#marca').attr('disabled', 'disabled' );
                $('#color').attr('disabled', 'disabled' );
                $('#obs_veh').attr('disabled', 'disabled' );

          $('#vehiculo').change(function (){  
            var vehiculo = $('#vehiculo').val();
            //alert("vehi"+vehiculo);
            if(vehiculo!=1){
                $("#placa").val("");
                $("#marca").val("");
                $("#color").val("");
                $("#obs_veh").val("");               

                $("#placa").removeAttr('disabled');
                $("#marca").removeAttr('disabled');
                $("#color").removeAttr('disabled');
                $("#obs_veh").removeAttr('disabled');


               
              }
              else{
                $('#placa').attr('disabled', 'disabled' );
                $('#marca').attr('disabled', 'disabled' );
                $('#color').attr('disabled', 'disabled' );
                $('#obs_veh').attr('disabled', 'disabled' );
              }
      });
                

$('#hor_fv').timeEntry();
//$('#hor_sal').timeEntry();
 
$( "#datepicker" ).datepicker({ 
minDate: -0, 
maxDate: +1,
dateFormat: 'dd-mm-yy' 
});

var res_cod_vis=$( "#res_cod_vis" ).val();    
  $( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#res_cod_vis" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "sql/s_reg_vis_dat.php",
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


        $("#placa").keyup(function() {
           $(this).val($(this).val().toUpperCase());
           this.value=(this.value + '').replace(/[^a-z0-9A-ZñÑáéíóúÁÉÍÓÚ-\s]/g, '');
        });
        // Fin de filtro


$(document).on('click', '#dhf', function() {
  $('#btnBuscar').attr('disabled', 'disabled');
      var dhf = document.getElementById("dhf").checked;
         
          if(dhf==true){

          $('#hor_fv').remove();
          $('#hor_sal').remove();
          $('#fec_sal').remove();
          $('#row').remove();
          $('#sf1').remove();
          $('#gi1').remove();
          $('#sf2').remove();
          $('#gi2').remove();
          $('#sf3').remove();
          $('#gi3').remove();

          $('#one').append('<div class="input-group"><input type="text" class="form-control" id="hor_fv"  placeholder="Hora"><span class="input-group-addon" id=""><i class="glyphicon glyphicon-time" id=""></i></span></div>');
          $('#two').append('<div class="input-group"><input type="text" class="form-control" id="hor_sal"  placeholder="Hora"><span class="input-group-addon" id=""><i class="glyphicon glyphicon-time" id=""></i></span></div>');
          $('#tree').append('<div class="input-group"><input type="text" class="form-control" id="fec_sal"  placeholder="Fecha"><span class="input-group-addon" id=""><i class="glyphicon glyphicon-calendar" id=""></i></span></div>');
        
          $('#hor_fv').timeEntry();
          $('#hor_sal').timeEntry();
          $("#fec_sal" ).removeAttr('disabled');
        /*  $("#fec_sal" ).datepicker({
          minDate: -5, 
          maxDate: +5,
          dateFormat: 'dd-mm-yy' 
          });*/


          //$('#dhf').attr('disabled', 'disabled');
       
          }else{
          window.location="con_vis.php";
          }


});


/*  var cod_vis = $('#cod_vis').val();
  if (cod_vis=="") {
    alert("val"+cod_vis);
    $('#Actualizar').attr('disabled', 'disabled');
  }
    */
 

$("#fec_sal" ).datepicker({
                minDate: -5, 
                maxDate: +5,
                dateFormat: 'dd-mm-yy' 
                });

var res_cod_vis = $('#res_cod_vis').val();

var cod_car = res_cod_vis.length;
if(cod_car="13"){
  buscar_vis();
}

$('#btnBuscar').click(function(){
  var res_cod_vis = $('#res_cod_vis').val();
  var cod_car = res_cod_vis.length;

if(cod_car="13"){
  buscar_vis();
}else{
  swal ( "Error" ,  "Introduce el código del visitante" ,  "error" ,{
    button: false,
    });
}


});


function buscar_vis(){
$("#con_vis")[0].reset();

var res_cod_vis = $('#res_cod_vis').val();
if(res_cod_vis!=""){
      $.ajax({
        url: 'sql/s_cons_vis.php',
        type: 'POST',
        dataType:'json',
        data: {
          res_cod_vis: res_cod_vis
        }
              }).done(function(data){
                if(data != 5) {
                  
                $("#btnBuscar").attr('disabled', 'disabled');
                $("#res_cod_vis").attr('disabled', 'disabled');
                
                $('#gi2').remove();
                $('#sf2').remove();
                $('#hor_sal').remove();
                $('#menj').remove();

                $('#ci').val(data.cedula);
                $('#nyav').val(data.nom_ape);
                $('#dat_seg').val(data.dat_seg);
                $('#dat_emp').val(data.dat_emp);
                $('#proc').val(data.proc);
                $('#tdv').val(data.tip_vis);
                $('#area').val(data.are_vis);
                $('#datepicker').val(data.fec_sal);
                $('#ha').val(data.hor_ent);
                $('#obs_vis').val(data.obs_vis);
                $('#fa').val(data.fec_ent);
                $('#tip_per').val(data.tip_per);
                $('#res_cod_vis').val(data.res_cod_vis);
                $('#cod_vis').val(data.cod_vis);
        				$('#carnet').val(data.carnet);
        				$('#vehiculo').val(data.vehiculo);
        				$('#placa').val(data.placa);
        				$('#marca').val(data.marca);
        				$('#color').val(data.color);
        				$('#obs_veh').val(data.obs_veh);
                $('#res_cod_vis').val(data.res_cod_vis);
                $('#hor_fv').val(data.hor_fv);
                
                var result= (data.result);
                $("#fec_sal" ).removeAttr('disabled');
                
                var fec_sal=(data.fec_sal);
                if (fec_sal=="0000-00-00"){
                }else{
                $('#fec_sal').val(data.fec_sal);
                }

                var hor_fv =(data.hor_fv);
                var hor_sal =(data.hor_sal);

                if ((hor_sal=="") && (hor_fv=="") && (fec_sal=="0000-00-00")) {
                  $('#mensaje').append('<a href="#" id="menj" class="list-group-item list-group-item-danger">Sin registro de salida!</a>');
                  $('#two').append('<div class="input-group"><input type="text" name="reloj" class="form-control" id="hor_sal"  placeholder="Introduce la hora correspondiente" disabled><span class="input-group-addon" id="gi2"><i class="glyphicon glyphicon-time" id="sf2"></i></span></div>');
                  $('#dhf').removeAttr("disabled");
                  $('#hor_fv').removeAttr('disabled');
                  $('#fec_sal').attr('disabled', 'true');
                  $("#reg_equ").removeAttr('disabled');
                  $("#reg_equ").removeAttr('disabled');
                  $("#Actualizar").removeAttr('disabled');

                }else{
                  $('#Actualizar').attr('disabled', 'disabled' );
                  $('#dhf').attr('disabled', 'disabled' );
                  $('#mensaje').append('<a href="#" id="menj" class="list-group-item list-group-item-success">Con registro de salida!</a>');
                  $('#two').append('<div class="input-group"><input type="text" name="" class="form-control" id="hor_sal"  placeholder="Introduce la hora correspondiente" disabled><span class="input-group-addon" id="gi2"><i class="glyphicon glyphicon-time" id="sf2"></i></span></div>');
                  $('#hor_sal').val(data.hor_sal).attr('disabled', 'true');
                  $('#hor_fv').attr('disabled', 'true');
                  $('#fec_sal').attr('disabled', 'true');
                  $("#ent_cnt").val(data.ent_cnt).attr('disabled', 'disabled');
                }

        				var cedula=(data.cedula);
        				var cod_vis=(data.cod_vis);

                
        				document.getElementById("ced_foto").src = "fotos/"+cedula+".png"; 

                }else if(data == 5){

            swal ( "Error" ,  "No existen datos del código ingresado!" ,  "error" ,{
            button: false,
            });

                  }  

              });
}


}

$('#Actualizar').click(function(){

        var dhf = document.getElementById("dhf").checked;
        if(dhf==true){
        met_act=1;
        }else{
        met_act=0;
        }

        var error =0;
          if($('#hor_fv').val()==""){error =1;
            $('#hor_fv').css("border", "1px solid red");

          }else{
            var hor_fv = $('#hor_fv').val();
          }

          if($('#hor_sal').val()==""){error =1;
            $('#hor_sal').css("border", "1px solid red");

          }else{
            var hor_sal = $('#hor_sal').val();
          }
 
          if($('#fec_sal').val()==""){error =1;
            $('#fec_sal').css("border", "1px solid red");



          }else{
            var fec_sal = $('#fec_sal').val();
          }

          if($('#obs_veh').val()==""){
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var obs_veh = $('#obs_veh').val();
          }

          if($('#vehiculo').val()==""){
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var vehiculo = $('#vehiculo').val();
          }

          if($('#placa').val()==""){
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var placa = $('#placa').val();
          }

          if($('#marca').val()==""){
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var marca = $('#marca').val();
          }

          if($('#color').val()==""){
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var color = $('#color').val();
          }

          if($('#cod_vis').val()==""){error =1;
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var cod_vis = $('#cod_vis').val();
          }

          if($('#dat_emp').val()==""){error =1;
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var dat_emp = $('#dat_emp').val();
          }

          if($('#dat_seg').val()==""){error =1;
            //$('#obs_vis').css("border", "1px solid red");
          }else{
            var dat_seg = $('#dat_seg').val();
          }


          var ent_cnt = $('#ent_cnt').val();
          if(ent_cnt=="0" || ent_cnt=="" || ent_cnt=="- Seleccione -"){error =1;
          $('#ent_cnt').css("border", "1px solid red");
          var mensaje ="Por favor verifique que el visitante entregue el carnet y marque la casilla de entrga de carnet!";
          }else{
            var ent_cnt = $('#ent_cnt').val();
          }

          if($('#carnet').val()==""){
          $('#carnet').css("border", "1px solid red");
          }
          else{
          var carnet = $('#carnet').val();
          }
     



if (error<=0) {


      jQuery.post("sql/u_reg_vis.php", {
      hor_fv:hor_fv,hor_sal:hor_sal,fec_sal:fec_sal,cod_vis:cod_vis,vehiculo:vehiculo,placa:placa,marca:marca,color:color,obs_veh:obs_veh,dat_emp:dat_emp,dat_seg:dat_seg,met_act:met_act,ent_cnt:ent_cnt,carnet:carnet
                 
                  }, function(data, textStatus){
             
                  if(data == 1){
                swal("Mensaje", "Datos guardatos correctamente!", "success",{
                button: false,
                });
                setTimeout(' window.location.href = "con_vis.php"; ',2000); 
             }
          });

            }else{
                swal ( "Error" ,  "Ha ocurrido un error al actualizar los datos, Verifique los datos ingresados! " +mensaje ,  "error" ,{
                button: false,
                });
            }

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


      $("#reg_equ").click(function(event) {
      var cod_vis = $("#cod_vis").val(); 
      window.location.href="reg_con_equ.php?c="+cod_vis;
      });



}); 


