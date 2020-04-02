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

class Accesspress_Parallax_Blog extends Widget_Base {
    use \Elementor\Accesspress_Parallax_Functions;

	/**
	 * Retrieve Accesspress_Parallax_Blog widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ap-blog';
	}

	/**
	 * Retrieve Accesspress_Parallax_Blog widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Blog', 'accesspress-parallax' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Blog widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Retrieve the list of categories the Accesspress_Parallax_Blog widget belongs to.
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
	 * Register Accesspress_Parallax_Blog widget controls.
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
                'default'       =>  'layout1',
                'options'      => array(
                    'layout1'   => esc_html__('Layout 1','accesspress-parallax'),
                    'layout2'   => esc_html__('Layout 2','accesspress-parallax'),
                    'layout3'   => esc_html__('Layout 3','accesspress-parallax'),
                )
            )
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'accesspress-parallax' ),
                'default'           => 'blog-thumbnail',
                
            ]
        );
        $this->add_control(
            'post_meta',
            [
                'label'             => esc_html__( 'Show date', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'accesspress-parallax' ),
                'label_off'         => esc_html__( 'No', 'accesspress-parallax' ),
                'return_value'      => 'yes',
            ]
        );   
        
        $this->end_controls_section();

        $this->query_controls();

        $this->post_excerpts( array( 'content_excerpts' => true, 'readmore' => true ));

        //styling tab
        $this->start_controls_section(
            'section_general_style',
            [
                'label' => esc_html__( 'General Styles', 'accesspress-parallax' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_date_color',
            [
                'label'     => esc_html__( 'Date Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .posted-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_title_color',
            [
                'label'     => esc_html__( 'Content Title Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.blog-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_title_color_hover',
            [
                'label'     => esc_html__( 'Content Title Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.blog-post-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_description_color',
            [
                'label'     => esc_html__( 'Content Description Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-excerpt' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_button_color',
            [
                'label'     => esc_html__( 'Button Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-readmore' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_button_color_hover',
            [
                'label'     => esc_html__( 'Button Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-readmore:hover' => 'color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_button_bg_color',
            [
                'label'     => esc_html__( 'Button Background Color', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-readmore' => 'background-color: {{VALUE}};',
                ],
                'condition'         => [
                    'section_layout'     => 'layout3',
                ],
            ]
        );

        $this->add_control(
            'content_button_bg_color_hover',
            [
                'label'     => esc_html__( 'Button Background Color: Hover', 'accesspress-parallax' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-readmore:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
                'condition'         => [
                    'section_layout'     => 'layout3',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_date_typography',
                'label'     => esc_html__( 'Date Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .posted-date',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_title_typography',
                'label'     => esc_html__( 'Content Title Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} h4.blog-post-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_excerpt_typography',
                'label'     => esc_html__( 'Content Description Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .blog-excerpt',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_button_typography',
                'label'     => esc_html__( 'Button Typography', 'accesspress-parallax' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .blog-readmore',
            ]
        );


        $this->end_controls_section();//end for styling tab
	}
	/**
	 * Render Accesspress_Parallax_Blog widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'ap-blog', 'class', 'ap-blog-section' );
        $date = isset( $settings[ 'post_meta' ] )? $settings[ 'post_meta' ] : '';
        $showposts = isset( $settings[ 'showposts' ] )? $settings[ 'showposts' ] : '';
        $excerpt = isset( $settings[ 'content_excerpts' ] )? $settings[ 'content_excerpts' ] : 200;
        $readmore = isset( $settings[ 'readmore' ] )? $settings[ 'readmore' ] : esc_html__('Read More', 'accesspress-parallax');
        $block_args = accesspress_parallax_query($settings,$first_id='', $showposts );
        $query = new \WP_Query( $block_args );
        $layout = isset( $settings[ 'section_layout' ] )? $settings[ 'section_layout' ] : 'layout1';
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-blog' ); ?>>
            <div class=" ap-blog-wrapper <?php echo esc_attr($layout);?>">
                <div class="blog-post-wrapper">
                    <?php
                    if ( $query->have_posts() ):
                        $i = 0;
                        while ( $query->have_posts() ): $query->the_post();
                            $i = $i + 0.25;
                            ?>
                            <div class="blog-post-wrap">
                                <div class="blog-image">
                                    <?php
                                    if ( has_post_thumbnail() ) :
                                        $image_id = '';
                                        $img_src    = '';
                                        $image_id = get_post_thumbnail_id();   
                                        if( $image_id ){
                                            $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
                                        }
                                        // $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size );
                                        ?>
                                        <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-image.jpg' ) ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="blog-content">
                                    <?php if($date && ($layout=='layout1')): ?>
                                        <span class="posted-date"><?php echo esc_html(get_the_date('d.m.Y')); ?></span>
                                    <?php 
                                    elseif($date):?>                                        
                                        <span class="posted-date"><?php echo esc_html(get_the_date('d M Y')); ?></span>
                                        <?php
                                    endif;
                                    the_title('<h4 class="blog-post-title"><a href="'. get_the_permalink().'">', '</a></h4>'); ?>
                                    <div class="blog-excerpt">
                                        <?php echo accesspress_letter_count( get_the_excerpt(), $excerpt );  // WPCS: XSS OK.   ?> 
                                    </div>
                                    <?php if(!empty($readmore)): ?>
                                        <a class="blog-readmore" href="<?php the_permalink();?>"><?php echo esc_html( $readmore ); ?>
                                        <?php 
                                        if($layout != 'layout3'): ?>
                                            <i class="fa fa-angle-right"></i>
                                    <?php 
                                        endif;?>
                                        </a>
                                        <?php
                                    endif;?>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}