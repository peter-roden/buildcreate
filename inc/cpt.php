<?php

// Case Studies Custom Post Type
function register_case_studies_cpt() {

	$labels = [
		"name" => __( "Case Studies", "bc" ),
		"singular_name" => __( "Case Study", "bc" ),
		 "add_new" => __( "New Case Study", "bc" ),
		 "add_new_item" => __( "Add New Case Study", "bc" ),
		 "edit_item" => __( "Edit Case Study", "bc" ),
		 "new_item" => __( "New Case Study", "bc" ),
		 "view_item" => __( "View Case Studies", "bc" ),
		 "search_items" => __( "Search menu_page_url( $menu_slug, $echo = true )", "bc" ),
		 "not_found" =>  __( "No Case Study Found", "bc" ),
		 "not_found_in_trash" => __( "No Case Studies found in Trash", "bc" ),
	];

	$args = [
		"label" => __( "Menu", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "case_studies", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-book-alt",
		"supports" => [ "title", "editor", "revisions", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "case_studies", $args );
}
add_action( 'init', 'register_case_studies_cpt' );

// Industries Custom Post Type
function register_industries_cpt() {

	$labels = [
		"name" => __( "Industries", "bc" ),
		"singular_name" => __( "Industry", "bc" ),
		 "add_new" => __( "New Industry", "bc" ),
		 "add_new_item" => __( "Add New Industry", "bc" ),
		 "edit_item" => __( "Edit Industry", "bc" ),
		 "new_item" => __( "New Industry", "bc" ),
		 "view_item" => __( "View Industries", "bc" ),
		 "search_items" => __( "Search menu_page_url( $menu_slug, $echo = true )", "bc" ),
		 "not_found" =>  __( "No Industry Found", "bc" ),
		 "not_found_in_trash" => __( "No Industries found in Trash", "bc" ),
	];

	$args = [
		"label" => __( "Menu", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "industries", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-share-alt",
		"supports" => [ "title", "editor", "revisions", "page-attributes"],
		"show_in_graphql" => false,
	];

	register_post_type( "industries", $args );
}
add_action( 'init', 'register_industries_cpt' );

// Jobs Custom Post Type
function register_jobs_cpt() {

	$labels = [
		"name" => __( "Jobs", "bc" ),
		"singular_name" => __( "Job", "bc" ),
		 "add_new" => __( "New Job", "bc" ),
		 "add_new_item" => __( "Add New Job", "bc" ),
		 "edit_item" => __( "Edit Job", "bc" ),
		 "new_item" => __( "New Job", "bc" ),
		 "view_item" => __( "View Jobs", "bc" ),
		 "search_items" => __( "Search menu_page_url( $menu_slug, $echo = true )", "bc" ),
		 "not_found" =>  __( "No Job Found", "bc" ),
		 "not_found_in_trash" => __( "No Jobs found in Trash", "bc" ),
	];

	$args = [
		"label" => __( "Menu", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "jobs", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-users",
		"supports" => [ "title", "editor", "revisions", "page-attributes"],
		"show_in_graphql" => false,
	];

	register_post_type( "jobs", $args );
}
add_action( 'init', 'register_jobs_cpt' );

// Services Custom Post Type
function register_services_cpt() {

	$labels = [
		"name" => __( "Services", "bc" ),
		"singular_name" => __( "Service", "bc" ),
		 "add_new" => __( "New Service", "bc" ),
		 "add_new_item" => __( "Add New Service", "bc" ),
		 "edit_item" => __( "Edit Service", "bc" ),
		 "new_item" => __( "New Service", "bc" ),
		 "view_item" => __( "View Services", "bc" ),
		 "search_items" => __( "Search menu_page_url( $menu_slug, $echo = true )", "bc" ),
		 "not_found" =>  __( "No Services Found", "bc" ),
		 "not_found_in_trash" => __( "No Services found in Trash", "bc" ),
	];

	$args = [
		"label" => __( "Menu", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "services", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-rest-api",
		"supports" => [ "title", "editor", "revisions", "page-attributes"],
		"show_in_graphql" => false,
	];

	register_post_type( "services", $args );
}
add_action( 'init', 'register_services_cpt' );

// Staff Custom Post Type
function register_staff_cpt() {

	$labels = [
		"name" => __( "Staff", "bc" ),
		"singular_name" => __( "Staff", "bc" ),
		 "add_new" => __( "New Staff", "bc" ),
		 "add_new_item" => __( "Add New Staff", "bc" ),
		 "edit_item" => __( "Edit Staff", "bc" ),
		 "new_item" => __( "New Staff", "bc" ),
		 "view_item" => __( "View Staff", "bc" ),
		 "search_items" => __( "Search menu_page_url( $menu_slug, $echo = true )", "bc" ),
		 "not_found" =>  __( "No Staff Found", "bc" ),
		 "not_found_in_trash" => __( "No Staff found in Trash", "bc" ),
	];

	$args = [
		"label" => __( "Menu", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "staff", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-users",
		"supports" => [ "title", "editor", "revisions", "page-attributes"],
		"show_in_graphql" => false,
	];

	register_post_type( "staff", $args );
}
add_action( 'init', 'register_staff_cpt' );

// Work Custom Post Type
function register_work_cpt() {

	$labels = [
		"name" => __( "Work", "bc" ),
		"singular_name" => __( "Work", "bc" ),
		 "add_new" => __( "New Work", "bc" ),
		 "add_new_item" => __( "Add New Work", "bc" ),
		 "edit_item" => __( "Edit Work", "bc" ),
		 "new_item" => __( "New Work", "bc" ),
		 "view_item" => __( "View Work", "bc" ),
		 "search_items" => __( "Search menu_page_url( $menu_slug, $echo = true )", "bc" ),
		 "not_found" =>  __( "No Work Found", "bc" ),
		 "not_found_in_trash" => __( "No Work found in Trash", "bc" ),
	];

	$args = [
		"label" => __( "Work", "bc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "work", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-building",
		"supports" => [ "title", "editor", "revisions", "page-attributes", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "work", $args );
}
add_action( 'init', 'register_work_cpt' );

// Taxonomy for Work Service Categories
function register_taxonomy_work_service_categories () {

	$labels = [
		"name" => __( "Service Categories", "epitome" ),
		"singular_name" => __( "Service Category", "epitome" ),
	];

	$args = [
		"label" => __( "Service Categories", "bc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'work_service_categories', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "program_age_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
		"meta_box_cb" => false,
	];
	register_taxonomy( "work_service_categories", [ "work" ], $args );
}
add_action( 'init', 'register_taxonomy_work_service_categories' );


?>