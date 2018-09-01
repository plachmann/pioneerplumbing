<?php 

// Load enqueue
include_once( 'inc/functions/enqueue.php' );

// Register Post types
include_once( 'inc/functions/post-types.php' );

// featured image support
add_theme_support( 'post-thumbnails');
add_image_size( 'slide-images', 1000, 729, true ); // fullscreen slide images
add_image_size( 'about-slide-images', 550, 350, true ); // about us slide images
add_image_size( 'team-slide-images', 250, 250, true ); // team members slide images
add_image_size( 'clients-slide-images', 210, 40, true ); // clients slide images
add_image_size( 'portfolio-full-img', 550, 500, true ); // portfolio big images


///////////////////////////
// menu
///////////////////////////

add_action('init', 'wpf_register_menu');
function wpf_register_menu() {
	if (function_exists('register_nav_menu')) {
		register_nav_menu( 'wpf-main-menu', __( 'Main Menu', 'singlepro' ) ); // main menu
	}
}

																		
function wpj_default_menu() {																	
	echo '
			<ul id="top-menu" class="nav navbar-nav navbar-right main_nav">';
	if ('page' != get_option('show_on_front')) {
		echo '<li class="active"><a href="'. home_url() . '/">Home</a></li>';
	}
	wp_list_pages('title_li=');
	echo '</ul>';
}

//////////////////////
// TGM activation
//////////////////////

require_once('inc/tgm/class-tgm-plugin-activation.php');
require_once('inc/tgm/example.php');


/////////////////////////////////////
/// meta box
//////////////////////////////////////

add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'inc/metaboxes/ot-loader.php' );
include_once( 'inc/metaboxes/meta-boxes.php' );
include_once( 'inc/metaboxes/theme-options.php' );



////////////////////////
//  Framework
////////////////////////

if ( !class_exists( 'Framework' ) && file_exists( dirname( __FILE__ ) . '/inc/Framework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/Framework/ReduxCore/framework.php' );
}
if ( !isset( $cybertech_options ) && file_exists( dirname( __FILE__ ) . '/inc/functions/singlepro-options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/functions/singlepro-options.php' );
}



// redux option panel icon
function newIconFont() {
    // Uncomment this to remove elusive icon from the panel completely
    wp_deregister_style( 'redux-elusive-icon' );
    wp_deregister_style( 'redux-elusive-icon-ie7' );
 
    wp_register_style(
        'redux-font-awesome',
        get_template_directory_uri() . '/css/font-awesome.min.css',
        array(),
        time(),
        'all'
    ); 
    wp_enqueue_style( 'redux-font-awesome' );
}

add_action( 'redux/page/singlepro_options/enqueue', 'newIconFont');





//background images/colors
include_once( 'inc/functions/section_bg_css.php' );
// colors
include_once( 'inc/functions/singlepro-themes.php' );


/////////////////////
// backend css
/////////////////////



function singlepro_adminpanel_style() {
	echo '<link href="'.get_template_directory_uri() .'/css/backend/singlepro-backend.css" rel="stylesheet" media="screen">';
}
add_action('admin_head', 'singlepro_adminpanel_style');	



?>