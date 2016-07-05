<?php require_once('load_functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lazy Generator</title>
	<!-- GOOGLE FONTS CSS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!-- CUSTOM STYLE CSS -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<!-- NEW PROJECT SECTION -->
			<h2>Create a new project</h2>
			<hr>
				<h3>1. Update Composer</h3>
				<form action="functions/composer/composer.php" method="POST">
					<input type="submit" name="update" value="Just click here..." />
				</form>

				<h3>2. Generate composer.json</h3>

				<form action="functions/composer/composer.php" method="POST" id='form-json'>
					<label for='id_name'>Project name</label>
					<input type="text" id="id_name" name="project_name" />
					<input type="text" name='name' id="name" placeholder="vendor/name (required)" required/>
					<input type="text" name='description' placeholder="Description" />
					<input type="text" name='fullname' placeholder="Full name" />
					<input type="text" name='email' placeholder="Email" />
					
				<h4>Do you need some content?</h4>
				<input type="radio" value='yis' name='content' id='yis' /><label for="yis">Yis, plis</label>
				<input type="radio" value='nope' name='content' id='nope' checked /><label for="nope">Nope, thanks</label><br/>
				<div class="include_check">
					<input type="checkbox" value='form' name='include[]' id='form' /><label for="form">Form</label><br/>
					<input type="checkbox" value='form2' name='include[]' id='form2' /><label for="form2">Form2</label><br/>
				</div>
				<input type="submit" value="Generate" name='btn_json'>
			</form>
			<br/>
			<h2>Package Installation</h2>
			<hr>

				<form action="functions/composer/composer.php" method="POST" id='form-package'>
					<label for="pname">Which projet?</label>
					<input type="text" name='pname' id='pname' required/><br/>
					<label><input type="checkbox" name="package[]" id="cbox3" value="symfony"> Symfony</label><br>
					<label><input type="checkbox" name="package[]" id="cbox1" value="altorouter/altorouter"> Altorouter</label><br>
					<label><input type="checkbox" name="package[]" id="cbox2" value="fzaninotto/faker"> Faker</label><br>
					<label for="autre">Other...</label>
					<input type="text" name="package[]" placeholder="vendor/package" id="autre"><span id='plus'>+</span>
					<div class="plus"></div>
					<p style="font-size: 14px"><em>Visit <a href="https://packagist.org/">Packagist</a> to find more packages</em></p>
					<input type="submit" value="Install" name='require'>
				</form>




			<!-- PROJECT LIST SECTION -->
			<h2>Your projects</h2>
			<hr>			
			<?php getListDir(array(array())); ?>
		</div>
	</div>
	<div class="clear"></div>
	<!-- CUSTOM JS -->
	<script src="js/script.js"></script>
</body>
</html>