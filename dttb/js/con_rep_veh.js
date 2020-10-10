$(document).ready(function() {		


		$('#example').DataTable( {	
			"bDeferRender": true,			
			"sPaginationType": "full_numbers",
			"ajax": {
				"url": "sql/s_dt_rep_veh.php",
	        	"type": "POST"
			},		

			dom: 'Bfrtip',
				    // "dom": 'Brt<"bottom"ip><"clear">',
            buttons: [

                {	
                	text: 'Copiar',
                    extend: 'copyHtml5',
                    className: 'copyExportButton hideButton btn btn-default',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Reporte_de_vehiculos_de_empleados',
                },
                {
                    text: 'Excel',
                    extend: 'excelHtml5',
                    className: 'xlsExportButton hideButton btn btn-success',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Reporte_de_vehiculos_de_empleados',
                    extension: '.xlsx'
                },
                {	
                	text: 'PDF',
                    extend: 'pdfHtml5', 
                    className: 'pdfExportButton hideButton btn btn-primary',
                    orientation: 'landscape',
               		pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Reporte_de_vehiculos_de_empleados',
                },

            ],

			"columns": [

				{ "data": "cedula"  },
				{ "data": "nom_ape" },
				{ "data": "sexo"    },
				{ "data": "gerencia"},
				{ "data": "cargo"   },
				{ "data": "tlf"     },
				{ "data": "vehiculo"},
				{ "data": "placa"   },
				{ "data": "color"   },
				{ "data": "marca"   }

				],

			"oLanguage": {
				
	            "sProcessing":     "Procesando...",
			    "sLengthMenu": 'Mostrar <select class="form-control">'+
			        '<option value="10">10</option>'+
			        '<option value="20">20</option>'+
			        '<option value="30">30</option>'+
			        '<option value="40">40</option>'+
			        '<option value="50">50</option>'+
			        '<option value="-1">Todos</option>'+
			        '</select> registros',    
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Filtrar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Por favor espere - cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },

			    
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
	        }
		});
});