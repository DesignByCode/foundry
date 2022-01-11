<?php
/**
 * The single page layout
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
get_header();
?>

<?php if (have_posts()): ?>
	<?php while (have_posts()):

		the_post();
		get_template_part('template/content/content');
	endwhile; ?>
<?php endif;
get_footer();
?>

