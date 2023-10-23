<?php
	$fields = get_field( 'fields' );
	if (empty($fields)){
		exit;
	}
?>

<section class="newsletter">
	<div class="newsletter__col newsletter__col--left">
		<?php if( !empty( $fields['title'] ) ): ?>
			<h2 class="newsletter__title">
				<?php echo $fields['title']; ?>
			</h2>
		<?php endif; ?>
		<?php if( !empty( $fields['description'] ) ): ?>
			<p class="newsletter__description">
				<?php echo $fields['description']; ?>
			</p>
		<?php endif; ?>
	</div>
	<div class="newsletter__col newsletter__col--right">
		<form action="" class="form">
			<?php wp_nonce_field( 'newsletter' ); ?>
			<input type="hidden" name="action" value="newsletter_subscribe">
			<?php if( !empty( $fields['email'] ) ): ?>
				<div class="form__element form__element--input">
					<?php if( !empty( $fields['email']['label'] ) ): ?>
						<label for="email">
							<?php echo $fields['email']['label']; ?>
						</label>
					<?php endif; ?>
					<?php
						$placeholder = '';
						if( !empty( $fields['email']['placeholder'] ) ){
							$placeholder = $fields['email']['placeholder'];
						}
					?>
					<input type="email" name="email" id="email" placeholder="<?php echo $placeholder; ?>">
					<?php if( !empty( $fields['email']['error'] ) ): ?>
						<span class="form__message form__message--error">
							<?php echo $fields['email']['error']; ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if( !empty( $fields['agree'] ) ): ?>
				<div class="form__element form__element--checkbox">
					<label for="agree">
						<input type="checkbox" name="agree" id="agree" value="agree" checked>
						<?php if( !empty( $fields['agree']['label'] ) ): ?>
							<?php echo $fields['agree']['label']; ?>
						<?php endif; ?>
					</label>
					<?php if( !empty( $fields['agree']['error'] ) ): ?>
						<span class="form__message form__message--error">
							<?php echo $fields['agree']['error']; ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if( !empty( $fields['button'] ) ): ?>
				<button type="submit" class="form__button">
					<?php echo $fields['button']; ?>
				</button>
			<?php endif; ?>
		</form>
		<?php if( !empty( $fields['success'] ) ): ?>
			<div class="success">
				<?php if( !empty( $fields['success'] ) ): ?>
					<h3 class="success__title">
						<?php echo $fields['success']['title']; ?>
					</h3>
				<?php endif; ?>
				<?php if( !empty( $fields['success']['subtitle'] ) ): ?>
					<p class="success__description">
						<?php echo $fields['success']['subtitle']; ?>
					</p>
				<?php endif; ?>
				<?php if( !empty( $fields['success']['image'] ) ): ?>
					<?php echo wp_get_attachment_image( $fields['success']['image'], 'full', false, ['class' => 'success__image'] ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
