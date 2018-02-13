<?php
/*
Plugin Name: WP Chatbot
Plugin URI:  https://holithemes.com/wp-chatbot/
Description: Add Messenger to your website, Chatbot or live Chat using Facebook Messenger
Version:     2.1
Author:      HoliThemes
Author URI:  https://holithemes.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wp-chatbot
*/


if ( ! defined( 'ABSPATH' ) ) exit;

define( 'HTCC_VERSION', '2.1' );
define( 'HTCC_WP_MIN_VERSION', '4.6' );
define( 'HTCC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HTCC_PLUGIN_FILE', __FILE__ );


// include in admin and public pages ( non-admin )
require_once('inc/class-htcc-db.php');
require_once('inc/commons/variables.php');
require_once('inc/class-htcc-register.php');



/**
 * is_admin - include file to admin area - only if it is_admin
 * else - include files to non-admin area 
 */
if ( is_admin() ) {
    require_once('admin/admin.php');
} else {
    require_once('inc/class-htcc-chatbot.php');
    require_once('inc/class-htcc-shortcode.php');
    
}

/**
 * Register hooks - when plugin activate, deactivate, uninstall
 * commented deactivation, uninstall hook - its not needed as now
 */
register_activation_hook( __FILE__, array( 'HTCC_Register', 'activate' )  );
// register_deactivation_hook( __FILE__, array( 'HTCC_Register', 'deactivate' )  );
// register_uninstall_hook(__FILE__, array( 'HTCC_Register', 'uninstall' ) );

// when plugin updated - check version diff
add_action('plugins_loaded', array( 'HTCC_Register', 'plugin_update' ) );

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( 'HTCC_Register', 'plugin_action_links' ) );