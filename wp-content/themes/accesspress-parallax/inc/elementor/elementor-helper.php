<?php
namespace Elementor;


/*
* Grouping common functions to use on almost all the elements
*
*/
trait Accesspress_Parallax_Functions {
    
    protected function query_controls( $args = array( 'post_type' => false, 'categories' => true, 'tags' => true, 'authors' => false, 'exclude_posts' => true, 'order' => true, 'orderby' => true, 'offset' => true, 'showposts' => true,  ) ){
        $categories = isset($args['categories']) ? $args['categories'] : true;
        $tags = isset($args['tags']) ? $args['tags'] : true;
        $authors = isset($args['authors']) ? $args['authors'] : true;
        $exclude_posts = isset($args['exclude_posts']) ? $args['exclude_posts'] : true;
        $order = isset($args['order']) ? $args['order'] : true;
        $offset = isset($args['offset']) ? $args['offset'] : true;
        $showposts = isset($args['showposts']) ? $args['showposts'] : true;
        $post_type = isset($args['post_type']) ? $args['post_type'] : false;
        $orderby = isset($args['orderby']) ? $args['orderby'] : true;
        
        /**
         * Content Tab: Query
         */
        $this->start_controls_section(
            'section_post_query',
            [
                'label'             => esc_html__( 'Query', 'accesspress-parallax' ),
            ]
        );
        if( $post_type ){
            $this->add_control(
                'post_type',
                [
                    'label'             => esc_html__( 'Post Type', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::SELECT,
                    'options'           => accesspress_parallax_get_post_types(),
                    'default'           => 'post',

                ]
            );        
        }

        if( $categories ){
            //post categories
            $this->add_control(
                'categories',
                [
                    'label'             => esc_html__( 'Categories', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::SELECT2,
                    'label_block'       => true,
                    'multiple'          => true,
                    'options'           => accesspress_parallax_get_post_categories(),
                ]
            );
        }

        if( $authors ){
            $this->add_control(
                'authors',
                [
                    'label'             => esc_html__( 'Authors', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::SELECT2,
                    'label_block'       => true,
                    'multiple'          => true,
                    'options'           => accesspress_parallax_get_authors(),
                ]
            );
        }

        if( $tags ){
            //post tags
            $this->add_control(
                'tags',
                [
                    'label'             => esc_html__( 'Tags', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::SELECT2,
                    'label_block'       => true,
                    'multiple'          => true,
                    'options'           => accesspress_parallax_get_tags(),
                ]
            );
        }
       

        if( $exclude_posts ){
            //get all posts
            $this->add_control(
                'exclude_posts',
                [
                    'label'             => esc_html__( 'Exclude Posts', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::SELECT2,
                    'label_block'       => true,
                    'multiple'          => true,
                    'options'           => accesspress_parallax_get_posts(),
                ]
            );
        }


        if( $order ){
            $this->add_control(
                'order',
                [
                    'label'             => esc_html__( 'Order', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::SELECT,
                    'options'           => [
                       'DESC'           => esc_html__( 'Descending', 'accesspress-parallax' ),
                       'ASC'       => esc_html__( 'Ascending', 'accesspress-parallax' ),
                    ],
                    'default'           => 'DESC',
                ]
            );
        }

        if( $orderby ){
            $this->add_control(
                'orderby',
                [
                    'label'             => esc_html__( 'Order By', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::SELECT,
                    'options'           => accesspress_parallax_get_post_orderby_options(),
                    'default'           => 'date',
                ]
            );
        }

        if( $offset ){
            $this->add_control(
                'offset',
                [
                    'label'             => esc_html__( 'Offset', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::NUMBER,
                    'default'           => '',
                ]
            );
        }

        if( $showposts ){
            $this->add_control(
                'showposts',
                [
                    'label'             => esc_html__( 'Posts To Show', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::NUMBER,
                ]
            );
        }

        $this->end_controls_section();

    }

    //excerpts
    protected function post_excerpts( $args = array( 'content_excerpts' => true, 'readmore' => false ) ){
        $content_excerpts = isset($args['content_excerpts']) ? $args['content_excerpts'] : true;
        $readmore = isset($args['readmore']) ? $args['readmore'] : false;

        /**
         * Content Tab: Post Excerpts
         */
        $this->start_controls_section(
            'section_post_excerpts',
            [
                'label'             => esc_html__( 'Post Excerpts', 'accesspress-parallax' ),
            ]
        );

        if( $content_excerpts ){
            $this->add_control(
                'content_excerpts',
                [
                    'label'             => esc_html__( 'Post Content Length', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::NUMBER,
                    'default'           => '',
                    'description'       => esc_html__('Enter Length for contents in letters or leave blank to hide content','accesspress-parallax')
                ]
            );
        }

        if( $readmore ){
            $this->add_control(
                'readmore',
                [
                    'label'             => esc_html__( 'Read More Text', 'accesspress-parallax' ),
                    'description'       => esc_html__( 'Enter text for Read More button or leave it blank to hide', 'accesspress-parallax' ),
                    'type'              => Controls_Manager::TEXT,
                ]
            );
        }
        $this->end_controls_section();

    }

    protected function slider_settings( ){

        /**
         * Content Tab: Post Meta
         */
        $this->start_controls_section(
            'section_slider_settings',
            [
                'label'             => esc_html__( 'Slider Settings', 'accesspress-parallax' ),
            ]
        );
        
        $this->add_control(
            'arrows',
            [
                'label'             => esc_html__( 'Arrows', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'accesspress-parallax' ),
                'label_off'         => esc_html__( 'No', 'accesspress-parallax' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->add_control(
            'dots',
            [
                'label'             => esc_html__( 'Dots', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'accesspress-parallax' ),
                'label_off'         => esc_html__( 'No', 'accesspress-parallax' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->add_control(
            'infinite_loop',
            [
                'label'             => esc_html__( 'Infinite Loop', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'accesspress-parallax' ),
                'label_off'         => esc_html__( 'No', 'accesspress-parallax' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->add_control(
            'pauseOnHover',
            [
                'label'             => esc_html__( 'Pause on Hover', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'accesspress-parallax' ),
                'label_off'         => esc_html__( 'No', 'accesspress-parallax' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->add_control(
            'autoplay',
            [
                'label'             => esc_html__( 'Autoplay', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'accesspress-parallax' ),
                'label_off'         => esc_html__( 'No', 'accesspress-parallax' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->add_control(
            'autoplay_speed',
            [
                'label'             => esc_html__( 'Autoplay Speed', 'accesspress-parallax' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => '5000',
            ]
        );
        
        $this->add_control(
            'transition_speed',
            [
                'label'             => esc_html__( 'Transition Speed', 'accesspress-parallax' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => '500',
            ]
        );
        
        $this->add_control(
            'transition_style',
            [
                'label'             => esc_html__( 'Transition Style', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'slide'           => esc_html__( 'Slide', 'accesspress-parallax' ),
                   'fade'       => esc_html__( 'Fade', 'accesspress-parallax' ),
                ],
                'default'           => 'slide',
            ]
        );
        
        $this->add_control(
            'swipe',
            [
                'label'             => esc_html__( 'Swipe', 'accesspress-parallax' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'no',
            ]
        );
        $this->end_controls_section();
        

    }


}



class Accesspress_Parallax_Helper {

    public static function get_query_args( $control_id, $settings ) {
        $defaults = [
            $control_id . '_post_type' => 'post',
            $control_id . '_posts_ids' => [],
            'orderby' => 'date',
            'order' => 'desc',
            'posts_per_page' => 3,
            'offset' => 0,
        ];

        $settings = wp_parse_args( $settings, $defaults );

        $post_type = $settings[ $control_id . '_post_type' ];

        $query_args = [
            'orderby' => $settings['orderby'],
            'order' => $settings['order'],
            'ignore_sticky_posts' => 1,
            'post_status' => 'publish', // Hide drafts/private posts for admins
        ];

        if ( 'by_id' === $post_type ) {
            $query_args['post_type'] = 'any';
            $query_args['post__in']  = $settings[ $control_id . '_posts_ids' ];

            if ( empty( $query_args['post__in'] ) ) {
                // If no selection - return an empty query
                $query_args['post__in'] = [ 0 ];
            }
        } else {
            $query_args['post_type'] = $post_type;
            $query_args['posts_per_page'] = $settings['posts_per_page'];
            $query_args['tax_query'] = [];

            $query_args['offset'] = $settings['offset'];

            $taxonomies = get_object_taxonomies( $post_type, 'objects' );

            foreach ( $taxonomies as $object ) {
                $setting_key = $control_id . '_' . $object->name . '_ids';

                if ( ! empty( $settings[ $setting_key ] ) ) {
                    $query_args['tax_query'][] = [
                        'taxonomy' => $object->name,
                        'field' => 'term_id',
                        'terms' => $settings[ $setting_key ],
                    ];
                }
            }
        }

        if ( ! empty( $settings[ $control_id . '_authors' ] ) ) {
            $query_args['author__in'] = $settings[ $control_id . '_authors' ];
        }

        $post__not_in = [];
        if ( ! empty( $settings['post__not_in'] ) ) {
            $post__not_in = array_merge( $post__not_in, $settings['post__not_in'] );
            $query_args['post__not_in'] = $post__not_in;
        }

        if( isset( $query_args['tax_query'] ) && count( $query_args['tax_query'] ) > 1 ) {
            $query_args['tax_query']['relation'] = 'OR';
        }

        return $query_args;
    }

}