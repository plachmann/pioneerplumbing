<?php

///////////////////////////////////////////////
// SinglePro Developed by WpFreeware.com
//////////////////////////////////////////////

////////////////////////////////
// jquery scripts
/////////////////////////////////


function singlepro_scripts() {

   wp_deregister_script('jquery');
   wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, '1.11.1', true);
  
  // comment ajax reply
  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );   

	wp_register_script( 'singlepro_wowjs', get_template_directory_uri() . '/js/wow.min.js', false, null, true );   
	wp_register_script( 'singlepro_bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true );
	wp_register_script( 'singlepro_home_slider', get_template_directory_uri() . '/js/jquery.superslides.min.js', false, null, true );
	wp_register_script( 'singlepro_slick', get_template_directory_uri() . '/js/slick.min.js', false, null, true );
	wp_register_script('singlepro_circlifuljs', "https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js", false, '', true);
	wp_register_script( 'singlepro_customjs', get_template_directory_uri() . '/js/custom.js', false, null, true );
	
	
	wp_enqueue_script('jquery');
    wp_enqueue_script( 'singlepro_google_map' );	
    wp_enqueue_script( 'singlepro_uimap' );	
	wp_enqueue_script( 'singlepro_wowjs' );
	wp_enqueue_script( 'singlepro_bootstrapjs' );
	wp_enqueue_script( 'singlepro_home_slider' );
	wp_enqueue_script( 'singlepro_slick' );
	wp_enqueue_script( 'singlepro_circlifuljs' );
	wp_enqueue_script( 'singlepro_customjs' );

}

if (!is_admin()) add_action("wp_enqueue_scripts", "singlepro_scripts", 11);


///////////////////////////////////////////////
// SinglePro Developed by WpFreeware.com
//////////////////////////////////////////////

////////////////////////////////
// CSS styles
/////////////////////////////////

function singlepro_styles()
{
    // Register the style like this for a theme:
    wp_register_style( 'singlepro_bootstrapmin', get_template_directory_uri() . '/css/bootstrap.min.css','all' );
    wp_register_style( 'singlepro_fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css','all' );
	wp_register_style( 'singlepro_homeslider', get_template_directory_uri() . '/css/superslides.css','all' );
	wp_register_style( 'singlepro_slickslider', get_template_directory_uri() . '/css/slick.css','all' );
    wp_register_style( 'singlepro_animation', get_template_directory_uri() . '/css/animate.css','all' );
    //wp_register_style( 'singlepro_elasticgrid', get_template_directory_uri() . '/css/elastic_grid.css','all' );
    wp_register_style( 'singlepro_circliful','https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css','all' );
	wp_register_style( 'singlepro_rtl', get_template_directory_uri() . '/rtl.css','all' );	
    wp_register_style( 'main_style', get_template_directory_uri() . '/style.css','all' );
	
    // google fonts
	wp_register_style( 'singlepro_googlefont_opensans','http://fonts.googleapis.com/css?family=Open+Sans','all' );
    wp_register_style( 'singlepro_googlefont_varela','http://fonts.googleapis.com/css?family=Varela','all' );
    wp_register_style( 'singlepro_googlefont_montserrat','http://fonts.googleapis.com/css?family=Montserrat','all' );	
 
 
    wp_enqueue_style( 'singlepro_bootstrapmin' );
    wp_enqueue_style( 'singlepro_fontawesome' );
    wp_enqueue_style( 'singlepro_homeslider' );
    wp_enqueue_style( 'singlepro_slickslider' );
	wp_enqueue_style( 'singlepro_animation' );
	//wp_enqueue_style( 'singlepro_elasticgrid' );
	wp_enqueue_style( 'singlepro_circliful' );
    wp_enqueue_style( 'singlepro_rtl' );
    wp_enqueue_style( 'main_style' );
    wp_enqueue_style( 'singlepro_googlefont_opensans' );
    wp_enqueue_style( 'singlepro_googlefont_varela' );
    wp_enqueue_style( 'singlepro_googlefont_montserrat' );
}
add_action( 'wp_enqueue_scripts', 'singlepro_styles' );

?>