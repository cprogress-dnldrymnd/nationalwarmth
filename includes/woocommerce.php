<?php
/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
/**
 * Remove the stidebar 
 */
function disable_woo_commerce_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
}
add_action('init', 'disable_woo_commerce_sidebar');
/**
 * @snippet       Hide SKU, Cats, Tags @ Single Product Page - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WC 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
/**
 * Change cart to basket
 */
add_filter( 'gettext', 'te_change_cart_to_basket' );
add_filter( 'ngettext', 'te_change_cart_to_basket' );

function te_change_cart_to_basket( $string ) {
  $string = str_ireplace( 'cart', 'bag', $string );
  return $string;
}



/**
 * Add AJAX Shortcode when cart contents update
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );

function woo_cart_but_count( $fragments ) {

    ob_start();
    
    $cart_count = WC()->cart->cart_contencount;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
        <?php
        ?>
        <span class="cart-icon">
         <i class="fa-solid fa-cart-shopping"></i>
     </span>
     <span class="cart-contents-count"><?php echo $cart_count; ?></span> 
     <?php            
 ?></a>
 <?php

 $fragments['a.cart-contents'] = ob_get_clean();

 return $fragments;
}


   /**
 * @snippet       Add First & Last Name to My Account Register Form - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WC 3.9
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

///////////////////////////////
// 1. ADD FIELDS

   add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
   
   function bbloomer_add_name_woo_account_registration() {
    ?>
    
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
    
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>





    <div class="clear"></div>
    
    <?php
}


add_action( 'woocommerce_register_form', 'action_woocommerce_register_form' );

function action_woocommerce_register_form() {
    ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_password_2"><?php _e( 'Confirm Password', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="password" class="input-text" name="password_2" id="reg_password_2" value="<?php if ( ! empty( $_POST['password_2'] ) ) esc_attr_e( $_POST['password_2'] ); ?>" />
    </p>
    
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-checkbox">
        <input type="checkbox" class="input-text" name="newsletter" id="reg_newsletter" />
        <label for="reg_newsletter"><?php _e( "I would like to receive email communications about Hatbag's product updates, news and newsletter.", 'woocommerce' ); ?></label>
    </p>
    
    <?php
}


/*add_action( 'woocommerce_register_form', 'action_woocommerce_login_form_end' );
add_action( 'woocommerce_login_form', 'action_woocommerce_login_form_end' );
add_action( "login_form", "action_woocommerce_login_form_end" ); 

function action_woocommerce_login_form_end() {
    ?>
    <div class="g-recaptcha" data-sitekey="6LfxA1MgAAAAAELcZbuE0w9H7UvQluxYBrStMMar"></div>
    <?php

}*/
///////////////////////////////
// 2. VALIDATE FIELDS

add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );

function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( 'First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( 'Last name is required!.', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $errors->add( 'billing_phone_error', __( 'Phone is required!.', 'woocommerce' ) );
    }

    if (strcmp($_POST['password'], $_POST['password_2']) !== 0) {
        $errors->add( 'registration-error', __( 'Passwords do not match!.', 'woocommerce' ) );

    }
    return $errors;
}

///////////////////////////////
// 3. SAVE FIELDS

add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );

function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
    if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
        update_user_meta( $customer_id, 'phone', sanitize_text_field($_POST['billing_phone']) );
    }
    if ( isset( $_POST['newsletter'] ) ) {
        carbon_set_user_meta( $customer_id, 'newsletter', true );
    } else {
        carbon_set_user_meta( $customer_id, 'newsletter', false );
    }
}
/*
//google recaptcha
add_action('wp_head', 'google_recaptcha');
add_action('login_head', 'google_recaptcha');
function google_recaptcha() {?>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfxA1MgAAAAAELcZbuE0w9H7UvQluxYBrStMMar" async defer></script>
    <style>
        #login {
            width: 352px;
        }
        #login .g-recaptcha {
            margin-bottom: 30px;
        }
    </style>
<?php }

//Validate reCaptcha with registration form

add_action( 'woocommerce_register_post', 'action_validate_recaptcha_field', 10, 3 );
function action_validate_recaptcha_field( $username, $email, $wpErrors )
{
    $remoteIP = $_SERVER['REMOTE_ADDR'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $response = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', [
        'body' => [
            'secret'   => '6LfxA1MgAAAAANElnQshVG76bXHIRNF37dTyx-dZ',
            'response' => $recaptchaResponse,
            'remoteip' => $remoteIP
        ]
    ] );

    $response_code = wp_remote_retrieve_response_code( $response );
    $response_body = wp_remote_retrieve_body( $response );

    if ( $response_code == 200 )
    {
        $result = json_decode( $response_body, true );

        if ( ! $result['success'] )
        {
            switch ( $result['error-codes'] )
            {
                case 'missing-input-secret':
                case 'invalid-input-secret':
                $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Invalid reCAPTCHA secret key.', 'woocommerce' ) );
                break;

                case 'missing-input-response' :
                case 'invalid-input-response' :
                $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Please check the box to prove that you are not a robot.', 'woocommerce' ) );
                break;

                default:
                $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Something went wront validating the reCAPTCHA.', 'woocommerce' ) );
                break;
            }
        }
    }
    else
    {
        $wpErrors->add( 'recaptcha_error', __( '<strong>Error</strong>: Unable to reach the reCAPTCHA server.', 'woocommerce' ) );
    }
}



function verify_login_captcha($user, $password) { 
    if (isset($_POST['g-recaptcha-response'])) { 
        $recaptcha_secret = '6LfxA1MgAAAAANElnQshVG76bXHIRNF37dTyx-dZ'; 
        $response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']); 
        $response = json_decode($response["body"], true); 
        if (true == $response["success"]) { 
            return $user; 
        } else { 
            return new WP_Error("Captcha Invalid", __("<strong>ERROR</strong>: Please check the box to prove that you are not a robot.")); 
        } 
    } else { 
        return new WP_Error("Captcha Invalid", __("<strong>ERROR</strong>: Something went wront validating the reCAPTCHA")); 
    } 
} 
add_filter("wp_authenticate_user", "verify_login_captcha", 10, 2);*/


