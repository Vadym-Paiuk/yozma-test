<?php
	add_action( 'wp_ajax_newsletter_subscribe', 'newsletter_subscribe' );
	add_action( 'wp_ajax_nopriv_newsletter_subscribe', 'newsletter_subscribe' );
	function newsletter_subscribe(): void {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'newsletter' ) ) {
			wp_send_json_error();
		}
		
		if ( empty( $_POST['email'] ) ) {
			wp_send_json_error();
		}
		
		if ( empty( $_POST['agree'] ) ) {
			wp_send_json_error();
		}
		
		$query = new WP_Query(
			[
				'post_type'              => 'subscriber',
				'title'                  => $_POST['email'],
				'post_status'            => 'all',
				'posts_per_page'         => 1,
			]
		);
		
		if ( !empty( $query->post ) ) {
			wp_send_json_error();
		}
		
		$subscriber = wp_insert_post(
			[
				'post_title'    => sanitize_text_field( $_POST['email'] ),
				'post_status'   => 'publish',
				'post_type'     => 'subscriber',
				'post_author'   => 1
			]
		);
		
		if ( is_wp_error( $subscriber ) ){
			wp_send_json_error();
		}
		
		wp_send_json_success();
	}