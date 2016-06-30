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

	// CREATE INPUT TO ADD MORE PACKAGES
	plus = document.getElementById('plus');
	div_plus = document.getElementsByClassName('plus')[0];

	plus.addEventListener('click', function() {
		input = document.createElement('input');
		input.setAttribute("type", "text");
		input.setAttribute("name", "package[]");
		input.setAttribute("placeholder", "vendor/package");
		input.style.display = "block";
		input.style.marginLeft = "60px";
		div_plus.appendChild(input);
	});

	// AUTO INSERT VENDOR/PROJECT_NAME
	project_name = document.getElementsByName("project_name")[0];
	dname = document.getElementById("name");

	project_name.addEventListener('keyup', function() {
		dname.setAttribute('value', "vendor/"+project_name.value);
	});




});