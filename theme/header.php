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
<body <?php body_class('overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'foundry' ); ?></a>
    <main role="main" id="content" class="site-content">
        <?php get_template_part('template/part/header'); ?>