/**
* WooCommerce Loop Product Thumbs
**/

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo "<div class='image-box'>";
        echo woocommerce_get_product_thumbnail();
        echo "</div>";
    }
}



/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' &#47; ',
        'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '<span>',
        'after'       => '</span>',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    );
}
/**
 * Change attribute variations to attribute title
 */

add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'change_default_choose_text' );

function change_default_choose_text( $args ) {

    $term                     = wc_attribute_label( $args['attribute'] ); //Get Attribute label
    $args['show_option_none'] = __( $term . '  ', 'woocommerce' ); //Modify the Default option value 
    return $args;

}

// Change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
function woocommerce_add_to_cart_button_text_single() {
    $SVG = new SVG;
    return '<span>Add to Bag</span> <span>'.$SVG->bag.'</span>';
}


function action_woocommerce_after_add_to_cart_button() {
    global $product;
    $SVG = new SVG;
    $GetData = new GetData;
    $product_id = $product->get_id();

    echo '<span class="pseudo-add-to-wishlist align-center '.$GetData->in_wislish($product_id).'">'.$SVG->heart.'</span>';
}

add_filter( 'woocommerce_after_add_to_cart_button', 'action_woocommerce_after_add_to_cart_button' ); 



/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {

    // Adds the new tab
    $in_this_box = carbon_get_the_post_meta('in_this_box');

    if($in_this_box) {
        $tabs['in_this_box'] = array(
            'title'     => __( 'In This Box', 'woocommerce' ),
            'priority'  => 50,
            'callback'  => 'woo_in_this_box_tab_content'
        );
    }
    $tabs['ingredients'] = array(
        'title'     => __( 'Ingredients', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'woo_ingredientab_content'
    );
    $tabs['nutritional_value'] = array(
        'title'     => __( 'Nutritional Value', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'woo_inutritional_value_tab_content'
    );
    $tabs['allergens'] = array(
        'title'     => __( 'ALLERGENS', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'woo_allergens_tab_content'
    );
    $tabs['storage'] = array(
        'title'     => __( 'Storage', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'woo_storage_tab_content'
    );
    return $tabs;

}
function woo_in_this_box_tab_content() {
    get_template_part('woocommerce/single-product/tabs/in-this-box');
}

function woo_ingredientab_content() {
    get_template_part('woocommerce/single-product/tabs/in-this-box');
}
function woo_inutritional_value_tab_content() {
    get_template_part('woocommerce/single-product/tabs/in-this-box');
}

function woo_allergens_tab_content() {
    get_template_part('woocommerce/single-product/tabs/in-this-box');
}

function woo_storage_tab_content() {
    get_template_part('woocommerce/single-product/tabs/in-this-box');
}


/**
 * Reorder product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

    $tabs['in_this_box']['priority'] = 5;           // Reviews first
    $tabs['description']['priority'] = 10;          // Description second
    $tabs['additional_information']['priority'] = 15;   // Additional information third

    return $tabs;
}

/**
 * Quantity Plus Minus
 */
add_action( 'woocommerce_after_add_to_cart_quantity', 'quantity_plus_sign' );

function quantity_plus_sign() {
    ?>
    <div class="plus-minus">
        <button type="button" class="plus" ></button>
        <button type="button" class="minus" ></button>
    </div>
    <?php
    echo '</div>';
}

add_action( 'woocommerce_before_add_to_cart_quantity', 'quantity_minus_sign' );
function quantity_minus_sign() {
    echo '<div class="quantity-wrapper">';
}

add_action( 'wp_footer', 'quantity_plus_minus' );

function quantity_plus_minus() {
    // To run this on the single product page
    if ( ! is_product() ) return;
    ?>
    <script type="text/javascript">

      jQuery(document).ready(function($){   

        $('form.cart').on( 'click', 'button.plus, button.minus', function() {

            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));

            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( max <= val ) ) {
                    qty.val( max );
                } 
                else {
                    qty.val( val + step );
                }
            } 
            else {
                if ( min && ( min >= val ) ) {
                    qty.val( min );
                } 
                else if ( val > 1 ) {
                    qty.val( val - step );
                }
            }

        });

    });
</script>
<?php
}