<?php



class Shortcodes
{
    function whatsapp_url()
    {
        $Theme_Options = new Theme_Options();
        return $Theme_Options->whatsapp_url;
    }

    function phone_number()
    {
        $Theme_Options = new Theme_Options();
        return $Theme_Options->phone_number;
    }

    function phone_number_text()
    {
        $Theme_Options = new Theme_Options();
        return '<span class="d-none d-sm-inline">' . $Theme_Options->phone_number_text . '</span>' . '<span class="d-inline d-sm-none">CALL NOW</span>';
    }

    function phone_number_text_ns()
    {
        $Theme_Options = new Theme_Options();
        return $Theme_Options->phone_number_text;
    }
    function phone_number_url()
    {
        $Theme_Options = new Theme_Options();
        return $Theme_Options->phone_number_url;
    }

    function email_address()
    {
        $Theme_Options = new Theme_Options();
        return $Theme_Options->email_address;
    }

    function email_address_text()
    {
        $Theme_Options = new Theme_Options();
        return $Theme_Options->email_address_text;
    }

    function email_address_url()
    {
        $Theme_Options = new Theme_Options();
        return $Theme_Options->email_address_url;
    }

    function address()
    {
        $Theme_Options = new Theme_Options();
        return wpautop($Theme_Options->address);
    }


    function post_title()
    {
        $alt_title = carbon_get_the_post_meta('alt_title');
        if ($alt_title) {
            return strtolower($alt_title);
        } else {
            return strtolower(get_the_title());
        }
    }

    function button($atts, $content = null)
    {
        extract(
            shortcode_atts(
                array(
                    'button_text' => '',
                    'button_link' => '',
                    'new_window'  => '',
                    'button_type' => 'button-accent'
                ),
                $atts
            )
        );
        $new_window = $new_window != 'false' ? 'target="_blank"' : '';
        $DisplayData = new DisplayData();
        if ($button_text) {
            return $DisplayData->button(
                array(
                    'link_text'   => $button_text,
                    'link'        => $button_link,
                    'link_action' => $new_window,
                    'class'       => 'button-accent'
                ),
                false
            );
        }
    }

