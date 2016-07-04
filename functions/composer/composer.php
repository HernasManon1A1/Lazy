<?php 

// RETURN URL = LAZY/INDEX.PHP
$url = $_SERVER['HTTP_REFERER'];

if (isset($_POST['update'])) {
	echo `php ../../composer selfupdate`;

	// echo exec('c:/...../Lazy/composer.bat'); -> REDO FOR AUTO-INSTALLER?
	header('Location: '.$url);
}

// GENERATE COMPOSER.JSON
if (isset($_POST['btn_json'])) {
	foreach ($_POST as $key => $value) {
		 	$$key = $value;
		} 

	// CREATE THE PROJECT_NAME DIRECTORY AND INDEX + DOCTYPE
	if(isset($project_name) && !empty($project_name)) {
		if(!is_dir("../../your-projects/".$project_name)) {
			mkdir("../../your-projects/".$project_name);
			if(!is_file("../../your-projects/".$project_name."/index.php")) {

				$index = fopen("../../your-projects/".$project_name."/index.php", "w");
				fclose($index);
			}
			
		}
	}

	$composer = fopen("../../your-projects/".$project_name."/composer.json", "w");

	// Vendor/name
	$json = "{
	    \"name\": \"".strtolower($name)."\",\n";
	    fwrite($composer, $json);

	// Desc
	if (isset($_POST['description']) && !empty($_POST['description'])) {
		$json = "		\"description\": \"".$description."\",\n";
		fwrite($composer, $json);
	}
	
	// Name & E-mail
	if (isset($_POST['fullname']) && isset($_POST['email']) && !empty($_POST['fullname']) && !empty($_POST['email'])) {
		$json = "		\"authors\": [
		        {
		            \"name\": \"".$fullname."\",
		            \"email\": \"".$email."\"
		        }
		    ],\n";
		fwrite($composer, $json);
	}

	$json = "		\"require\": {}
	}";

	fwrite($composer, $json);
	fclose($composer);

	// INSTALL COMPOSER.JSON
	shell_exec("cd ../../your-projects/".$project_name." && php ../../composer install"); 

	// USER DOESN'T WANT INCLUDE
	if (isset($_POST['content']) && $_POST['content'] == "nope") {
		// ADD SIMPLE DOCTYPE
		$index = fopen("../../your-projects/".$project_name."/index.php", "w");
		// Doctype
		$doctype = "<?php require_once 'vendor/autoload.php'; ?>\n<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n	<meta charset=\"UTF-8\">\n	<title>".$project_name."</title>\n	<!-- CUSTOM CSS -->\n	<link rel=\"stylesheet\" href=\"css/style.css\">\n</head>\n<body>\n\n\n\n\n	<!-- CUSTOM JS -->\n	<script src=\"js/script.js\"></script>\n</body>\n</html>";

		fwrite($index, $doctype);
		fclose($index);
	}

	// USER WANTS INCLUDE
	if (isset($_POST['include'])) {
		$index = fopen("../../your-projects/".$project_name."/index.php", "w");
		// Doctype
		$doctype = "<?php require_once 'vendor/autoload.php'; ?>\n<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n	<meta charset=\"UTF-8\">\n	<title>".$project_name."</title>\n	<!-- CUSTOM CSS -->\n	<link rel=\"stylesheet\" href=\"css/style.css\">\n</head>\n<body>\n\n";
		fwrite($index, $doctype);

		foreach ($_POST['include'] as $include) {
			if ($include != "Include") {
				// IMPORT EACH INCLUDE
				$src = "../../include/".$include.".php";
				$dst = "../../your-projects/".$project_name."/".$include.".php";
				copy($src, $dst);

				// ADD INCLUDE
					$doctype = "	<?php include_once '".$include.".php'; ?>\n";
					fwrite($index, $doctype);
					
			}
		}

		$doctype = "\n\n	<!-- CUSTOM JS -->\n	<script src=\"js/script.js\"></script>\n</body>\n</html>";
		fwrite($index, $doctype);
		fclose($index);

	}

	// GO BACK TO INDEX.PHP
	header('Location: '.$url);
}







// PACKAGE INSTALLATION
if(isset($_POST['require'])) {

	foreach ($_POST as $key => $value) {
		 $$key = $value;
	}


	if (isset($package) && isset($pname)) {

		// FOREACH vendor/package -> INSTALL
		foreach ($package as $key => $value) {
			if(!empty($value)) {
				shell_exec("cd ../../your-projects/".$pname." && php ../../composer require ".$value."");
			}

			// CREATE .HTTACCESS FOR ALTOROUTER
			if($value == "altorouter/altorouter") {
				$htaccess = fopen("../../your-projects/".$pname."/.htaccess", "w");
				$insert = "RewriteEngine ON
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php [L]";
				fwrite($htaccess, $insert);
				fclose($htaccess);
			}

			// INSTALL SYMFONY
			if($value == "symfony") {
				echo `composer create-project symfony/framework-standard-edition my_project_name`;
			}
		}
	}
			
// GO BACK TO INDEX.PHP
header('Location: '.$url);

	
}


 ?>