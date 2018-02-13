<?php
/**
* Global Variables
* @since 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;


$htcc_options = get_option('htcc_options');

$GLOBALS["htcc_app_id"] = esc_attr( $htcc_options['fb_app_id'] );
$GLOBALS["htcc_page_id"] = esc_attr( $htcc_options['fb_page_id'] );


// $GLOBALS["htcc_fb_color"] = esc_attr( $htcc_options['fb_color'] );
// $GLOBALS["htcc_fb_greeting_login"] = esc_attr( $htcc_options['fb_greeting_login'] );
// $GLOBALS["htcc_fb_greeting_logout"] = esc_attr( $htcc_options['fb_greeting_logout'] );


$GLOBALS["htcc_shortcode"] = esc_attr( $htcc_options['shortcode'] );
$GLOBALS["htcc_fb_sdk_lang"] = esc_attr( $htcc_options['fb_sdk_lang'] );

$GLOBALS["htcc_fb_min"] = esc_attr( $htcc_options['minimized'] );
$GLOBALS["htcc_fb_ref"] = esc_attr( $htcc_options['ref'] );





if ( wp_is_mobile() ) {
    $isMob = 1;
} else {
    $isMob = 2;
}

$GLOBALS["htcc_isMob"] = $isMob;

