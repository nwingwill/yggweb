<?php
/**
 * Accesspress Parallax Testimonial
 *
 * @package    Accesspress Themes
 * @subpackage Accesspress Parallax
 * @since      version 2.0.1
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Accesspress_Parallax_Testimonial extends Widget_Base {
    use \Elementor\Accesspress_Parallax_Functions;

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ap-testimonial';
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Testimonial', 'accesspress-parallax' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial';
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
            'section_title',
            array(
                'label'       => esc_html__( 'Title:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            )
        );

        $this->add_control(
            'section_designation',
            array(
                'label'       => esc_html__( 'Designation:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'       => esc_html__( 'Description:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
            )
        );

        $this->add_control(
            'testimonial_image',
            array(
                'label'       => esc_html__( 'Image:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
            )
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

        $this->add_control(
            'content_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.testimonial-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_title_color_hover',
            [
                'label'     => esc_html__( 'Title Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container:hover .ap-testimonial-section h4.testimonial-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_description_color',
            [
                'label'     => esc_html__( 'Description Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_description_color_hover',
            [
                'label'     => esc_html__( 'Description Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container:hover .ap-testimonial-section .testimonial-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_designation_color',
            [
                'label'     => esc_html__( 'Designation Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-designation' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_designation_color_hover',
            [
                'label'     => esc_html__( 'Designation Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container:hover .ap-testimonial-section .testimonial-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'testimonial_quote_color',
            [
                'label'     => esc_html__( 'Quote Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-description:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'testimonial_quote_color_hover',
            [
                'label'     => esc_html__( 'Quote Color:hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container:hover .ap-testimonial-section .testimonial-description:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'testimonial_title_typography',
                'label'     => esc_html__( 'Title Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} h4.testimonial-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'testimonial_description_typography',
                'label'     => esc_html__( 'Description Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .testimonial-description',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'testimonial_designation_typography',
                'label'     => esc_html__( 'Designation Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .testimonial-designation',
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
        $this->add_render_attribute( 'ap-testimonial', 'class', 'ap-testimonial-section ' );
        $testimonial_image = isset( $settings[ 'testimonial_image' ] )? $settings[ 'testimonial_image' ] : '';
        //$layout = isset( $settings[ 'section_layout' ] )? $settings[ 'section_layout' ] : '';
        $title = isset( $settings[ 'section_title' ] )? $settings[ 'section_title' ] : '';
        $description = isset( $settings[ 'section_description' ] )? $settings[ 'section_description' ] : '';
        $designation = isset( $settings[ 'section_designation' ] )? $settings[ 'section_designation' ] : '';
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-testimonial' ); ?>>
            <div class="ap-testimonial-wrapper">
                <div class="testimonial-post-wrap">
                    <div class="testimonial-description">
                        <?php echo esc_html($description); ?>
                    </div>
                    <div class="testimonial-title-wrap">                        
                        <?php  if( !empty($testimonial_image['url'])): ?>
                            <img src="<?php echo esc_url($testimonial_image['url']);?>" alt="<?php echo esc_html($title);?>" />
                        <?php endif;
                        if( !empty($title)): ?>
                            <h4 class="testimonial-title">
                                <?php echo esc_html($title); ?>
                            </h4>
                        <?php endif;
                        if( !empty($designation)): ?>
                            <h6 class="testimonial-designation">
                                <?php echo esc_html($designation); ?>
                            </h6>
                        <?php endif;?>
                    </div>
                </div>                
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}