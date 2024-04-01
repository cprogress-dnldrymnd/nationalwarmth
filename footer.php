<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish 
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/
?>

<?php
get_template_part('template-parts/footer/content', 'before-footer');
do_action('open_footer');
get_template_part('template-parts/footer/footer', 'logo');
get_template_part('template-parts/footer/footer', 'columns');
if (is_active_sidebar('footer_bottom')) {
    get_template_part('template-parts/footer/footer', 'navigation');
}
get_template_part('template-parts/footer/footer', 'text');
do_action('close_footer');
?>

<?php wp_footer(); ?>
</body>

</html>