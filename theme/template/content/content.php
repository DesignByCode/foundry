<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

?>


<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header  class="w-full pt-24 pb-36  bg-primary-300">
		<div class="wrapper text-center">
			<?php the_title( '<h1 class="entry-title title text-primary-600">', '</h1>' ); ?>
		</div>
	</header>
	<article class="wrapper">
		<div class="bg-white prose mx-auto p-20 rounded-3xl -translate-y-20 shadow-2xl shadow-primary-500/20">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
	<footer>
		<?php
		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'foundry' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'foundry' ),
			)
		);
		?>
	</footer>
</section>
