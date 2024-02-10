<?php
$number = get_field('number', 7);
$email = get_field('email', 7);
?>

<ul class="contacts-list d-flex flex-column">
    <li class="contacts-list__item">
        <a href="<?= $number['url']; ?>">
            <?= $number['title']; ?>
        </a>
    </li>
    <li class="contacts-list__item">
        <a href="<?= $email['url']; ?>" target="_blank" rel="nofollow noopener noreferrer">
            <?= $email['title']; ?>
        </a>
    </li>
</ul>