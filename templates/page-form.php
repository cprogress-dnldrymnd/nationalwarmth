<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Form
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header('form'); ?>
<?php
$icon = get__post_meta('icon');
?>
<main id="main" class="page-components">
    <div class="form-progress">
        <div class="progress"></div>
    </div>
    <section class="form-section md-padding">
        <div class="container">
            <div class="inner text-center">
				<?= do_shortcode('[contact-form-7 id="4ab7e41" title="Find installer Form"]') ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer('form'); ?>