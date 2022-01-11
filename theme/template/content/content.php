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
	<?php if(!foundry_hide_post_title()): ?>
	<header class="w-full pt-24 pb-36 bg-gradient-to-br from-primary-500 to-secondary-300">
		<div class="wrapper px-10 text-center">
			<?php the_title( '<h1 class="entry-title title text-primary-600">', '</h1>' ); ?>
			<div class="mt-5 inline-block space-x-3 rounded-full shadow-md shadow-primary-500/20">

			</div>
		</div>
	</header>
	<?php endif;?>
	<div class="max-w-7xl mx-auto">
<!--		--><?php //if(foundry_hide_post_title()): ?><!-- <div class="mt-20"></div> --><?php //endif;?>
		<article class="bg-white prose mx-auto p-10 md:p-12 rounded-2xl -translate-y-20 shadow-xl
			shadow-black/20">
			<div class="entry-content">
				<?php if (has_post_thumbnail()): ?>
				<div class="-mx-20 relative mb-20">
					<?php the_post_thumbnail('post-thumbnail',
						['class' => 'w-full rounded-xl shadow-xl -translate-y-20 shadow-black/20 block'
							, 'title' => 'Feature image for Post']); ?>
					<?php endif; ?>
				</div>
				<?php the_content(); ?>
				<div class="not-prose space-x-3">
					<?php foundry_posted_on(); foundry_authored_by(); ?>
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
