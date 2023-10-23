<?php
	add_action( 'init', 'theme_register_acf_blocks' );
	function theme_register_acf_blocks() {
		register_block_type( __DIR__ . '/newsletter' );
		wp_register_script( 'newsletter', get_stylesheet_directory_uri() . '/blocks/newsletter/script.js', [ 'jquery', 'acf' ] );
		include_once __DIR__ . '/newsletter/handler.php';
		
		register_block_type( __DIR__ . '/top-product' );
	}