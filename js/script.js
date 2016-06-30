	function afficherPlanning() {
		var planning = document.getElementById("planning");		

		if (planning.style.display == "block") {
			planning.style.display = "none";
		} else {
			planning.style.display = "block";
		}
	}

	$('.composer').click(function(e){
	e.preventDefault();
	$.ajax({
		url: $(this).attr('href'),
	}).done(function(data){
		$('.content').html('');
		$('.content').html(data);
	});
	

});


$(function(){

	$('#jqueryon').click(function(){
			$('#jquery_jqueryui').show();
			$('#jquery_flexslider').show();
	});

	$('#jqueryoff').click(function(){
			$('#jquery_jqueryui').hide();
			$('#jquery_flexslider').hide();
	});

	$('#bootstrapon').click(function(){
			$('#bootstrap_themes').show();
	});

	$('#bootstrapoff').click(function(){
			$('#bootstrap_themes').hide();
	});




});