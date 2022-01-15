<?php
/**
 * Foundry Login page
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
get_header(); ?>

<h1>login</h1>
<?php if (have_posts()): ?>
	<?php while (have_posts()):
		the_post();
		get_template_part('template/content/content');
	endwhile; ?>
<?php else: get_template_part('template/content/none');?>
<?php endif;
get_footer();
