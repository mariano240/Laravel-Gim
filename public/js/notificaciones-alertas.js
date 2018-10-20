

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