<?php

/** Social Settings * */
$wp_customize->add_section( 'accesspress_parallax_social_settings', array(
    'title' => __( 'Social Icons', 'accesspress-parallax' ),
    'priority' => 25
) );

// Enable Social Icons
$wp_customize->add_setting( 'accesspress_parallax[show_social]', array( 'default' => 1, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_checkbox' ) );
$wp_customize->add_control(
        'accesspress_parallax[show_social]', array(
    'label' => __( 'Show Social Icon', 'accesspress-parallax' ),
    'type' => 'checkbox',
    'section' => 'accesspress_parallax_social_settings',
) );

$accesspress_parallax_social_icons = accesspress_parallax_social_icon_lists();

foreach ( $accesspress_parallax_social_icons as $id => $label ) {

    $wp_customize->add_setting( 'accesspress_parallax[' . $id . ']', array( 'default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_url' ) );
    $wp_customize->add_control(
            'accesspress_parallax[' . $id . ']', array(
        'label' => $label,
        'type' => 'text',
        'section' => 'accesspress_parallax_social_settings',
    ) );
}