<?php

function foundry_get_post_thumbnail($post_id,  $size = 'featured-image', $more_attributes = []) {

//	if ( ! post_password_required() && !is_attachment() && !has_post_thumbnail() ) return null;

	if (empty($post_id)){
		$post_id = get_the_ID();
	}

	if ( ! has_post_thumbnail( $post_id)) return null;

	$default_attributes = [
		'alt' => wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ),
		'loading' => 'lazy',
		'class' => 'inline-block'
	];
	$attributes = array_merge($default_attributes, $more_attributes);

	return wp_get_attachment_image(
		get_post_thumbnail_id($post_id),
		$size,
		false,
		$attributes
	);
}

function foundry_the_post_thumbnail($post_id,  $size = 'featured-image', $more_attributes = []) {
	echo foundry_get_post_thumbnail($post_id, $size, $more_attributes);
}


if ( ! function_exists( 'foundry_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function foundry_post_thumbnail() {
		if ( ! post_password_required() && is_attachment() && has_post_thumbnail() ) {
			return;
		}
		?>

		<?php if ( is_singular() ) : ?>

			<figure class="post-thumbnail">
				<?php
				// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
				the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
				?>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail">
				<a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</a>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure>

		<?php endif; ?>
		<?php
	}
}

function foundry_hide_post_title()
{
	$meta = get_post_meta(get_the_ID(), '_hide_page_title', true);
	return ! empty($meta ) && $meta === 'yes';
}


function foundry_posted_on() {
	$time_string = '<time class="text-gray-400 inline-block" datetime="%1$s">%2$s</time>';

	if (get_the_time( 'U' ) !== get_the_modified_time( 'U' )) {
		$time_string = '<time class="text-gray-400 published inline-block" datetime="%1$s">%2$s</time><time class="updated sr-only" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf($time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_attr( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_attr( get_the_modified_date() )
	);

	$posted = sprintf(esc_html_x('%1$s  %2$s', 'post date', 'foundry'),
				'<span class="font-bold text-primary-500">Posted on</span>',
		'<a href="'. esc_url( get_permalink() ) .'" rel="bookmark">'. $time_string .'</a>'
	);

	echo '<span class="italic px-4 py-1.5 inline-block bg-gray-200 border border-gray-300 rounded-full"> '. $posted .' </span>';
}


function foundry_authored_by()
{
	$byline = sprintf(
		esc_html_x(__('Authored by', 'foundry') . ' %s ', 'post author', 'foundry'),
		'<span class="author text-primary-500  inline-block"><a href="'. esc_url(get_author_posts_url(get_the_author_meta('ID'))) .'"> '. esc_html(get_the_author()).' </a></span>'
	);

	echo '<span class="italic text-gray-400 font-bold px-4 py-1.5 inline-block bg-gray-200 border border-gray-300 rounded-full">'.$byline.'</span>';

}



function foundry_min_cart() {
	?>
		<a class="cart-customlocation relative pl-4 pr-2 py-2 group rounded-md inline-flex items-center text-base font-medium focus:outline-none focus:ring-2
					focus:ring-offset-2 focus:ring-primary-500  text-white text-primary-50 bg-primary-500 hover:bg-primary-600" href="<?php echo wc_get_cart_url(); ?>"
		   title="<?php _e( 'View your shopping cart' ); ?>">
		<?php if ( WC()->cart->get_cart_contents_count() !== 0): ?>
			<span class="absolute rounded-full bg-rose-500 text-xs py-1 px-2 shadow-md shadow-rose-700  -right-3 -top-2 text-white">
		<?= WC()->cart->get_cart_contents_count();?>
	</span>
		<?php endif;?>
		<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
		</svg>
		<span class="mr-2">

	<?php echo WC()->cart->get_cart_total(); ?>
	</span>
	</a>
<?php
}

function foundry_get_shop_url($name = 'shop'){
	return get_permalink( woocommerce_get_page_id( $name) );
}

function foundry_get_checkout_url(){
	global $woocommerce;
	return $woocommerce->cart->get_checkout_url();
}

function foundry_get_cart_url(){
	global $woocommerce;
	return $woocommerce->cart->get_cart_url();
}


function foundry_get_account_url(){
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	return get_permalink( $myaccount_page_id );
}




function dd($data){
		echo '<pre>';
		print_r($data);
	if (is_array($data)) {
	}else {
		echo $data;
	}
	wp_die('');
}


