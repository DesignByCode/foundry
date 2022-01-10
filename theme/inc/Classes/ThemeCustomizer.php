<?php
/**
 * Adds theme customizer options
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class ThemeCustomizer
{
	use Singleton;

	public $custom_logo_defaults = [
		'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => ['site-title', 'site-description'],
        'unlink-homepage-logo' => false,
	];

	public $custom_background_defaults = [
		'default-color'          => '#ffffff',
		'default-image'          => '',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'center',
		'default-position-y'     => 'top',
		'default-size'           => 'auto',
		'default-attachment'     => 'scroll',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	];
	public $custom_header_defaults = [
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => true,
		'video-active-callback'  => 'is_front_page',
	];

	protected function __construct()
	{
		$this->setup_hooks();
	}

	public function setup_hooks()
	{
		add_action('after_setup_theme', [$this, 'foundry_customizer']);
	}

	public function foundry_customizer()
	{
		add_theme_support('custom-logo', $this->custom_logo_defaults);

		add_theme_support('custom-background', $this->custom_background_defaults);
		
		add_theme_support( 'custom-header', $this->custom_header_defaults );
	}

}
