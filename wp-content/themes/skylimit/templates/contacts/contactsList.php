<?php
$number = get_field('number', 7);
$email = get_field('email', 7);
$address = get_field('address', 7);
$schedule = get_field('schedule', 7);
?>

<ul class="contacts-list d-flex flex-wrap justify-content-between">
    <li class="contacts-list__item">
        <span class="contacts-list__text mb-2 d-block">
            Номер телефону
        </span>
        <a href="<?= $number['url']; ?>">
            <?= $number['title']; ?>
        </a>
    </li>
    <li class="contacts-list__item">
        <span class="contacts-list__text mb-2 d-block">
            Адреса офісу
        </span>
        <a href="<?= $address['url']; ?>" target="_blank" rel="nofollow noopener noreferrer">
            <?= $address['title']; ?>
        </a>
    </li>
    <li class="contacts-list__item">
        <span class="contacts-list__text mb-2 d-block">
            Електронна пошта
        </span>
        <a href="<?= $email['url']; ?>" target="_blank" rel="nofollow noopener noreferrer">
            <?= $email['title']; ?>
        </a>
    </li>
    <li class="contacts-list__item">
        <span class="contacts-list__text mb-2 d-block">
            Графік роботи
        </span>
        <span>
            <?= $schedule; ?>
        </span>
    </li>
</ul>
