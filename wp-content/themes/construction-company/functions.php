<?php
/**
 * Theme functions and definitions
 *
 * @package Construction_Company
 */

/**
 * Typography Functions
 */
require get_stylesheet_directory() . '/inc/typography-functions.php';

/**
 * After setup theme hook
 */
function construction_company_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'construction-company', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'construction_company_theme_setup' );

/**
 * Load assets.
 *
 */
function construction_company_enqueue_styles_and_scripts() {
    $my_theme = wp_get_theme();
    $version = $my_theme['Version'];
    
    wp_enqueue_style( 'construction-company-google-fonts', construction_company_fonts_url(), array(), null );
    wp_enqueue_style( 'construction-landing-page-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'construction-company-style', get_stylesheet_directory_uri() . '/style.css', array( 'construction-landing-page-style' ), $version );

    wp_enqueue_script( 'construction-company-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), $version, true );

}
add_action( 'wp_enqueue_scripts', 'construction_company_enqueue_styles_and_scripts' );

/**
 * Dequeue scripts from parent theme
 */
function construction_company_dequeue_parent_theme_styles_and_scripts(){
    wp_dequeue_style( 'construction-landing-page-google-fonts' );
    wp_deregister_style( 'construction-landing-page-google-fonts' );
}
add_action( 'wp_enqueue_scripts', 'construction_company_dequeue_parent_theme_styles_and_scripts', 100 );

/**
 * Remove action from parent
 */
function construction_company_remove_parent_action(){
    remove_filter( 'wp_nav_menu_items', 'construction_landing_page_phone_link' );
    remove_action( 'customize_register', 'construction_landing_page_customizer_theme_info' );
    remove_action( 'customize_register', 'construction_landing_page_customizer_demo_content' );
}
add_action( 'init', 'construction_company_remove_parent_action' );

/**
 * Construction Company Theme Info
 */
function construction_company_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Demo and Documentation' , 'construction-company' ),
		'priority'    => 6,
		));
        
    $wp_customize->add_setting(
		'setup_instruction',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		new Construction_Landing_Page_Theme_Info( 
			$wp_customize,
			'setup_instruction',
			array(
                'settings'      => 'setup_instruction',
                'section'       => 'theme_info',
			)
		)
	);

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	));
    
    $theme_info = '';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Documentation', 'construction-company' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/documentation/construction-company/' ) . '" target="_blank">' . __( 'here', 'construction-company' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Demo', 'construction-company' ) . ': </label><a href="' . esc_url( 'https://demo.raratheme.com/construction-company' ) . '" target="_blank">' . __( 'here', 'construction-company' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme info', 'construction-company' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/construction-company/' ) . '" target="_blank">' . __( 'Click here', 'construction-company' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support Ticket', 'construction-company' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/support-ticket/' ) . '" target="_blank">' . __( 'here', 'construction-company' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'More WordPress Themes', 'construction-company' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/' ) . '" target="_blank">' . __( 'Click here', 'construction-company' ) . '</a></span><br />';

	$wp_customize->add_control( new Construction_Landing_Page_Theme_Info( $wp_customize ,'theme_info_theme',array(
        'label' => __( 'About Construction Company' , 'construction-company' ),
		'section' => 'theme_info',
		'description' => $theme_info
	)));
}
add_action( 'customize_register', 'construction_company_customizer_theme_info' );

/**
 * Customize resgister settings and controls 
 */
