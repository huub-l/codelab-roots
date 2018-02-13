<?php
/**
* shortcodes 
* base shorcode name is [chat]
* for list of attribute support check  -> shortcode_atts ( $a )
*
* @package ccw
* @since 1.0
*/    

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HTCC_Shortcode' ) ) :
    
class HTCC_Shortcode {

    
    function shortcode($atts = [], $content = null, $shortcode = '') {

        $global_app_id = $GLOBALS["htcc_app_id"];
        $global_page_id = $GLOBALS["htcc_page_id"];
        $global_fb_sdk_lang = $GLOBALS["htcc_fb_sdk_lang"];

        $global_fb_min = $GLOBALS["htcc_fb_min"];
        $global_fb_ref = $GLOBALS["htcc_fb_ref"];

        $htcc_options = get_option('htcc_options');

        $htcc_fb_color = esc_attr( $htcc_options['fb_color'] );
        $htcc_fb_greeting_login = esc_attr( $htcc_options['fb_greeting_login'] );
        $htcc_fb_greeting_logout = esc_attr( $htcc_options['fb_greeting_logout'] );


        /**
         * min  - true or false
         */
        $a = shortcode_atts(
            array(
                'app_id' => $global_app_id,
                'page_id' => $global_page_id,


                'color' => $htcc_fb_color,
                'logged_in_greetings' => $htcc_fb_greeting_login,
                'logged_out_greetings' => $htcc_fb_greeting_logout,
                

                'min' => $global_fb_min,
                'ref' => $global_fb_ref,

            ), $atts, $shortcode );


        $app_id = $a["app_id"];
        $page_id = $a["page_id"];


        $htcc_fb_color = $a["color"];
        $htcc_fb_greeting_login = $a["logged_in_greetings"];
        $htcc_fb_greeting_logout = $a["logged_out_greetings"];

        

        $min = $a["min"];
        $ref = $a["ref"];

        $is_mobile = $GLOBALS["htcc_isMob"];

        $o = '';
        $o .= "<script>
        window.fbAsyncInit = function() {
          FB.init({
            appId            : $app_id,
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v2.11'
          });
        };
      
        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = 'https://connect.facebook.net/$global_fb_sdk_lang/sdk.js';
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>";


        $o .= '';
        $o .= '<div class="htcc-messenger">
        <div class="fb-customerchat"
        page_id="'.$page_id.'" 
        theme_color="' .$htcc_fb_color. '" 
        logged_in_greeting="' .$htcc_fb_greeting_login. '" 
        logged_out_greeting="' .$htcc_fb_greeting_logout. '" 
        ref="'.$ref.'"
        minimized="'.$min.'">
        </div>
      </div>';
        $o .= '';
        

        return $o;
    }


    //  Register shortcode
    function htcc_shortcodes_init() {
        // add_shortcode('chatbot', array( $this, 'shortcode' ));
        add_shortcode($GLOBALS["htcc_shortcode"], array( $this, 'shortcode' ) );
    }


}

$shortcode = new HTCC_Shortcode();

add_action('init', array( $shortcode, 'htcc_shortcodes_init' ) );

endif; // END class_exists check