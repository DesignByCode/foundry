<?php
/**
 * Foundry theme navigation for mobile
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

use Foundry\Classes\Menu;

$menu_class     = Menu::get_instance();

if ($header_mobile_menu_id = $menu_class->get_menu_id( 'foundry-mobile-main-menu' )) {

	$header_mobile_menus   = wp_get_nav_menu_items( $header_mobile_menu_id );
}

if ($header_mobile_submenu_id = $menu_class->get_menu_id( 'foundry-mobile-main-submenu' )) {
	$header_mobile_submenus   = wp_get_nav_menu_items( $header_mobile_submenu_id );
}


//
//dd($header_mobile_submenus);
?>


<!--
   Mobile menu, show/hide based on mobile menu state.

   Entering: "duration-200 ease-out"
	 From: "opacity-0 scale-95"
	 To: "opacity-100 scale-100"
   Leaving: "duration-100 ease-in"
	 From: "opacity-100 scale-100"
	 To: "opacity-0 scale-95"
 -->
<div x-show="navOpen" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden l">
	<div class="rounded-lg shadow-2xl shadow-primary-500 ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
		<div class="pt-5 pb-6 px-5">
			<div class="flex items-center justify-between">

				<?php get_template_part('template/nav/nav', 'brand'); ?>

				<div class="-mr-2 space-x-3">
					<div class="-translate-y-1 inline-block">
						<?php foundry_min_cart(); ?>
					</div>
					<button x-on:click="closeNav()" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500
					hover:bg-gray-100
					focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
						<span class="sr-only">Close menu</span>
						<!-- Heroicon name: outline/x -->
						<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
			</div>
			<?php if ( ! empty( $header_mobile_menus ) && is_array( $header_mobile_menus ) ) :?>
				<div class="mt-6">
					<nav class="grid gap-y-8">
						<?php foreach ( $header_mobile_menus as $menu_item ): ?>

							<a href="<?= esc_url($menu_item->url);?>" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-100">
								<!-- Heroicon name: outline/view-grid -->
								<svg class="flex-shrink-0 h-6 w-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
									 aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
								</svg>
								<span class="ml-3 text-base font-medium text-gray-900">
                <?php esc_html_e($menu_item->title, 'foundry'); ?>
              </span>
							</a>
						<?php endforeach; ?>
					</nav>
				</div> <!--end mt-6-->
			<?php endif;?>
		</div>
		<div class="py-6 px-5 space-y-6">
			<?php if ( ! empty( $header_mobile_submenus ) && is_array( $header_mobile_submenus ) ) :?>
				<div class="grid grid-cols-2 gap-y-4 gap-x-8">
					<?php foreach ( $header_mobile_submenus as $menu_item ): ?>
						<a href="<?= esc_url($menu_item->url);?>" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-100">
							<?php esc_html_e($menu_item->title, 'foundry'); ?>
						</a>
					<?php endforeach; ?>

				</div>
			<?php endif; ?>
			<?php if (is_user_logged_in()): ?>
				<a href="<?= esc_url( wc_logout_url()) ;?>" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base
				font-medium text-white bg-red-600
				hover:bg-red-700">
					<?= esc_html__('Sign-out', 'foundry'); ?>
				</a>
			<?php  else: ?>
				<div>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md
				shadow-sm
				 text-base font-medium text-white
				bg-primary-600
				hover:bg-primary-700">
						<?= esc_html__('Sign up', 'foundry');?>
					</a>
					<p class="mt-6 text-center text-base font-medium text-gray-500">
						<?= esc_html__('Existing customer?', 'foundry');?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="text-primary-600 hover:text-primary-500">
							<?= esc_html__('Sign in', 'foundry');?>
						</a>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
