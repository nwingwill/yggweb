<?php
/**
 * Accesspress Parallax Contact Form
 *
 * @package    Accesspress Themes
 * @subpackage Accesspress Parallax
 * @since      version 2.0.1
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Accesspress_Parallax_Contact_Form extends Widget_Base {
    use \Elementor\Accesspress_Parallax_Functions;

	/**
	 * Retrieve Accesspress_Parallax_Contact_Form widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ap-contact-form';
	}

	/**
	 * Retrieve Accesspress_Parallax_Contact_Form widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Contact Form', 'accesspress-parallax' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Contact_Form widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	/**
	 * Retrieve the list of categories the Accesspress_Parallax_Contact_Form widget belongs to.
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
	 * Register Accesspress_Parallax_Contact_Form widget controls.
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
            'section_layout',
            array(
                'label'       => esc_html__( 'Section Layout:', 'accesspress-parallax' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => true,
                'default'   =>  'layout1',
                'options'      => array(
                    'layout1'   => esc_html__('Layout 1','accesspress-parallax'),
                    'layout2'   => esc_html__('Layout 2','accesspress-parallax'),
                )
            )
        );

        $this->add_control(
            'section_shortcode',
            array(
                'label'       => esc_html__( 'Shortcode:', 'accesspress-parallax' ),
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
            'contact_form_placeholder_color',
            [
                'label'     => esc_html__( 'Form Placeholder Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.contact-form-shortcode' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contact_form_button_color',
            [
                'label'     => esc_html__( 'Form Button Text Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ap-contact-form-wrapper  input[type="submit"]' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contact_form_button_color_hover',
            [
                'label'     => esc_html__( 'Form Button Text Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ap-contact-form-wrapper  input[type="submit"]:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contact_form_button_bgcolor',
            [
                'label'     => esc_html__( 'Form Button Background Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ap-contact-form-wrapper  input[type="submit"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contact_form_button_bgcolor_hover',
            [
                'label'     => esc_html__( 'Form Button Background Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ap-contact-form-wrapper  input[type="submit"]:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'contact_form_placeholder_typography',
                'label'     => esc_html__( 'Form Placeholder Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .ap-contact-form-wrapper input, {{WRAPPER}} .ap-contact-form-wrapper textarea',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'contact_form_button_typography',
                'label'     => esc_html__( 'Form Button Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .ap-contact-form-wrapper  input[type="submit"]',
            ]
        );

        $this->end_controls_section();//end for styling tab
	}
	/**
	 * Render Accesspress_Parallax_Contact_Form widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();
        $layout = isset( $settings[ 'section_layout' ] )? $settings[ 'section_layout' ] : 'layout1';
        $this->add_render_attribute( 'ap-contact-form', 'class', 'ap-contact-form-section ' );
        $shortcode = isset( $settings[ 'section_shortcode' ] )? $settings[ 'section_shortcode' ] : '';
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-contact-form' ); ?>>
            <div class=" ap-contact-form-wrapper <?php echo esc_attr($layout);?>">
                <?php echo do_shortcode($shortcode);?>
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}