<?php require_once('load_functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lazy Generator</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<h2>Create a new project</h2>
			<hr>
			<a href='functions/no-composer.php'>Without composer</a>
			<a href='functions/composer.php'>With composer</a>
			<div class="content"></div>


			<!-- LISTE DES COURS -->
			<h2>Your projects</h2>
			<hr>			
			<?php getListDir(array(array())); ?>
		</div>
	</div>
	<div class="clear"></div>


	<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>