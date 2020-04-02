<?php

/** Parallax Section Settings * */
$wp_customize->add_section( 'accesspress_parallax_plx_settings', array(
    'title' => __( 'FrontPage Parallax Sections', 'accesspress-parallax' ),
    'priority' => 15
) );

// Parallax Section
$wp_customize->add_setting( 'accesspress_parallax_section', array(
    'default' => json_encode(
            array(
                array(
                    'page' => '',
                    'font_color' => '#000000',
                    'color' => '',
                    'layout' => '',
                    'category' => '',
                    'image' => '',
                    'repeat' => '',
                    'position' => '',
                    'attachment' => '',
                    'size' => '',
                    'overlay' => '',
                ),
            )
    ),
    'type' => 'option',
    'sanitize_callback' => 'accesspress_parallax_sanitize_repeater',
) );

$wp_customize->add_control( new Accesspress_Parallax_Repeater_Control( $wp_customize, 'accesspress_parallax_section', array(
    'label' => esc_html__( 'Parallax Section', 'accesspress-parallax' ),
    'section' => 'accesspress_parallax_plx_settings',
    'box_label' => esc_html__( 'Section Settings', 'accesspress-parallax' ),
    'box_add_control' => esc_html__( 'Add Section', 'accesspress-parallax' ),
        ), array(
    'page' => array(
        'type' => 'page',
        'label' => esc_html__( 'Page', 'accesspress-parallax' ),
        'default' => 0,
        'description' => esc_html__( 'Do not select same page for multiple section.', 'accesspress-parallax' ),
    ),
    'layout' => array(
        'type' => 'select',
        'label' => esc_html__( 'Layout', 'accesspress-parallax' ),
        'default' => 'default_template',
        'options' => accesspress_parallax_plx_section_lists(),
        'class' => 'accesspress_parallax_section_layout'
    ),
    'category' => array(
        'type' => 'category',
        'label' => esc_html__( 'Category', 'accesspress-parallax' ),
        'default' => 0,
        'class' => 'accesspress_parallax_section_category',
        'description' => esc_html__( 'The post assigned to this category will display as listing.', 'accesspress-parallax' ),
    ),
    'font_color' => array(
        'type' => 'colorpicker',
        'label' => esc_html__( 'Font Color', 'accesspress-parallax' ),
        'default' => '#eeeeee',
    ),
    'color' => array(
        'type' => 'colorpicker',
        'label' => esc_html__( 'Background Color', 'accesspress-parallax' ),
        'default' => '',
    ),
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__( 'Background Image', 'accesspress-parallax' ),
        'default' => '',
    ),
    'repeat' => array(
        'type' => 'select',
        'label' => esc_html__( 'Repeat', 'accesspress-parallax' ),
        'default' => 'no-repeat',
        'options' => accesspress_parallax_bg_repeat_lists(),
        'class' => 'background-params col-2'
    ),
    'position' => array(
        'type' => 'select',
        'label' => esc_html__( 'Position', 'accesspress-parallax' ),
        'default' => 'top left',
        'options' => accesspress_parallax_bg_position_lists(),
        'class' => 'background-params col-2'
    ),
    'attachment' => array(
        'type' => 'select',
        'label' => esc_html__( 'Attachment', 'accesspress-parallax' ),
        'default' => 'scroll',
        'options' => accesspress_parallax_bg_attch_lists(),
        'class' => 'background-params col-2'
    ),
    'size' => array(
        'type' => 'select',
        'label' => esc_html__( 'Size', 'accesspress-parallax' ),
        'default' => 'auto',
        'options' => accesspress_parallax_bg_size_lists(),
        'class' => 'background-params col-2'
    ),
    'overlay' => array(
        'type' => 'select',
        'label' => esc_html__( 'Overlay', 'accesspress-parallax' ),
        'default' => 'overlay0',
        'options' => accesspress_parallax_bg_overlay_styles(),
        'class' => 'background-params'
    )
        )
        )
);
