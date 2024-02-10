<?php
$instagram = get_field('instagram');
$facebook = get_field('facebook');
$viber = get_field('viber');
?>

<ul class="socials-list d-flex">
    <li class="socials-list__item">
        <a class="socials-list__link" href="<?= $instagram['url']; ?>" target="_blank" rel="noopener nofollow noreferrer">
            <svg class="socials-list__icon" width="32" height="32">
                <use href="<?php get_image('sprite.svg#icon-instagram'); ?>"></use>
            </svg>
        </a>
    </li>
    <li class="socials-list__item">
        <a class="socials-list__link" href="<?= $facebook['url']; ?>" target="_blank" rel="noopener nofollow noreferrer">
            <svg class="socials-list__icon" width="32" height="32">
                <use href="<?php get_image('sprite.svg#icon-facebook'); ?>"></use>
            </svg>
        </a>
    </li>
    <li class="socials-list__item">
        <a class="socials-list__link" href="<?= $viber['url']; ?>" target="_blank" rel="noopener nofollow noreferrer">
            <svg class="socials-list__icon" width="32" height="32">
                <use href="<?php get_image('sprite.svg#icon-viber'); ?>"></use>
            </svg>
        </a>
    </li>
</ul>