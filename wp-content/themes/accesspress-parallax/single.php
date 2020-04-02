<?php
/**
 * The template for displaying all single posts.
 *
 * @package accesspress_parallax
 */
get_header();

$accesspress_parallax_page_metalayouts = get_post_meta( $post->ID, 'accesspress_parallax_page_layouts', true );

if( empty($accesspress_parallax_page_metalayouts) ){
    $accesspress_parallax_page_metalayouts = 'rightsidebar';
}


?>
<div class="mid-content clearfix <?php echo esc_attr($accesspress_parallax_page_metalayouts);?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'single' ); ?>

                <?php
                $post_pagination = accesspress_parallax_of_get_option( 'post_pagination' );
                if ( $post_pagination == 1 || !isset( $post_pagination ) ) :
                    the_post_navigation( array(
                        'prev_text' => '<i class="fa fa-hand-o-left"></i>' . __( '%title', 'accesspress-parallax' ),
                        'next_text' => __( '%title', 'accesspress-parallax' ) . '<i class="fa fa-hand-o-right"></i>',
                        'in_same_term' => true,
                    ) );
                endif;
                ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php
    if( $accesspress_parallax_page_metalayouts != 'nosidebar' ){
        get_sidebar();
    }
      ?>
</div>
<?php
get_footer();
