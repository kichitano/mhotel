$('#cli_dni').change(function() {
$.post('ajax_validacion_mlt_cliente.php',{
cli_dni:$('#cli_dni').val(),

beforeSend: function(){
$('.validacion').html("Espere un momento por favor...");
}

}, function(respuesta){
$('.validacion').html(respuesta);
});
});
