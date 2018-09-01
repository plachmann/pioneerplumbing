<?php
/**
 * Customizer Typography Control
 *
 * Taken from Kirki.
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Construction_Company_Typography_Control' ) ) {
    
    class Construction_Company_Typography_Control extends WP_Customize_Control {
    
    	public $tooltip = '';
    	public $js_vars = array();
    	public $output = array();
    	public $option_type = 'theme_mod';
    	public $type = 'typography';
    
    	/**
    	 * Refresh the parameters passed to the JavaScript via JSON.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function to_json() {
    		parent::to_json();
    
    		if ( isset( $this->default ) ) {
    			$this->json['default'] = $this->default;
    		} else {
    			$this->json['default'] = $this->setting->default;
    		}
    		$this->json['js_vars'] = $this->js_vars;
    		$this->json['output']  = $this->output;
    		$this->json['value']   = $this->value();
    		$this->json['choices'] = $this->choices;
    		$this->json['link']    = $this->get_link();
    		$this->json['tooltip'] = $this->tooltip;
    		$this->json['id']      = $this->id;
    		$this->json['l10n']    = apply_filters( 'construction-company-typography-control/il8n/strings', array(
    			'on'                 => esc_attr__( 'ON', 'construction-company' ),
    			'off'                => esc_attr__( 'OFF', 'construction-company' ),
    			'all'                => esc_attr__( 'All', 'construction-company' ),
    			'cyrillic'           => esc_attr__( 'Cyrillic', 'construction-company' ),
    			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'construction-company' ),
    			'devanagari'         => esc_attr__( 'Devanagari', 'construction-company' ),
    			'greek'              => esc_attr__( 'Greek', 'construction-company' ),
    			'greek-ext'          => esc_attr__( 'Greek Extended', 'construction-company' ),
    			'khmer'              => esc_attr__( 'Khmer', 'construction-company' ),
    			'latin'              => esc_attr__( 'Latin', 'construction-company' ),
    			'latin-ext'          => esc_attr__( 'Latin Extended', 'construction-company' ),
    			'vietnamese'         => esc_attr__( 'Vietnamese', 'construction-company' ),
    			'hebrew'             => esc_attr__( 'Hebrew', 'construction-company' ),
    			'arabic'             => esc_attr__( 'Arabic', 'construction-company' ),
    			'bengali'            => esc_attr__( 'Bengali', 'construction-company' ),
    			'gujarati'           => esc_attr__( 'Gujarati', 'construction-company' ),
    			'tamil'              => esc_attr__( 'Tamil', 'construction-company' ),
    			'telugu'             => esc_attr__( 'Telugu', 'construction-company' ),
    			'thai'               => esc_attr__( 'Thai', 'construction-company' ),
    			'serif'              => esc_attr_x( 'Serif', 'font style', 'construction-company' ),
    			'sans-serif'         => esc_attr_x( 'Sans Serif', 'font style', 'construction-company' ),
    			'monospace'          => esc_attr_x( 'Monospace', 'font style', 'construction-company' ),
    			'font-family'        => esc_attr__( 'Font Family', 'construction-company' ),
    			'font-size'          => esc_attr__( 'Font Size', 'construction-company' ),
    			'font-weight'        => esc_attr__( 'Font Weight', 'construction-company' ),
    			'line-height'        => esc_attr__( 'Line Height', 'construction-company' ),
    			'font-style'         => esc_attr__( 'Font Style', 'construction-company' ),
    			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'construction-company' ),
    			'text-align'         => esc_attr__( 'Text Align', 'construction-company' ),
    			'text-transform'     => esc_attr__( 'Text Transform', 'construction-company' ),
    			'none'               => esc_attr__( 'None', 'construction-company' ),
    			'uppercase'          => esc_attr__( 'Uppercase', 'construction-company' ),
    			'lowercase'          => esc_attr__( 'Lowercase', 'construction-company' ),
    			'top'                => esc_attr__( 'Top', 'construction-company' ),
    			'bottom'             => esc_attr__( 'Bottom', 'construction-company' ),
    			'left'               => esc_attr__( 'Left', 'construction-company' ),
    			'right'              => esc_attr__( 'Right', 'construction-company' ),
    			'center'             => esc_attr__( 'Center', 'construction-company' ),
    			'justify'            => esc_attr__( 'Justify', 'construction-company' ),
    			'color'              => esc_attr__( 'Color', 'construction-company' ),
    			'select-font-family' => esc_attr__( 'Select a font-family', 'construction-company' ),
    			'variant'            => esc_attr__( 'Variant', 'construction-company' ),
    			'style'              => esc_attr__( 'Style', 'construction-company' ),
    			'size'               => esc_attr__( 'Size', 'construction-company' ),
    			'height'             => esc_attr__( 'Height', 'construction-company' ),
    			'spacing'            => esc_attr__( 'Spacing', 'construction-company' ),
    			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'construction-company' ),
    			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'construction-company' ),
    			'light'              => esc_attr__( 'Light 200', 'construction-company' ),
    			'light-italic'       => esc_attr__( 'Light 200 Italic', 'construction-company' ),
    			'book'               => esc_attr__( 'Book 300', 'construction-company' ),
    			'book-italic'        => esc_attr__( 'Book 300 Italic', 'construction-company' ),
    			'regular'            => esc_attr__( 'Normal 400', 'construction-company' ),
    			'italic'             => esc_attr__( 'Normal 400 Italic', 'construction-company' ),
    			'medium'             => esc_attr__( 'Medium 500', 'construction-company' ),
    			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'construction-company' ),
    			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'construction-company' ),
    			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'construction-company' ),
    			'bold'               => esc_attr__( 'Bold 700', 'construction-company' ),
    			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'construction-company' ),
    			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'construction-company' ),
    			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'construction-company' ),
    			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'construction-company' ),
    			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'construction-company' ),
    			'invalid-value'      => esc_attr__( 'Invalid Value', 'construction-company' ),
    		) );
    
    		$defaults = array( 'font-family'=> false );
    
    		$this->json['default'] = wp_parse_args( $this->json['default'], $defaults );
    	}
    
    	/**
    	 * Enqueue scripts and styles.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function enqueue() {
    		wp_enqueue_style( 'construction-company-typography', get_stylesheet_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
            /*
    		 * JavaScript
    		 */
            wp_enqueue_script( 'jquery-ui-core' );
    		wp_enqueue_script( 'jquery-ui-tooltip' );
    		wp_enqueue_script( 'jquery-stepper-min-js' );
    		
    		// Selectize
    		wp_enqueue_script( 'construction-company-selectize', get_stylesheet_directory_uri() . '/inc/custom-controls/select/selectize.js', array( 'jquery' ), false, true );
    
    		// Typography
    		wp_enqueue_script( 'construction-company-typography', get_stylesheet_directory_uri() . '/inc/custom-controls/typography/typography.js', array(
    			'jquery',
    			'construction-company-selectize'
    		), false, true );
    
    		$google_fonts   = Construction_Company_Fonts::get_google_fonts();
    		$standard_fonts = Construction_Company_Fonts::get_standard_fonts();
    		$all_variants   = Construction_Company_Fonts::get_all_variants();
    
    		$standard_fonts_final = array();
    		foreach ( $standard_fonts as $key => $value ) {
    			$standard_fonts_final[] = array(
    				'family'      => $value['stack'],
    				'label'       => $value['label'],
    				'is_standard' => true,
    				'variants'    => array(
    					array(
    						'id'    => 'regular',
    						'label' => $all_variants['regular'],
    					),
    					array(
    						'id'    => 'italic',
    						'label' => $all_variants['italic'],
    					),
    					array(
    						'id'    => '700',
    						'label' => $all_variants['700'],
    					),
    					array(
    						'id'    => '700italic',
    						'label' => $all_variants['700italic'],
    					),
    				),
    			);
    		}
    
    		$google_fonts_final = array();
    
    		if ( is_array( $google_fonts ) ) {
    			foreach ( $google_fonts as $family => $args ) {
    				$label    = ( isset( $args['label'] ) ) ? $args['label'] : $family;
    				$variants = ( isset( $args['variants'] ) ) ? $args['variants'] : array( 'regular', '700' );
    
    				$available_variants = array();
    				foreach ( $variants as $variant ) {
    					if ( array_key_exists( $variant, $all_variants ) ) {
    						$available_variants[] = array( 'id' => $variant, 'label' => $all_variants[ $variant ] );
    					}
    				}
    
    				$google_fonts_final[] = array(
    					'family'   => $family,
    					'label'    => $label,
    					'variants' => $available_variants
    				);
    			}
    		}
    
    		$final = array_merge( $standard_fonts_final, $google_fonts_final );
    		wp_localize_script( 'construction-company-typography', 'rara_business_pro_all_fonts', $final );
    	}
    
    	/**
    	 * An Underscore (JS) template for this control's content (but not its container).
    	 *
    	 * Class variables for this control class are available in the `data` JS object;
    	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
    	 *
    	 * I put this in a separate file because PhpStorm didn't like it and it fucked with my formatting.
    	 *
    	 * @see    WP_Customize_Control::print_template()
    	 *
    	 * @access protected
    	 * @return void
    	 */
    	protected function content_template() { ?>
    		<# if ( data.tooltip ) { #>
                <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
            <# } #>
            
            <label class="customizer-text">
                <# if ( data.label ) { #>
                    <span class="customize-control-title">{{{ data.label }}}</span>
                <# } #>
                <# if ( data.description ) { #>
                    <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
            </label>
            
            <div class="wrapper">
                <# if ( data.default['font-family'] ) { #>
                    <# if ( '' == data.value['font-family'] ) { data.value['font-family'] = data.default['font-family']; } #>
                    <# if ( data.choices['fonts'] ) { data.fonts = data.choices['fonts']; } #>
                    <div class="font-family">
                        <h5>{{ data.l10n['font-family'] }}</h5>
                        <select id="rara-typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                    </div>
                    <div class="variant rara-variant-wrapper">
                        <h5>{{ data.l10n['style'] }}</h5>
                        <select class="variant" id="rara-typography-variant-{{{ data.id }}}"></select>
                    </div>
                <# } #>   
                
            </div>
            <?php
    	}
    
    }
}