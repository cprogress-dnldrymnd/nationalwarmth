<section class="project-title-section archive-banner md-padding">
    <div class="container d-flex justify-content-between">
        <h1 class="mb-4"><?php the_title() ?></h1>
        <div class="image-box">
            <?php the_post_thumbnail('full') ?>
        </div>
    </div>
</section>

<section class="md-padding the-content ">
    <div class="container small-container">

        <?php the_content() ?>
      
    </div>
</section>

<?php
get_template_part('template-parts/global/post', 'slider');
?>