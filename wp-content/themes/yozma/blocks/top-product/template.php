<?php
	$fields = get_field( 'fields' );
	if (empty($fields) || empty($fields['products'])){
		exit;
	}
?>

<section class="top-product">
	<?php if( !empty( $fields['title'] ) ): ?>
		<h2 class="top-product__title">
			<?php echo $fields['title']; ?>
		</h2>
	<?php endif; ?>
	<div class="top-product__row woocommerce">
		<?php
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'post__in' => $fields['products']
			);
			
			$query = new WP_Query($args);
			woocommerce_product_loop_start();
			
			while ( $query->have_posts() ) {
				$query->the_post();
				
				do_action( 'woocommerce_shop_loop' );
				
				wc_get_template_part( 'content', 'product' );
			}
			
			woocommerce_product_loop_end();
		?>
	</div>
</section>
