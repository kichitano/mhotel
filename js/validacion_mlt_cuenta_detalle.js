$('#cue_id').change(function() {
$.post('ajax_validacion_mlt_cuenta_detalle.php',{
cue_id:$('#cue_id').val(),

beforeSend: function(){
$('.validacion').html("Espere un momento por favor...");
}

}, function(respuesta){
$('.validacion').html(respuesta);
});
});
