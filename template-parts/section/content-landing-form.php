<?php
$Theme_Options = new Theme_Options;
$DisplayData = new DisplayData;

$heading = get__post_meta('heading');
$subheading = get__post_meta('subheading');
$description = get__post_meta('description');
$contact_form = get__post_meta('contact_form');
$text_bar_heading = get__post_meta('text_bar_heading');
$text_bar_description = get__post_meta('text_bar_description');
$background_image = (get__post_meta('background_image')) ? wp_get_attachment_image_url(get__post_meta('background_image'), 'full') : $Theme_Options->default_page_banner;
$background_image_mobile = (get__post_meta('background_image_mobile')) ? wp_get_attachment_image_url(get__post_meta('background_image_mobile'), 'full') : $background_image;
$background_image_mobile_f = $background_image_mobile ? $background_image_mobile : $Theme_Options->default_page_banner;
?>
<section class="form-section md-padding-top overflow-visible" id="form">
  <div class="background-image bg-image d-none d-sm-block" style="background-image: url(<?= $background_image ?>)">
  </div>
  <div class="background-image bg-image d-block d-sm-none" style="background-image: url(<?= $background_image_mobile_f ?>)">
  </div>
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="column-holder left-col content-margin color-white" >
          <?php
          if ($Theme_Options->alt_logo_url) {
            echo '<div class="logo-box">';
            echo $Theme_Options->alt_logo;
            echo '</div>';
          }

          $DisplayData->heading(
            array(
              'heading'    => $heading,
              'subheading' => $subheading
            ),
            'main-heading'
          );


          $DisplayData->description(
            array(
              'description' => $description,
            ),
            'checklist-ul checklist-two-col fw-light'
          );

          ?>
        </div>
      </div>
      <div class="col-lg-5" >
        <div class="column-holder position-relative">
			<div id="mobile-form">
				
			</div>
          <div class="form-box background-white p-4">
            <?= do_shortcode($contact_form) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="text-bar background-accent">
  <div class="container" data-aos="fade-up" data-aos-delay="500">
    <div class="row">
      <div class="col-lg-7">
        <div class="column-holder">
          <?php

          $DisplayData->heading(
            array(
              'heading' => $text_bar_heading,
              'tag'     => 'h4'
            ),
          );

          $DisplayData->description(
            array(
              'description' => $text_bar_description,
            )
          );
          ?>
        </div>
      </div>
      <div class="col-lg-5">

      </div>
    </div>
  </div>
</section>