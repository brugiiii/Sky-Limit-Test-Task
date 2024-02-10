<?php
$footer_type = get_field('footer_type');
?>

<footer class="footer rounded-top-5">
    <div class="container">
        <?php $footer_type === 'main' ? get_template_part('footers/main') : get_template_part('footers/additional') ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>

</body>

</html>