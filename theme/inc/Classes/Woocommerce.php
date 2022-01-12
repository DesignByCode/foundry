<?php

namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class Woocommerce
{
	use Singleton;

	public function __construct()
	{
//		$this->setup_hooks();
	}

	public function setup_hooks()
	{
		add_action('after_setup_theme', [$this, 'foundry_add_woocommerce_support']);
	}

	public function foundry_add_woocommerce_support()
	{
		add_theme_support( 'woocommerce');
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

}
