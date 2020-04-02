<?php

/** General Settings * */
$wp_customize->add_panel( 'accesspress_parallax_general_settings_panel', array(
    'title' => __( 'General Settings', 'accesspress-parallax' ),
    'priority' => 2
) );


$wp_customize->get_section( 'title_tagline' )->panel = 'accesspress_parallax_general_settings_panel';
$wp_customize->get_section( 'colors' )->panel = 'accesspress_parallax_general_settings_panel';
$wp_customize->get_section( 'background_image' )->panel = 'accesspress_parallax_general_settings_panel';  
$wp_customize->get_section( 'static_front_page' )->panel = 'accesspress_parallax_general_settings_panel';

// Enable parallax
$wp_customize->add_setting( 'accesspress_parallax[enable_parallax]', array( 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[enable_parallax]', array(
    'label' => __( 'Enable Parallax Sections on FrontPage', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'description' => __( 'Enabling the option will show the parallax sections irrespective of above settings. Add <a id="accesspress-home-sections-nav" href="#">Home Page Sections</a>', 'accesspress-parallax' ),
    'section' => 'static_front_page',
) );

/** Template Color * */
$wp_customize->add_setting( 'accesspress_parallax[template_color]', array( 'default' => '#E66432', 'type' => 'option', 'sanitize_callback' => 'sanitize_hex_color' ) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accesspress_parallax[template_color]', array(
    'label' => esc_html__( 'Template Color', 'accesspress-parallax' ),
    'description' => esc_html__( 'Set the template color for the site.', 'accesspress-parallax' ),
    'section' => 'colors',
    'settings' => 'accesspress_parallax[template_color]',
) ) );



$wp_customize->add_section( 'accesspress_parallax_general_settings', array(
    'title' => __( 'Animation Settings', 'accesspress-parallax' ),
    'panel' => 'accesspress_parallax_general_settings_panel'
) );


// Enable Single Page Nav
$wp_customize->add_setting( 'accesspress_parallax[enable_animation]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[enable_animation]', array(
    'label' => esc_html__( 'Enable Animation on scroll', 'accesspress-parallax' ),
    'description' => esc_html__( '( Page Elements will show with some animation only in home page. )', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_general_settings',
) );

$wp_customize->add_section( 'accesspress_parallax_general_settings_parallax', array(
    'title' => __( 'Parallax Settings', 'accesspress-parallax' ),
    'panel' => 'accesspress_parallax_general_settings_panel'
) );


// Enable Single Page Nav
$wp_customize->add_setting( 'accesspress_parallax[enable_parallax_effect]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[enable_parallax_effect]', array(
    'label' => esc_html__( 'Enable Parallax Effect on scroll', 'accesspress-parallax' ),
    'description' => esc_html__( '( Check to enable parallax effect on scroll in background image of Elementor. )', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_general_settings_parallax',
) );