<?php
/**
 * Abstract all Foundry functionality in separate Classes
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class Functions
{
    use Singleton;

	protected function __construct()
	{
		$this->theme_setup();
		$this->theme_support();
		$this->theme_menus();
		$this->theme_metabox();
	}

	/**
	 * Initialize Theme Setup
	 * @return void
	 */
	public function theme_setup()
	{
		StyleAndScripts::get_instance();
	}

	/**
	 * Add support features to Foundry Theme
	 * @return void
	 */
	public function theme_support()
	{
		ThemeSupport::get_instance();
		ThemeCustomizer::get_instance();
		Woocommerce::get_instance();
	}

	public function theme_menus()
	{
		Menu::get_instance();
	}

	public function theme_metabox()
	{
		MetaBox::get_instance();
	}


}
