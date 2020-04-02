<?php
/**
 * Accesspress Parallax Blog
 *
 * @package    Accesspress Themes
 * @subpackage Accesspress Parallax
 * @since      version 2.0.1
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Accesspress_Parallax_Shop_Slider extends Widget_Base {
    use \Elementor\Accesspress_Parallax_Functions;

	/**
	 * Retrieve Accesspress_Parallax_Shop_Slider widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ap-shop-slider';
	}

	/**
	 * Retrieve Accesspress_Parallax_Shop_Slider widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Shop Slider', 'accesspress-parallax' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Shop_Slider widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-carousel';
	}

	/**
	 * Retrieve the list of categories the Accesspress_Parallax_Shop_Slider widget belongs to.
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
	 * Register Accesspress_Parallax_Shop_Slider widget controls.
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
            'categories',
            [
                'label'             => esc_html__( 'Product Categories', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => accesspress_parallax_get_product_categories(),
            ]
        );

        $this->add_control(
            'showposts',
            [
                'label'             => esc_html__( 'Posts To Show', 'accesspress-parallax' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => '-1'
            ]
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
            'content_title_color',
            [
                'label'     => esc_html__( 'Product Title Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .ap-product-wrapper .woocommerce-loop-product__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_price_color',
            [
                'label'     => esc_html__( 'Product price Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_addtocart_color',
            [
                'label'     => esc_html__( 'Add to Cart Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .add_to_cart_button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_addtocart_color_hover',
            [
                'label'     => esc_html__( 'Add to Cart Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .add_to_cart_button:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_title_typography',
                'label'     => esc_html__( 'Product Title Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}}  .ap-product-wrapper .woocommerce-loop-product__title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_price_typography',
                'label'     => esc_html__( 'Product Price Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .price',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_addtocart_typography',
                'label'     => esc_html__( 'Add to Cart', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .add_to_cart_button, {{WRAPPER}} li.product a.added_to_cart',
            ]
        );

        $this->end_controls_section();//end for styling tab
	}
	/**
	 * Render Accesspress_Parallax_Shop_Slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'ap-shop', 'class', 'ap-shop-section' );
        $showposts = isset( $settings[ 'showposts' ] )? $settings[ 'showposts' ] : '-1';
        $categories = isset( $settings[ 'categories' ] )? $settings[ 'categories' ] : array();
        $block_args = array( 
                        'post_type' => 'product',
                        'posts_per_page' => $showposts,
                    );
        if( $categories ){
            $block_args['tax_query']  = "array(
                            array(
                                'taxonomy'  => 'product_cat',
                                'field'     => 'id', 
                                'terms'     => $categories
                            )
                        )";
        }
        $query = new \WP_Query( $block_args );
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-shop' ); ?>>
            <div class="ap-shop-wrapper <?php echo esc_attr($layout);?>">
                <ul class="ap-product-wrapper">
                    <?php 
                    if($query->have_posts()):
                        $count = 1;
                        while($query->have_posts()):$query->the_post();
                        $image_id = get_post_thumbnail_id();
                        $image = wp_get_attachment_image_src($image_id, 'thumbnail', 'true');
                        wc_get_template_part( 'content', 'product' ); 
                        $count+=0.5;
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}