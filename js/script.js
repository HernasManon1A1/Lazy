	// AJAX FOR WITH/WITHOUT COMPOSER MENU
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
	// REDO : ONCLICK JQUERY ON -> DISPLAY CHECKBUTTON JQUERY UI & FLEXSLIDER ETC.
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