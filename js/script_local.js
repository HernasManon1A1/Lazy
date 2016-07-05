	window.onload=function() {

	// TOGGLE INCLUDE OPTIONS
	yes = document.getElementById('yes');
	no = document.getElementById('no');
	framework = document.getElementsByClassName('framework_check')[0];

	yes.addEventListener('click', function() {
		framework.style.display = "block";
	});

	no.addEventListener('click', function() {
		framework.style.display = "none";
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
