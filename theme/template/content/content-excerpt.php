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
	<header class="w-full pt-24 pb-36  bg-primary-300">
		<div class="wrapper bg-primary-300 px-10 text-center">
			<a href="<?php the_permalink();?>">
				<?php single_post_title( '<h1 class="entry-title sub-title font-black text-primary-600">', '</h1>' ); ?>
			</a>
		</div>
	</header>
	<div class="max-w-2xl mx-auto">

		<article class="bg-white prose mx-auto p-20 rounded-3xl -translate-y-20 shadow-2xl
			shadow-primary-500/20">
			<div class="entry-content text-center">
				<?php the_excerpt(); ?>
				<div class="not-prose w-full mt-10">
					<a class="px-5 py-2 rounded bg-primary-500 hover:bg-primary-400 text-white no-underline" href="<?php the_permalink();?>">VIEW</a>
				</div>
			</div>
		</article>
	</div>

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
