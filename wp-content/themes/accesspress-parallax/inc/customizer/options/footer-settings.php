<?php
/** Footer Settings * */
$wp_customize->add_section( 'accesspress_parallax_custom_footer', array(
    'title' => esc_html__( 'Footer Settings', 'accesspress-parallax' ),
    'priority' => 5
) );

$wp_customize->add_setting( 'accesspress_parallax[custom_footer_page]', array( 'default' => 0, 'type' => 'option', 'sanitize_callback' => 'accesspress_parallax_sanitize_integer' ) );
$wp_customize->add_control(
        'accesspress_parallax[custom_footer_page]', array(
    'label' => esc_html__( 'Custom Footer', 'accesspress-parallax' ),
    'description' => esc_html__('Select Page made in Elementor to replace default footer.','accesspress-parallax'),
    'type' => 'dropdown-pages',
    'section' => 'accesspress_parallax_custom_footer',
) );