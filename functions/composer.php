<em>You need to install Composer to use this. <a href="https://getcomposer.org/Composer-Setup.exe">download composer</a></em>
	<h3>1. Generate composer.json</h3>
	<form action="functions/composer.php" method="POST" id='form-json'>
		<label for='id_name'>Project name</label>
		<input type="text" id="id_name" name="project_name" />
		<input type="text" name='name' id="name" placeholder="vendor/name (required)" required/>
		<input type="text" name='description' placeholder="Description" />
		<input type="text" name='fullname' placeholder="Full name" />
		<input type="text" name='email' placeholder="Email" />
		<input type="submit" value="Generate" name='btn_json'>
	</form>

<h3>2. Package Installation</h3>
	<form action="functions/composer.php" method="POST" id='form-package'>
		<label for="pname">Which projet?</label>
		<input type="text" name='pname' id='pname' required/><br/>
		<label><input type="checkbox" name="package[]" id="cbox3" value="symfony"> Symfony</label><br>
		<label><input type="checkbox" name="package[]" id="cbox1" value="altorouter/altorouter"> Altorouter</label><br>
		<label><input type="checkbox" name="package[]" id="cbox2" value="fzaninotto/faker"> Faker</label><br>
		<label for="autre">Other...</label>
		<input type="text" name="package[]" placeholder="vendor/package" id="autre"><span id='plus'>+</span>
		<div class="plus"></div>
		<input type="submit" value="Install" name='require'>

	</form>
<script>
	plus = document.getElementById('plus');
	div_plus = document.getElementsByClassName('plus')[0];

	plus.addEventListener('click', function() {
		input = document.createElement('input');
		input.setAttribute("type", "text");
		input.setAttribute("name", "package[]");
		input.setAttribute("placeholder", "vendor/package");
		input.style.display = "block";
		input.style.marginLeft = "58px";
		div_plus.appendChild(input);
	});

	project_name = document.getElementsByName("project_name")[0];
	dname = document.getElementById("name");

	project_name.addEventListener('keyup', function() {
		dname.setAttribute('value', "vendor/"+project_name.value);
	});

</script>

<?php 

if (isset($_POST['btn_json'])) {
	foreach ($_POST as $key => $value) {
		 	$$key = $value;
		} 

	if(isset($project_name) && !empty($project_name)) {
		if(!is_dir("../your-projects/".$project_name)) {
			mkdir("../your-projects/".$project_name);
			if(is_file("../your-projects/".$project_name."/index.php")) {
				// include
			} else {
				$index = fopen("../your-projects/".$project_name."/index.php", "w");
				//doctype
			}
			
		}
	}

	$composer = fopen("../your-projects/".$project_name."/composer.json", "w");

	$json = "{
	    \"name\": \"".strtolower($name)."\",\n";
	    fwrite($composer, $json);

	if (isset($_POST['description']) && !empty($_POST['description'])) {
		$json = "		\"description\": \"".$description."\",\n";
		fwrite($composer, $json);
	}
	
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

	shell_exec("cd ../your-projects/".$project_name." && composer install"); // Installation du composer.json

	header('Location: http://localhost/my-site/Lazy-v1.1.0'); // URL PAR HTTPSERVER

}

if(isset($_POST['require'])) {

	foreach ($_POST as $key => $value) {
		 $$key = $value;
	}
	if (isset($package) && isset($pname)) {

		foreach ($package as $key => $value) {
			if(!empty($value)) {
				shell_exec("cd ../your-projects/".$pname." && composer require ".$value."");
			}

			if($value == "altorouter/altorouter") {
				$htaccess = fopen("../your-projects/".$pname."/.htaccess", "w");
				$insert = "RewriteEngine ON
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php [L]";
				fwrite($htaccess, $insert);
				fclose($htaccess);
			}

			if($value == "symfony") {
				echo `composer create-project symfony/framework-standard-edition my_project_name`;
			}
		}
	}
			

header('Location: http://localhost/my-site/Lazy-v1.1.0/'); // URL PAR HTTPSERVER

	
}


 ?>