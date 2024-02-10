<div class="main-header d-flex justify-content-between align-items-center">
    <?php the_custom_logo(); ?>

    <nav class="main-nav">
        <?php get_template_part('templates/navigation', null, array('location' => 'menu-header')); ?>
    </nav>

    <?php get_template_part('templates/contactsList'); ?>
</div>

