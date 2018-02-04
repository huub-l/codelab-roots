<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Codelab_SVG_Support
 * @subpackage Codelab_SVG_Support/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Codelab_SVG_Support
 * @subpackage Codelab_SVG_Support/admin
 * @author     Your Name <email@example.com>
 */
class Codelab_SVG_Support_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $codelab_svg_support The ID of this plugin.
     */
    private $codelab_svg_support;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     *
     * @param      string $codelab_svg_support The name of this plugin.
     * @param      string $version             The version of this plugin.
     */
    public function __construct($codelab_svg_support, $version)
    {

        $this->codelab_svg_support = $codelab_svg_support;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Codelab_SVG_Support_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Codelab_SVG_Support_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->codelab_svg_support, plugin_dir_url(__FILE__) . 'css/plugin-name-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Codelab_SVG_Support_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Codelab_SVG_Support_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->codelab_svg_support, plugin_dir_url(__FILE__) . 'js/plugin-name-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * Add my own action to run.
     *
     * @since   1.0.0
     */
    public function codelab_enable_svg_support()
    {
//        add_action('wp_AJAX_svg_get_attachment_url', [$this, 'get_attachment_url_media_library']);
    }

    public function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon)
    {
        if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
            if (is_array($size)) {
                $image[1] = $size[0];
                $image[2] = $size[1];
            } elseif (($xml = simplexml_load_file($image[0])) !== false) {
                $attr = $xml->attributes();
                $viewbox = explode(' ', $attr->viewBox);
                $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int)$value[0] : (count($viewbox) == 4 ? (int)$viewbox[2] : null);
                $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int)$value[0] : (count($viewbox) == 4 ? (int)$viewbox[3] : null);
            } else {
                $image[1] = $image[2] = null;
            }
        }
        return $image;
    }

    public function add_svg_mime_types($mimes)
    {
        $mimes['svg'] = 'image/svg';
        return $mimes;
    }

    public function get_attachment_url_media_library()
    {
        $data = [];
        $attachmentIds = isset($_REQUEST['attachmentIds']) ? $_REQUEST['attachmentIds'] : '';

        if (is_array($attachmentIds)) {

            $data = array_map(function ($attachmentID) {
                $attachmentUrl = wp_get_attachment_url($attachmentID);
                return [
                    "id" => $attachmentID,
                    "src" => $attachmentUrl
                ];
            }, $attachmentIds);

        }

        wp_send_json($data);
    }

}
