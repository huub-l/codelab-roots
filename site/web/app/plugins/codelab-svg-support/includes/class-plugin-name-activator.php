<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        add_action('wp_AJAX_svg_get_attachment_url', ['Plugin_Name_Activator', 'get_attachment_url_media_library']);
    }

    public static function get_attachment_url_media_library()
    {
        $url = '';
        $attachmentID = isset($_REQUEST['attachmentID']) ? $_REQUEST['attachmentID'] : '';
        if ($attachmentID) {
            $url = wp_get_attachment_url($attachmentID);
        }

        echo $url;

        die();
    }

}
