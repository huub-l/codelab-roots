<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Codelab_SVG_Support
 * @subpackage Codelab_SVG_Support/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Codelab_SVG_Support
 * @subpackage Codelab_SVG_Support/includes
 * @author     Your Name <email@example.com>
 */
class Codelab_SVG_Support_Activator
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
        add_action('wp_AJAX_svg_get_attachment_url', ['Codelab_SVG_Support_Activator', 'get_attachment_url_media_library']);
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
