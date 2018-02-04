<?php
/*
Plugin Name: WP SVG images
Plugin URI: http://kubiq.sk
Description: Full SVG Media support in WordPress
Author: KubiQ
Version: 1.3
Author URI: http://kubiq.sk
*/

class WPSVG{
	function __construct() {
		add_action( 'admin_init', array( $this, 'add_svg_support' ) );
		add_filter( 'wp_check_filetype_and_ext', array( $this, 'wp_check_filetype_and_ext' ), 100, 4 );
	}

	function wp_check_filetype_and_ext( $filetype_ext_data, $file, $filename, $mimes ){
		if ( substr($filename, -4) === '.svg' ){
			$filetype_ext_data['ext'] = 'svg';
			$filetype_ext_data['type'] = 'image/svg+xml';
		}
		return $filetype_ext_data;
	}

	public function add_svg_support() {
		ob_start();
		add_action( 'admin_head', array( $this, 'svg_css_fix' ) );
		add_filter( 'upload_mimes', array( $this, 'add_svg_mime' ) );
		add_action( 'shutdown', array( $this, 'on_shutdown' ), 0 );
		add_filter( 'final_output', array( $this, 'fix_template' ) );
	}
	
	public function svg_css_fix() {
		echo '<style>img[src$=".svg"]{width:90%;height:auto;}</style>';
	}

	public function add_svg_mime( $mimes = array() ){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	public function on_shutdown() {
		$final = '';
		$ob_levels = count( ob_get_level() );
		for ( $i = 0; $i < $ob_levels; $i++ ) {
			$final .= ob_get_clean();
		}
		echo apply_filters( 'final_output', $final );
	}

	public function fix_template( $content = '' ) {
		$content = str_replace(
			'<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
			'<# } else if ( \'svg+xml\' === data.subtype ) { #>
				<img class="details-image" src="{{ data.url }}" draggable="false" />
			<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
			$content
		);
		$content = str_replace(
			'<# } else if ( \'image\' === data.type && data.sizes ) { #>',
			'<# } else if ( \'svg+xml\' === data.subtype ) { #>
				<div class="centered">
					<img src="{{ data.url }}" class="thumbnail" draggable="false" />
				</div>
			<# } else if ( \'image\' === data.type && data.sizes ) { #>',
			$content
		);
		return $content;
	}
}

new WPSVG();