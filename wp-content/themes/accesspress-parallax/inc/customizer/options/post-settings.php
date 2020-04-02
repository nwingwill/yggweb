<?php

/** Post Settings * */
$wp_customize->add_section( 'accesspress_parallax_post_settings', array(
    'title' => __( 'Post Settings', 'accesspress-parallax' ),
    'priority' => 20
) );

// Show Posted Date
$wp_customize->add_setting( 'accesspress_parallax[post_date]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[post_date]', array(
    'label' => __( 'Show Posted Date', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_post_settings',
) );

// Show Featured Image
$wp_customize->add_setting( 'accesspress_parallax[featured_image]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[featured_image]', array(
    'label' => __( 'Show Featured Image', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_post_settings',
) );

// Show Post Author
$wp_customize->add_setting( 'accesspress_parallax[post_author]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[post_author]', array(
    'label' => __( 'Show Post Author', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_post_settings',
) );

// Show Posted Date
$wp_customize->add_setting( 'accesspress_parallax[post_footer]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[post_footer]', array(
    'label' => __( 'Show Post Footer text', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_post_settings',
) );

// Show Posted Date
$wp_customize->add_setting( 'accesspress_parallax[post_pagination]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[post_pagination]', array(
    'label' => __( 'Show Prev Next Pagination', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_post_settings',
) );
