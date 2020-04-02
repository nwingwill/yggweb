<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/welcome/welcome');

	/** Plugins **/
	$plugins = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(
				'elementor' => array(
					'slug'      => 'elementor',
					'filename' 	=> 'elementor.php',
					'class' 	=> 'Elementor\Plugin',
				),
				'contact-form-7' => array(
					'slug' => 'contact-form-7',
					'filename' => 'wp-contact-form-7.php',
					'class' => 'WPCF7'
				),
				'woocommerce' => array(
					'slug'      => 'woocommerce',
					'filename' 	=> 'woocommerce.php',
					'class' 	=> 'WooCommerce',
				)
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'accesspress-parallax'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'accesspress-parallax'),
			),
		

		),

		// *** Recommended Plugins
		'recommended_plugins' => array(
			// Free Plugins
			'free_plugins' => array(
				
				'accesspress-social-share' => array(
					'slug'      => 'accesspress-social-share',
					'filename' 	=> 'accesspress-social-share.php',
					'class' 	=> 'APSS_Class',
					'info' 		=> esc_html__('Social booster for your site! A FREE plugin with premium features.', 'accesspress-parallax'),
				),

				'accesspress-social-icons' => array(
					'slug'      => 'accesspress-social-icons',
					'filename' 	=> 'accesspress-social-icons.php',
					'class' 	=> 'APS_Class',
					'info' 		=> esc_html__('Connect your website visitors to your social community in an easy way! Link up your social media profiles via great looking social buttons.', 'accesspress-parallax'),
				),

				'accesspress-twitter-feed' => array(
					'slug'      => 'accesspress-twitter-feed',
					'filename' 	=> 'accesspress-twitter-feed.php',
					'class' 	=> 'APTF_Class',
					'info' 		=> esc_html__('Showcase your Tweets (Twitter Feeds) right on the site.', 'accesspress-parallax'),
				),

				'contact-form-7' => array(
				'slug'      => 'contact-form-7',
				'filename' 	=> 'contact-form-7.php',
				'class' 	=> 'WPCF7',
				'info' => esc_html__('Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.', 'accesspress-parallax'),

			),

			),

			// Pro Plugins
			'pro_plugins' => array(

				'woo-product-grid-list-design' 	=> array(
					'slug' 		=> 'woo-product-grid-list-design',
					'name' 		=> esc_html__('WOO Product Grid/List Design- Responsive Products Showcase Extension for Woocommerce', 'accesspress-parallax'),
					'version' 	=> esc_html__( '1.0.3', 'accesspress-parallax' ),
					'author' 	=> 'AccessPress Themes',
					'filename' 	=> 'woo-product-grid-list-design.php',
					'host_type' => 'remote', // Use either bundled, remote, wordpress
					'link' 		=> 'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Fwoo-product-gridlist-design-responsive-products-showcase-extension-for-woocommerce%2F23167226',
					'screenshot' => 'https://accesspressthemes.com/plugin-repo/woo-product-grid/woo-product-grid.jpg',
					'class' 	=> 'WOPGLD_Class',
					'info' 		=> esc_html__('Design your WooCommerce shop like never before! A complete package for your Woo shop designer.', 'accesspress-parallax'),
				),

				'woo-badge-designer' => array(
					'slug' 			=> 'woo-badge-designer',
					'name'         	=> esc_html__('Woo Badge Designer - WooCommerce Product Badge Designer WordPress Plugin', 'accesspress-parallax'),
					'version' 		=> esc_html__('1.0.1', 'accesspress-parallax'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'woo-badge-designer.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'link' 			=> 'https://1.envato.market/LyK3o',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/woo-badge-designer/woo-badge-designer.jpg',
					'class' 		=> 'WOPGLD_Class',
					'info' 			=> esc_html__('Add some attractive badges on your product listing and single page and increase your sales upto 55%.', 'accesspress-parallax'),
				),

				'wp-admin-white-label-login' => array(
					'slug' 			=> 'wp-admin-white-label-login',
					'name'      	=> esc_html__('WP Admin White Label Login - WordPress Plugin For Advanced Customizable Login page', 'accesspress-parallax'),
					'version' 		=> esc_html__('1.3.5', 'accesspress-parallax'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'wp-admin-white-label-login.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'link' 		=> 'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Fwp-admin-white-label-login-wordpress-plugin-for-advanced-customizable-login-page%2F23127723',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/wp-admin-white-label-login/wp-admin-white-label-login.jpg',
					'class' 		=> 'WP_Admin_White_Label_Login',
					'info' 		=> esc_html__('Make your default wp-admin screen look like a non WP one! Choose from some great ready to use template designs and many features to boost your WordPress backend.', 'accesspress-parallax'),
				),

				'easy-side-tab-pro' => array(
					'slug' 			=> 'easy-side-tab-pro',
					'name'      	=> esc_html__('Easy Side Tab Pro - Responsive Floating Tab Plugin For Wordpress', 'accesspress-parallax'),
					'version' 		=> esc_html__('1.0.6', 'accesspress-parallax'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'easy-side-tab-pro.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'link' 			=> 'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Feasy-side-tab-pro-responsive-floating-tab-plugin-for-wordpress%2F22296723',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/easy-side-tab-pro/easy-side-tab.jpg',
					'class' 		=> 'ESTP_Class',
					'info' 		=> esc_html__('Place some great designed floating tabs on your site for quick links. Increase accessibility of your site.', 'accesspress-parallax'),
				),

				'everest-timeline' => array(
					'slug' 			=> 'everest-timeline',
					'name'         	=> esc_html__('Everest Timeline - Responsive WordPress Timeline Plugin', 'accesspress-parallax'),
					'version' 		=> esc_html__('2.0.2', 'accesspress-parallax'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'everest-timeline.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/everest-timeline/everest-timeline.jpg',
					'class' 		=> 'APMM_Class_Pro',
					'link'			=>'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Feverest-timeline-responsive-wordpress-timeline-plugin%2F20922265',
					'info' 		=> esc_html__('A perfect timeline maker! If you\'re planning to make one go for it!', 'accesspress-parallax'),
				),
			)
		),
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Accesspress Parallax', 'accesspress-parallax' ),
		'theme_short_description' => esc_html__( 'AccessPress Parallax - is a beautiful WordPress theme with Parallax design. Parallax design has become popular and is widely implemented these days. This is probably the most beautiful, feature rich and complete free WordPress parallax theme with features like: fully responsive, advance theme option panel, featured slider, advance post settings, services/team/blog/portfolio/testimonial layout, Google map integration, custom logo/fav icon, call to action, CSS animation, SEO friendly, translation ready, RTL support, custom CSS/JS and more! More over the theme is fully translation ready, WooCommerce Compatible, bbPress Compatible and fully support multilanguage via POLYLANG plugin. Demo: https://accesspressthemes.com/theme-demos/?theme=accesspress-parallax Support forum: https://accesspressthemes.com/support/ Pro version: https://accesspressthemes.com/wordpress-themes/accesspress-parallax-pro/ ', 'accesspress-parallax' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'accesspress-parallax'),
		'deactivate' 			=> esc_html__('Deactivate', 'accesspress-parallax'),
		'activate' 				=> esc_html__('Activate', 'accesspress-parallax'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'accesspress-parallax'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'accesspress-parallax'),
		'doc_link'			=> 'https://accesspressthemes.com/theme-instruction-accesspress-parallax/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'accesspress-parallax' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'accesspress-parallax'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'accesspress-parallax' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-parallax' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-parallax' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'accesspress-parallax'),
		'installed_btn' 	=> esc_html__('Activated', 'accesspress-parallax'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'accesspress-parallax'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'accesspress-parallax'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'accesspress-parallax'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'accesspress-parallax' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'accesspress-parallax' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'accesspress-parallax' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-parallax' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-parallax' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Accesspress_Parallax_Welcome( $plugins, $strings );