<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$heading = $module['description'];
$description = $module['description'];
$image = $module['image'];
$image_mobile = $module['image_mobile'];
$disable_module = $module['disable_module'];
?>


<?php if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('image-section lg-padding', $module_id, $template_class) ?> data-aos="flip-up">
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container text-center">
            <?php
            $DisplayData->heading(array(
                'heading' => $heading
            ), 'no-margin');
            $DisplayData->description(array(
                'description' => $description
            ), 'mb-5 light-color');
            ?>
            <div class="image-box mb-5">

                <?php if ($image) { ?>
                    <img class="d-none d-lg-inline" src="<?= wp_get_attachment_image_url($image, 'large') ?>">
                <?php } ?>
                <?php if ($image_mobile) { ?>
                    <img class="d-none d-lg-inline" src="<?= wp_get_attachment_image_url($image_mobile, 'large') ?>">
                <?php } else { ?>
                    <img class="d-inline d-lg-none" src="<?= wp_get_attachment_image_url($image, 'large') ?>">
                <?php } ?>

            </div>
            <div class="subscribe-box">
                <div class="description-box text-center medium-text light-color mb-4">
                    <p>
                        Enter your email address below to subscribe to our quarterly magazine.
                    </p>
                </div>
                <div class="form-box">
                    <?= do_shortcode('[contact-form-7 id="85" title="Subscribe Form"]') ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>