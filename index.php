<?php require_once('load_functions.php');

	// LAZY/INDEX.PHP
    $url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$url = preg_replace('/\?.*/', '', $url);

	// INSTALL COMPOSER IF IT'S NOT ALREADY INSTALLED
	if (!is_file("composer")) {
		exec("composer.bat");

	}
?>

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

<?php 
	// CHECK IF USER IS CONNECTED
    $connected = @fsockopen("www.google.com", 80); 
    if ($connected){ // IF CONNECTED -> USE COMPOSER
        fclose($connected);
        include_once "./functions/composer/index.php";

    }else{ // ELSE USE LOCAL LAZY
    	fclose($connected);
        include_once './functions/local/index.php';
    }
?>

</body>
</html>