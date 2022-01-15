<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Foundry
 * @since Foundry 1.0
 */
?>




    <footer class="footer  bg-gray-900  py-24">
        <div class="wrapper prose prose-mark:text-amber-400 marker:text-amber-400 prose-a:text-primary-500 hover:prose-a:text-primary-300 prose-a:no-underline
        hover:prose-a:underline grid
        md:grid-cols-4
         gap-6">
			<?php wp_nav_menu(['theme_location' => 'foundry-footer-menu-1']); ?>
			<?php wp_nav_menu(['theme_location' => 'foundry-footer-menu-2']); ?>
			<?php wp_nav_menu(['theme_location' => 'foundry-footer-menu-3']); ?>
        </div>
		<div class="wrapper text-gray-500 pt-12  text-center">
			<a class="text-rose-500 hover:underline" href="<?= get_theme_mod('copyright-url');?>" target="_blank" rel="nofollow">
				<?= get_theme_mod('copyright-text'); ?>
			</a>
		</div>
    </footer>

	</main><!-- #main -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
