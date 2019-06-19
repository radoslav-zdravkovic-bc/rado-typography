<?php
/*
Plugin Name:  Rado Typography
Plugin URI:   https://developer.wordpress.org/plugins/
Description:  Plugin that helps you style paragraphs and headings
Version:      1.0
Author:       Radoslav S. Zdravkovic
Author URI:   https://developer.wordpress.org/
License:      Free

Rado Typography Plugin is a free software, but you can sell it if you like.
*/

/* Define variables and arrays */
$elements = array( 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
$devices_width = array( '', '_1280px_to_992px', '_991px_to_768px', '_767px_to_0px' );

/* Add Admin menu item and register settings for Rado Typography */
if ( is_admin() ){ // admin actions
  add_action( 'admin_menu', 'rado_typography_menu' );
  add_action( 'admin_init', 'register_rado_typography_settings' );
} else {
  // non-admin enqueues, actions, and filters
}

function rado_typography_menu() {
	add_menu_page( 'Rado Typography', 'Rado Typography', 'manage_options', 'rado-typography-styles-panel', 'rado_typography_options', plugins_url( 'rado-typography/icons/rt-icon.png' ) );
  add_submenu_page('rado-typography-styles-panel', 'Rado Typography Settings', 'Settings', 'manage_options', 'rado-typography-styles-panel', 'rado_typography_options' );
  add_submenu_page('rado-typography-styles-panel', 'Rado Typography Help', 'Help', 'manage_options', 'rado-typography-help', 'rado_help_page' );

}

/* Enqueue Rado Typography JS and CSS */
if (isset($_GET['page']) && ($_GET['page'] == 'rado-typography-styles-panel' || $_GET['page'] == 'rado-typography-help'))
{
  add_action( 'admin_enqueue_scripts', 'rado_typography_css_and_js_load');
}

if ( ! function_exists( 'rado_typography_css_and_js_load' ) ){
	function rado_typography_css_and_js_load() {
		wp_register_style('bootstrap_rt', plugins_url('css/bootstrap.min.css', __FILE__));
		wp_enqueue_style('bootstrap_rt');
    wp_register_style('custom-rt-styles', plugins_url('css/custom-rt-styles.css', __FILE__));
		wp_enqueue_style('custom-rt-styles');
		wp_enqueue_style( 'wp-color-picker');

		wp_register_script('bootstrap_rt', plugins_url('js/bootstrap.min.js', __FILE__), array('jquery'), true);
 		wp_enqueue_script('bootstrap_rt');
		wp_enqueue_script( 'wp-color-picker');
    wp_register_script('custom-rt-js', plugins_url('js/custom-rt-js.js', __FILE__), array('jquery'), true);
 		wp_enqueue_script('custom-rt-js');
	}
}

/* Register Rado Typography options */
include('includes/rt_register_settings.php');

/* Register Rado Typography help page */
include('includes/rt_help_page.php');

/* Rado Typography options form */
include('includes/rt_options_form.php');

/* Generate Rado Typography styles */
include('includes/rt_custom_css.php');
