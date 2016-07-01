<?php 
	include_once('no-composer/values.php'); // ON RECUPERE LES ARRAYS
/**
*
*	Récupérer tableau $input_form
*
*	@param string $label Label des options
*	@param int $id Id des options
*	@param string $name Name des options
* 	@param string $type Type des options
*	@param string $css Lien CSS des options
*	@param string $js Lien JS des options
*
*	@param string $plabel Label des plugins
*	@param int $pid Id des plugins
*	@param string $pvalue Value plugin
*	@param string $pname Name des plugins
* 	@param string $ptype Type des plugins
*	@param string $pcss Lien CSS des plugins
*	@param string $pjs Lien JS des plugins
*
*/

function afficher_input($array) {
	

	foreach ($array as $value) { // ON RECUPERE LES VALUES
		$label = $value['label'];
		$id = $value['id'];
		$name = $value['name'];
		$type = $value['type'];

		if($type == "text") { // OUTPUT TEXT
			echo "<div class='input_text'>";
			echo "<label for='".$name."'>".$label."</label>";
			echo "<input type='".$type."' id='".$id."' name='".$name."' />";
			echo "</div>";
		}

		if($type == "radio") { // OUTPUT RADIO
			echo "<div class='input_radio'>";
			echo $label.": <input type='".$type."' name='".$name."' id='".$id."on' value='".$id."' /><label for='".$id."on'>ON</label>";
			echo "<input type='".$type."' name='".$name."' id='".$id."off' value='off' checked/><label for='".$id."off' value='off' />OFF</label>";
			echo "</div>";

			if(isset($value['plugins'])){ // ON VERIFIE S'IL Y A DES PLUGINS
				foreach ($value['plugins'] as $key) {
					$plabel = $key['label'];
					$pid = $id."_".$key['id'];
					$pvalue = $key['id'];
					$pname = $key['name'];
					$ptype = $key['type'];
					echo "<div id='".$pid."'class='input_check hidden'>";
					echo "<input type='".$ptype."' id='".$pid."' name='".$pname."' value='".$pvalue."' />".$plabel;
					echo "</div>";

					if(isset($key['link']['css'])) { // ON RECUPERE LE CSS
						$pcss = $key['link']['css'];
							
					}

					if(isset($key['link']['js'])) { // ON RECUPERE LE JS
						$pjs = $key['link']['js'];
					}
				}	
			}


		}

		if($type == "checkbox") { // OUTPUT CHECKBOX
			echo "<div class='input_check'>";
			echo "<input type='".$type."' name='".$name."[]' value='".$id."' />".$label;
			echo "</div>";
		}

		if ($type == 'submit') { // OUTPUT SUBMIT
		echo "<button type='".$type."' class='btn_submit' name='".$name."'>".$label."</button>";
		}

		if(isset($value['link'])) { // ON VERIFIE QU'IL Y A UN LINK DANS LE ARRAY
			if(isset($value['link']['css'])) { // ON RECUPERE LE CSS
				$css = $value['link']['css'];
			}

			if(isset($value['link']['js'])) { // ON RECUPERE LE JS
				$js = $value['link']['js'];
			}
		}




	}




}

?>