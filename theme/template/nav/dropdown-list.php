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
	class="absolute z-50 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
	<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">

		<div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
			<?php foreach ($args as $index => $item):  ?>
				<?php get_template_part('template/nav/dropdown', 'link', $item);?>
			<?php endforeach; ?>
		</div>

		<div class="px-5 py-5 bg-gray-50 sm:px-8 sm:py-8">
			<div>
				<h3 class="text-sm tracking-wide font-medium text-gray-500 uppercase">
					Recent Products
				</h3>
				<?php
				$args = [
					'post_type' => 'product',
					'stock' => 1,
					'posts_per_page' => 3,
					'orderby' =>'date',
					'order' => 'DESC'];
					$loop = new WP_Query( $args );
				?>


				<ul role="list" class="mt-4 space-y-4">
					<?php while ($loop->have_posts()): $loop->the_post(); global $product;?>
					<li class="text-base truncate">
						<a href="<?= get_the_permalink();?>" class="font-medium text-gray-900 hover:text-gray-700">
							<?php the_title(); ?>
						</a>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

				</ul>
			</div>
			<div class="mt-5 text-sm">
				<a href="<?= site_url('shop') ?>" class="font-medium text-primary-600 hover:text-primary-500"> View all products <span aria-hidden="true">&rarr;</span></a>
			</div>
		</div>
	</div>
</div>

<!-- end dropdown list-->
