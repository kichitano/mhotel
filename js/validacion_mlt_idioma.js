$('#idi_nombre').change(function() {
$.post('ajax_validacion_mlt_idioma.php',{
idi_nombre:$('#idi_nombre').val(),

beforeSend: function(){
$('.validacion').html("Espere un momento por favor...");
}

}, function(respuesta){
$('.validacion').html(respuesta);
});
});
