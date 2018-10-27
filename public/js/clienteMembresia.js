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

 var tablaClientes=$('#tablaClientes').DataTable( {
    "language": {
        "emptyTable":			"No existen clientes pendientes de pago a la fecha",
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
    
    // "ajax":{
    //   "url":"/tablaClientes",
    //   "dataSrc": function(data){


        
    //   }

    // },
    "columns":[
        
      {data:null,
        render:function(data,type,row){
          return '<button type="button" rel="tooltip" data-tipo="actualizarMembresia" data-idUsuario="'+ row.user.id+'" data-idMembresia="'+row.id+'" class="btn btn-success btn-sm" data-original-title="" title=""><i class="material-icons">card_membership</i><div class="ripple-container"></div></button>'
        },
        orderable: false, searchable: false
      },
        //,orderable: false, searchable: false},
        
        
        {data:'user.nombre'},
        {data:'user.apellido'},
        {data:'user.dni'},
        {data:'nombre'},
        {data:'promociones[0].nombre'},
        {data:'pagos[0].forma_pago'},
        {data:'estado_membresia.estado'},
        ],
    
        // "columnDefs": [
        //     { visible: false, "targets": [1,2] ,orderable: false, searchable: false},

        //   ]
    
    });

    //bloqueo el acceso directo del van
    $('#ModalActualizarMembresia a').on('click',function(e){
      return false;
   });

    $("#tablaClientes").on("click",'[data-tipo="actualizarMembresia"]',function(e){
      var idMembresia=$(this).attr("data-idMembresia");
      var idUsuario=$(this).attr("data-idUsuario");
      var nombreUsuario=$(this).parents().parents().children().eq(1).text();
      var htmlDesc= 'actualizando la membresia de "'+ nombreUsuario +'"';

      $('#ModalActualizarMembresia  [data-idUsuario]').attr("data-idUsuario",idUsuario);
      $('#ModalActualizarMembresia  [data-idMembresiaActual]').attr("data-idMembresiaActual",idMembresia);
      $("#ModalDescAct").html(htmlDesc);

      $('#ModalActualizarMembresia').modal('show');
      
    });
   

    //estructura para el actualizar, copia del alta

    //seleccionar el tipo de membresia
$('#seccionMembresiasModal button').on('click',function(e){
  e.preventDefault();
  var idTipoMembresia=$(this).attr("data-idTipoMembresia");
  //restablezco la interfaz como si no se selecciono
  $('#seccionMembresiasModal [data-seleccion]').attr("class",'card-header card-header-info card-header-icon');
  $('#seccionMembresiasModal i').html("card_membership");
  //establezco cambio de color y de simbolo para reflejar la seleccion
  $(this).parent().children().first().attr("class",'card-header card-header-success card-header-icon')
  $(this).parent().find('i').html("done_all");

  //reestablezco la tabla de resumen
  $('#totalSeleccionadoModal [name="descuento"]').html("-");
  $('#totalSeleccionadoModal [name="descuento"]').attr("value",0);
  $('#totalSeleccionadoModal [name="descuento"]').attr("data-idTipoPromocion",0);



//establezco resultado en la tabla resumen
var htmlDescripcion=$(this).parent().find('[data-descripcion]').attr("data-descripcion");
var htmlNombre = '<a >'+$(this).parent().find('p').html()+'</a>'+
                '<br><small>'+htmlDescripcion+'</small>';

var htmlCosto=$(this).parent().find('h3').attr("value");
$('#totalSeleccionadoModal [name="nombre"]').html(htmlNombre);
$('#totalSeleccionadoModal [name="costo"]').html("$"+htmlCosto);
$('#totalSeleccionadoModal [name="costo"]').attr("value",htmlCosto);

$('#totalSeleccionadoModal [data-idTipoMembresia]').attr("data-idTipoMembresia",idTipoMembresia);

//establezco minimo de dia
$('#totalSeleccionadoModal [name="cantidadMeses"]').val(1);
  //recalculo tabla de resumen
  calcularSubtotalModal();
  calcularTotalModal();

  //pido los tipos de promocion habilitados para el tipo de membresia
  $.ajax( {
      type: "POST",
      data:{idMembresia:idTipoMembresia},
      url: "http://127.0.0.1:8000/buscarTipoPromocionAllMembresia",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      
      success: function( response ) {
        console.log(response);
        $.each(response,function(index,value){
          
          $('#seccionPromocionesModal [class="card card-stats"]').each(function(i,e){
            if($(this).attr("data-idTipoPromocion")==value.promocion.id){
              $(this).find('i').html("card_giftcard");
              if(value.estado){
                //esto reestablece el color de seleccion
                $(this).children().first().attr("class",'card-header card-header-info card-header-icon');
                $(this).children('button').removeAttr("disabled");
                //las muestra si corresponde
                $(this).removeAttr("hidden")
              }else{
               //las oculta si corresponde
                $(this).children().first().attr("class",'card-header card-header-icon');
                $(this).children('button').attr("disabled","");
                $(this).attr("hidden","");
              }            
            }
          })
      });
      
  },
} );    
});
//seleccionar promociones, se consideran no acumulativas, por ahora
$('#seccionPromocionesModal button').on('click',function(e){
  e.preventDefault();
  //recupero id
  var idTipoPromocion=$(this).parent().attr('data-idTipoPromocion');
  //reestablezco las selecciones
  $('#seccionPromocionesModal [data-seleccion]').attr("class",'card-header card-header-info card-header-icon');
  $('#seccionPromocionesModal i').html("card_giftcard");
  //establezco cambio de color y de simbolo para reflejar la seleccion
  $(this).parent().children().first().attr("class",'card-header card-header-success card-header-icon')
  $(this).parent().find('i').html("done_all");

  //establezco el resultado en la tabla resumen
  var htmlDescuento=$(this).parent().find('h3').attr("value");
  console.log("esto da el desucento",htmlDescuento);
  $('#totalSeleccionadoModal [name="descuento"]').html("-%"+htmlDescuento);
  $('#totalSeleccionadoModal [name="descuento"]').attr("value",htmlDescuento);
  $('#totalSeleccionadoModal [data-idTipoPromocion]').attr("data-idTipoPromocion",idTipoPromocion);

  calcularSubtotalModal();
  calcularTotalModal();
});

//calculo de subtotal
function calcularSubtotalModal(){
  var descuento=$('#totalSeleccionadoModal [name="descuento"]').attr("value");
  var costo= $('#totalSeleccionadoModal [name="costo"]').attr("value");
  var subtotal= costo-((descuento/100)*costo);
  console.log("esto es el subtotal",subtotal);
  $('#totalSeleccionadoModal [name="subtotal"]').html('$'+subtotal);
  $('#totalSeleccionadoModal [name="subtotal"]').attr('value',subtotal);
};

$('#totalSeleccionadoModal [name="cantidadMeses"]').on('click',function(e){
  console.log("cambio");
  calcularTotalModal();
})

function calcularTotalModal(){
  var subtotal= $('#totalSeleccionadoModal [name="subtotal"]').attr('value');
  var cantidadMeses=$('#totalSeleccionadoModal [name="cantidadMeses"]').val();
  var total=subtotal*cantidadMeses;
  $('#totalSeleccionadoModal [name="total"]').attr('value',total);
  $('#totalSeleccionadoModal [name="total"]').html("$"+total);
  $('#totalFormaPagoModal').html('<p>'+'Seleccione la forma de pago para el total de: '+'<strong>'+ '<i> $'+total+'</i>'+'</strong> </p>');
}
//seleccion de metodo de pago
$('#seccionPagoModal div [class="choice"], #seccionPagoModal div [class="choice active"]').on('click',function(){
  //limpio los seleccionados
  $('#seccionPagoModal div [class="choice active"]').attr('class',"choice");
  
  
  //seleccon unica, se muestra graficamente 
  $(this).attr('class',"choice active");


})

//actualizar membresia de cliente

$("#postActualizarMembresia").on("click",function(){
 
  //capturo los datos del modal

  //seccion membresia-promocion
  var clienteMembresia= $('#totalSeleccionadoModal [name="nombre"]').attr('data-idTipoMembresia');
  var clientePromocion= $('#totalSeleccionadoModal [name="descuento"]').attr('data-idTipoPromocion');
  var clienteCantMeses= $('#totalSeleccionadoModal [name="cantidadMeses"]').val();

  //seccion pagos
  var clienteFormaPago= $('#seccionPagoModal div [class="choice active"]').children('input').attr('name');

  //usuario y membresia actual
  var idCliente= $('#ModalActualizarMembresia  [data-idUsuario]').attr("data-idUsuario");
  var idMembresiaActual= $('#ModalActualizarMembresia  [data-idMembresiaActual]').attr("data-idMembresiaActual");

  var data={
    'idCliente':idCliente,
    'idMembresiaActual':idMembresiaActual,
    'idMembresiaNueva':clienteMembresia,
    'idPromocionNueva':clientePromocion,
    'cantidadMeses':clienteCantMeses,
    'formaPago':clienteFormaPago
  }

  $.ajax( {
    type: "POST",
    url: "http://127.0.0.1:8000/actualizarMembresia",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    data: data,
    success: function( response ) {
      $('#ModalActualizarMembresia').modal('hide');
      reestrablecerModalActMembresia();
      mensaje("primary","La membresia se actualizó correctamente");
     tablaClientes.ajax.reload();
    },
    error: function(error){
      //

    }
  } );


})

//estructura de secuencia del siguiente

//control de interfaz siguiente-anterior-terminar

//secuencia para boton siguiente
$('#ModalActualizarMembresia [name="Siguiente"]').on('click',function(){
  var navMembresia= $('#ModalActualizarMembresia [href="#ActMembresia"]');
  var navFormaPago= $('#ModalActualizarMembresia [href="#ActFormaPago"]');
  var btnSiguiente= $('#ModalActualizarMembresia [name="Siguiente"]');
  var btnAnterior= $('#ModalActualizarMembresia [name="Anterior"]');
  var btnTerminar= $('#ModalActualizarMembresia [name="Terminar"]');
  

// pregunto en que posicion esta y activo la siguiente

 
  if(navMembresia.attr('aria-selected')=='true'){
    
    if(validarNavActMembresia()){
      navFormaPago.tab('show');
      btnAnterior.removeAttr("hidden");
      btnTerminar.removeAttr("hidden");
      btnSiguiente.attr("hidden","");
    }
  }
      
})


//secuencia boton anterior
$('#ModalActualizarMembresia [name="Anterior"]').on('click',function(){
  var navMembresia= $('#ModalActualizarMembresia [href="#ActMembresia"]');
  var navFormaPago= $('#ModalActualizarMembresia [href="#ActFormaPago"]');
  var btnSiguiente= $('#ModalActualizarMembresia [name="Siguiente"]');
  var btnAnterior= $('#ModalActualizarMembresia [name="Anterior"]');
  var btnTerminar= $('#ModalActualizarMembresia [name="Terminar"]');
  

// pregunto en que posicion esta y activo la anterior

 
if(navFormaPago.attr('aria-selected')=='true'){
  navMembresia.tab('show');
  btnTerminar.attr("hidden","");
  btnSiguiente.removeAttr("hidden");
  btnAnterior.attr("hidden","");
}
      
})

function validarNavActMembresia(){
  var cantErrores=0;
  var clienteMembresia= $('#totalSeleccionadoModal [name="nombre"]').attr('data-idTipoMembresia');
  var clienteCantMeses= $('#totalSeleccionadoModal [name="cantidadMeses"]');
  
  
  if(clienteMembresia==''){
    $('#totalSeleccionadoModal [name="nombre"]').html('<p class="error">Seleccione una Membresia</p>');
    cantErrores+=1;
  }
 
  

  if(!clienteCantMeses.valid()){
    //clienteCantMeses.parents().addClass("has-danger");
    cantErrores+=1;
  }

  if(cantErrores>0){
    return false;
  }
  return true;

}

//boton de cerrar el actualizar membresia
$('#ModalActualizarMembresia [name="Cerrar"]').on("click",function(){
  reestrablecerModalActMembresia();
})

function reestrablecerModalActMembresia(){
  console.log("esta reestrableciendo");
  var navMemb= $('#ModalActualizarMembresia [href="#ActMembresia"]');
  var btnSiguente= $('#ModalActualizarMembresia [name="Siguiente"]');
  var btnAnterior= $('#ModalActualizarMembresia [name="Anterior"]');
  var btnTerminar= $('#ModalActualizarMembresia [name="Terminar"]');
  //reestrablece la posicion y botones
  btnTerminar.attr("hidden","");
  btnAnterior.attr("hidden","");
  btnSiguente.removeAttr("hidden");
  navMemb.tab('show');

  //reestablezco la seleccion de mebresia 
  $('#seccionMembresiasModal [data-seleccion]').attr("class",'card-header card-header-info card-header-icon');
  $('#seccionMembresiasModal i').html("card_membership");

  //elimino la seleccion de promociones
  $('#seccionPromocionesModal [class="card card-stats"]').attr("hidden","");
  
  //reestablezco la tabla de resumen
  $('#totalSeleccionadoModal [name="descuento"]').html("-");
  $('#totalSeleccionadoModal [name="descuento"]').attr("value",0);
  $('#totalSeleccionadoModal [name="descuento"]').attr("data-idTipoPromocion","");
  $('#totalSeleccionadoModal [name="cantidadMeses"]').val(1);
  $('#totalSeleccionadoModal [name="nombre"]').html("");
  $('#totalSeleccionadoModal [name="costo"]').html("");
  $('#totalSeleccionadoModal [name="total"]').html("");
  $('#totalSeleccionadoModal [name="subtotal"]').html("");
  $('#totalSeleccionadoModal [name="costo"]').attr("value",0);
  $('#totalSeleccionadoModal [data-idTipoMembresia]').attr("data-idTipoMembresia","");


  //limpio los imput
  $("#formActualizarMembresia").trigger("reset");
  

  //limpio los campos de validacion
  $("#formActualizarMembresia").data('validator').resetForm();
}

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