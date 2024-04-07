<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Form
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header('form'); ?>
<?php
$contact_form = get__post_meta('contact_form');
$thank_you_page = get__post_meta('thank_you_page');
?>
<main id="main" class="page-components mt-0">
    <div class="form-progress">
        <div class="progress-holder"></div>
    </div>
    <section class="form-section md-padding">
        <div class="container">
            <div class="inner text-center">
                <?= do_shortcode($contact_form) ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer('form'); ?>

<script>
    jQuery(document).ready(function() {
        $key = 1;
        $length = jQuery('.fieldset-cf7mls').length + 1;
        $per_step = 100 / $length;
        console.log($per_step);

        jQuery('.progress-holder').css('--progress-width', $per_step + '%');
        jQuery('.fieldset-cf7mls').each(function(index, element) {
            jQuery(this).attr('progress-width', $key * $per_step);
            $key++;
        });

        jQuery('.cf7mls_back, .cf7mls_next').click(function(e) {
            setTimeout(function() {
                $current = jQuery('.fieldset-cf7mls.cf7mls_current_fs');
                $progress_width = $current.attr('progress-width');
                console.log($progress_width);
                jQuery('.progress-holder').css('--progress-width', $progress_width + '%');

                e.preventDefault();
            }, 500);


        });
    });

    document.addEventListener('wpcf7mailsent', function(event) {
        email = jQuery('input[name="your-email"]').val();
        window.location.href = '<?= $thank_you_page ?>/?email=' + email;
    }, false);
</script>