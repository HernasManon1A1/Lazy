<?php
	

	$input_form = array(
		array(
			'label' => 'Font awesome',
			'id' => 'font-awesome',
			'name' => 'css[]',
			'type' => 'checkbox',
			'link' => array( 'css' => 'css/font-awesome.min.css')
			),
		/*array(
			'label' => 'MVC',
			'id' => 'mvc',
			'name' => 'modele',
			'type' => 'checkbox'
			),		*/
		array(
			'label' => 'Formulaire',
			'id' => 'form',
			'name' => 'include[]',
			'type' => 'checkbox',
			),
		array(
			'label' => 'JQuery', // JQUERY
			'id' => 'jquery',
			'name' => 'js[]',
			'type' => 'radio',
			'link' => array('js' => 'jquery.min.js'),
			'plugins' => array(
			array(
				'label' => 'JQuery UI',
				'id' => 'jqueryui',
				'name' => 'plugins[]',
				'type' => 'checkbox',
				'link' => array('js' => 'jquery-ui.min.js', 'css' => 'jquery-ui.min.css')
				),
			array(
				'label' => 'Flexslider',
				'id' => 'flexslider',
				'name' => 'plugins[]',
				'type' => 'checkbox',
				'link' => array ('js' => 'jquery.flexslider.js', 'css' => 'css/flexslider.css')
					),
				),
			), 
		array( // BOOTSTRAP
			'label' => 'Bootstrap',
			'id' => 'bootstrap',
			'name' => 'css[]',
			'type' => 'radio',
			'link' => array('css' => 'css/bootstrap.min.css', 'js' => 'js/bootstrap.min.js'),
			'plugins' => array(
				array(
				'label' => 'Thèmes Bootstrap',
				'id' => 'themes',
				'name' => 'plugins[]',
				'type' => 'checkbox',
				'link' => array('css' => 'css/bootstrap-theme.min.css')
					),
				),
			),
		);

?>