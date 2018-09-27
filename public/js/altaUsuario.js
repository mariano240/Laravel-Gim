//envio de formulario
$("#postAltaCliente").on("click",function(e){
  
    $.ajax( {
        type: "POST",
        url: "http://127.0.0.1:8000/registrar",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $('#formAltaUsuario').serialize(),
        success: function( response ) {
          console.log( response );
        }
      } );
})

//carga de las provincias a partir del pais
$("#select-pais").on("change",function(e){
  var pais_id=$(this).val();
  var html_select;
  $.get('/api/provincias/'+pais_id,function(provincias){
      for (let index = 0; index < provincias.length; index++) {
        html_select +='<option value="'+provincias[index].id+'">'+provincias[index].nombre+'</option>';
        
      }
      $("#select-provincia").html(html_select);
  })
})

//carga de las localidades a partir de las provincias
$("#select-provincia").on("change",function(e){
  var provincia_id=$(this).val();
  var html_select;
  $.get('/api/localidades/'+provincia_id,function(localidades){
      for (let index = 0; index < localidades.length; index++) {
        html_select +='<option value="'+localidades[index].id+'">'+localidades[index].nombre+'</option>';
      }
      $("#select-localidad").html(html_select);
  })
})