<?php

/**
 * Customizer Sanitization Functions
 */
// Sanitize Checkbox
function accesspress_parallax_sanitize_checkbox( $input, $setting ) {

    return ( ( isset( $input ) && true == $input ) ? true : false );
}
// Sanitize integer
function accesspress_parallax_sanitize_integer( $input, $setting ) {

    return intval( $input );
}
// Sanitize Repeater Fields
function accesspress_parallax_sanitize_repeater( $input ) {
    $input_decoded = json_decode( $input, true );
    $allowed_html = array(
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'a' => array(
            'href' => array(),
            'class' => array(),
            'id' => array(),
            'target' => array()
        ),
        'button' => array(
            'class' => array(),
            'id' => array()
        )
    );

    if ( !empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxes => $box ) {
            foreach ( $box as $key => $value ) {
                $input_decoded[ $boxes ][ $key ] = sanitize_text_field( $value );
            }
        }
        return json_encode( $input_decoded );
    }
    return $input;
}
