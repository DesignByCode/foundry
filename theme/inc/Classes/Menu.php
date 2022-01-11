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
			"foundry-mobile-main-menu" => esc_html__('Mobile Main Menu', 'foundry'),
			"foundry-footer-menu-1" => esc_html__('Footer Menu 1', 'foundry'),
			"foundry-footer-menu-2" => esc_html__('Footer Menu 2', 'foundry'),
			"foundry-footer-menu-3" => esc_html__('Footer Menu 3', 'foundry'),
			"foundry-footer-menu-4" => esc_html__('Footer Menu 4', 'foundry')
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

	public static function get_children($menu_array, $menu_id)
	{
		$child_menu = [];

		if (!empty($menu_array) && is_array($menu_array)) {
			foreach ($menu_array as $menu) {
				if ( intval($menu->menu_item_parent) === $menu_id) {
					$child_menu[] = $child_menu;
				}
			}
		}

		return $child_menu;

	}


	/**
	 * Get the menu id by menu location.
	 *
	 * @param string $location
	 *
	 * @return integer
	 */
	public function get_menu_id( $location ) {

		// Get all locations
		$locations = get_nav_menu_locations();

		// Get object id by location.
		$menu_id = ! empty($locations[$location]) ? $locations[$location] : '';

		return ! empty( $menu_id ) ? $menu_id : '';

	}

	/**
	 * Get all child menus that has given parent menu id.
	 *
	 * @param array   $menu_array Menu array.
	 * @param integer $parent_id Parent menu id.
	 *
	 * @return array Child menu array.
	 */
	public function get_child_menu_items( $menu_array, $parent_id ) {

		$child_menus = [];

		if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {

			foreach ( $menu_array as $menu ) {
				if ( intval( $menu->menu_item_parent ) === $parent_id ) {
					$child_menus[] = $menu;
				}
			}
		}

		return $child_menus;
	}




}
