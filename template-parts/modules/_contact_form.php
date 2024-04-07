<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$heading = $module['heading'];
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
                 
                    <h5> Contact Details </h5>
                    <?= $Theme_Options->phone_number_url; ?>
                    <?= $Theme_Options->email_address_url; ?>
                    <h5> Office Hours </h5>
                    <?= $Theme_Options->office_hours; ?>



                </div>
                <div class="col-lg-6">
                    <div class="contact-form-box">
                        <?php
                        $DisplayData->heading(array(
                            'heading' => $heading
                        ), 'text-center mb-5');
                        ?>
                        <?= do_shortcode($contact_form) ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php } ?>