<?php
/**
 * The main front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
get_header();
?>



<?//= foundry_get_checkout_url() ?>
<?//= foundry_get_account_url() ?>
<?//= foundry_get_cart_url() ?>



<?php if (have_posts()): ?>
	<?php while (have_posts()):
		the_post();
		get_template_part('template/content/content');
	endwhile; ?>
<?php endif;
get_footer();
?>

