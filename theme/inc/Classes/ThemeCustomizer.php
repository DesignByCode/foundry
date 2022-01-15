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

		add_action('customize_register', [$this, 'foundry_copyright']);
	}

	public function foundry_copyright($wpc)
	{
		$wpc->add_panel('foundry_panel', [
			'title' => 'Foundry Settings',
			'priority' => 200,
			'capability' =>'edit_theme_options'
		]);


		$wpc->add_section(
			'copyright_section', [
				'title' => 'Copyright Settings',
				'description' => 'Copyright Section',
				'panel' => 'foundry_panel',
				'priority' => 100
			]
		);

		$wpc->add_setting(
			'copyright-text', [
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field'
			]
		);

		$wpc->add_setting(
			'copyright-url', [
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
			]
		);

		$wpc->add_control(
			'copyright-text', [
				'label' => 'Copyright',
				'description' => 'Enter copyright info here',
				'section' => 'copyright_section',
				'type' => 'text'
			]
		);

		$wpc->add_control(
			'copyright-url', [
				'label' => 'Copyright Url Link',
				'description' => 'Enter copyright url link',
				'section' => 'copyright_section',
				'type' => 'text'
			]
		);

		/**
		 * Header media
		 *
		 */

		$wpc->add_section(
			'header_section', [
				'title' => 'Header media',
				'description' => 'Header settings',
				'panel' => 'foundry_panel',
				'priority' => 10
			]
		);


		$wpc->add_setting(
			'header-background-image', [
				'default' => '',
			]
		);

		$wpc->add_control(new \WP_Customize_Image_Control($wpc, 'header-background-image', [
			'label' => 'Background Image',
			'description' => 'Upload background image for header',
			'section' => 'header_section'
		]));


		$wpc->add_setting(
			'header-height', [
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field'
			]
		);

		$wpc->add_control(
			'header-height', [
				'label' => 'Height',
				'description' => 'Change header height',
				'section' => 'header_section',
				'type' => 'text'
			]
		);





	}

}
