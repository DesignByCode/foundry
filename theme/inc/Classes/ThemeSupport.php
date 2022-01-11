<?php

namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class ThemeSupport
{
	use Singleton;

	public $post_formats = ['aside', 'gallery', 'quote', 'image', 'video' ];

	private $html5_support_defaults = [
		'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'
	];

	protected function __construct()
	{
		$this->setup_hooks();
	}

	/**
	 * Trigger theme setup
	 * @return void
	 */
	public function setup_hooks()
	{
		add_action('after_setup_theme', [$this, 'theme_setup']);
	}

	public function theme_setup(){
		add_theme_support('align-wide');

		add_theme_support( 'automatic-feed-links' );


		add_theme_support( 'core-block-patterns' );

		add_theme_support( 'html5', $this->html5_support_defaults  );

//		load_theme_textdomain( 'foundry', get_template_directory() . '/languages' );

		add_theme_support( 'post-formats',  $this->post_formats);

		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support( 'post-thumbnails' );
		add_image_size('square-image', 200, 200, true);
		add_image_size('banner-image', 1200, 688, true);
		add_image_size('featured-image', 1200, 800, true);

		global $content_width;
		if ( ! isset ( $content_width) ) {
			$content_width = 800;
		}
	}




}
