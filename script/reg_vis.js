jQuery(document).ready(function($) {

$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});

 $("#vehiculo").val("");
  $.ajax({
     url:"sql/select_vehiculo.php",
     type:'POST',
     dataType:'json',
     success: function(response)
     {
       $('#vehiculo').html(response);
     }
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



    $("#ci").change(function() {
    buscar(buscar); 
    });
    $("#tip_per").change(function() {
    buscar(buscar); 
    });
    function buscar(buscar){           // Buscar visitantes en varias bases de datos //
    var ced_res = $("#ci").val();
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
            $('#nyav').val(data.nom_ape).attr('disabled', 'disabled');
            }else{
              $("#nyav").val("").removeAttr('disabled');
            }
          });
        }
    }



    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $("#dat_emp").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "sql/s_reg_vis.php",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });




    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $("#color").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "sql/s_reg_color.php",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      minLength: 2,
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    } );

            $('#cod_vis').attr('disabled', 'disabled' );
            $('#ha').attr('disabled', 'disabled' );
            $('#fa').attr('disabled', 'disabled' );

            $('#placa').attr('disabled', 'disabled' );
            $('#marca').attr('disabled', 'disabled' );
            $('#color').attr('disabled', 'disabled' );
            $('#obs_veh').attr('disabled', 'disabled' );
            
      $('#vehiculo').change(function (){  
        var vehiculo=$('#vehiculo').val();
        //alert("vehi"+vehiculo);
        if(vehiculo!=0 ){
            $("#placa").removeAttr('disabled');
            $("#marca").removeAttr('disabled');
            $("#color").removeAttr('disabled');
            $("#obs_veh").removeAttr('disabled');
           
          }else if (vehiculo=1){
            $('#placa').attr('disabled', 'disabled' );
            $('#marca').attr('disabled', 'disabled' );
            $('#color').attr('disabled', 'disabled' );
            $('#obs_veh').attr('disabled', 'disabled' );
          }
      });

