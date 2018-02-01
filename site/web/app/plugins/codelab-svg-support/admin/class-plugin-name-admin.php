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
     * @param      string $version     The version of this plugin.
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

        $this->get_attachment_url_media_library();

    }

    private function get_attachment_url_media_library()
    {
        $url = '';
        $attachmentID = isset($_REQUEST['attachmentID']) ? $_REQUEST['attachmentID'] : '';

//        wp_die($_REQUEST);

        if ($attachmentID) {
            $url = wp_get_attachment_url($attachmentID);
            echo 'good';
            die();
        }

    }

}
