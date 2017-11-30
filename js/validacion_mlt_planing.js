$('#hab_id').change(function() {
$.post('ajax_validacion_mlt_planing.php',{
hab_id:$('#hab_id').val(),

beforeSend: function(){
$('.validacion').html("Espere un momento por favor...");
}

}, function(respuesta){
$('.validacion').html(respuesta);
});
});
