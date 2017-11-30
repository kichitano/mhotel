$('#hot_id').change(function() {
$.post('ajax_validacion_mlt_reserva.php',{
hot_id:$('#hot_id').val(),

beforeSend: function(){
$('.validacion').html("Espere un momento por favor...");
}

}, function(respuesta){
$('.validacion').html(respuesta);
});
});
