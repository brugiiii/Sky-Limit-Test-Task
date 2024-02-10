<div class="additional-header d-flex justify-content-between align-items-center">
    <nav class="main-nav">
        <?php get_template_part('templates/navigation', null, array('location' => 'menu-header')); ?>
    </nav>

    <?php the_custom_logo(); ?>

    <?php get_template_part('templates/contactsList'); ?>
</div>

