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
			<a href='functions/no-composer/no-composer.php' class="composer">Without composer</a>
			<a href='functions/composer/composer.php' class="composer">With composer</a>
			<div class="content"></div>


			<!-- PROJECT LIST SECTION -->
			<h2>Your projects</h2>
			<hr>			
			<?php getListDir(array(array())); ?>
		</div>
	</div>
	<div class="clear"></div>

	<!-- JQUERY JS -->
	<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
	<!-- CUSTOM JS -->
	<script src="js/script.js"></script>
</body>
</html>