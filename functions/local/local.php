<?php 
require_once '../recursiveCopy.php';
// SUBMIT CREATE
if (isset($_POST['btn_create'])) {
	foreach ($_POST as $key => $value) {
		$$key = $value;
	}

	// WE CREATE PROJECT FOLDER IF PROJECT NAME NOT EMPTY AND DOESNT ALREADY EXIST
	if (isset($project_name) && !empty($project_name)) {
		if(!is_dir("../../your-projects/".$project_name)) {
			mkdir("../../your-projects/".$project_name);
			mkdir("../../your-projects/".$project_name."/css");
			mkdir("../../your-projects/".$project_name."/js");
			mkdir("../../your-projects/".$project_name."/vendor");

			$index = fopen("../../your-projects/".$project_name."/index.php", "w");
			fclose($index);

			// COPY A BASIC CSS THEME
			$src = "../../css/style.css";
			$dst = "../../your-projects/".$project_name."/css/style.css";
			copy($src, $dst);

			$js = fopen("../../your-projects/".$project_name."/js/script.js", "w");
			fclose($js);
		}

		// Insert doctype
		$index = fopen("../../your-projects/".$project_name."/index.php", "w");
		$doctype = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n	<meta charset=\"UTF-8\">\n	<title>".$project_name."</title>\n	<!-- CUSTOM CSS -->\n	<link rel=\"stylesheet\" href=\"css/style.css\">\n";

		fwrite($index, $doctype);
		fclose($index);

		// USER WANTS FRAMEWORK
		if (isset($_POST['link']) && isset($_POST['link']) == "yes") {
			// Foreach insert link CSS
			foreach ($_POST['framework'] as $value) {
				$src = "../../vendor/".$value;
				$dst = "../../your-projects/".$project_name."/vendor/".$value;
				copydir($src, $dst);

				// IF THIS FRAMEWORK'S CSS EXIST, LINK IT
				if (is_dir("../../vendor/".$value."/css")) {
					$name = strtoupper($value);
					$css = "	<!-- ".$name." CSS -->\n	<link rel=\"stylesheet\" href=\"css/".$value.".min.css\">\n";
					fwrite($index, $css);
				}
			}
		}

		// Add body
		$index = fopen("../../your-projects/".$project_name."/index.php", "a");
		$doctype = "</head>\n<body>\n\n";
		fwrite($index, $doctype);

		// USER WANTS INCLUDE
		if (isset($_POST['content']) && $_POST['content'] == "yis") { 
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
		}

		// Add body
		$index = fopen("../../your-projects/".$project_name."/index.php", "a");
		$doctype = "\n\n\n\n\n\n\n\n\n";
		fwrite($index, $doctype);

		// JS
		if (isset($_POST['link']) && isset($_POST['link']) == "yes") {
			foreach ($_POST['framework'] as $value) {
				// IF THIS FRAMEWORK'S JS EXIST, LINK IT
				if (is_dir("../../vendor/".$value."/js")) {
					$name = strtoupper($value);
					$js = "	<!-- ".$name." JS -->\n	<script src=\"js/".$value.".min.js\"></script>\n";
					fwrite($index, $js);
				}
			}
		}

		$index = fopen("../../your-projects/".$project_name."/index.php", "a");
		$doctype = "	<!-- CUSTOM JS -->\n	<script src=\"js/script.js\"></script>\n</body>\n</html>\n\n";
		fwrite($index, $doctype);
		fclose($index);
	}

	// LAZY/LOCAL.PHP
	$url = $_SERVER['HTTP_REFERER'];
	header('Location: '.$url);
}
 ?>