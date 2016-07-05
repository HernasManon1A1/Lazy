<?php 

// LAZY/LOCAL.PHP
$url = $_SERVER['HTTP_REFERER'];

if (isset($_POST['btn_create'])) {
	foreach ($_POST as $key => $value) {
		$$key = $value;
	}

	if (isset($project_name) && !empty($project_name)) {
		// Create folders + index
		echo $project_name;

		if (isset($_POST['content']) && $_POST['content'] == "nope" && isset($_POST['link']) && $_POST['link'] == "no") {
			// Simple doctype
			echo "Simple doctype";
		}

		if (isset($_POST['framework'])) {
			echo "Insert link in doctype";
			// Foreach insert doctype CSS
		}
	}

	//header('Location : '.$url);
}
 ?>