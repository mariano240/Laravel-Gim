
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



//editar tipo de membresia

//recueperar de la tabla para editar
$("#tablaTipoMembresia").on("click",'[data-tipo="editar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idMembresia");
    var nombre=$(this).parents().parents().children().eq(0).text();
    var costo=$(this).parents().parents().children().eq(1).text();
    var descripcion=$(this).parents().parents().children().eq(2).text();
    var html='<p>'+'¿Desea eliminar de forma permanente el tipo de memebresia '+'<strong>'+ '<i>'+nombre+'</i>'+'</strong>'+' ?' +'</p>'
    console.log(nombre,costo,descripcion);
    $('#ModalEditarTipoMembresia input[name="idTipoMembresia"]').val(idFila);
    $('#ModalEditarTipoMembresia input[name="nombre"]').val(nombre);
    $('#ModalEditarTipoMembresia input[name="costo"]').val(costo);
    $('#ModalEditarTipoMembresia input[name="descripcion"]').val(descripcion);
    $('#ModalEditarTipoMembresia').modal(true);
    
                 
});

//confirmacion de editar
$("#postEditarTipoMembresia").on("click",function(e){
    e.preventDefault ();
    
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/editarTipoMembresia",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $('#formEditarTipoMembresia').serialize(),
        success: function( response ) {
              
          $("#formEditarTipoMembresia").trigger("reset");
          
          mensaje("primary","Se editó correctamente el tipo de membresia");
          
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





//eliminar promocion

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


//al confirmar que quiere eliminar
$('#eliminarTipoPromocion').on("click",function(e){
    e.preventDefault ();
    var idTipoPromocion=$('#ModalConfirmarPromocion').attr("data-idTipoPromocion");
    
    eliminarTipoPromocion(idTipoPromocion);
});

//elimina promocion a partir de un id
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

//editar tipo de promocion

//recueperar de la tabla para editar
$("#tablaTipoPromocion").on("click",'[data-tipo="editar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idPromocion");
    
    /* se debe recuperar de la base de datos
    
    var nombre=$(this).parents().parents().children().eq(0).text();
    var costo=$(this).parents().parents().children().eq(1).text();
    var descripcion=$(this).parents().parents().children().eq(2).text();
   

    console.log(nombre,costo,descripcion);
    $('#ModalEditarTipoPromocion input[name="idTipoPromocion"]').val(idFila);
    $('#ModalEditarTipoPromocion input[name="nombre"]').val(nombre);
    $('#ModalEditarTipoPromocion input[name="costo"]').val(costo);
    $('#ModalEditarTipoPromocion input[name="descripcion"]').val(descripcion);
    $('#ModalEditarTipoPromocion').modal(true);
    */
   
   $.ajax( {
    type: "GET",
    url: "http://127.0.0.1:8000/buscarTipoPromocionId",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    data: {idTipoPromocion: idFila
            },
    success: function( response ) {
        console.log(response);
        $('#ModalEditarTipoPromocion input[name="idTipoPromocion"]').val(response.id);
        $('#ModalEditarTipoPromocion input[name="nombre"]').val(response.nombre);
        $('#ModalEditarTipoPromocion input[name="fecha_inicial"]').val(response.fecha_inicio);
        $('#ModalEditarTipoPromocion input[name="fecha_fin"]').val(response.fecha_fin);
        $('#ModalEditarTipoPromocion input[name="descuento"]').val(response.descuento);
        $('#ModalEditarTipoPromocion input[name="tiempo_extendido"]').val(response.tiempo_extendido);
        $('#ModalEditarTipoPromocion input[name="cant_meses"]').val(response.cant_meses);
        $('#ModalEditarTipoPromocion input[name="descripcion"]').val(response.descripcion);
        $('#ModalEditarTipoPromocion').modal(true);
      
    },
  } );
                 
});

//confirmacion de editar
$("#postEditarTipoPromocion").on("click",function(e){
    e.preventDefault ();
    var dataayuda=$('#formEditarTipoPromocion').serialize();
    console.log(dataayuda);
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/editarTipoPromocion",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $('#formEditarTipoPromocion').serialize(),
        success: function( response ) {
              
          $("#formEditarTipoPromocion").trigger("reset");
          
          mensaje("primary","Se editó correctamente el tipo de Promocion");
          
          $('#contenido').load("gestionarMembresiaPromocion");
          $.getScript("js/altaMembresiaPromocion.js");
        },
      } );
});







//avisos generales
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