<?php 

/////////////////////////////////
// Singlepro post types
////////////////////////////////


	add_action('init', 'register_singlepro_post_type', 0);
	
	function register_singlepro_post_type() {
	
	// slider post type
	$slider_labels = array(
	'name' => _x( 'Slider', 'singlepro' ),
	'singular_name' => _x( 'Slide', 'singlepro' ),
	'add_new' => _x( 'Add New Slide', 'singlepro' ),
	'add_new_item' => _x( 'Add New Slide', 'singlepro' ),
	'edit_item' => _x( 'Edit Slide', 'singlepro' ),
	'new_item' => _x( 'New Slide', 'singlepro' ),
	'view_item' => _x( 'View Slide', 'singlepro' ),
	'search_items' => _x( 'Search Slide', 'singlepro' ),
	'not_found' => _x( 'No Slide found', 'singlepro' ),
	'not_found_in_trash' => _x( 'No Slide found in Trash', 'singlepro' ),
	'parent_item_colon' => _x( 'Parent Slide:', 'singlepro' ),
	'menu_name' => _x( 'Slides', 'singlepro' ),
	);
	$slider_args = array(
	'labels' => $slider_labels,
	'hierarchical' => false,
	'description' => 'Add your home page slides', 
	'supports' => array( 'title', 'thumbnail' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/slider.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);
	
	
	// Testimonial post type
	$testimonials_labels = array(
	'name' => _x( 'Testimonials', 'singlepro' ),
	'singular_name' => _x( 'Testimonial', 'singlepro' ),
	'add_new' => _x( 'Add Testimonial', 'singlepro' ),
	'add_new_item' => _x( 'Add Testimonial', 'singlepro' ),
	'edit_item' => _x( 'Edit Testimonial', 'singlepro' ),
	'new_item' => _x( 'New Testimonial', 'singlepro' ),
	'view_item' => _x( 'View Testimonial', 'singlepro' ),
	'search_items' => _x( 'Search Testimonial', 'singlepro' ),
	'not_found' => _x( 'No Testimonial found', 'singlepro' ),
	'not_found_in_trash' => _x( 'No Testimonial found in Trash', 'singlepro' ),
	'parent_item_colon' => _x( 'Parent Testimonial:', 'singlepro' ),
	'menu_name' => _x( 'Testimonials', 'singlepro' ),
	);
	$testimonials_args = array(
	'labels' => $testimonials_labels,
	'hierarchical' => false,
	'description' => 'Add your testimonials', 
	'supports' => array( 'title', 'editor', 'thumbnail'),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/testimonials.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);	
	
	
	// services post type
	$services_labels = array(
	'name' => _x( 'Services', 'singlepro' ),
	'singular_name' => _x( 'Service', 'singlepro' ),
	'add_new' => _x( 'Add New Service', 'singlepro' ),
	'add_new_item' => _x( 'Add New Service', 'singlepro' ),
	'edit_item' => _x( 'Edit Service', 'singlepro' ),
	'new_item' => _x( 'New Service', 'singlepro' ),
	'view_item' => _x( 'View Service', 'singlepro' ),
	'search_items' => _x( 'Search Service', 'singlepro' ),
	'not_found' => _x( 'No Service found', 'singlepro' ),
	'not_found_in_trash' => _x( 'No Service found in Trash', 'singlepro' ),
	'parent_item_colon' => _x( 'Parent Service:', 'singlepro' ),
	'menu_name' => _x( 'Services', 'singlepro' ),
	);
	$services_args = array(
	'labels' => $services_labels,
	'hierarchical' => false,
	'description' => 'Add your service items', 
	'supports' => array( 'title', 'editor' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/services.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);	
	
	
	// Team members post type
	$team_members_labels = array(
	'name' => _x( 'Team Members', 'singlepro' ),
	'singular_name' => _x( 'Member', 'singlepro' ),
	'add_new' => _x( 'Add New Member', 'singlepro' ),
	'add_new_item' => _x( 'Add New Member', 'singlepro' ),
	'edit_item' => _x( 'Edit Member', 'singlepro' ),
	'new_item' => _x( 'New Member', 'singlepro' ),
	'view_item' => _x( 'View Member', 'singlepro' ),
	'search_items' => _x( 'Search Member', 'singlepro' ),
	'not_found' => _x( 'No Member found', 'singlepro' ),
	'not_found_in_trash' => _x( 'No Member found in Trash', 'singlepro' ),
	'parent_item_colon' => _x( 'Parent Member:', 'singlepro' ),
	'menu_name' => _x( 'Team Members', 'singlepro' ),
	);
	$team_members_args = array(
	'labels' => $team_members_labels,
	'hierarchical' => false,
	'description' => 'Add your team members', 
	'supports' => array( 'title', 'thumbnail' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/team.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);	
	
	// Pricing tables post type
	$pricing_tables_labels = array(
	'name' => _x( 'Pricing Tables', 'singlepro' ),
	'singular_name' => _x( 'Table', 'singlepro' ),
	'add_new' => _x( 'Add New Table', 'singlepro' ),
	'add_new_item' => _x( 'Add New Table', 'singlepro' ),
	'edit_item' => _x( 'Edit Table', 'singlepro' ),
	'new_item' => _x( 'New Table', 'singlepro' ),
	'view_item' => _x( 'View Table', 'singlepro' ),
	'search_items' => _x( 'Search Table', 'singlepro' ),
	'not_found' => _x( 'No Table found', 'singlepro' ),
	'not_found_in_trash' => _x( 'No Table found in Trash', 'singlepro' ),
	'parent_item_colon' => _x( 'Parent Table:', 'singlepro' ),
	'menu_name' => _x( 'Pricing Tables', 'singlepro' ),
	);
	$pricing_tables_args = array(
	'labels' => $pricing_tables_labels,
	'hierarchical' => false,
	'description' => 'Add pricing tables', 
	'supports' => array( 'title'),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/pricing.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);		
	
	
	register_post_type( 'slider', $slider_args );
	register_post_type( 'services', $services_args );
	register_post_type( 'teammember', $team_members_args );
	register_post_type( 'pricing-tables', $pricing_tables_args );
	register_post_type( 'testimonials', $testimonials_args );

	
	} 

	


?>