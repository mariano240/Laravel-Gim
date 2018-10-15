/*$('#datatables').DataTable({
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
    }
  });

  var table = $('#datatable').DataTable();
  */

 $('#tablaClientes').DataTable( {
    "language": {
        "emptyTable":			"No hay datos disponibles en la tabla.",
        "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
        "infoEmpty":			"Mostrando 0 registros de un total de 0.",
        "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
        "infoPostFix":			"(actualizados)",
        "lengthMenu":			"Mostrar _MENU_ Clientes",
        "loadingRecords":		"Cargando...",
        "processing":			"Procesando...",
        "search":			"Buscar:",
        
        "zeroRecords":			"No se han encontrado coincidencias.",
        "paginate": {
            "first":			"Primera",
            "last":				"Última",
            "next":				"Siguiente",
            "previous":			"Anterior"
        },
        "aria": {
            "sortAscending":	"Ordenación ascendente",
            "sortDescending":	"Ordenación descendente"
        }
    },
    "processing": true,
    "serverSide": true,
    "ajax": "/tablaClientes",
    "columns":[
        {defaultContent:'<button type="button" rel="tooltip" class="btn btn-success btn-sm" data-original-title="" title=""><i class="material-icons">card_membership</i><div class="ripple-container"></div></button>','orderable': false, 'searchable': false},
        {data:'nombre'},
        {data:'apellido'},
        {data:'dni'},
        {data:'membresia[0].nombre'},
        {data:'membresia[0].promociones[0].nombre'},
        {data:'membresia[0].pagos[0].forma_pago'},
        ],
    /*
        "columnDefs": [
            { className: "text-center", "targets": [0,1,2] },

          ]
    */
    });

  /*
  // Edit record
  table.on('click', '.edit', function () {
    $tr = $(this).closest('tr');
    var data = table.row($tr).data();
    alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
  });

  // Delete a record
  table.on('click', '.remove', function (e) {
    $tr = $(this).closest('tr');
    table.row($tr).remove().draw();
    e.preventDefault();
  });

  //Like record
  table.on('click', '.like', function () {
    alert('You clicked on Like button');
  });
  */