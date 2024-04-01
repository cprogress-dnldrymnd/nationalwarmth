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
        <div class="progress-holder" style="--progress-width: 33.3333333%"></div>
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

<script>
    jQuery(document).ready(function() {
        $key = 1;
        $length = jQuery('.fieldset-cf7mls').length() + 1;
        $per_step = 100 / $length;
        console.log($per_step);
        jQuery('.fieldset-cf7mls').each(function(index, element) {
            // element == this

        });
    });
</script>