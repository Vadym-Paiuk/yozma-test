<?php
	remove_filter( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_filter( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	
	add_filter( 'woocommerce_sale_flash', 'woocommerce_sale_flash_filter', 10, 3 );
	function woocommerce_sale_flash_filter( $html, $post, $product ){
		$product = wc_get_product( $product );
		$percentage = 0;
		$template = '<span class="onsale">-%s%%</span>';
		
		if ($product->is_type( 'variable' )){
			$variations = $product->get_available_variations();
			
			foreach ($variations as $variation){
				$variation = wc_get_product( $variation['variation_id'] );
				
				$regular_price = (float)$variation->get_regular_price();
				$sale_price = (float)$variation->get_sale_price();
				$variation_percentage = round(((($regular_price - $sale_price) / $regular_price) * 100), 2);
				
				$percentage = ( $percentage < $variation_percentage ) ? $variation_percentage : $percentage;
			}
			
			return sprintf( $template, $percentage );
		}
		
		$regular_price = (float)$product->get_regular_price();
		$sale_price = (float)$product->get_sale_price();
		$percentage = round(((($regular_price - $sale_price) / $regular_price) * 100), 2);
		
		return sprintf( $template, $percentage );
	}
	
	$image_wrapper_open = function(){
		echo '<div class="item_image_wrapper">';
	};
	add_action( 'woocommerce_before_shop_loop_item_title', $image_wrapper_open, 5 );
	
	$image_wrapper_close = function(){
		echo '</div>';
	};
	add_action( 'woocommerce_before_shop_loop_item_title', $image_wrapper_close, 30 );
	
	$info_wrapper_open = function(){
		echo '<div class="item_info_wrapper">';
	};
	add_action( 'woocommerce_before_shop_loop_item_title', $info_wrapper_open, 35 );
	
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );
	
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 35 );
	
	$add_wishlist_after_title = function(){
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	};
	add_action( 'woocommerce_shop_loop_item_title', $add_wishlist_after_title, 15 );
	
	$title_wrapper_open = function(){
		echo '<div class="title_wrapper">';
	};
	add_action( 'woocommerce_shop_loop_item_title', $title_wrapper_open, 5 );
	
	$title_wrapper_close = function(){
		echo '</div>';
	};
	add_action( 'woocommerce_shop_loop_item_title', $title_wrapper_close, 20 );
	
	$info_wrapper_close = function(){
		echo '</div>';
	};
	add_action( 'woocommerce_after_shop_loop_item_title', $info_wrapper_close, 35 );
	
	add_filter( 'cfvsw_requires_shop_settings', '__return_true' );