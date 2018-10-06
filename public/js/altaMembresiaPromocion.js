
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

//recueperar de la tabla para editar y recupera datos de la base
$("#tablaTipoPromocion").on("click",'[data-tipo="editar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idPromocion");
   
   $.ajax( {
    type: "GET",
    url: "http://127.0.0.1:8000/buscarTipoPromocionId",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    data: {idTipoPromocion: idFila
            },
    success: function( response ) {
        
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

//confirmacion de editar tipo promocion
$("#postEditarTipoPromocion").on("click",function(e){
    e.preventDefault ();
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


//seccion asociar membresia a promociones

$("#tablaTipoMembresia").on("click",'[data-tipo="asociar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idMembresia");
    var nombre=$(this).parents().parents().children().eq(0).text();
    
    var htmlDescripcion='¿Que promociones aplican a la membresia '+'<strong>'+ '<i>'+nombre+'</i>'+'</strong>'+' ?'
    var htmlTR;
    $('#ModalAsociarMembresia-Promocion p').html(htmlDescripcion);
    $.ajax( {
        type: "POST",
        data:{idMembresia:idFila},
        url: "http://127.0.0.1:8000/buscarTipoPromocionAllMembresia",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        
        success: function( response ) {
            //el value es un objeto del tipo promocion
            
            $.each(response,function(index,value){

                htmlTR+= '<tr data-idpromocion="'+value.promocion.id+'">'+
                                        '<td >'+
                                            '<div class="form-check form-check-inline">'+
                                                '<label class="form-check-label">'+
                                                  '<input class="form-check-input" type="checkbox" value=""';
                                                   if(value.estado){
                                                    htmlTR+='checked="" name="asociado"> '
                                                   }else{
                                                    htmlTR+=' name="asociado"> '
                                                   }
                                                   
                                             htmlTR+='<span class="form-check-sign">'+
                                                    '<span class="check"></span>'+
                                                  '</span>'+
                                                '</label>'+
                                              '</div>'+
                                        '</td>'+
                                        '<td class="text-center">'+ value.promocion.nombre +'</td>'+
                                        '<td class="text-center">'+value.promocion.fecha_inicio+'-'+value.promocion.fecha_fin+'</td>'+
                                        '<td class="text-center">'+value.promocion.descripcion +'</td>'+
                                        '<td class="text-center">'+ value.promocion.cant_meses +'</td>'+
                                        
                                    '</tr>'
            });
            $('#ModalAsociarMembresia-Promocion input[name="idTipoMembresia"]').val(idFila);
            $('#ModalAsociarMembresia-Promocion tbody').html(htmlTR);

        },
      } );
      
    $('#ModalAsociarMembresia-Promocion').modal(true);
     
                 
});


//confirmar asociacion
$("#postAsociarMembresiaPromocion").on("click",function(e){
    e.preventDefault ();
    var idmembresia=$('#formAsociarMembresia-Promocion input[name="idTipoMembresia"]').val();
    var resultados=[];
    $('#formAsociarMembresia-Promocion input[type=checkbox]').each(function(){
        var id=$(this).parents().parents().parents().parents().attr("data-idPromocion");
        if(this.checked){
            var promocion={idPromocion:id, estado:'activa'};
            resultados.push(promocion);
            
        }
       
    })

    console.log("estoy mandando", resultados);
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/asociarTipoMembresiaPromocion",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        
        data: { idmembresia: idmembresia,
                promociones: resultados
                },
        success: function( response ) {
              
          
          mensaje("primary","Se aplicaron las promociones correctamente");
          
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