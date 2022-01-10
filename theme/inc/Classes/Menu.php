<?php
/**
 * Register and create menus for theme
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */


namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class Menu
{
	use Singleton;

	protected function __construct()
	{
		$this->setup_hooks();
	}

	/**
	 * Initialize the menu
	 * @return void
	 */
	public function setup_hooks()
	{
		add_action('init', [$this, 'register_theme_menus']);
	}

	/**
	 * Register the menus
	 * @return void
	 */
	public function register_theme_menus()
	{
		register_nav_menus([
			"foundry-main-menu" => esc_html__('Main Menu', 'foundry'),
			"foundry-mobile-main-menu" => esc_html__('Mobile Main Menu', 'foundry')
		]);
	}

	/**
	 * Get menu id by theme name slug
	 * @param $slug
	 * @return int
	 */
	protected static function get_menu_id_by_slug($slug)
	{
		$locations = get_nav_menu_locations();
		return $locations[$slug];
	}

	public static function get_items($slug)
	{
		return wp_get_nav_menu_items(self::get_menu_id_by_slug($slug));
	}



}
