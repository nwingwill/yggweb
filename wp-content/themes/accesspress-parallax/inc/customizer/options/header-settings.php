<?php

/** Header Settings * */
$wp_customize->add_section( 'accesspress_parallax_header_settings', array(
    'title' => __( 'Header Settings', 'accesspress-parallax' ),
    'priority' => 5
) );

$wp_customize->get_control( 'header_image' )->section = 'accesspress_parallax_header_settings';
$wp_customize->remove_control( 'display_header_text' );
$wp_customize->get_section( 'static_front_page' )->priority = 1;

// Enable Single Page Nav
$wp_customize->add_setting( 'accesspress_parallax[enable_parallax_nav]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[enable_parallax_nav]', array(
    'label' => esc_html__( 'Enable Single Page Nav(Menu)', 'accesspress-parallax' ),
    'description' => /* translators: Menu Link*/sprintf( esc_html__( 'If disabled, will show %1$s Primary Menu %2$s', 'accesspress-parallax' ), '<a target="_blank" href="' . admin_url( '/nav-menus.php' ) . '">', '</a>' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_header_settings',
) );

// Home Menu Text
$wp_customize->add_setting( 'accesspress_parallax[home_text]', array( 'default' => 'Home', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[home_text]', array(
    'label' => esc_html__( 'Home Menu Text for Single Page Nav', 'accesspress-parallax' ),
    'description' => esc_html__( 'Leave blank if you do not want to show', 'accesspress-parallax' ),
    'type' => 'text',
    'section' => 'accesspress_parallax_header_settings',
) );

// Header Layout
$wp_customize->add_setting( 'accesspress_parallax[header_layout]', array( 'default' => 'logo-side', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[header_layout]', array(
    'label' => esc_html__( 'Select Header Layout', 'accesspress-parallax' ),
    'type' => 'select',
    'choices' => array(
        'logo-top' => esc_html__( 'Logo on Top of Menu', 'accesspress-parallax' ),
        'logo-side' => esc_html__( 'Logo on Side of Menu', 'accesspress-parallax' ),
        'header-transparent' => esc_html__( 'Transparent Header', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_header_settings',
) );

// Enable Single Page Nav
$wp_customize->add_setting( 'accesspress_parallax[enable_bottom_border]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[enable_bottom_border]', array(
    'label' => esc_html__( 'Enable Bottom Border', 'accesspress-parallax' ),
    'description' => /* translators: Menu Link*/ esc_html__( 'Check to enable border in bottom of header.', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_header_settings',
) );