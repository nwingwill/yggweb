<?php

accesspress_parallax_category_lists();
/** Slider Settings * */
$wp_customize->add_section( 'accesspress_parallax_slider_settings', array(
    'title' => __( 'Slider Settings', 'accesspress-parallax' ),
    'priority' => 10
) );

// Show Slider
$wp_customize->add_setting( 'accesspress_parallax[show_slider]', array( 'default' => 'yes', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[show_slider]', array(
    'label' => __( 'Show Slider', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'Yes', 'accesspress-parallax' ),
        'no' => esc_html__( 'No', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Slider Category
$wp_customize->add_setting( 'accesspress_parallax[slider_category]', array( 'default' => 0, 'type' => 'option', 'sanitize_callback' => 'absint' ) );
$wp_customize->add_control(
        'accesspress_parallax[slider_category]', array(
    'label' => __( 'Slider Category', 'accesspress-parallax' ),
    'description' => __( 'Posts of the selected category will display as slider. The featured Image will show as a slider background image and title/content will show as a slider caption.', 'accesspress-parallax' ),
    'type' => 'select',
    'choices' => accesspress_parallax_category_lists(),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Show full window
$wp_customize->add_setting( 'accesspress_parallax[slider_full_window]', array( 'default' => 'yes', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[slider_full_window]', array(
    'label' => __( 'Show Full Window', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'Yes', 'accesspress-parallax' ),
        'no' => esc_html__( 'No', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Remove Slider Overlay
$wp_customize->add_setting( 'accesspress_parallax[slider_overlay]', array( 'default' => 'yes', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[slider_overlay]', array(
    'label' => __( 'Remove Slider overlay - Black Dots', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'Yes', 'accesspress-parallax' ),
        'no' => esc_html__( 'No', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Show Slider Dots
$wp_customize->add_setting( 'accesspress_parallax[show_pager]', array( 'default' => 'yes', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[show_pager]', array(
    'label' => __( 'Show Slider Dots', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'Yes', 'accesspress-parallax' ),
        'no' => esc_html__( 'No', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Show Slider Arrows
$wp_customize->add_setting( 'accesspress_parallax[show_controls]', array( 'default' => 'yes', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[show_controls]', array(
    'label' => __( 'Show Slider Arrows', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'Yes', 'accesspress-parallax' ),
        'no' => esc_html__( 'No', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Auto Transition
$wp_customize->add_setting( 'accesspress_parallax[auto_transition]', array( 'default' => 'yes', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[auto_transition]', array(
    'label' => __( 'Auto Transition', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'Yes', 'accesspress-parallax' ),
        'no' => esc_html__( 'No', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Slider Transition
$wp_customize->add_setting( 'accesspress_parallax[slider_transition]', array( 'default' => 'fade', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[slider_transition]', array(
    'label' => __( 'Slider Transition', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'fade' => esc_html__( 'Fade', 'accesspress-parallax' ),
        'horizontal' => esc_html__( 'Horizontal', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );

// Slider Transition Speed
$wp_customize->add_setting( 'accesspress_parallax[slider_speed]', array( 'default' => 1000, 'type' => 'option', 'sanitize_callback' => 'absint' ) );
$wp_customize->add_control(
        'accesspress_parallax[slider_speed]', array(
    'label' => __( 'Slider Transition Speed', 'accesspress-parallax' ),
    'description' => __( 'Transistion time between two slides. 1000 = 1s', 'accesspress-parallax' ),
    'type' => 'number',
    'section' => 'accesspress_parallax_slider_settings',
) );

// Slider Transition Speed
$wp_customize->add_setting( 'accesspress_parallax[slider_pause]', array( 'default' => 5000, 'type' => 'option', 'sanitize_callback' => 'absint' ) );
$wp_customize->add_control(
        'accesspress_parallax[slider_pause]', array(
    'label' => __( 'Slider Pause Duration', 'accesspress-parallax' ),
    'description' => __( 'Pause time between two slides. 1000 = 1s', 'accesspress-parallax' ),
    'type' => 'number',
    'section' => 'accesspress_parallax_slider_settings',
) );

// Show Caption
$wp_customize->add_setting( 'accesspress_parallax[show_caption]', array( 'default' => 'yes', 'type' => 'option', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control(
        'accesspress_parallax[show_caption]', array(
    'label' => __( 'Show Caption', 'accesspress-parallax' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'Yes', 'accesspress-parallax' ),
        'no' => esc_html__( 'No', 'accesspress-parallax' ),
    ),
    'section' => 'accesspress_parallax_slider_settings',
) );
// Link
$wp_customize->add_setting( 'accesspress_parallax[next_link]', array( 'default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_url_raw' ) );
$wp_customize->add_control(
        'accesspress_parallax[next_link]', array(
    'label' => __( 'Enter Link', 'accesspress-parallax' ),
    'description' => __( 'Enter url with section id. for eg: http://demo.accesspressthemes.com/accesspress-parallax/#section-529', 'accesspress-parallax' ),
    'type' => 'text',
    'section' => 'accesspress_parallax_slider_settings',
) );