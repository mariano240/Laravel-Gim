
// crear tipo promocion
$("#postAltaTipoPromocion").on("click",function(e){
  e.preventDefault ();
  
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/crearTipoPromocion",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $('#formAltaTipoPromocion').serialize(),
        success: function( response ) {
          
          
          
          $("#formAltaTipoPromocion").trigger("reset");

          mensaje("primary","Se creó correctamente el tipo de promoción");
          
          $('#contenido').load("gestionarMembresiaPromocion");
            $.getScript("js/altaMembresiaPromocion.js");
           
        },
      } );
});

// crear tipo membresia
$("#postAltaTipoMembresia").on("click",function(e){
    e.preventDefault ();
    
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/crearTipoMembresia",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $('#formAltaTipoMembresia').serialize(),
        success: function( response ) {
          
          
          
          $("#formAltaTipoMembresia").trigger("reset");
          
          mensaje("primary","Se creó correctamente el tipo de membresia");
          
          $('#contenido').load("gestionarMembresiaPromocion");
          $.getScript("js/altaMembresiaPromocion.js");
          

        },
      } );
});

//eliminar membresia

//recupera los datos y pide confirmacion
$("#tablaTipoMembresia").on("click",'[data-tipo="eliminar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idMembresia");
    var nombre=$(this).parents().parents().children().first().text();
    var html='<p>'+'¿Desea eliminar de forma permanente el tipo de memebresia '+'<strong>'+ '<i>'+nombre+'</i>'+'</strong>'+' ?' +'</p>'
    console.log(nombre);
    $('#textoEliminarMembresia').html(html);
    $('#ModalConfirmarMembresia').attr("data-idTipoMembresia",idFila);
    $('#ModalConfirmarMembresia').modal(true);
    
    //var datos= new FormData();
    //datos.append('idTipoMembresia',idFila);
    //eliminarTipoMembresia(idFila);
                 
});


//al confirmar que quere eliminar
$('#eliminarTipoMembresia').on("click",function(e){
    e.preventDefault ();
    var idTipoMembresia=$('#ModalConfirmarMembresia').attr("data-idTipoMembresia");
    
    eliminarTipoMembresia(idTipoMembresia);
});

//elimina memebresia a partir de un id
function eliminarTipoMembresia(id){
    
    var datos= { idTipoMembresia: id,
    };
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/eliminarTipoMembresia",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType : 'json',
        data: datos,
        success: function( response ) {
          
        mensaje("danger","Se eliminó el tipo de membresia");
        //evaluar si es conveniente recargar todo o solo borrar la fila
        $('#contenido').load("gestionarMembresiaPromocion");
        $.getScript("js/altaMembresiaPromocion.js");

        },
      } );
}



//eliminar promocion parte 2

//eliminar membresia

//recupera los datos y pide confirmacion
$("#tablaTipoPromocion").on("click",'[data-tipo="eliminar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idPromocion");
    var nombre=$(this).parents().parents().children().first().text();
    var html='<p>'+'¿Desea eliminar de forma permanente la promoción '+'<strong>'+ '<i>'+nombre+'</i>'+'</strong>'+' ?' +'</p>'
    console.log(nombre);
    $('#textoEliminarPromocion').html(html);
    $('#ModalConfirmarPromocion').attr("data-idTipoPromocion",idFila);
    $('#ModalConfirmarPromocion').modal(true);
    
    //var datos= new FormData();
    //datos.append('idTipoMembresia',idFila);
    //eliminarTipoMembresia(idFila);
                 
});


//al confirmar que quere eliminar
$('#eliminarTipoPromocion').on("click",function(e){
    e.preventDefault ();
    var idTipoPromocion=$('#ModalConfirmarPromocion').attr("data-idTipoPromocion");
    
    eliminarTipoPromocion(idTipoPromocion);
});

//elimina memebresia a partir de un id
function eliminarTipoPromocion(id){
    var datos= { idTipoPromocion: id,
    };
    console.log("estoy intentando borrar", id);
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/eliminarTipoPromocion",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType : 'json',
        data: datos,
        success: function( response ) {
          
        mensaje("danger","Se eliminó la Promoción");
        //evaluar si es conveniente recargar todo o solo borrar la fila
        $('#contenido').load("gestionarMembresiaPromocion");
        $.getScript("js/altaMembresiaPromocion.js");

        },
      } );
}



function mensaje( tipo, mensaje){
    $.notify({
        icon: "add_alert",
        message: mensaje
  
    },{
        type: tipo,
        timer: 4000,
        placement: {
            from: 'top',
            align: 'right'
        }
    });
};

//efectos para modales

$('#ModalCrearTipoMembresia').on('shown.bs.modal', function () {
    $("[name='nombre']").trigger('focus');
  })

  $('#modalCrearPromocion').on('shown.bs.modal', function () {
    $("[name='nombre']").trigger('focus');
  })