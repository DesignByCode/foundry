<div class="relative">
	<button type="button" class=" px-4 py-2 group rounded-md inline-flex items-center text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500	text-primary-500 bg-white hover:text-primary-50	hover:bg-primary-500"
			aria-expanded="false">
		<span><?php esc_html_e($item->title, 'foundry'); ?></span>
		<svg class="text-primary-400 ml-2 h-5 w-5 group-hover:text-primary-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
			 aria-hidden="true">
			<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
		</svg>
	</button>
	<!-- dropdown list-->
	<?php get_template_part('template/nav/dropdown', 'list', $new_menu); ?>
	<!-- end dropdown list-->
</div>
