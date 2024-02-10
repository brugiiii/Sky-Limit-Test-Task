<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <?php wp_head(); ?>

    <title><?php wp_title(); ?></title>

</head>

<?php
$header_type = get_field('header_type');
$text_primary = get_field('text_primary');
$background_primary = get_field('background_primary');
?>

<body style="visibility: hidden">

<style>
    :root {
    <?= $text_primary ? '--primary-text-color: ' . $text_primary . ';' : ''; ?>
    <?= $background_primary ? '--primary-bg-color: ' . $background_primary . ';' : ''; ?>
    }
</style>

<div class="wrapper">
    <header class="header">
        <div class="container">
            <?php
            $header_type === 'main' ? get_template_part('headers/main') : get_template_part('headers/additional')
            ?>
        </div>
    </header>
