$(document).ready(function() {

$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});
	
$("#ndb_obj").attr('disabled', 'disabled');

$("#cat_obj").change(function(event) {
var cat_obj = $("#cat_obj").val();
	if (cat_obj==1) {

		$("#ser_obj").attr('disabled', 'disabled').val("");
		$("#ndb_obj").removeAttr('disabled');
	}else if(cat_obj==2 || cat_obj==3 || cat_obj==4){
		$("#ndb_obj").attr('disabled', 'disabled').val("");
		$("#ser_obj").removeAttr('disabled');

	}else if(cat_obj==0){
		$("#ndb_obj").attr('disabled', 'disabled').val("");
		$("#ser_obj").attr('disabled', 'disabled').val("");

	}

});
var cod = $("#cod").val();
if (cod!="") {
BuscarEq();
}

$("#ser_obj").blur(function(event) {
BuscarEq();
});

$("#ndb_obj").blur(function(event) {
BuscarEq();
});

function BuscarEq(){
var ser_obj = $("#ser_obj").val();
var ndb_obj = $("#ndb_obj").val();
var cat     = $("#cat_obj").val();
var cod     = $("#cod").val();
      $.ajax({
        url: 'sql/s_equ.php',
        type: 'POST',
        dataType:'json',
        data: {
          	cat:cat,ser_obj:ser_obj,ndb_obj:ndb_obj,cod:cod
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
					$('#cat_obj').val(data.cat_obj).attr('disabled', 'true');
				}else if(result==3) {
					swal ( "Error" ,  "No se encontró el equipo! " ,  "error" ,{
					button: false,
					});
				}
      });
}

$("#limpiar").click(function(event) {
$("#det_equ")[0].reset();
});


});