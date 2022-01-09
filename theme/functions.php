<?php

if ( ! defined('FOUNDRY_VERSION')) {
    define('FOUNDRY_VERSION', wp_get_theme('version'));
}

if ( ! defined( 'FOUNDRY_DIR_PATH' ) ) {
    define( 'FOUNDRY_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'FOUNDRY_DIR_URI' ) ) {
    define( 'FOUNDRY_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}


require_once __DIR__ . '/vendor/autoload.php';

function foundry_load_functions(){
    \Foundry\Classes\Functions::get_instance();
}
foundry_load_functions();
