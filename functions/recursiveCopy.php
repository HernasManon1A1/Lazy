<?php

/**
*
* Recursive copy
*
* 	@param string $src source folder
*	@param string $dst destination folder
*
*/

function copydir($src, $dst) {

    if(!is_dir($dst)) {
    	mkdir($dst);
    }

   	$dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..') {
       		if (is_dir($src . "/" . $file)) { // IF FILE IS A FOLDER -> REDO COPYDIR
        	    copydir($src."/".$file, $dst."/".$file);
        	} else { // ELSE COPY FILE
        	    copy($src.'/'.$file,$dst.'/'.$file);
        	}
       	}        	
    }

    closedir($dir);
}

?>