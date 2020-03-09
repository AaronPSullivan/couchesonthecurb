<?php
/**
 * couchcurb Theme Customizer
 *
 * @package couchcurb
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function couchcurb_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    
    // Add Content Options main section
    
    $wp_customize->add_section( 'content_options' , array(
		'title'      => __( 'Couches Settings', 'couchcurb' ),
		'priority'   => 100,
	) );
    
    
    // Add welcome page control
    $wp_customize->add_setting( 'content_settings[welcome_page]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'    => ''
    ) );

    $wp_customize->add_control( 'content_settings[welcome_page]' . $count, array(
        'label'    => __( 'Welcome Page', 'couchcurb' ),
        'section'  => 'content_options',
        'type'     => 'dropdown-pages'
    ) );
    
    // Add position number for welcome page control
    
    
    $wp_customize->add_setting( 'content_settings[welcome_position]', array(
      'capability' => 'edit_theme_options',
      'type'       => 'option',
      'sanitize_callback' => 'themeslug_sanitize_number_absint',
      'default' => 3,
    ) );

    $wp_customize->add_control( 'content_settings[welcome_position]', array(
      'type' => 'number',
      'section' => 'content_options', // Add a default or your own section
      'label' => __( 'Welcome Page Position' ),
      'description' => __( 'Inserts the page into the feed.' ),
    ) );

    function themeslug_sanitize_number_absint( $number, $setting ) {
      // Ensure $number is an absolute integer (whole number, zero or greater).
      $number = absint( $number );

      // If the input is an absolute integer, return it; otherwise, return the default
      return ( $number ? $number : $setting->default );
    }
    
    
    // Add navigation image control
    $wp_customize->add_setting( 'content_settings[nav_image]', array( 
        'capability' => 'edit_theme_options',
        'type'       => 'option',
		'default' => ''
	) );
     
    
    $wp_customize->add_control(
       new WP_Customize_Media_Control(
           $wp_customize,
           'nav_image',
           array(
               'label'      => __( 'Navigation Background Image', 'couchcurb' ),
               'section'    => 'content_options',
               'settings'   => 'content_settings[nav_image]'
           )
       )
   );
    
    
    
     /*   
     $wp_customize->add_setting( 'content_settings[home_text]', array( 
        'capability' => 'edit_theme_options',
        'type'       => 'option',
		'default' => ''
	) );
     
     $wp_customize->add_control(
       new WP_Customize_Control (
           $wp_customize,
           'home_text',
           array(
               'type' => 'textarea',
               'label'      => __( 'Home Page Introduction', 'couchcurb' ),
               'section'    => 'content_options',
               'settings'   => 'content_settings[home_text]'
           )
       )
   );
    */
    
    
    
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'couchcurb_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'couchcurb_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'couchcurb_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function couchcurb_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function couchcurb_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function couchcurb_customize_preview_js() {
	wp_enqueue_script( 'couchcurb-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'couchcurb_customize_preview_js' );
