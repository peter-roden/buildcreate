<?php

// Session Variables
function register_session() {
	if (!session_id()) { session_start(); }
}
add_action('init', 'register_session');

// Styles 
function enqueue_styles() {
	wp_enqueue_style('style-css', get_stylesheet_directory_uri() .'/style.css');
	wp_enqueue_style('gotham', get_stylesheet_directory_uri() .'/fonts/gotham/gotham-fonts.css');
	wp_enqueue_style('gotham-condensed', get_stylesheet_directory_uri() .'/fonts/gotham-condensed/gotham-condensed-fonts.css');
	wp_enqueue_style('surveyor', get_stylesheet_directory_uri() .'/fonts/surveyor/surveyor-fonts.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

// Scripts
function enqueue_js_scripts() {
	
}
add_action( 'wp_enqueue_scripts', 'enqueue_js_scripts' );

// Theme specific includes
require_once 'inc/acf-blocks.php';	
require_once 'inc/cpt.php';	
require_once 'inc/tinymce.php';

// Body Classes
function add_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_body_class' );

// Dashboard Widgets
add_action('wp_dashboard_setup', 'remove_site_health_dashboard_widget');
function remove_site_health_dashboard_widget() {
	remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}

// Case Study Download
add_filter( 'gform_confirmation_3', 'gform_case_study', 10, 4 );
function gform_case_study( $confirmation, $form, $entry, $ajax ) {
	$confirmation = $_SESSION['case_study_confirmation'];
	return $confirmation;
}

// Featured Image
function my_theme_setup(){
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

// Get Primary Post Category
function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
	$return = array();

	if (class_exists('WPSEO_Primary_Term')){
		// Show Primary category by Yoast if it is enabled & set
		$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
		$primary_term = get_term($wpseo_primary_term->get_primary_term());

		if (!is_wp_error($primary_term)){
			$return['primary_category'] = $primary_term;
		}
	}

	if (empty($return['primary_category']) || $return_all_categories){
		$categories_list = get_the_terms($post_id, $term);

		if (empty($return['primary_category']) && !empty($categories_list)){
			$return['primary_category'] = $categories_list[0];  //get the first category
		}
		if ($return_all_categories){
			$return['all_categories'] = array();

			if (!empty($categories_list)){
				foreach($categories_list as &$category){
					$return['all_categories'][] = $category->term_id;
				}
			}
		}
	}

	return $return;
}

// Get Hierarchical Categories
function get_categories_hierarchical( $args = array() ) {
	if( !isset( $args[ 'parent' ] ) ) $args[ 'parent' ] = 0;
	$categories = get_categories( $args );
	foreach( $categories as $key => $category ):
		$args[ 'parent' ] = $category->term_id;
		$categories[ $key ]->child_categories = get_categories_hierarchical( $args );
	endforeach;
	return $categories;
}
?>