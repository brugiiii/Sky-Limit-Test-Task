<div class="additional-footer">

    <div class="d-flex justify-content-between mb-5">
        <div class="d-flex flex-column">
            <?php the_custom_logo(); ?>

            <?= get_template_part('templates/socialsList'); ?>
        </div>

        <?php get_template_part('templates/navigation', null, array('location' => 'menu-header')); ?>

        <?= get_template_part('templates/contacts/contactsList'); ?>
    </div>

    <div class="d-flex justify-content-between">
        <span>
             Copyright &#169;2024
        </span>
        <span>
            Made by <a href="https://t.me/brugiiiiish">Eduard Bruhosh</a>
        </span>
    </div>
</div>

