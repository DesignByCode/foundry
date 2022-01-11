<?php
/**
 * Foundry theme navigation
 * @description anchor tag for navigation
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
$link_target = ! empty( $args->target ) && '_blank' === $args->target ? '_blank' : '_self';
?>
<a href="<?php echo esc_url($args->url, 'foundry'); ?>"
   class="text-base flex whitespace-nowrap px-4 py-2 font-medium rounded-md text-primary-500 bg-white hover:text-primary-50 bg-primary-100 hover:bg-primary-500"
>
	<?php esc_html_e($args->title, 'foundry'); ?>
</a>
