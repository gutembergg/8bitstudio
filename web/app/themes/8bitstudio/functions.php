<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 8bitstudio 1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}

 function setup_config()
 {
     wp_enqueue_script('js-file', get_template_directory_uri().'/js/main.js');
 }

 add_action('wp_enqueue_scripts', 'setup_config');
