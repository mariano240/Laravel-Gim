
// tipo promocion
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
        },
      } );
});

// tipo membresia
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
        },
      } );
});
