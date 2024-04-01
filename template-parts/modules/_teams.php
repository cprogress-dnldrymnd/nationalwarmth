<?php
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;

$teams_alt_title = get__theme_option('teams_alt_title');
$teams_description = get__theme_option('teams_description');
$teams = $GetData->get_posts_ids('teams');

if (!$disable_module) { ?>
    <section <?= $GetData->get_attributes('team-section md-padding', $module_id, $template_class) ?>>
        <?php if ($template_class) { ?>
            <?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
        <?php } ?>
        <div class="container" data-aos="fade-in">
            <div class="content-margin mb-5">
                <?php
                $DisplayData->heading(array(
                    'heading' => $teams_alt_title ? $teams_alt_title : 'Teams'
                ));
                $DisplayData->description(array(
                    'description' => $teams_description
                ), 'content-margin', false);
                ?>
            </div>
            <div class="team-box">
                <div class="row g-5">
                    <?php foreach ($teams as $key => $team) { ?>
                        <div class="col-lg-4">
                            <div class="column-holder content-margin">
                                <?php
                                $DisplayData->image(array(
                                    'image_id' => get_post_thumbnail_id($key),
                                ), 'main-image');
                                echo '<div class="position-box"> ' . get__post_meta_by_id($key, 'position') . '</div>';
                                $DisplayData->heading(array(
                                    'heading' => $team,
                                    'tag' => 'h4'
                                ));
                                $DisplayData->description(array(
                                    'description' => get_the_content('', false, $key)
                                ), 'content-margin', false);
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>