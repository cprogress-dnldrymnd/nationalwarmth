<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$disable_module = $module['disable_module'];
$args = array(
    'numberposts' => -1,
    'post_type'   => 'partners'
);
$partners = get_posts($args);
?>
<?php if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('logo-slider md-padding', $module_id, $template_class) ?> data-aos="flip-up">
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container large-container">
            <?php
            $DisplayData->heading(array(
                'heading' => $heading
            ), 'text-center mb-5');
            ?>
            <div class="logo-slider-box">
                <div class="swiper mySwiper-logoSwiper">
                    <div class="swiper-wrapper text-center align-items-center">
                        <?php foreach ($partners as $partner) { ?>
                            <div class="swiper-slide">
                                <a href="<?= get_the_permalink($partner->ID) ?>">
                                    <?php
                                    $DisplayData->image(array(
                                        'image_id' => get_post_thumbnail_id($partner->ID),
                                        'size' => 'medium'
                                    ), 'pe-3 ps-3');
                                    ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>