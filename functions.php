<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );

	// Load script JS
	wp_enqueue_script( 'oceanwp-child-custom-script', get_stylesheet_directory_uri() . '/scripts/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );


function contact_btn( $items, $args ) {
    if ( $args->theme_location == 'main_menu' ) {
	//ID 354 in the backoffice contact page
        $permalink = get_permalink(354);
        $items .= '<li><a href="'.esc_url( $permalink ).'"><span class="text-wrap" id="contact-btn">Nous contacter</span></a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'contact_btn', 10, 2 );

