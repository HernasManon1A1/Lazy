window.onload=function() {
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

	// TOGGLE INCLUDE OPTIONS
	yis = document.getElementById('yis');
	nope = document.getElementById('nope');
	include = document.getElementsByClassName('include_check')[0];

	yis.addEventListener('click', function() {
		include.style.display = "block";
	});

	nope.addEventListener('click', function() {
		include.style.display = "none";
	});
};
