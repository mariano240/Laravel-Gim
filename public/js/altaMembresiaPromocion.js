
// crear tipo promocion
$("#postAltaTipoPromocion").on("click",function(e){
  e.preventDefault ();
  
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/crearTipoPromocion",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $('#formAltaTipoPromocion').serialize(),
        success: function( response ) {
          
          
          $("#modalCrearPromocion").modal("hide");
          $("#formAltaTipoPromocion").trigger("reset");

          mensaje("primary","Se creó correctamente el tipo de promoción");
          
          
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
          
          
          $("#ModalCrearTipoMembresia").modal("hide");
          $("#formAltaTipoMembresia").trigger("reset");
          
          mensaje("primary","Se creó correctamente el tipo de membresia");


        },
      } );
});

//eliminar membresia
$("#tablaTipoMembresia").on("click",'[data-tipo="eliminar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idMembresia");
    //var datos= new FormData();
    //datos.append('idTipoMembresia',idFila);
    var datos= { idTipoMembresia: idFila,
                 };
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/eliminarTipoMembresia",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType : 'json',
        data: datos,
        success: function( response ) {
          
        mensaje("primary","Se eliminó el tipo de membresia");
        //evaluar si es conveniente recargar todo o solo borrar la fila
        $('#contenido').load("gestionarMembresiaPromocion");
        $.getScript("js/altaMembresiaPromocion.js");

        },
      } );

});

//eliminar promocion
$("#tablaTipoPromocion").on("click",'[data-tipo="eliminar"]',function(e){
    var idFila=$(this).parents().parents().attr("data-idPromocion");
    
    var datos= { idTipoPromocion: idFila,
                 };
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/eliminarTipoPromocion",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType : 'json',
        data: datos,
        success: function( response ) {
          
          mensaje("primary","Se eliminó el tipo de promoción");
          //evaluar si es conveniente recargar todo o solo borrar la fila
          $('#contenido').load("gestionarMembresiaPromocion");
          $.getScript("js/altaMembresiaPromocion.js");

        },
      } );

});

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