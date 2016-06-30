<?php

// CREER UNE BDD -> option.php + Create table script (db = $input (nom projet));

	$form = array(
		array(
			'label' => 'Nom',
			'type' => 'text',
			'id' => 'id_nom',
			'name' => 'nom',
			'required' => "required"
			),
		array(
			'label' => 'Password',
			'type' => 'password',
			'id' => 'id_password',
			'name' => 'password'
			),
		array(
			'label' => 'E-mail',
			'type' => 'email',
			'id' => 'id_email',
			'name' => 'email'
			),
		array(
			'label' => 'Envoyer',
			'type' => 'submit',
			'id' => 'id_btn',
			'name' => 'submit'
			),
		);

?>
<form action="form.php" method="POST">
<?php 	
	$valid = true;
	foreach ($form as $value) {
		if ($value['type'] == "submit") {
			echo "<input type='".$value['type']."' id='".$value['id']."' name='".$value['name']."' value='".$value['label']."' />";
		} elseif ($value['type'] == "email") {
			echo "<label for='".$value['label']."'>".$value['label']." :</label>";
			echo "<input type='".$value['type']."' id='".$value['id']."' name='".$value['name']."' />";
			if (isset($_POST['submit']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$valid = false;
				echo "<span style='color:red;'>Votre E-mail n'est pas valide</span>";
			}
		} elseif ($value['type'] == "text" && isset($value['required'])) {
			echo "<label for='".$value['label']."'>".$value['label']." :</label>";
			echo "<input type='".$value['type']."' id='".$value['id']."' name='".$value['name']."' required />";
			if (isset($_POST['submit']) && empty($_POST['nom'])) {
				$valid = false;
				echo "<span style='color:red;'>Votre nom n'est pas valide</span>";
			}
		} else {
			echo "<label for='".$value['label']."'>".$value['label']." :</label>";
			echo "<input type='".$value['type']."' id='".$value['id']."' name='".$value['name']."' />";
		}
	}
?>
</form>

<?php 

if (isset($_POST['submit']) && $valid) {
	var_dump($_POST);
	echo "Merci pour votre message. Nous vous enverrons un mail de confirmation à ".$_POST['email'];
}


?>