function construction_company_customize_register( $wp_customize ){

    // Load our custom control.
    require_once get_stylesheet_directory() . '/inc/custom-controls/select/class-select-control.php';
    require_once get_stylesheet_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    require_once get_stylesheet_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_stylesheet_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_stylesheet_directory() . '/inc/custom-controls/typography/class-typography-control.php';
            
    // Register the control type.
    $wp_customize->register_control_type( 'Construction_Company_Select_Control' );
    $wp_customize->register_control_type( 'Construction_Company_Toggle_Control' );
    $wp_customize->register_control_type( 'Construction_Company_Typography_Control' );

    // Modify default parent theme controls
    $wp_customize->get_control( 'construction_landing_page_phone' )->priority   = -1;

    /** Header Phone Label */
    $wp_customize->add_setting(
        'construction_company_header_phone_label',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'construction_company_header_phone_label',
        array(
            'type'            => 'text',
            'section'         => 'construction_landing_page_phone_number',
            'label'           => __( 'Phone # Label', 'construction-company' ),
        )
    );

    /** Header Email Address */
    $wp_customize->add_setting(
        'construction_company_header_email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'construction_company_header_email',
        array(
            'type'            => 'email',
            'section'         => 'construction_landing_page_phone_number',
            'label'           => __( 'Email Address', 'construction-company' ),
        )
    );

    // Selective referesh for header email
    $wp_customize->selective_refresh->add_partial( 'construction_company_header_email', array(
        'selector'        => '.site-header .top-bar .contact-info a.header-email',
        'render_callback' => 'construction_company_get_header_email',
    ) );

    /** Enable Social Links */
    $wp_customize->add_setting( 
        'construction_company_ed_header_social_links', 
        array(
            'default'           => '',
            'sanitize_callback' => 'construction_landing_page_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Construction_Company_Toggle_Control( 
            $wp_customize,
            'construction_company_ed_header_social_links',
            array(
                'section'     => 'construction_landing_page_phone_number',
                'label'       => __( 'Enable Social Links', 'construction-company' ),
                'description' => __( 'Enable to show social links at header.', 'construction-company' ),
            )
        )
    );
    
    /** Add social link repeater control */
    $wp_customize->add_setting( 
        new Construction_Company_Repeater_Setting( 
            $wp_customize, 
            'construction_company_header_social_links', 
            array(
                'default' => array(),
                'sanitize_callback' => array( 'Construction_Company_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Construction_Company_Control_Repeater(
            $wp_customize,
            'construction_company_header_social_links',
            array(
                'section' => 'construction_landing_page_phone_number',               
                'label'   => __( 'Social Links', 'construction-company' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'construction-company' ),
                        'description' => __( 'Example: fa-bell', 'construction-company' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'construction-company' ),
                        'description' => __( 'Example: http://facebook.com', 'construction-company' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'links', 'construction-company' ),
                    'field' => 'link'
                ),
                'choices'   => array(
                    'limit' => 10
                ),             
                'active_callback' => 'construction_company_customizer_active_callback',                 
            )
        )
    );

    /** Typography Section */
    $wp_customize->add_section( 'construction_company_typography_section', array(
        'title'      => __( 'Typography Settings', 'construction-company' ),
        'priority'   => 11,
        'capability' => 'edit_theme_options',
    ) );
    
    /** Primary Font */
    $wp_customize->add_setting( 'construction_company_primary_font', array(
        'default'           => 'PT Sans',
        'sanitize_callback' => 'construction_company_sanitize_select_typography'
	) );

	$wp_customize->add_control( 
        new Construction_Company_Select_Control( 
            $wp_customize, 
            'construction_company_primary_font', 
            array(
                'label'       => __( 'Primary Font', 'construction-company' ),
                'description' => __( 'Primary font of the site.', 'construction-company' ),
                'section'     => 'construction_company_typography_section',
                'choices'     => construction_company_get_all_fonts(),	
        	) 
         ) 
    );
}
add_action( 'customize_register', 'construction_company_customize_register', 100 );

/**
 * Customizer active callback function
 */
function construction_company_customizer_active_callback( $control ){
	$ed_social_link = $control->manager->get_setting( 'construction_company_ed_header_social_links' )->value();
	$control_id     = $control->id;

	// Phone number, Address, Email and Custom Link controls
	if ( $control_id == 'construction_company_header_social_links' && $ed_social_link ) return true;

	return false;
}

/**
 * Partial refresh functions for header email
 */
function construction_company_get_header_email(){
    $header_email =  get_theme_mod( 'construction_company_header_email' );

    if( ! empty( $header_email ) ){
        return esc_html( $header_email );
    }

    return false;
}

/**
* Callback for Social Links
*/
function construction_company_social_links_cb(){
    $social_icons = get_theme_mod( 'construction_company_header_social_links', array() );

    if( $social_icons ){
    ?>
    <ul class="social-networks">
		<?php
        foreach( $social_icons as $socials ){
            if( $socials['link'] ){ ?>
                <li><a href="<?php echo esc_url( $socials['link'] );?>" <?php if( $socials['font'] != 'skype' ) echo 'target="_blank"'; ?> title="<?php echo  esc_html( $socials['font'] ); ?>"><i class="<?php echo esc_attr( $socials['font'] );?>"></i></a></li>
        <?php
            }
        }?>
	</ul>
    <?php
    }
}
add_action( 'construction_company_social_link', 'construction_company_social_links_cb' );


/**
 * Return Web safe font and google font
 */
function construction_company_get_all_fonts(){
    $google = array();        
    $standard = array(
        'georgia-serif'       => __( 'Georgia', 'construction-company' ),
        'palatino-serif'      => __( 'Palatino Linotype, Book Antiqua, Palatino', 'construction-company' ),
        'times-serif'         => __( 'Times New Roman, Times', 'construction-company' ),
        'arial-helvetica'     => __( 'Arial, Helvetica', 'construction-company' ),
        'arial-gadget'        => __( 'Arial Black, Gadget', 'construction-company' ),
        'comic-cursive'       => __( 'Comic Sans MS, cursive', 'construction-company' ),
        'impact-charcoal'     => __( 'Impact, Charcoal', 'construction-company' ),
        'lucida'              => __( 'Lucida Sans Unicode, Lucida Grande', 'construction-company' ),
        'tahoma-geneva'       => __( 'Tahoma, Geneva', 'construction-company' ),
        'trebuchet-helvetica' => __( 'Trebuchet MS, Helvetica', 'construction-company' ),
        'verdana-geneva'      => __( 'Verdana, Geneva', 'construction-company' ),
        'courier'             => __( 'Courier New, Courier', 'construction-company' ),
        'lucida-monaco'       => __( 'Lucida Console, Monaco', 'construction-company' ),
    );
    
    $fonts = include wp_normalize_path( get_stylesheet_directory() . '/inc/custom-controls/typography/webfonts.php' );
    
    foreach( $fonts['items'] as $font ){
        $google[$font['family']] = $font['family'];
    }
    $all_fonts = array_merge( $standard, $google );
    return $all_fonts; 
}

/**
 * Sanitize function for typography
 */
function construction_company_sanitize_select_typography( $value ){
    
    if ( is_array( $value ) ) {
		foreach ( $value as $key => $subvalue ) {
			$value[ $key ] = sanitize_text_field( $subvalue );
		}
		return $value;
	}
	return sanitize_text_field( $value );
    
}

/**
 * Display custom style in head section
 */
function construction_company_header_style(){

    // Typography options
    $primary_font         = get_theme_mod( 'construction_company_primary_font', 'PT Sans' );
    $primary_fonts        = construction_company_get_fonts( $primary_font );

    echo "<style type='text/css' media='all'>"; ?>
    	body, button, input, select, optgroup, textarea {
            font-family : <?php echo esc_html( $primary_fonts['font'] ); ?>;
        }
    <?php
    echo "</style>";
}
add_action( 'wp_head', 'construction_company_header_style' );