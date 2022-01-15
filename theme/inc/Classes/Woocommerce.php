<?php

namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class Woocommerce
{
	use Singleton;

	public function __construct()
	{
		$this->setup_hooks();
	}

	public function setup_hooks()
	{
//		add_action('after_setup_theme', [$this, 'foundry_add_woocommerce_support']);
		add_filter( 'woocommerce_add_to_cart_fragments', [$this, 'woocommerce_header_add_to_cart_fragment'] );
	}

	public function foundry_add_woocommerce_support()
	{
		add_theme_support( 'woocommerce');
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	public function woocommerce_header_add_to_cart_fragment($fragments)
	{
		global $woocommerce;

		ob_start();
		?>

			<a class="cart-customlocation relative z-50 pl-4 pr-2 py-2 group rounded-md inline-flex items-center text-base font-medium focus:outline-none focus:ring-2
					focus:ring-offset-2 focus:ring-primary-500  text-white text-primary-50 bg-primary-500 hover:bg-primary-600" href="<?php echo wc_get_cart_url(); ?>"
			   title="<?php _e( 'View your shopping cart' ); ?>">
				<?php if ( WC()->cart->get_cart_contents_count() !== 0): ?>
					<span class="absolute rounded-full bg-rose-500 text-xs py-1 px-2 shadow-md shadow-rose-700  -right-3 -top-2 text-white">
						<?= WC()->cart->get_cart_contents_count();?>
					</span>
				<?php endif;?>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
				</svg>
				<span class="mr-2">

					<?php echo WC()->cart->get_cart_total(); ?>
					</span>
			</a>

		<?php
		$fragments['a.cart-customlocation'] = ob_get_clean();
		return $fragments;
	}

}
