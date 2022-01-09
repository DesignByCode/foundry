<?php
/**
 * The header.
 *
 * This is the template that displays all the <head> section and everything up until main.
 *

 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-primary-900 text-purple-200'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'foundry' ); ?></a>

    <div id="content" class="site-content bg-gray-500 text-white">
        <div id="primary" class="content-area wrapper">
            <main id="main" class="site-main" role="main">
