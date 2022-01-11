<?php

function foundry_get_post_thumbnail($post_id,  $size = 'featured-image', $more_attributes = []) {

	if ( ! post_password_required() && is_attachment() && has_post_thumbnail() ) return null;

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