$(document).on('click', '#dhf', function() {

      var dhf = document.getElementById("dhf").checked;
          if(dhf==true){

              $('#fa').remove();
              $('#ha').remove();
              $('#sh').remove();
              $('#gi').remove();
              $('#sf').remove();
              $('#divf').append('<input type="text" class="form-control" id="fa" value="" placeholder="Fecha"/><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>');
              $('#divbt').append('<input type="text" class="form-control" id="ha" value="" placeholder="Hora" style="z-index:1;"/><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>');

              $( "#fa" ).datepicker({
              minDate: -5, 
              maxDate: +5,
              dateFormat: 'dd-mm-yy' 
              });

              $('#ha').timeEntry();
              //$('#dhf').attr('disabled', 'disabled');
           
              }else{
              window.location="reg_vis.php";
              }


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




    $('#Nueva').click(function(){
        $("#canvas").removeClass("two").addClass("one").addClass("vis");
        $("#video").removeClass("one").addClass("two").removeClass("vis");
    });

    $('#Capturar').click(function(){
        var capturar =1;
        $('#itdf').append('<input type="hidden" class="" id="cdf" value=""/>');
        $('#cdf').val(capturar);

        $("#canvas").removeClass("one").addClass("two").removeClass("vis");
        $("#video").removeClass("two").addClass("one").addClass("vis");
    });



// $('#ci').blur(function(event){
// var bus_ci = $('#ci').val();
// if(bus_ci!=""){
//       $.ajax({
//         url: 'sql/s_bus_vis.php',
//         type: 'POST',
//         dataType:'json',
//         data: {
//           bus_ci:bus_ci
//         }
//               }).done(function(data){
//         //$('#ci').val(data.cedula);
//         $('#nyav').val(data.nom_ape);
//         //$('#proc').val(data.proc);


//       });
//     }
// });


       $('#Guardar').click(function () {

          var dhf = document.getElementById("dhf").checked;
          if(dhf==true){
          var  met_reg=1;
          }else{
          var  met_reg=0;
          }


          if($('#tip_per').val()==""){
            $('#tip_per').css("border", "1px solid red");
          }else{
            var tip_per = $('#tip_per').val();
          }

          if($('#ci').val()==""){
            $('#ci').css("border", "1px solid red");
          }else{
            var ci = $('#ci').val();
          }
          if($('#nyav').val()==""){
            $('#nyav').css("border", "1px solid red");
          }
          else{
            var nyav = $('#nyav').val();
          }
          if($('#tdv').val()==""){
            $('#tdv').css("border", "1px solid red");
          }
          else{
            var tdv = $('#tdv').val();
          }
          if($('#area').val()==""){
            $('#area').css("border", "1px solid red");
          }
          else{
            var area = $('#area').val();
          }
          if($('#fa').val()==""){
            $('#fa').css("border", "1px solid red");
          }
          else{
            var fa = $('#fa').val();
          }
          if($('#ha').val()==""){
            $('#ha').css("border", "1px solid red");
          }
          else{
            var ha = $('#ha').val();
          }
          if($('#dat_emp').val()==""){
            $('#dat_emp').css("border", "1px solid red");
          }
          else{
            var dat_emp = $('#dat_emp').val();
          }
          if($('#dat_seg').val()==""){
            $('#dat_seg').css("border", "1px solid red");
          }
          else{
            var dat_seg = $('#dat_seg').val();
          }
          if($('#obs_vis').val()==""){
          //$('#obs_vis').css("border", "1px solid red");
          }
          else{
            var obs_vis = $('#obs_vis').val();
          }
          if($('#cod_vis').val()==""){
            //$('#obs_vis').css("border", "1px solid red");
          }
          else{
            var cod_vis = $('#cod_vis').val();
          }
          
          if($('#proc').val()==""){
            $('#proc').css("border", "1px solid red");
          }
          else{
            var proc = $('#proc').val();
          }

          if($('#carnet').val()==""){
            $('#carnet').css("border", "1px solid red");
          }
          else{
            var carnet = $('#carnet').val();
          }

         if($('#vehiculo').val()=="0"){
            //$('#obs_vis').css("border", "1px solid red");
          var vehiculo = $('#vehiculo').val();
          var placa = $('#placa').val();
          var marca = $('#marca').val();
          var color = $('#color').val();
          var obs_veh = $('#obs_veh').val();
          }else{
            var vehiculo = $('#vehiculo').val();

                if($('#placa').val()==""){
                $('#placa').css("border", "1px solid red");
                }
                else{
                  var placa = $('#placa').val();
                }
                if($('#marca').val()==""){
                $('#marca').css("border", "1px solid red");
                }
                else{
                  var marca = $('#marca').val();
                }
                if($('#color').val()==""){
                $('#color').css("border", "1px solid red");
                }
                else{
                  var color = $('#color').val();
                }
                if($('#obs_veh').val()==""){
                //$('#obs_veh').css("border", "1px solid red");
                }
                else{
                  var obs_veh = $('#obs_veh').val();
                }

          }  
 
      jQuery.post("sql/i_reg_vis.php", {
      ci:ci,nyav:nyav,tdv:tdv,area:area,fa:fa,ha:ha,dat_emp:dat_emp,dat_seg:dat_seg,obs_vis:obs_vis,cod_vis:cod_vis,proc:proc,vehiculo:vehiculo,placa:placa,marca:marca,color:color,obs_veh:obs_veh,carnet:carnet,met_reg:met_reg,tip_per:tip_per
            }, function(data, textStatus){
             
            if(data == 1){
                      $(function() {  
                        var capturar = $('#cdf').val();
                            if(capturar==1){        
                            //alert("capturar"+capturar);      
                              $(function uploadEx() {
                                  var canvas = document.getElementById("canvas");
                                  var dataURL = canvas.toDataURL("image/png");
                                  var ci = document.getElementById("ci").value;
                                  document.getElementById('hidden_data').value = dataURL;
                                  var fd = new FormData(document.forms["reg_vis"]);
                                  fd.append("ci", ci);
                                  //alert('capturar'+capturar);
                                  var xhr = new XMLHttpRequest();
                                  xhr.open('POST', 'sql/upload_data.php', true);
                   
                                  xhr.upload.onprogress = function(e) {
                                      if (e.lengthComputable) {
                                          var percentComplete = (e.loaded / e.total) * 100;
                                          console.log(percentComplete + '% uploaded'+'foto:'+capturar);
                                         
                                          //alert('Succesfully uploaded');
                                      }
                                  };
                   
                                  xhr.onload = function() {
                   
                                  };
                                  xhr.send(fd);
                              });
                            }
                        });
            swal("Mensaje", "Datos guardatos correctamente! \nVisitante: "+cod_vis+" ", "success",{
            button: false,
            });
            $("#reg_equ").removeAttr('disabled');
            $("#Guardar").attr('disabled', 'disabled');
            $("#btnLimpiar").attr('disabled','disabled');
            $("#btn").append("<a href='reg_vis.php' class='btn btn-primary'>Nuevo Registro</a>");
            //setTimeout(' window.location.href = "reg_vis.php"; ',2000);

                }else if(data == 3 ){
                    alert("Los datos del empleado a visitar son incorrectos!");
                    $('#res').addClass("label label-danger");

                    }else if(data == 4){
                        swal ( "Error" ,  "Disculpe, no se puede guardar su registro porque ud no pertenece a la Gerencia de Seguridad!" ,  "error" ,{
                        button: false,
                        });

                        }else{
            swal ( "Error" ,  "Verifica los datos ingresados!" ,  "error" ,{
            button: false,
            });
                            }
          });
        });
   

$("#btnLimpiar").click(function(event) {
$("#reg_vis")[0].reset();
});
  $("#btnLimpiards").click(function(event) {
   $("#dat_seg").val("");
});
 $("#btnLimpiarde").click(function(event) {
   $("#dat_emp").val("");
});


$("#reg_equ").click(function(event) {
location.reload();
});

});

