<?php
/**
 * Accesspress Parallax Pricing
 *
 * @package    Accesspress Themes
 * @subpackage Accesspress Parallax
 * @since      version 2.0.1
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Accesspress_Parallax_Pricing extends Widget_Base {
    use \Elementor\Accesspress_Parallax_Functions;

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ap-pricing';
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Pricing', 'accesspress-parallax' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
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
            'section_description',
            array(
                'label'       => esc_html__( 'Description:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
            )
        );
        $this->add_control(
            'section_featured',
            array(
                'label'       => esc_html__( 'Featured Text:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            )
        );
        $this->add_control(
            'section_currency',
            array(
                'label'       => esc_html__( 'Currency:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            )
        );
        $this->add_control(
            'section_price',
            array(
                'label'       => esc_html__( 'Price:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::NUMBER,
                'label_block' => true,
                'step'  => 50,
                'min'   => 0,
            )
        );

        $this->add_control(
            'section_button_text',
            array(
                'label'       => esc_html__( 'Button Text:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            )
        );

        $this->add_control(
            'section_button_link',
            array(
                'label'       => esc_html__( 'Button Link:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::TEXT,
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
                    '{{WRAPPER}} h4.pricing-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_description_color',
            [
                'label'     => esc_html__( 'Description Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_currency_color',
            [
                'label'     => esc_html__( 'Currency Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-currency' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_price_color',
            [
                'label'     => esc_html__( 'Price Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_featured_bgcolor',
            [
                'label'     => esc_html__( 'Featured Background Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-featured' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_featured_color',
            [
                'label'     => esc_html__( 'Featured Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-featured' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_title_typography',
                'label'     => esc_html__( 'Title Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} h4.pricing-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_excerpt_typography',
                'label'     => esc_html__( 'Description Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .pricing-description',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_currency_typography',
                'label'     => esc_html__( 'Currency Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .pricing-currency',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_price_typography',
                'label'     => esc_html__( 'Price Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .pricing-price',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_featured_typography',
                'label'     => esc_html__( 'Featured Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .pricing-featured',
            ]
        );

        //element title
        $this->add_control(
            'content_button_color',
            [
                'label'     => esc_html__( 'Button Background Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_button_color_hover',
            [
                'label'     => esc_html__( 'Button Background Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-button:hover' => 'background-color: {{VALUE}};',
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
        $layout = isset( $settings[ 'section_layout' ] )? $settings[ 'section_layout' ] : 'layout1';
        $this->add_render_attribute( 'ap-pricing', 'class', 'ap-pricing-section ' );
        $title = isset( $settings[ 'section_title' ] )? $settings[ 'section_title' ] : '';
        $description = isset( $settings[ 'section_description' ] )? $settings[ 'section_description' ] : '';
        $featured = isset( $settings[ 'section_featured' ] )? $settings[ 'section_featured' ] : '';
        $currency = isset( $settings[ 'section_currency' ] )? $settings[ 'section_currency' ] : '';
        $price = isset( $settings[ 'section_price' ] )? $settings[ 'section_price' ] : '';
        $button = isset( $settings[ 'section_button_text' ] )? $settings[ 'section_button_text' ] : '';
        $button_link = isset( $settings[ 'section_button_link' ] )? $settings[ 'section_button_link' ] : '';
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-pricing' ); ?>>
            <div class=" ap-pricing-wrapper <?php echo esc_attr($layout);?>">
                <div class="pricing-post-wrap">
                    <?php if( !empty($featured)): ?>
                        <span class="pricing-featured"><?php echo esc_html($featured); ?></span>
                    <?php endif;?>
                    <h4 class="pricing-title">
                        <?php echo esc_html($title); ?>
                    </h4>
                    <div class="pricing-price-wrap">
                        <span class="pricing-currency"><?php echo esc_html($currency); ?></span>
                        <span class="pricing-price"><?php echo esc_html($price); ?></span>
                    </div>
                    <div class="pricing-description">
                        <?php echo esc_html($description); ?>
                    </div>
                    <a class="pricing-button" href="<?php echo esc_url($button_link);?>"><?php echo esc_html($button);?></a>
                </div>                
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}