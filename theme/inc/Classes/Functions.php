<?php

namespace Foundry\Classes;

use Foundry\Traits\Singleton;

class Functions
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    private function setup_hooks()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
    }

    public function register_styles()
    {
        wp_register_style('foundry-css', FOUNDRY_DIR_URI . '/style.css', [],  FOUNDRY_DIR_URI . '/style.css' , 'all' );
        wp_enqueue_style( 'foundry-css' );
    }

    public function register_scripts()
    {
        wp_register_script('foundry-js', get_theme_file_uri('/js/foundry.js'), array('wp-element'), FOUNDRY_VERSION, true);
        wp_enqueue_script('foundry-js');
    }

}