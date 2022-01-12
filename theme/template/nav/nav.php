<?php
/**
 * Foundry theme navigation
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

use Foundry\Classes\Menu;
$menu_class     = Menu::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'foundry-main-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );
?>
<nav x-data="{
	navOpen: false,
	closeNav() {  this.navOpen = false },
	toggleNav() { this.navOpen = true}
}" class="relative bg-white border-y shadow-md py-2 border-primary-500/20">
	<div class="wrapper">
		<div class="flex justify-between items-center py-3 md:justify-start md:space-x-10">
			<!-- site brand -->
			<?php get_template_part('template/nav/nav', 'brand'); ?>
			<!-- end site brand -->
			<!-- mobile nav toggle button -->

			<?php get_template_part('template/nav/hamburger'); ?>
			<!-- end mobile nav toggle button -->

			<!-- Inner menu list -->
			<div class="hidden md:flex space-x-3" role="navigation">
				<?php if ( ! empty( $header_menus ) && is_array( $header_menus ) ) :?>

					<?php foreach ( $header_menus as $menu_item ): ?>

						<?php if ( ! $menu_item->menu_item_parent ):
							$child_menu_items   = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
							$has_children       = ! empty( $child_menu_items ) && is_array( $child_menu_items );
							$link_target        = ! empty( $menu_item->target ) && '_blank' === $menu_item->target ? '_blank' : '_self'; ?>

							<?php if ( ! $has_children ): ?>
								<?php get_template_part('template/nav/nav', 'link' , $menu_item); ?>
							<?php else: ?>
							<div x-data="
							{	open: false, toggle() { if (this.open) { return this.close() } this.open = true }, close(focusAfter) { this.open = false
					    		focusAfter && focusAfter.focus()}}"
								 x-on:keydown.escape.prevent.stop="close($refs.button)"
								 x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
								 x-id="['dropdown-button']"
								 class="relative">
								<button type="button"
										x-ref="button"
										x-on:click="toggle()"
										:aria-expanded="open"
										:aria-controls="$id('dropdown-button')"
										class="pl-4 pr-2 py-2 group rounded-md inline-flex items-center text-base font-medium focus:outline-none focus:ring-2
								focus:ring-offset-2 focus:ring-primary-500  text-primary-500 bg-white hover:text-primary-50 bg-primary-100	hover:bg-primary-500"
										aria-expanded="false">
									<span><?php esc_html_e($menu_item->title, 'foundry'); ?></span>
									<svg  class="text-primary-400 ml-1 h-5 w-5 group-hover:text-primary-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
										 fill="currentColor"
										 aria-hidden="true">
										<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
									</svg>

								</button>
								<!-- dropdown list-->
								<?php get_template_part('template/nav/dropdown', 'list', $child_menu_items); ?>
								<!-- end dropdown list-->
							</div>

							<?php endif;?>
						<?php endif;?>
					<?php endforeach; ?>
				<?php endif;?>
			</div><!-- Inner menu list -->
			<?php if ( ! is_user_logged_in() ): ?>
			<div class="hidden md:flex items-center md:space-x-3 justify-end md:flex-1 lg:w-0">
				<a href="#" class="text-base flex whitespace-nowrap px-4 py-2 font-medium rounded-md text-primary-500 bg-white hover:text-primary-50 bg-primary-100 hover:bg-primary-500">
					Sign in
				</a>
				<a href="#"
				   class="text-base flex whitespace-nowrap px-4 py-2 font-medium rounded-md text-white bg-white hover:text-primary-50 bg-yellow-500 hover:bg-yellow-400">
					Sign up
				</a>
			</div>

			<?php endif; ?>
			<?php get_template_part('template/nav/nav', 'mobile'); ?>
		</div>
	</div>
</nav>

