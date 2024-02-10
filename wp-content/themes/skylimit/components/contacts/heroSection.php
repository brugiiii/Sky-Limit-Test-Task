<section class="contacts section">
    <div class="container">
        <h1 class="text-uppercase mb-5">
            Наші контакти
        </h1>
        <div class="row align-items-stretch">
            <div class="col-lg-7">
                <div class="contacts-content d-flex flex-column h-100">
                    <?= get_template_part('templates/contacts/contactsList'); ?>
                    <div class="mt-auto">
                        <p class="contacts-list__text">
                            Соціальні мережі
                        </p>
                        <?php get_template_part('templates/socialsList'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contacts-wrapper__thumb overflow-hidden rounded-5">
                    <?php the_field('map', 7); ?>
                </div>
            </div>
        </div>

    </div>
</section>