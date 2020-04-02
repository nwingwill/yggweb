<?php

	define( 'AP_ELEMENTOR_WIDGETS_DIR', get_template_directory() . '/inc/elementor/widgets' );
	define( 'AP_ELEMENTOR_URL', get_template_directory() . '/inc/elementor' );
	require_once AP_ELEMENTOR_URL.'/queries.php';
	require_once AP_ELEMENTOR_URL.'/elementor-helper.php';

	/**
	 * Implements the compatibility for the Elementor plugin in Accesspress Parallax theme.
	 *
	 * @package    Accesspress Themes
	 * @subpackage Accesspress Parallax
	 * @since      version 2.0.1
	 */

	if ( ! function_exists( 'accesspress_parallax_elementor_active_page_check' ) ) :

		/**
		 * Check whether Elementor plugin is activated and is active on current page or not
		 *
		 * @return bool
		 *
		 * @since version 2.0.1
		 */
		function accesspress_parallax_elementor_active_page_check() {
			global $post;

			if ( defined( 'ELEMENTOR_VERSION' ) && get_post_meta( $post->ID, '_elementor_edit_mode', true ) ) {
				return true;
			}

			return false;
		}

	endif;

	/**
	 * Load the Accesspress Parallax Elementor widgets file and registers it
	 */
	if ( ! function_exists( 'accesspress_parallax_elementor_widgets_registered' ) ) :

		/**
		 * Load and register the required Elementor widgets file
		 *
		 * @param $widgets_manager
		 *
		 * @since version 2.0.1
		 */
		function accesspress_parallax_elementor_widgets_registered( $widgets_manager ) {

			// Require the files
			require AP_ELEMENTOR_WIDGETS_DIR . '/parallax-section.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/blog-section.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/portfolio.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/pricing.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/team.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/contact-form.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/progress.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/testimonial.php';
			require AP_ELEMENTOR_WIDGETS_DIR . '/testimonial-slider.php';
			// Register the widgets
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Elementor_Section() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Blog() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Portfolio() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Pricing() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Team() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Contact_Form() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Progress() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Testimonial() );
			$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Testimonial_Slider() );

			if ( class_exists( 'WooCommerce' ) ) {
				require AP_ELEMENTOR_WIDGETS_DIR . '/shop.php';
				$widgets_manager->register_widget_type( new \Elementor\Accesspress_Parallax_Shop_Slider() );
			}
		}

	endif;

	add_action( 'elementor/widgets/widgets_registered', 'accesspress_parallax_elementor_widgets_registered' );

	if ( ! function_exists( 'accesspress_parallax_elementor_category' ) ) :

		/**
		 * Add the Elementor category for use in Accesspress Parallax widgets
		 *
		 * @since version 2.0.1
		 */
		function accesspress_parallax_elementor_category() {

			// Register widget block category for Elementor section
			\Elementor\Plugin::instance()->elements_manager->add_category( 'accesspress-parallax-widget-blocks', array(
				'title' => esc_html__( 'Accesspress Parallax Blocks', 'accesspress-parallax' ),
			), 1 );
		}

	endif;

	add_action( 'elementor/init', 'accesspress_parallax_elementor_category' );



	if ( ! function_exists( 'accesspress_parallax_elementor_enqueue_scripts' ) ) :

		function accesspress_parallax_elementor_enqueue_scripts() {
			// Enqueue the main Elementor CSS file for use with Elementor
			wp_enqueue_script( 'accesspress-parallax-elementor', get_template_directory_uri() . '/inc/elementor/assets/js/ap-elementor.js'  );
		}

	endif;

	add_action( 'elementor/frontend/before_enqueue_scripts', 'accesspress_parallax_elementor_enqueue_scripts' );
