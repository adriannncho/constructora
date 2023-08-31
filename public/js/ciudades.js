

//console.log("123455");
$(document).ready(function(){
    //console.log("123");
    $("#depto").change(function(){
      // console.log("123yhh");
       var depto = $(this).val();
       //console.log(depto);
       $.get('/proyectos/buscarciudades/' + depto, function(data){
        //console.log(data);
       
        var listaciudades = '<option value="">Seleccione la ciudad</option>';
        //console.log(listaciudades);
        for (var i = 0; i < data.length; i++) {
            listaciudades += '<option value="' + data[i].IdCiudad + '">' + data[i].Nombre + '</option>';
        }
        $("#ciudad").html(listaciudades);
    })
    .fail(function(error) {
        console.error('Hubo un error:', error);
    });
    });
});
