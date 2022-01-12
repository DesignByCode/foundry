<?php
/**
 * Foundry theme navigation hamburger
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

?>

<div x-on:click="toggleNav()" class="-mr-2 -my-2 md:hidden">
	<button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-primary-400 hover:text-primary-500 hover:bg-primary-100
				focus:outline-none
				focus:ring-2 focus:ring-inset focus:ring-primary-500">
		<span class="sr-only">Open menu</span>
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
		</svg>
	</button>
</div>
