<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$image = $module['image'];
$heading = $module['heading'];
$description = $module['description'];
$disable_module = $module['disable_module'];
$reverse_column = $module['reverse_column'];
$with_decoration = $module['with_decoration'];
if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('two-column-image-text lg-padding', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container">
            <div class="row align-items-center <?= $reverse_column ? 'flex-row-reverse' : ''?>">
                <div class="col-lg-6">
                    <div class="column-holder" data-aos="fade-left" data-aos-offset="200">
                        <?php
                        $DisplayData->image(array(
                            'image_id' => $image,
                            'size' => 'large',
                            'with_decoration' => $with_decoration
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="column-holder" data-aos="fade-right" data-aos-offset="200">
                        <?php
                        $DisplayData->heading(array(
                            'heading' => $heading
                        ), 'small-heading mb-3');
                        $DisplayData->description(array(
                            'description' => $description
                        ), 'mb-4');
                        if ($module['two_col_button_type']) {
                            $DisplayData->button(
                                $module['two_col_button_text'],
                                $module['two_col_' . $module['two_col_button_type']],
                                $module['two_col_button_action'],
                                $module['two_col_button_icon'],
                                'button-accent',
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>