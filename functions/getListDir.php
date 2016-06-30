<?php 

/**
*
*	Récupérer la liste des cours
*
*	@param string $dir Lien dossier your-projects
*
*/

function getListDir($array) {
	echo "<ul>";

	$dir = "./your-projects/";
	if (is_dir($dir)) {
    	if ($dh = opendir($dir)) {
	        while (($file = readdir($dh)) !== false) {
	        	if ($file != "." && $file != "..") {
	        		echo "<li><a href='".$dir.$file."' target='_blank'>".$file."</a></li>";
	        	} 
        	}
        closedir($dh);
    	}
	}
	echo "</ul>";
}

?>