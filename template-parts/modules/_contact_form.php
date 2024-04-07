<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
$description = $module['description'];
$contact_form = $module['contact_form'];
$disable_module = $module['disable_module'];
$Theme_Options = new Theme_Options();

?>
<?php if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('contact-form md-padding', $module_id, $template_class) ?> data-aos="flip-up">
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                 
                    <div class="contact-details-holder mb-3">
                    <h3> Contact Details </h3>
                    <?= wpautop($Theme_Options->phone_number) ?>
                    <?= wpautop($Theme_Options->email_address) ?>
                    </div>
                    <div class="contact-details-holder">
                    <h3> Office Hours </h3>
                    <?= wpautop($Theme_Options->office_hours) ?>
                    </div>




                </div>
                <div class="col-lg-6">
                    <div class="contact-form-box">
                        <?php
                        $DisplayData->heading(array(
                            'heading' => $heading
                        ), 'mb-3');
                        $DisplayData->description(array(
                            'description' => $description
                        ), 'mb-5');
                        ?>
                        <?= do_shortcode($contact_form) ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php } ?>