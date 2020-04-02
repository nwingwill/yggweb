<?php
/**
 * Accesspress Parallax Section
 *
 * @package    Accesspress Themes
 * @subpackage Accesspress Parallax
 * @since      version 2.0.1
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Accesspress_Parallax_Elementor_Section extends Widget_Base {

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'accesspress-parallax-section';
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Parallax Section', 'accesspress-parallax' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-section';
	}

	/**
	 * Retrieve the list of categories the Accesspress_Parallax_Elementor_Section widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'accesspress-parallax-widget-blocks' );
	}

	/**
	 * Register Accesspress_Parallax_Elementor_Section widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_detail',
			array(
				'label' => esc_html__( 'Section Setting', 'accesspress-parallax' ),
			)
		);

		$this->add_control(
			'section_page',
			array(
				'label'       => esc_html__( 'Page:', 'accesspress-parallax' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => accesspress_parallax_page_lists()
			)
		);

        $this->add_control(
            'section_layout',
            [
                'label'     => esc_html__( 'Layout', 'accesspress-parallax' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'layout1',
				'label_block' => true,
                'options'   => [
		            'default_template' => esc_html__( 'Default Template', 'accesspress-parallax' ),
		            'service_template' => esc_html__( 'Service Template', 'accesspress-parallax' ),
		            'team_template' => esc_html__( 'Team Template', 'accesspress-parallax' ),
		            'portfolio_template' => esc_html__( 'Portfolio Template', 'accesspress-parallax' ),
		            'testimonial_template' => esc_html__( 'Testimonial Template', 'accesspress-parallax' ),
		            'blog_template' => esc_html__( 'Blog Template', 'accesspress-parallax' ),
		            'action_template' => esc_html__( 'Action Template', 'accesspress-parallax' ),
		            'googlemap_template' => esc_html__( 'Googlemap Template', 'accesspress-parallax' ),
		            'blank_template' => esc_html__( 'Blank Template', 'accesspress-parallax' ),
                ],
            ]
        );

		$this->add_control(
			'section_category',
			array(
				'label'       => esc_html__( 'Category:', 'accesspress-parallax' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => accesspress_parallax_category_lists(),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'section_layout',
                            'operator' => 'in',
                            'value' => [
					            'service_template',
					            'team_template',
					            'portfolio_template',
					            'testimonial_template',
					            'blog_template',
                            ],
                        ],
                    ],
                ],
			)
		);

		$this->add_control(
			'section_bgimage',
			array(
				'label'       => esc_html__( 'Background Image:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
			)
		);

		$this->add_control(
			'section_overlay',
			array(
				'label'       => esc_html__( 'Overlay:', 'accesspress-parallax' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => true,
				'default'	=> 'overlay0',
				'options' => [
		            'overlay0' => esc_html__( 'No Overlay', 'accesspress-parallax' ),
		            'overlay1' => esc_html__( 'Small Dotted', 'accesspress-parallax' ),
		            'overlay2' => esc_html__( 'Large Dotted', 'accesspress-parallax' ),
		            'overlay3' => esc_html__( 'Light Black', 'accesspress-parallax' ),
		            'overlay4' => esc_html__( 'Black Dotted', 'accesspress-parallax' ),
                ],			)
		);
		$this->end_controls_section();

        //styling tab
        $this->start_controls_section(
            'section_general_style',
            [
                'label' => esc_html__( 'General Styles', 'accesspress-parallax' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        //element title
        $this->add_control(
            'section_title_color',
            [
                'label'     => esc_html__( 'Section Title Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mid-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'section_subtitle_color',
            [
                'label'     => esc_html__( 'Section Description Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mid-content .parallax-content .page-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'section_title_typography',
                'label'     => esc_html__( 'Section Title Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .mid-content h2',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'section_subtitle_typography',
                'label'     => esc_html__( 'Section Description Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .mid-content .parallax-content .page-content',
            ]
        );

        //element title
        $this->add_control(
            'content_title_color',
            [
                'label'     => esc_html__( 'Content Title Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-detail h3, {{WRAPPER}} .portfolio-list h3, {{WRAPPER}} .testimonial-list h3, {{WRAPPER}} .blog-excerpt h3' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'section_layout',
                            'operator' => 'in',
                            'value' => [
					            'service_template',
					            'team_template',
					            'portfolio_template',
					            'testimonial_template',
					            'blog_template',
                            ],
                        ],
                    ],
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_subtitle_color',
            [
                'label'     => esc_html__( 'Content Description Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-detail .service-content, {{WRAPPER}} .testimonial-content, {{WRAPPER}} .blog-excerpt' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'section_layout',
                            'operator' => 'in',
                            'value' => [
					            'service_template',
					            'team_template',
					            'testimonial_template',
					            'blog_template',
                            ],
                        ],
                    ],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_title_typography',
                'label'     => esc_html__( 'Content Title Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .service-detail h3, {{WRAPPER}} .portfolio-list h3, {{WRAPPER}} .testimonial-list h3, {{WRAPPER}} .blog-excerpt h3',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'section_layout',
                            'operator' => 'in',
                            'value' => [
					            'service_template',
					            'team_template',
					            'portfolio_template',
					            'testimonial_template',
					            'blog_template',
                            ],
                        ],
                    ],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_subtitle_typography',
                'label'     => esc_html__( 'Content Description Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .service-detail .service-content, {{WRAPPER}} .testimonial-content, {{WRAPPER}} .blog-excerpt',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'section_layout',
                            'operator' => 'in',
                            'value' => [
					            'service_template',
					            'team_template',
					            'testimonial_template',
					            'blog_template',
                            ],
                        ],
                    ],
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_button_color',
            [
                'label'     => esc_html__( 'Button Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-caption .caption-description a, {{WRAPPER}} .btn, {{WRAPPER}} .call-to-action a' => 'color: {{VALUE}};border-color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'section_layout',
                            'operator' => 'in',
                            'value' => [
					            'blog_template',
					            'action_template',
                            ],
                        ],
                    ],
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_button_color_hover',
            [
                'label'     => esc_html__( 'Button Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-caption .caption-description a:hover, {{WRAPPER}} .btn:hover, {{WRAPPER}} .call-to-action a:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'section_layout',
                            'operator' => 'in',
                            'value' => [
					            'blog_template',
					            'action_template',
                            ],
                        ],
                    ],
                ],
            ]
        );


        $this->end_controls_section();//end for styling tab
	}
	/**
	 * Render Accesspress_Parallax_Elementor_Section widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'accesspress-parallax-element-section', 'class', 'accesspress-parallax-element-section' );
        $page = isset( $settings[ 'section_page' ] )? $settings[ 'section_page' ] : '';
        $image = isset( $settings[ 'section_bgimage' ]['url'] )? $settings[ 'section_bgimage' ]['url'] : '';
        $layout = isset( $settings[ 'section_layout' ] )? $settings[ 'section_layout' ] : '';
        $category = isset( $settings[ 'section_category' ] )? $settings[ 'section_category' ] : '';
        $googlemapclass = $layout == "googlemap_template" ? " google-map" : "";
        $overlay = isset( $settings[ 'section_overlay' ] )? $settings[ 'section_overlay' ] : 'overlay0';
        $style = isset( $settings[ 'section_bgimage' ]['url'] )? $settings[ 'section_bgimage' ]['url'] : '';
        $style_class = 'style="background:url(' . $style . ')  no-repeat fixed top center;background-size:auto"';
        ?>
        <div <?php echo $this->get_render_attribute_string( 'accesspress-parallax-element-section' ); ?>>
            <?php
	        if ( !empty( $page ) ) :
	            ?>
	            <section class="parallax-section clearfix<?php echo esc_attr( $googlemapclass ) . " " . esc_attr( $layout ); ?>" id="<?php echo "section-" . absint( $page ); ?>" <?php echo $style_class;?> >
	                <?php if ( !empty( $image ) && $overlay != "overlay0" ) : ?>
	                    <div class="overlay"></div>
	                <?php endif; ?>

	                <?php if ( $layout != "googlemap_template" ) : ?>
	                    <div class="mid-content">
	                    <?php endif;
	                    $query = new \WP_Query( 'page_id=' . $page );
	                    while ( $query->have_posts() ) : $query->the_post();

	                        if ( $layout != "action_template" && $layout != "blank_template" && $layout != "googlemap_template" ):
	                            ?>
	                            <h2><span><?php the_title(); ?></span></h2>

	                            <div class="parallax-content">
	                                <?php if ( get_the_content() != "" ) : ?>
	                                    <div class="page-content">
	                                        <?php the_content(); ?>
	                                    </div>
	                                <?php endif; ?>
	                            </div> 
	                            <?php
	                        endif;

	                    endwhile;
	                    ?>

	                    <?php
	                    switch ( $layout ) {
	                        case 'default_template':
	                            $template = "layouts/elementor/default";
	                            break;

	                        case 'service_template':
	                            $template = "layouts/elementor/service";
	                            break;

	                        case 'team_template':
	                            $template = "layouts/elementor/team";
	                            break;

	                        case 'portfolio_template':
	                            $template = "layouts/elementor/portfolio";
	                            break;

	                        case 'testimonial_template':
	                            $template = "layouts/elementor/testimonial";
	                            break;

	                        case 'action_template':
	                            $template = "layouts/elementor/action";
	                            break;

	                        case 'blank_template':
	                            $template = "layouts/elementor/blank";
	                            break;

	                        case 'googlemap_template':
	                            $template = "layouts/elementor/googlemap";
	                            break;

	                        case 'blog_template':
	                            $template = "layouts/elementor/blog";
	                            break;

	                        default:
	                            $template = "layouts/elementor/default";
	                            break;
	                    }
	                    include(locate_template( $template . "-section.php" ));
                        if ( $layout != "googlemap_template" ) : ?>
	                    </div>
	                <?php endif; ?>
	            </section>
	            <?php
	        endif;?>
        </div><!-- element main wrapper -->
<?php
	}
}