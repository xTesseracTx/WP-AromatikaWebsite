<?php 
/*
 * enqueue for the child theme for ie8 users
 * Thanks to http://www.boxoft.net/ for this workaround ie8
 */
 function celestial_child_enqueue_scripts_styles() {
  wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
} 
add_action( 'wp_enqueue_scripts', 'celestial_child_enqueue_scripts_styles' );

?>