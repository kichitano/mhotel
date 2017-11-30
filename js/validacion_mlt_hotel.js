$('#hot_nombre').change(function() {
$.post('ajax_validacion_mlt_hotel.php',{
hot_nombre:$('#hot_nombre').val(),

beforeSend: function(){
$('.validacion').html("Espere un momento por favor...");
}

}, function(respuesta){
$('.validacion').html(respuesta);
});
});
