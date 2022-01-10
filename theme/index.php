<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post();
   		get_template_part('template/content/content');
     endwhile; ?>
<?php endif; ?>

<?php
get_footer();
