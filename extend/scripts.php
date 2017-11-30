</main>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<script src="../js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>

<script>

	$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  	});

	$(document).ready(function() {
	    $('select').material_select();
	  });
	
	$('#buscar').keyup(function(event){
		var contenido = new RegExp($(this).val(), 'i');
		$('tr').hide();
		$('tr').filter(function(){
			return contenido.test($(this).text());
		}).show();
	});

	$(document).ready(function(){
    $('ul.tabs').tabs();
  	});
  	
	$(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  	});

	$('.button-collapse').sideNav();
	$('select').material_select();

	function may(obj, id){
	obj = obj.toUpperCase();
	document.getElementById(id).value = obj;
}
</script>