<?php

/** Helper Functions * */
/** Category Lists * */
if ( !function_exists( 'accesspress_parallax_category_lists' ) ) {

    function accesspress_parallax_category_lists() {

        $cat_list = array();

        $cat_list[ 0 ] = esc_html__( 'Select a Category', 'accesspress-parallax' );

        $categories = get_categories( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
                ) );

        if ( !empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $cat_list[ $category->term_id ] = $category->name;
            }
        }

        return $cat_list;
    }

}

/** Social Icons * */
if ( !function_exists( 'accesspress_parallax_social_icon_lists' ) ) {

    function accesspress_parallax_social_icon_lists() {
        $social_icon_lists = array(
            'facebook' => esc_html( 'Facebook', 'accesspress-parallax' ),
            'twitter' => esc_html( 'Twitter', 'accesspress-parallax' ),
            'google_plus' => esc_html( 'Google Plus', 'accesspress-parallax' ),
            'youtube' => esc_html( 'Youtube', 'accesspress-parallax' ),
            'pinterest' => esc_html( 'Pinterest', 'accesspress-parallax' ),
            'linkedin' => esc_html( 'Linkedin', 'accesspress-parallax' ),
            'flickr' => esc_html( 'Flickr', 'accesspress-parallax' ),
            'vimeo' => esc_html( 'Vimeo', 'accesspress-parallax' ),
            'instagram' => esc_html( 'Instagram', 'accesspress-parallax' ),
            'skype' => esc_html( 'Skype', 'accesspress-parallax' ),
        );

        return $social_icon_lists;
    }

}

/** Layout Lists * */
if ( !function_exists( 'accesspress_parallax_plx_section_lists' ) ) {

    function accesspress_parallax_plx_section_lists() {

        $plx_sections = array(
            'default_template' => esc_html__( 'Default Template', 'accesspress-parallax' ),
            'service_template' => esc_html__( 'Service Template', 'accesspress-parallax' ),
            'team_template' => esc_html__( 'Team Template', 'accesspress-parallax' ),
            'portfolio_template' => esc_html__( 'Portfolio Template', 'accesspress-parallax' ),
            'testimonial_template' => esc_html__( 'Testimonial Template', 'accesspress-parallax' ),
            'blog_template' => esc_html__( 'Blog Template', 'accesspress-parallax' ),
            'action_template' => esc_html__( 'Action Template', 'accesspress-parallax' ),
            'googlemap_template' => esc_html__( 'Googlemap Template', 'accesspress-parallax' ),
            'blank_template' => esc_html__( 'Blank Template', 'accesspress-parallax' ),
        );

        return $plx_sections;
    }

}

/** Background Repeats * */
if ( !function_exists( 'accesspress_parallax_bg_repeat_lists' ) ) {

    function accesspress_parallax_bg_repeat_lists() {

        $bg_repeat = array(
            'no-repeat' => esc_html__( 'No Repeat', 'accesspress-parallax' ),
            'repeat-x' => esc_html__( 'Repeat Horizontally', 'accesspress-parallax' ),
            'repeat-y' => esc_html__( 'Repeat Vertically', 'accesspress-parallax' ),
            'repeat' => esc_html__( 'Repeat All', 'accesspress-parallax' ),
        );

        return $bg_repeat;
    }

}

/** Background Attachments * */
if ( !function_exists( 'accesspress_parallax_bg_attch_lists' ) ) {

    function accesspress_parallax_bg_attch_lists() {

        $bg_attchs = array(
            'scroll' => esc_html__( 'Scroll Normally', 'accesspress-parallax' ),
            'fixed' => esc_html__( 'Fixed in Place', 'accesspress-parallax' ),
        );

        return $bg_attchs;
    }

}

/** Background Repeats * */
if ( !function_exists( 'accesspress_parallax_bg_size_lists' ) ) {

    function accesspress_parallax_bg_size_lists() {

        $bg_size = array(
            'auto' => esc_html__( 'Auto', 'accesspress-parallax' ),
            'cover' => esc_html__( 'Cover', 'accesspress-parallax' ),
            'contain' => esc_html__( 'Contain', 'accesspress-parallax' ),
        );

        return $bg_size;
    }

}

/** Background Repeats * */
if ( !function_exists( 'accesspress_parallax_bg_position_lists' ) ) {

    function accesspress_parallax_bg_position_lists() {

        $bg_pos = array(
            'top left' => esc_html__( 'Top Left', 'accesspress-parallax' ),
            'top center' => esc_html__( 'Top Center', 'accesspress-parallax' ),
            'top right' => esc_html__( 'Top Right', 'accesspress-parallax' ),
            'center left' => esc_html__( 'Middle Left', 'accesspress-parallax' ),
            'center center' => esc_html__( 'Middle Center', 'accesspress-parallax' ),
            'center right' => esc_html__( 'Middle Right', 'accesspress-parallax' ),
            'bottom left' => esc_html__( 'Bottom Left', 'accesspress-parallax' ),
            'bottom center' => esc_html__( 'Bottom Center', 'accesspress-parallax' ),
            'bottom right' => esc_html__( 'Bottom Right', 'accesspress-parallax' ),
        );

        return $bg_pos;
    }

}

/** Background Repeats * */
if ( !function_exists( 'accesspress_parallax_bg_overlay_styles' ) ) {

    function accesspress_parallax_bg_overlay_styles() {

        $overlay_styles = array(
            'overlay0' => esc_html__( 'No Overlay', 'accesspress-parallax' ),
            'overlay1' => esc_html__( 'Small Dotted', 'accesspress-parallax' ),
            'overlay2' => esc_html__( 'Large Dotted', 'accesspress-parallax' ),
            'overlay3' => esc_html__( 'Light Black', 'accesspress-parallax' ),
            'overlay4' => esc_html__( 'Black Dotted', 'accesspress-parallax' ),
        );

        return $overlay_styles;
    }

}