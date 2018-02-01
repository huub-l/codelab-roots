<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Codelab_Theme_Addons
 * @subpackage Codelab_Theme_Addons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Codelab_Theme_Addons
 * @subpackage Codelab_Theme_Addons/public
 * @author     Your Name <email@example.com>
 */
class Codelab_Theme_Addons_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $codelab_theme_addons    The ID of this plugin.
	 */
	private $codelab_theme_addons;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $codelab_theme_addons       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $codelab_theme_addons, $version ) {

		$this->codelab_theme_addons = $codelab_theme_addons;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Codelab_Theme_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codelab_Theme_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->codelab_theme_addons, plugin_dir_url( __FILE__ ) . 'css/plugin-name-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Codelab_Theme_Addons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codelab_Theme_Addons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->codelab_theme_addons, plugin_dir_url( __FILE__ ) . 'js/plugin-name-public.js', array( 'jquery' ), $this->version, false );

	}

}
