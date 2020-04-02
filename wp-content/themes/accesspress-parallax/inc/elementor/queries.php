<?php

// Get categories
if ( !function_exists('accesspress_parallax_get_post_categories') ) {
    function accesspress_parallax_get_post_categories() {

        $options = array();
        
        $terms = get_terms( array( 
            'taxonomy'      => 'category',
            'hide_empty'    => true,
        ));

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                $options[ $term->term_id ] = $term->name.' ('.$term->count.')';
            }
        }

        return $options;
    }
}



/**
 * Get All POst Types
 * @return array
 */
function accesspress_parallax_get_post_types(){

    $app_cpts = get_post_types( array( 'public'   => true, 'show_in_nav_menus' => true ), 'object' );
    $app_exclude_cpts = array( 'elementor_library', 'attachment' );

    foreach ( $app_exclude_cpts as $exclude_cpt ) {
        unset($app_cpts[$exclude_cpt]);
    }
    $post_types = array_merge($app_cpts);
    foreach( $post_types as $type ) {
        $types[ $type->name ] = $type->label;
    }

    return $types;
}


/**
 * POst Orderby Options
 * @return array
 */
function accesspress_parallax_get_post_orderby_options(){
    $orderby = array(
        'ID'            => esc_html('Post ID','accesspress-parallax'),
        'author'        => esc_html('Post Author','accesspress-parallax'),
        'title'         => esc_html('Title','accesspress-parallax'),
        'date'          => esc_html('Date','accesspress-parallax'),
        'modified'      => esc_html('Last Modified Date','accesspress-parallax'),
        'parent'        => esc_html('Parent Id','accesspress-parallax'),
        'rand'          => esc_html('Random','accesspress-parallax'),
        'comment_count' => esc_html('Comment Count','accesspress-parallax'),
        'menu_order'    => esc_html('Menu Order','accesspress-parallax'),
    );

    return $orderby;
}


// Get all Authors
if ( !function_exists('accesspress_parallax_get_authors') ) {
    function accesspress_parallax_get_authors() {

        $options = array();

        $users = get_users();

        foreach ( $users as $user ) {
            $options[ $user->ID ] = $user->display_name;
        }

        return $options;
    }
}

// Get all Authors
if ( !function_exists('accesspress_parallax_get_tags') ) {
    function accesspress_parallax_get_tags() {

        $options = array();

        $tags = get_tags();

        foreach ( $tags as $tag ) {
            $options[ $tag->term_id ] = $tag->name.' ('.$tag->count.')';
        }

        return $options;
    }
}

// Get all Posts
if ( !function_exists('accesspress_parallax_get_posts') ) {
    function accesspress_parallax_get_posts() {

        $post_list = get_posts( array(
            'post_type'         => 'post',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => -1,
        ) );

        $posts = array();

        if ( ! empty( $post_list ) && ! is_wp_error( $post_list ) ) {
            foreach ( $post_list as $post ) {
               $posts[ $post->ID ] = $post->post_title;
            }
        }

        return $posts;
    }
}



if ( class_exists( 'WooCommerce' ) ) {

    // Get all Products
    if ( !function_exists('accesspress_parallax_get_products') ) {
        function accesspress_parallax_get_products() {

            $post_list = get_posts( array(
                'post_type'         => 'product',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'posts_per_page'    => -1,
            ) );

            $posts = array();

            if ( ! empty( $post_list ) && ! is_wp_error( $post_list ) ) {
                foreach ( $post_list as $post ) {
                   $posts[ $post->ID ] = $post->post_title;
                }
            }

            return $posts;
        }
    }
    
    // Woocommerce - Get product categories
    if ( !function_exists('accesspress_parallax_get_product_categories') ) {
        function accesspress_parallax_get_product_categories() {

            $options = array();

            $terms = get_terms( array( 
                'taxonomy'      => 'product_cat',
                'hide_empty'    => true,
            ));

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $options[ $term->term_id ] = $term->name.' ('.$term->count.')';
                }
            }

            return $options;
        }
    }

    // WooCommerce - Get product tags
    if ( !function_exists('accesspress_parallax_product_get_tags') ) {
        function accesspress_parallax_product_get_tags() {

            $options = array();

            $tags = get_terms( 'product_tag' );

            if ( ! empty( $tags ) && ! is_wp_error( $tags ) ){
                foreach ( $tags as $tag ) {
                    $options[ $tag->term_id ] = $tag->name.' ('.$tag->count.')';
                }
            }

            return $options;
        }
    }
}

/**
 * Function for content excerpt length
 */
if( ! function_exists( 'accesspress_parallax_get_excerpt_content' ) ):
    function accesspress_parallax_get_excerpt_content( $limit ) {
        if( empty($limit)){
            return;
        }
        
        $contents   = strip_shortcodes( get_the_content() );
        $content    = strip_tags( $contents );
        if($limit){
            $content = mb_substr( $content, 0 , absint($limit) );
            $content .= '...';
        }
       
        return '<div class="ed-post-excerpt">'. $content . '</div>';
    }
    endif;


/*--------------------------------------------------------------------------------------------------------*/

/**
* Queries for the elements
*
*/
if( ! function_exists('accesspress_parallax_query')){
    function accesspress_parallax_query($settings,$first_id='',$postsPerPage = 6 ){     
        $post_type      = 'post';
        $category       = '';
        $tags           = '';
        $exclude_posts  = '';

        $category       = $settings['categories'];
        $tags           = $settings['tags'];
        $exclude_posts  = $settings['exclude_posts'];
        $orderby = isset($settings['orderby']) ? $settings['orderby'] : 'ID' ;
        $meta_key = '';
        $date = '';

        //Categories
        $post_cat = '';
        $post_cats = $category;
        if ( ! empty( $category) ){
            asort($category);    
        }
        
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }
        
        if( !empty($first_id)){
            $post_cat = $first_id;
        }
        // Post Authors
        $post_author = '';
        $post_authors = isset( $settings['authors'] ) ? $settings['authors'] : '';
        if ( !empty( $post_authors) ) {
            $post_author = implode( ",", $post_authors );
        }
        $args = array(
                'post_status'           => array( 'publish' ),
                'post_type'             => $post_type,
                'post__in'              => '',
                'cat'                   => $post_cat,
                'author'                => $post_author,
                'tag__in'               => $tags,
                'orderby'               => $orderby,
                'order'                 => $settings['order'],
                'post__not_in'          => $exclude_posts,
                'offset'                => $settings['offset'],
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => $postsPerPage,
                'meta_key' => $meta_key,
                'date_query' => $date
            );

        return $args;

    }
}