<?php
/**
 * Plugin Name: WPCOM Tester
 * Plugin URI: http://wordpress.org/extend/plugins/wpcom-tester/
 * Description: This plugin loads the <code>wpcom.php</code> compatibility file from <code>inc/</code> or <code>includes/</code> folder if it exists. The plugin also defines the <code>IS_WPCOM</code> constant.
 * Author: <a href="http://lukemcdonald.com">Luke McDonald</a>
 * Version: 1.0.0
 */

/**
 * Define IS_WPCOM global, which is available on WP.com.
 */
if ( ! defined( 'IS_WPCOM' ) ) {
	define( 'IS_WPCOM', true );
}

/**
 * Load WPCOM compatability file.
 *
 * Themes can define WordPress.com-specific code by adding a wpcom.php file in
 * either an /inc or /includes folder. This file can be used for defining
 * palettes for the Customizer, the $themecolors global, and anything else that
 * should only apply to the WordPress.com environment.
 *
 * The including happens on the after_setup_theme hook, but at a high priority:
 * add_action( 'after_setup_theme', 'wpcom_load_theme_compat_file', 0 );
 *
 * Including happens much like functions.php. If the file is present in a child
 * theme, it will be loaded from there first; if it's also present in the parent
 * theme, that will also be included immediately afterwards.
 *
 * @todo Load child theme compat file if available.
 */
function wpcom_tester_setup() {
	// I always include my WPCOM compat file in the includes folder, so I won't
	// worry about checking '/inc' folder.
	require_once( get_template_directory() . '/includes/wpcom.php' );
}
add_action( 'after_setup_theme', 'wpcom_tester_setup', 0 );
