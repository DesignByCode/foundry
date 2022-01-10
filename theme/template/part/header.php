<header id="site-header" role="banner" class="bg-white py-12 ">
<!--	<img src="--><?php //header_image(); ?><!--" width="--><?php //echo absint( get_custom_header()->width ); ?><!--" height="--><?php //echo absint( get_custom_header()->height ); ?><!--" alt="--><?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?><!--">-->
    <div class="wrapper">
		<?php
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
		?>
        <div class="space-y-3">
            <h1 class="title text-primary-600"><a href="<?php echo site_url();?>"> <?php bloginfo('name');?></a></h1>
            <h3 class="sub-title text-secondary-500"><?php bloginfo('description');?></h3>
        </div>
    </div>
</header>

<?php
wp_nav_menu([
	'theme_location' => 'foundry-main-menu'
])
?>
