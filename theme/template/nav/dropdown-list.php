<?php
/**
 * Foundry theme navigation dropdown list
 * @description dropdown list under nav parent button
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

?>

<!-- dropdown list-->
<div
	style="display: none"
	x-ref="panel"
	x-show="open"
	x-on:click.outside="close($refs.button)"
	:id="$id('dropdown-button')"
	class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
	<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">

		<div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
			<?php foreach ($args as $index => $item):  ?>
				<?php get_template_part('template/nav/dropdown', 'link', $item);?>
			<?php endforeach; ?>
		</div>

		<!-- submenu buttons -->
		<div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
			<div class="flow-root">
				<a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
					<svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
					<span class="ml-3">Watch Demo</span>
				</a>
			</div>

			<div class="flow-root">
				<a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">

					<svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
					</svg>
					<span class="ml-3">Contact Sales</span>
				</a>
			</div>
		</div>
		<!-- end submenu buttons -->

	</div>
</div>

<!-- end dropdown list-->
