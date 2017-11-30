$('#emp_dni').change(function() {
$.post('ajax_validacion_mlt_empleado.php',{
emp_dni:$('#emp_dni').val(),

beforeSend: function(){
$('.validacion').html("Espere un momento por favor...");
}

}, function(respuesta){
$('.validacion').html(respuesta);
});
});
