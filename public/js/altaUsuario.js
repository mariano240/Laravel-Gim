
//bloqueo el acceso por el nav no me funciona
//  $('#ModalAltaUsuario a').on('click',function(e){
//    return false;
//  })

//seteo los mensajes
$("#formAltaUsuario").validate({
    //definir mensajes, por convencion los tipos de validaciones estan en el formulario, asi lo trabaja el paquete
  
//para validar de a un elemento
// $('#formAltaUsuario [name="nombre"]').valid();
// para validar el formulario entero
//$('#formAltaUsuario').valid();
//cuando se valida, se retorna el mensaje, solo del elemento validado

//para los form-group tenemos if-focused=linea de color dependiendo del estado del validador, if-filled=linea lila (mas importante), 
//has-danger , has-success para la letra
  messages: {
    
    email: {
      
      email: "email incorrecto"
    }
  }
});

//envio de formulario
$('#ModalAltaUsuario [name="Terminar"]').on("click",function(e){
  // e.preventDefault();

     $.ajax( {
         type: "POST",
         url: "http://127.0.0.1:8000/registrar",
         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
         data: cargarFormulario(),
         success: function( response ) {
          $("#formAltaUsuario").trigger("reset");
          mensaje("primary","Se creó el Cliente Correctamente");
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

//seleccionar el tipo de membresia
$('#seccionMembresias button').on('click',function(e){
  e.preventDefault();
  var idTipoMembresia=$(this).attr("data-idTipoMembresia");
  //restablezco la interfaz como si no se selecciono
  $('#seccionMembresias [data-seleccion]').attr("class",'card-header card-header-info card-header-icon');
  $('#seccionMembresias i').html("card_membership");
  //establezco cambio de color y de simbolo para reflejar la seleccion
  $(this).parent().children().first().attr("class",'card-header card-header-success card-header-icon')
  $(this).parent().find('i').html("done_all");

  //reestablezco la tabla de resumen
  $('#totalSeleccionado [name="descuento"]').html("-");
  $('#totalSeleccionado [name="descuento"]').attr("value",0);



//establezco resultado en la tabla resumen
var htmlDescripcion=$(this).parent().find('[data-descripcion]').attr("data-descripcion");
var htmlNombre = '<a >'+$(this).parent().find('p').html()+'</a>'+
                '<br><small>'+htmlDescripcion+'</small>';

var htmlCosto=$(this).parent().find('h3').attr("value");
$('#totalSeleccionado [name="nombre"]').html(htmlNombre);
$('#totalSeleccionado [name="costo"]').html("$"+htmlCosto);
$('#totalSeleccionado [name="costo"]').attr("value",htmlCosto);

$('#totalSeleccionado [data-idTipoMembresia]').attr("data-idTipoMembresia",idTipoMembresia);

//establezco minimo de dia
$('#totalSeleccionado [name="cantidadMeses"]').val(1);
  //recalculo tabla de resumen
  calcularSubtotal();
  calcularTotal();

  //pido los tipos de promocion habilitados para el tipo de membresia
  $.ajax( {
      type: "POST",
      data:{idMembresia:idTipoMembresia},
      url: "http://127.0.0.1:8000/buscarTipoPromocionAllMembresia",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      
      success: function( response ) {
        console.log(response);
        $.each(response,function(index,value){
          
          $('#seccionPromociones [class="card card-stats"]').each(function(i,e){
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
$('#seccionPromociones button').on('click',function(e){
  e.preventDefault();
  //recupero id
  var idTipoPromocion=$(this).parent().attr('data-idTipoPromocion');
  //reestablezco las selecciones
  $('#seccionPromociones [data-seleccion]').attr("class",'card-header card-header-info card-header-icon');
  $('#seccionPromociones i').html("card_giftcard");
  //establezco cambio de color y de simbolo para reflejar la seleccion
  $(this).parent().children().first().attr("class",'card-header card-header-success card-header-icon')
  $(this).parent().find('i').html("done_all");

  //establezco el resultado en la tabla resumen
  var htmlDescuento=$(this).parent().find('h3').attr("value");
  console.log("esto da el desucento",htmlDescuento);
  $('#totalSeleccionado [name="descuento"]').html("-%"+htmlDescuento);
  $('#totalSeleccionado [name="descuento"]').attr("value",htmlDescuento);
  $('#totalSeleccionado [data-idTipoPromocion]').attr("data-idTipoPromocion",idTipoPromocion);

  calcularSubtotal();
  calcularTotal();
});

//calculo de subtotal
function calcularSubtotal(){
  var descuento=$('#totalSeleccionado [name="descuento"]').attr("value");
  var costo= $('#totalSeleccionado [name="costo"]').attr("value");
  var subtotal= costo-((descuento/100)*costo);
  console.log("esto es el subtotal",subtotal);
  $('#totalSeleccionado [name="subtotal"]').html('$'+subtotal);
  $('#totalSeleccionado [name="subtotal"]').attr('value',subtotal);
};

$('#totalSeleccionado [name="cantidadMeses"]').on('click',function(e){
  console.log("cambio");
  calcularTotal();
})

function calcularTotal(){
  var subtotal= $('#totalSeleccionado [name="subtotal"]').attr('value');
  var cantidadMeses=$('#totalSeleccionado [name="cantidadMeses"]').val();
  var total=subtotal*cantidadMeses;
  $('#totalSeleccionado [name="total"]').attr('value',total);
  $('#totalSeleccionado [name="total"]').html("$"+total);
  $('#totalFormaPago').html('<p>'+'Seleccione la forma de pago para el total de: '+'<strong>'+ '<i> $'+total+'</i>'+'</strong> </p>');

}
//seleccion de metodo de pago
$('#seccionPago div [class="choice"]').on('click',function(){
  //limpio los seleccionados
  $('#seccionPago div [class="choice active"]').attr('class',"choice");
  
  
  //seleccon unica, se muestra graficamente 
  $(this).attr('class',"choice active");


})

//cargar formularioen formato json
function cargarFormulario(){
  //seccion informacion basica
  var clienteNomber=$('#informacionBasica [name="nombre"]').val();
  var clienteApellido=$('#informacionBasica [name="apellido"]').val();
  var clienteDNI=$('#informacionBasica [name="dni"]').val();
  var clienteTelefono=$('#informacionBasica [name="telefono"]').val();
  var clienteEmail=$('#informacionBasica [name="email"]').val();
  //seccion direccion
  var clienteCalle=$('#seccionDireccion [name="calle"]').val();
  var clientealtura=$('#seccionDireccion [name="altura"]').val();
  var clientePiso=$('#seccionDireccion [name="piso"]').val();
  var clienteDepartamento=$('#seccionDireccion [name="departamento"]').val();
  var clienteLocalidad=$('#select-localidad').val();

  //seccion membresia-promocion
  var clienteMembresia= $('#totalSeleccionado [name="nombre"]').attr('data-idTipoMembresia');
  var clientePromocion= $('#totalSeleccionado [name="descuento"]').attr('data-idTipoPromocion');
  var clienteCantMeses= $('#totalSeleccionado [name="cantidadMeses"]').val();

  //seccion pagos
  var clienteFormaPago= $('#seccionPago div [class="choice active"]').children('input').attr('name');

   var clienteResumen={
     'nombre': clienteNomber,
     'apellido':clienteApellido,
     'dni':clienteDNI,
     'telefono':clienteTelefono,
     'email':clienteEmail,
     'calle':clienteCalle,
     'altura':clientealtura,
     'piso':clientePiso,
     'departamento':clienteDepartamento,
     'idLocalidad':clienteLocalidad,
     'idMembresia':clienteMembresia,
     'idPromocion':clientePromocion,
     'cantidadMeses':clienteCantMeses,
     'formaPago':clienteFormaPago
   }
return clienteResumen;
  
}

//control de interfaz siguiente-anterior-terminar

//secuencia para boton siguiente
$('#ModalAltaUsuario [name="Siguiente"]').on('click',function(){
  var navAbout= $('#ModalAltaUsuario [href="#about"]');
  var navDireccion= $('#ModalAltaUsuario [href="#address"]');
  var navMembresia= $('#ModalAltaUsuario [href="#membresia"]');
  var navFormaPago= $('#ModalAltaUsuario [href="#formaPago"]');
  var btnSiguente= $('#ModalAltaUsuario [name="Siguiente"]');
  var btnAnterior= $('#ModalAltaUsuario [name="Anterior"]');
  var btnTerminar= $('#ModalAltaUsuario [name="Terminar"]');
  

// pregunto en que posicion esta y activo la siguiente

 
  if(navAbout.attr('aria-selected')=='true'){
    if(validarNavAbout()){
      navDireccion.click();
      btnAnterior.removeAttr("hidden");
    }
      
  }else if(navDireccion.attr('aria-selected')=='true'){
    if(validarNavDireccion()){
      navMembresia.click();
    }
    
  }else if(navMembresia.attr('aria-selected')=='true'){
    if(validarNavMembresia()){
      navFormaPago.click();
    btnTerminar.removeAttr("hidden");
    btnSiguente.attr("hidden","");
    }
  }
  
})

//secuencia para boton anterior
$('#ModalAltaUsuario [name="Anterior"]').on('click',function(){
  var navAbout= $('#ModalAltaUsuario [href="#about"]');
  var navDireccion= $('#ModalAltaUsuario [href="#address"]');
  var navMembresia= $('#ModalAltaUsuario [href="#membresia"]');
  var navFormaPago= $('#ModalAltaUsuario [href="#formaPago"]');
  var btnSiguiente= $('#ModalAltaUsuario [name="Siguiente"]');
  var btnAnterior= $('#ModalAltaUsuario [name="Anterior"]');
  var btnTerminar= $('#ModalAltaUsuario [name="Terminar"]');
  

// pregunto en que posicion esta 

 if(navDireccion.attr('aria-selected')=='true'){
    navAbout.click();
    btnAnterior.attr("hidden","");
  }else if(navMembresia.attr('aria-selected')=='true'){
    navDireccion.click();
  }else if(navFormaPago.attr('aria-selected')=='true'){
    navMembresia.click();
    btnTerminar.attr("hidden","");
    btnSiguiente.removeAttr("hidden");
  }
  
})



//funciones de validadciones
//retorna true si todos los campos son validos
function validarNavAbout(){
  var cantErrores=0;
  var clienteNomber=$('#informacionBasica [name="nombre"]');
  var clienteApellido=$('#informacionBasica [name="apellido"]');
  var clienteDNI=$('#informacionBasica [name="dni"]');
  var clienteTelefono=$('#informacionBasica [name="telefono"]');
  var clienteEmail=$('#informacionBasica [name="email"]');
  var enrtradas=[clienteNomber,clienteApellido,clienteDNI,clienteTelefono,clienteEmail];
  enrtradas.forEach(element => {
    if(!element.valid()){
      //element.parents().addClass("has-danger");
      cantErrores+=1;
    }
  });

  if(cantErrores>0){
    return false;
  }
  return true;

}
function validarNavDireccion(){
  var cantErrores=0;
  var clienteCalle=$('#seccionDireccion [name="calle"]');
  var clientealtura=$('#seccionDireccion [name="altura"]');
  var clientePiso=$('#seccionDireccion [name="piso"]');
  var clienteDepartamento=$('#seccionDireccion [name="departamento"]');
  //var clienteLocalidad=$('#select-localidad'); no se valida porque si o si esta seleccionado
  var enrtradas=[clienteCalle,clientealtura,clientePiso,clienteDepartamento];
  enrtradas.forEach(element => {
    if(!element.valid()){
      //element.parents().addClass("has-danger");
      cantErrores+=1
    }
  });

  if(cantErrores>0){
    return false;
  }
  return true;

}
function validarNavMembresia(){
  var cantErrores=0;
  var clienteMembresia= $('#totalSeleccionado [name="nombre"]').attr('data-idTipoMembresia');
  var clienteCantMeses= $('#totalSeleccionado [name="cantidadMeses"]');
  
  
  if(clienteMembresia==''){
    $('#totalSeleccionado [name="nombre"]').html('<p class="error">Seleccione una Membresia</p>');
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

function validarNavFormaPago(){

}