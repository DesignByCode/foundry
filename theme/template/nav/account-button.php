<?php
/**
 * Foundry theme navigation account dropdown
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */

if (is_user_logged_in()): ?>


	<div
		x-data="{
			accountOpen: false,
			toggleAccount() { this.accountOpen = ! this.accountOpen},
			close() {
				this.accountOpen = false
			}
		}"
		x-on:click.outside="close()"

		class="relative">
		<button
			aria-expanded="false"
			x-on:click="toggleAccount()"
			x-on:keydown.escape.prevent.stop="close()"
			class="inline-flex relative h-9 w-11">
			<img src="<?= get_avatar_url(wp_get_current_user()->user_email); ?>"
				 class="absolute h-11 w-11  rounded-lg border-2 border-white shadow-md"
				 alt="<?= wp_get_current_user()->first_name;?>"
			/>
		</button>
		<div
			style="display: none"
			x-show="accountOpen"
			class="relative text-sm">
			<div class="absolute space-y-1 top-1 right-0 w-screen max-w-[220px] shadow-2xl rounded-lg border border-gray-200 bg-white overflow-hidden divide-y divide-gray-200 ">
				<div>

					<a class="flex  items-center font-semibold  p-2 hover:bg-gray-100" href="<?= foundry_get_account_url() ?>">
				<span class="rounded p-1 mr-2 inline-block text-primary-500 bg-primary-100 border border-primary-200">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
					</svg>
				</span>
						<span><?= esc_html__('My account', 'foundry') ?></span>
					</a>

					<!--					<a class="flex items-center font-semibold  p-2 hover:bg-gray-100" href="">-->
					<!--				<span class="rounded p-1 mr-2 inline-block text-primary-500 bg-primary-100 border border-primary-200">-->
					<!--<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
					<!--  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />-->
					<!--</svg>-->
					<!--				</span>-->
					<!--						<span>--><?//= esc_html__('Orders', 'foundry') ?><!--</span>-->
					<!--					</a>-->

					<!--					<a class="flex items-center font-semibold  p-2 hover:bg-gray-100" href="">-->
					<!--				<span class="rounded p-1 mr-2 inline-block text-primary-500 bg-primary-100 border border-primary-200">-->
					<!--<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
					<!--  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />-->
					<!--</svg>-->
					<!--					</svg>-->
					<!--				</span>-->
					<!--						<span>--><?//= esc_html__('Downloads', 'foundry') ?><!--</span>-->
					<!--					</a>-->

					<!--					<a class="flex items-center font-semibold  p-2 hover:bg-gray-100" href="">-->
					<!--				<span class="rounded p-1 mr-2 inline-block text-primary-500 bg-primary-100 border border-primary-200">-->
					<!--<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
					<!--  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />-->
					<!--</svg>-->
					<!--					</svg>-->
					<!--				</span>-->
					<!--						<span>--><?//= esc_html__('Account details', 'foundry') ?><!--</span>-->
					<!--					</a>-->

				</div>

				<div>
					<a class="flex items-center font-semibold  p-2 bg-gray-100 hover:bg-gray-200" href="<?= esc_url( wc_logout_url()) ;?>">
				<span class="rounded p-1 mr-2 inline-block text-primary-500 bg-primary-100 border border-primary-200">
<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
</svg>
					</svg>
				</span>
						<span><?= esc_html__('Logout', 'foundry') ?></span>
					</a>

				</div>

			</div>
		</div>

	</div>


<?php endif; ?>
