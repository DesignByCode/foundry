<?php
/**
 * Abstract all Foundry functionality in separate Classes
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

use Foundry\Classes\Menu;


?>

<?php if (is_front_page()) : ?>
	<header id="site-header" role="banner" class="bg-white py-12 ">
		<div class="wrapper">
			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}
			?>
			<div class="space-y-3">
				<h1 class="title text-primary-600"><a href="<?php echo site_url();?>"> <?php bloginfo('name');?></a></h1>
				<h3 class="sub-title text-secondary-500"><?php bloginfo('description');?></h3>
			</div>
		</div>
	</header>
<?php endif;?>
<!--<pre>-->

<?php
//print_r(Menu::get_items('foundry-main-menu')[0]->menu_item_parent);
//wp_nav_menu([
//	'theme_location' => 'foundry-main-menu'
//])
?>
<!--</pre>-->
