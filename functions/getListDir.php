<?php 

/**
*
*	Get list of projects
*
*	@param string $dir link your-projects dir
*
*/

function getListDir($array) {
	echo "<ul>";

	$dir = "./your-projects/";
	if (is_dir($dir)) {
    	if ($dh = opendir($dir)) { // OPEN YOUR_PROJECT DIR
	        while (($file = readdir($dh)) !== false) { // READ ALL THE FILES IN IT
	        	if ($file != "." && $file != "..") { // EXCEPT . AND .. DIR
	        		echo "<li><a href='".$dir.$file."' target='_blank'>".$file."</a></li>"; // LIST THEM IN A LIST
	        	} 
        	}
        closedir($dh);
    	}
	}
	echo "</ul>";
}

?>