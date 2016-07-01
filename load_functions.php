<?php
$dir = "./functions/";
	if (is_dir($dir)) {
    	if ($dh = opendir($dir)) { // OPEN YOUR_PROJECT DIR
	        while (($file = readdir($dh)) !== false) { // READ ALL THE FILES IN IT
	        	if ($file != "." && $file != "..") { // EXCEPT . AND .. DIR
					$tmp = explode(".", $file);
					$extension = end($tmp);
	        		if ($extension == "php") {
	        			include $dir.$file;
	        		}
	        	} 
        	}
        closedir($dh);
    	}
	}

?>