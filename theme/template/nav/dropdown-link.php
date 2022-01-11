<?php

/**
 * Foundry theme navigation dropdown sublist
 * @description dropdown list submenus
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
?>

<a href="<?php echo esc_url($args->url);?>" class="-m-3 p-3 flex items-start rounded-lg hover:bg-primary-100">
		<svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
	</svg>
	<div class="ml-4">
		<p class="text-base font-medium text-gray-900">
			<?php esc_html_e($args->title, 'foundry') ;?>
		</p>
		<?php if($args->description): ?>
		<p class="mt-1 text-sm text-gray-500">
			<?php esc_html_e($args->description, 'foundry');?>
		</p>
		<?php endif; ?>
	</div>
</a>
