<?php

/**
*
* RECURSIVE COPY
*
* 	@param string $src source dir
*	@param string $dst destination dir
*
*/

function copydir($src, $dst) {
    // IF DST DIR DOESN'T EXIST: CREATE IT
    if(!is_dir($dst)) {
    	mkdir($dst);
    }

   	$dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..') {
       		if (is_dir($src . "/" . $file)) { // IF FILE IS A DIR -> REDO THAT FUNCTION
        	    copydir($src."/".$file, $dst."/".$file);
        	} else { // ELSE COPY FILES TO DST
        	    copy($src.'/'.$file,$dst.'/'.$file);
        	}
       	}        	
    }

    closedir($dir);
}

?>