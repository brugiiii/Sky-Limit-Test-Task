<div class="main-footer d-flex gap-5 justify-content-between align-items-stretch">
    <div class="col-9">
        <div class="additional-footer__wrapper d-flex align-items-start justify-content-between mb-4">
            <?php the_custom_logo(); ?>

            <?php get_template_part('templates/navigation', null, array('location' => 'menu-header')); ?>
        </div>

        <div>
            <div class="d-flex justify-content-between">
                <span>
                    Copyright &#169;2024
                </span>
                <span>
                    Made by <a href="https://t.me/brugiiiiish">Eduard Bruhosh</a>
                </span>
            </div>
        </div>
    </div>
    <?= get_template_part('templates/socialsList'); ?>
</div>

