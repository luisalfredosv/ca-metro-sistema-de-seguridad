jQuery(document).ready(function($) {
	
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});
  
 $("#gerencia").val("");
  $.ajax({
     url:"sql/select_gerencia.php",
     type:'POST',
     dataType:'json',
     success: function(response)
     {
       $('#gerencia').html(response);
     }
  });


  $( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $("#buscar").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "sql/s_empleados.php",
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








});