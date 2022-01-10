<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
	<div class="wrapper p-20 my-24 bg-white rounded-2xl  space-y-5 shadow-2xl shadow-primary-500/20">

	<header class="page-header text-center">
		<h1 class="title  text-primary-600"><?php esc_html_e( 'Nothing here', 'foundry' ); ?></h1>
	</header><!-- .page-header -->

	<div class="error-404 not-found">
		<div class="page-content text-center space-y-5">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'foundry' ); ?></p>
<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->
	</div>

<?php
get_footer();
