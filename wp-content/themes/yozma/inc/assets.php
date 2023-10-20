<?php
	add_action( 'wp_enqueue_scripts', 'theme_assets' );
	
	function theme_assets(){
		//CSS
		wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/app/css/app.min.css' );
		
		//JS
		wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/app/js/app.min.js', [ 'jquery' ], false, true );
		
		$args = [
			'wp_ajax' => admin_url('admin-ajax.php'),
		];
		wp_localize_script( 'theme', 'args_object', $args );
	}