<?php
/**
 * arrisdesign Theme Customizer
 *
 * @package arrisdesign
 */
 
function arrisdesign_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//Extends the customizer with a categories dropdown control.
	class Categories_Dropdown extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'arrisdesign' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }

	//___General___//
    $wp_customize->add_section(
        'arrisdesign_general',
        array(
            'title' => __('General', 'arrisdesign'),
            'priority' => 9,
        )
    );
	//Logo Upload
	$wp_customize->add_setting(
		'site_logo',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'arrisdesign' ),
			   'type' 			=> 'image',
               'section'        => 'arrisdesign_general',
               'settings'       => 'site_logo',
            )
        )
    );
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'arrisdesign' ),
			   'type' 			=> 'image',
               'section'        => 'arrisdesign_general',
               'settings'       => 'site_favicon',
            )
        )
    );
	
	
	
	$wp_customize->add_setting(
		'headings_fonts',
		array(
			'sanitize_callback' => 'arrisdesign_sanitize_fonts',
		)
	);
	
	$wp_customize->add_control(
		'headings_fonts',
		array(
			'type' => 'select',
			'label' => __('Select your desired font for the headings.', 'arrisdesign'),
			'section' => 'arrisdesign_typography',
			'choices' => $font_choices
		)
	);
	
	$wp_customize->add_setting(
		'body_fonts',
		array(
			'sanitize_callback' => 'arrisdesign_sanitize_fonts',
		)
	);
	
	$wp_customize->add_control(
		'body_fonts',
		array(
			'type' => 'select',
			'label' => __('Select your desired font for the body.', 'arrisdesign'),
			'section' => 'arrisdesign_typography',
			'choices' => $font_choices
		)
	);

	

	//___Colors___//
	//Primary color
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'			=> '#D9D4A6',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label' => __('Primary color', 'arrisdesign'),
				'section' => 'colors',
				'settings' => 'primary_color',
				'priority' => 12
			)
		)
	);	
	//Secondary color
	$wp_customize->add_setting(
		'secondary_color',
		array(
			'default'			=> '#3296B8',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			array(
				'label' => __('Secondary color', 'arrisdesign'),
				'section' => 'colors',
				'settings' => 'secondary_color',
				'priority' => 12
			)
		)
	);
	//tertiary color
	$wp_customize->add_setting(
		'tertiary_color',
		array(
			'default'			=> '#B4AA51',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'tertiary_color',
			array(
				'label' => __('Tertiary color', 'arrisdesign'),
				'section' => 'colors',
				'settings' => 'tertiary_color',
				'priority' => 12
			)
		)
	);
	//quaternary_color color
	$wp_customize->add_setting(
		'quaternary_color',
		array(
			'default'			=> '#025269',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'quaternary_color',
			array(
				'label' => __('Quaternary color', 'arrisdesign'),
				'section' => 'colors',
				'settings' => 'quaternary_color',
				'priority' => 12
			)
		)
	);
}
add_action( 'customize_register', 'arrisdesign_customize_register' );

/**
 * Sanitization
 */
//Checkboxes
function arrisdesign_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function arrisdesign_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
//Fonts
function arrisdesign_sanitize_fonts( $input ) {
    $valid = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',		
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Open+Sans:400italic,700italic,400,700' => 'Open Sans',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Oswald:400,700' => 'Oswald',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Raleway:400,700' => 'Raleway',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function arrisdesign_customize_preview_js() {
	wp_enqueue_script( 'arrisdesign_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'arrisdesign_customize_preview_js' );
