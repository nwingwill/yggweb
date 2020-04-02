<?php
// Load the JS and CSS.


add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'wptrt-customize-section-button',
        get_theme_file_uri( '/inc/customizer/pro/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'wptrt-customize-section-button',
        get_theme_file_uri( '/inc/customizer/pro/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );


defined( 'Accesspress_Parallax_THEME_CDIR' ) or define( 'Accesspress_Parallax_THEME_CDIR', get_template_directory() . '/inc/customizer/' ); //plugin version
defined( 'Accesspress_Parallax_THEME_CURI' ) or define( 'Accesspress_Parallax_THEME_CURI', get_template_directory_uri() . '/inc/customizer/' ); //plugin version
if ( !class_exists( 'Accesspress_Parallax_Customizer_Class' ) ) {

    class Accesspress_Parallax_Customizer_Class {

        /** AccessPress Parallax Customizer Constructor * */
        public function __construct() {

            /** Custom Customizer Scripts and Styles * */
            add_action( 'customize_controls_enqueue_scripts', array( $this, 'custom_customizer_scripts' ) );

            /** Extra Controls * */
            add_action( 'customize_register', array( $this, 'extra_controls' ) );

            /** Helper Files * */
            add_action( 'after_setup_theme', array( $this, 'helper_files' ) );

            /** Customizer Options * */
            add_action( 'customize_register', array( $this, 'all_customizer_options' ) );
        }

        /**
         * Enqueue script for custom customize control.
         */
        public function custom_customizer_scripts() {

            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'accesspress-parallax-repeater-style', Accesspress_Parallax_THEME_CURI . 'assets/css/repeater-style.css' );
            wp_enqueue_script( 'accesspress-parallax-repeater-script', Accesspress_Parallax_THEME_CURI . 'assets/js/repeater-script.js', array( 'jquery', 'jquery-ui-sortable', 'customize-controls', 'wp-color-picker' ), true );
        }

        /**
         * Customizer Helper Files
         */
        public function helper_files() {

            /** Include Sanitize * */
            require_once Accesspress_Parallax_THEME_CDIR . 'includes/sanitize.php';

            /** Include Helper Files * */
            require_once Accesspress_Parallax_THEME_CDIR . 'includes/helpers.php';
        }

        /**
         * Customizer Extra Controls
         */
        public static function extra_controls( $wp_customize ) {

            $cdir = Accesspress_Parallax_THEME_CDIR;

            /** Control Types * */
            require_once $cdir . 'controls/class-repeater.php'; // Repeater Control
        }

        /**
         * Customizer Options
         */
        public function all_customizer_options( $wp_customize ) {

            include get_theme_file_path( '/inc/customizer/pro/src/Button.php' );


            $dir = Accesspress_Parallax_THEME_CDIR;

            $files = array(
                'header-settings',
                'footer-settings',
                'general-settings',
                'post-settings',
                'slider-settings',
                'social-settings',
                'parallax-settings',
            );

            foreach ( $files as $file ) {
                if ( file_exists( $dir . 'options/' . $file . '.php' ) ) {
                    require_once $dir . 'options/' . $file . '.php';
                }
            }
        }

    }

    new Accesspress_Parallax_Customizer_Class();
}

use WPTRT\Customize\Section\Button;

// Register the "button" section.

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Button::class );

    $manager->add_section(
        new Button( $manager, 'themeslug_pro', [
            'title'       => __( 'AccessPress Parallax', 'accesspress-parallax' ),
            'button_text' => __( 'Go Pro',        'accesspress-parallax' ),
            'button_url'  => 'https://accesspressthemes.com/wordpress-themes/accesspress-parallax-pro/'
        ] )
    );

} );