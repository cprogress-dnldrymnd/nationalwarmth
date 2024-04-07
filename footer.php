<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish 
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/
get_template_part('template-parts/footer/content', 'before-footer');
do_action( 'open_footer');
get_template_part('template-parts/footer/footer', 'logo') ;
get_template_part('template-parts/footer/footer', 'navigation') ;
get_template_part('template-parts/footer/footer', 'text') ;
get_template_part('template-parts/footer/footer', 'form') ;
do_action( 'close_footer' );
?>

<?php wp_footer();?>
</body>
</html>