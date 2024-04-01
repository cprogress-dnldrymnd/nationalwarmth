<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$SVG = new SVG;
$heading = $module['heading'];
$subheading = $module['subheading'];
$items = $module['items'];
$disable_module = $module['disable_module'];
$background_color = $module['background_color'];
$text_align = $module['text_align'];

$background = $background_color ? $background_color : 'background-primary';
$text_alignment = $text_align ? $text_align : 'text-center';
if (count($items) > 3) {
    $class = 'col-lg-3';
} else if (count($items) == 3) {
    $class = 'col-lg-4';
} else if (count($items) == 2) {
    $class = 'col-lg-6';
} else {
    $class = 'col-lg-3';
}
if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('icon-box-section lg-padding ' . $background, $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container">
            <?php
            $DisplayData->heading(array(
                'heading' => $heading
            ), 'small-heading mb-2 ' . $text_alignment, 'fade-up');

            $DisplayData->description(array(
                'description' => $subheading
            ), 'mb-5 ' . $text_alignment, 'fade-up');
            ?>
            <div class="row justify-content-center">
                <?php foreach ($items as $key => $item) { ?>
                    <?php
                    $icon_type = $item['icon_type'];
                    ?>
                    <div class="<?= $class ?>">
                        <div class="column-holder" data-aos="zoom-in" <?= $Helpers->data_aos_delay(4, $key) ?>>
                            <div class="image-info-box <?= $text_alignment ?> small-image">
                                <?php
                                if ($icon_type == 'image') {
                                    $DisplayData->image(array(
                                        'image_id' => $item['icon_image'],
                                    ), 'main-image');
                                } else {
                                    if ($item['icon_svg']) {
                                        $DisplayData->svg(array(
                                            'svg' => $item['icon_svg'],
                                        ), 'main-image');
                                    }
                                }
                                ?>
                                <?php
                                $DisplayData->heading(array(
                                    'heading' => $item['heading'],
                                    'tag' => 'h4'
                                ), 'mb-4');
                                $DisplayData->description(array(
                                    'description' => $item['description']
                                ), 'medium-text');
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            if ($module['icon_button_type']) {
                $DisplayData->button(
                    $module['icon_button_text'],
                    $module['icon_' . $module['icon_button_type']],
                    $module['icon_button_action'],
                    $module['icon_button_icon'],
                    'button-accent button-big text-center',
                    'fade-up'
                );
            }
            ?>
        </div>
    </section>
<?php } ?>