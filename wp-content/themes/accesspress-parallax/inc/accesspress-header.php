<?php

/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package accesspress_parallax
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses accesspress_parallax_header_style()
 */
function accesspress_parallax_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'accesspress_parallax_custom_header_args', array(
        'default-image' => '',
        'width' => 200,
        'height' => 90,
        'flex-width' => true,
        'flex-height' => true,
        'wp-head-callback' => false,
    ) ) );
}

add_action( 'after_setup_theme', 'accesspress_parallax_custom_header_setup' );
