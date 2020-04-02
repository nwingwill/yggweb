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

class Accesspress_Parallax_Testimonial_Slider extends Widget_Base {
    use \Elementor\Accesspress_Parallax_Functions;
	/**
	 * Retrieve Accesspress_Parallax_Testimonial_Slider widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ap-testimonial-slider';
	}

	/**
	 * Retrieve Accesspress_Parallax_Testimonial_Slider widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Testimonial Slider', 'accesspress-parallax' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Testimonial_Slider widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-slider';
	}

	/**
	 * Retrieve the list of categories the Accesspress_Parallax_Testimonial_Slider widget belongs to.
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
	 * Register Accesspress_Parallax_Testimonial_Slider widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

        $this->query_controls();

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
            'testimonial_title_color',
            [
                'label'     => esc_html__( 'Content Title Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.testimonial-post-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'testimonial_description_color',
            [
                'label'     => esc_html__( 'Content Description Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'testimonial_title_typography',
                'label'     => esc_html__( 'Content Title Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} h4.testimonial-post-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'testimonial_content_typography',
                'label'     => esc_html__( 'Content Description Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .testimonial-content',
            ]
        );


        $this->end_controls_section();//end for styling tab
	}
	/**
	 * Render Accesspress_Parallax_Testimonial_Slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();
        $this->add_render_attribute( 'ap-testimonial-slider', 'class', 'ap-testimonial-slider-section ' );
        $showposts = isset( $settings[ 'showposts' ] )? $settings[ 'showposts' ] : '';
        $block_args = accesspress_parallax_query($settings,$first_id='', $showposts );
        $query = new \WP_Query( $block_args );
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-testimonial-slider' ); ?>>
            <div class="ap-testimonial-slider-wrapper">
                <?php
                    while ( $query->have_posts() ): $query->the_post();
                        ?>
                        <div class="testimonial-post-wrap">
                            <div class="testimonial-content">
                                <?php the_content();?>
                            </div>
                            <div class="testimonial-title-wrap">
                                <?php the_title('<h4 class="testimonial-post-title">','</h4>'); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}