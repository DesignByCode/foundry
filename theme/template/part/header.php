<?php
/**
 * Theme header
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

use Foundry\Classes\Menu;


?>
<?php get_template_part('template/nav/nav'); ?>

<?php if (is_front_page()) : ?>
	<header id="site-header" role="banner" class="bg-white py-12 ">
		<div class="wrapper flex items-center md:space-x-3">
			<?php
			if ( function_exists( 'the_custom_logo' ) ): ?>

				<div class="block rounded-full overflow-hidden shadow-md  ">
					<?php the_custom_logo(); ?>
				</div>

			<?php endif; ?>
			<div class="space-y-3">
				<h1 class="title text-primary-600"><a href="<?php echo site_url();?>"> <?php bloginfo('name');?></a></h1>
				<h3 class="sub-title text-secondary-500"><?php bloginfo('description');?></h3>
			</div>
		</div>
	</header>
<?php endif;?>



