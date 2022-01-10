<?php

namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class ThemeMenus
{
	use Singleton;

	protected function __construct()
	{
		$this->setup_hooks();
	}

	public function setup_hooks()
	{
		add_action('init', [$this, 'register_theme_menus']);
	}

	public function register_theme_menus()
	{
		register_nav_menus([
			"foundry-main-menu" => esc_html__('Main Menu', 'foundry'),
			"foundry-mobile-main-menu" => esc_html__('Mobile Main Menu', 'foundry')
		]);
	}


}
