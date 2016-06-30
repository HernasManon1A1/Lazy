<?php

/**
*
* Copie recursive
*
* 	@param string $src Lien dossier source
*	@param string $dst Lien dossier destinataire
*
*/

function copydir($src, $dst) {

    if(!is_dir($dst)) {
    	mkdir($dst);
    }

   	$dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..') {
       		if (is_dir($src . "/" . $file)) { // SI FILE EST UN DOSSIER -> ON RELANCE LA FONCTION
        	    copydir($src."/".$file, $dst."/".$file);
        	} else { // SINON ON COPIE LE FICHIER VERS DST
        	    copy($src.'/'.$file,$dst.'/'.$file);
        	}
       	}        	
    }

    closedir($dir);
}

?>