    function get_param($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'value' => '',
                ),
                $atts
            )
        );
        if (isset($_GET[$value])) {
            return $_GET[$value];
        }
    }

    function contact_details($atts)
    {
        $Theme_Options = new Theme_Options;
        $SVG = new SVG;
        extract(
            shortcode_atts(
                array(
                    'style' => '',
                ),
                $atts
            )
        );
        ob_start();
?>
        <?php if ($style == "version2") { ?>
            <div class="contact-details">
                <p>
                    <strong>T </strong>/ <a href="<?= $Theme_Options->phone_number_url ?>"><?= $Theme_Options->phone_number_text ?></a>
                </p>
                <p>
                    <strong>E </strong>/ <a href="mailto:<?= $Theme_Options->email_address_text ?>"><?= $Theme_Options->email_address_text ?></a>
                </p>
                <p>
                    <strong>W </strong>/ <a href="<?= carbon_get_theme_option('whats_app_rul') ?>">WhatsApp</a>
                </p>
                <?= $this->address() ?>
            </div>
        <?php } else { ?>
            <div class="contact-details">
                <ul class="list-inline list-icon">
                    <?php if ($Theme_Options->phone_number_text) { ?>
                        <li>
                            <a class="color-white d-flex align-items-center" href="<?= $Theme_Options->phone_number_url ?>">
                                <span class="icon d-flex align-items-center justify-content-center"><?= $SVG->phone ?></span>
                                <span class="text"><?= $Theme_Options->phone_number_text ?></span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($Theme_Options->email_address_text) { ?>
                        <li>
                            <a class="color-white d-flex align-items-center" target="_blank" href="<?= $Theme_Options->email_address_url ?>">
                                <span class="icon d-flex align-items-center justify-content-center"><?= $SVG->email ?></span>
                                <span class="text"><?= $Theme_Options->email_address_text ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

    <?php
        return ob_get_clean();
    }

    function contact_details_office_hours()
    {
        $Theme_Options = new Theme_Options;
        $whats_app_rul = carbon_get_theme_option('whats_app_rul');
        $office_hours = carbon_get_theme_option('office_hours');
        ob_start();
    ?>
        <div class="contact-box contact-box-v3 small-heading">
            <div class="contact-details text-center">
                <ul class="list-inline list-icon">
                    <li>
                        <a class="color-white inner" href="<?= $Theme_Options->phone_number_url ?>">
                            <span class="icon-v3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                            </span>
                            <span class="text"><?= $Theme_Options->phone_number_text ?></span>
                        </a>
                    </li>
                    <?php if ($whats_app_rul) { ?>
                        <li>
                            <a class="color-white inner" href="<?= $whats_app_rul ?>" target="_blank">
                                <span class="icon-v3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                </span>
                                <span class="text">WhatsApp</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a class="color-white inner" href="<?= $Theme_Options->email_address_url ?>">
                            <span class="icon-v3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </span>
                            <span class="text"><?= $Theme_Options->email_address_text ?></span>
                        </a>
                    </li>
                    <?php if ($office_hours) { ?>
                        <li>
                            <span class="inner">
                                <span class="icon-v3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>
                                </span>
                                <span class="text color-white">
                                    <?= wpautop($office_hours, true) ?>
                                </span>
                            </span>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>

        <?php
        return ob_get_clean();
    }

    function what_we_do()
    {
        ob_start();
        $Theme_Options = new Theme_Options;
        $header_icon_menu = $Theme_Options->header_icon_menu;

        if ($header_icon_menu) {
        ?>

            <section class="header-bottom header-icon-list small-text">
                <div class="header-bottom-holder background-secondary">
                    <div class="container-fluid">
                        <ul class="d-flex justify-content-center align-items-center list-inline row mb-0 fw-light g-0 flex-wrap flex-lg-nowrap">
                            <?php foreach ($header_icon_menu as $icon_menu) { ?>
                                <li class="col-lg-auto col-md-4 col-6">
                                    <a href="<?= get_permalink($icon_menu['id']) ?>" class="d-flex align-items-center justify-content-center text-white flex-column flex-lg-row h-100">
                                        <span class="icon"><img src="<?= wp_get_attachment_image_url(get__post_meta_by_id($icon_menu['id'], 'page_icon', 'medium')) ?>" alt="<?= get_the_title($icon_menu['id']) ?>"></span>
                                        <span class="text"><?= get_the_title($icon_menu['id']) ?></span>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </section>

<?php }
        return ob_get_clean();
    }

    function template($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'id' => '',
                ),
                $atts
            )
        );
        $Modules = new Modules;
        if ($id) {
            return $Modules->modules_section($id);
        }
    }
}
$Shortcodes = new Shortcodes;
add_shortcode('contact_details_office_hours', array($Shortcodes, 'contact_details_office_hours'));
add_shortcode('template', array($Shortcodes, 'template'));
add_shortcode('what_we_do', array($Shortcodes, 'what_we_do'));
add_shortcode('phone_number_text_ns', array($Shortcodes, 'phone_number_text_ns'));
add_shortcode('phone_number_text', array($Shortcodes, 'phone_number_text'));
add_shortcode('phone_number', array($Shortcodes, 'phone_number'));
add_shortcode('phone_number_url', array($Shortcodes, 'phone_number_url'));
add_shortcode('email_address_text', array($Shortcodes, 'email_address_text'));
add_shortcode('email_address', array($Shortcodes, 'email_address'));
add_shortcode('email_address_url', array($Shortcodes, 'email_address_url'));
add_shortcode('button', array($Shortcodes, 'button'));
add_shortcode('accordion', array($Shortcodes, 'accordion'));
add_shortcode('post_title', array($Shortcodes, 'post_title'));
add_shortcode('get_param', array($Shortcodes, 'get_param'));
add_shortcode('contact_details', array($Shortcodes, 'contact_details'));
add_shortcode('whatsapp_url', array($Shortcodes, 'whatsapp_url'));
