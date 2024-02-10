<?php
/*
Template Name: Home
*/

get_header();

$sidebar_position = get_field('sidebar_position');
?>

<main>
    <div class="container">
        <div class="main-wrapper row <?= $sidebar_position; ?>">
            <?php get_template_part('components/sidebar'); ?>
            <div class="<?= $sidebar_position !== 'no_sidebar' ? 'col-9' : ''; ?>">
                <?php get_template_part('components/home/heroSection'); ?>
                <?php get_template_part('components/home/aboutSection'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>


