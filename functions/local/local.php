<?php 
include_once "../../load_functions.php";

if (isset($_POST['btn_create'])) {
	foreach ($_POST as $key => $value) {
		$$key = $value;
	}

	if (isset($project_name) && !empty($project_name)) {
		if(!is_dir("../../your-projects/".$project_name)) {
			mkdir("../../your-projects/".$project_name);
			mkdir("../../your-projects/".$project_name."/css");
			mkdir("../../your-projects/".$project_name."/js");
			mkdir("../../your-projects/".$project_name."/vendor");

			$index = fopen("../../your-projects/".$project_name."/index.php", "w");
			fclose($index);

			$css = fopen("../../your-projects/".$project_name."/css/style.css", "w");
			fclose($css);

			$js = fopen("../../your-projects/".$project_name."/js/script.js", "w");
			fclose($js);
		}

		if (isset($_POST['content']) && $_POST['content'] == "nope" && isset($_POST['link']) && $_POST['link'] == "no") {
			// Simple doctype
			$index = fopen("../../your-projects/".$project_name."/index.php", "w");
			$doctype = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n	<meta charset=\"UTF-8\">\n	<title>".$project_name."</title>\n	<!-- CUSTOM CSS -->\n	<link rel=\"stylesheet\" href=\"css/style.css\">\n</head>\n<body>\n\n\n\n\n	<!-- CUSTOM JS -->\n	<script src=\"js/script.js\"></script>\n</body>\n</html>";

			fwrite($index, $doctype);
			fclose($index);
		}

		if (isset($_POST['link']) && isset($_POST['link']) == "yes") {
			// Insert doctype until CSS
			$index = fopen("../../your-projects/".$project_name."/index.php", "a");
			$doctype = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n	<meta charset=\"UTF-8\">\n	<title>".$project_name."</title>\n";
			fwrite($index, $doctype);
			// Foreach insert link CSS
			foreach ($_POST['framework'] as $value) {
				// VERIFIER QUE LE CSS EXISTE


				$name = strtoupper($value);
				$css = "	<!-- ".$name." CSS -->\n	<link rel=\"stylesheet\" href=\"css/".$value.".css\">\n";
				fwrite($index, $css);
			}

			$index = fopen("../../your-projects/".$project_name."/index.php", "a");
			$doctype = "</head>\n<body>\n\n";
			fwrite($index, $doctype);
		}

		// USER WANTS INCLUDE
		if (isset($_POST['include'])) {
			$index = fopen("../../your-projects/".$project_name."/index.php", "a");

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
		}

			$index = fopen("../../your-projects/".$project_name."/index.php", "a");
			$doctype = "\n\n";
			fwrite($index, $doctype);

		// JS
		if (isset($_POST['link']) && isset($_POST['link']) == "yes") {
			foreach ($_POST['framework'] as $value) {
				// VERIFIER QUE LE JS EXISTE

				$name = strtoupper($value);
				$js = "	<!-- ".$name." JS -->\n	<script src=\"js/".$value.".js\"></script>\n";
				fwrite($index, $js);
			}
		}

			$index = fopen("../../your-projects/".$project_name."/index.php", "a");
			$doctype = "</body>\n</html>\n\n";
			fwrite($index, $doctype);
			fclose($index);

	}
	// LAZY/LOCAL.PHP
	$url = $_SERVER['HTTP_REFERER'];
	var_dump($url);
	header('Location: '.$url);
}
 ?>