<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package accesspress_parallax
 */
get_header();

$accesspress_parallax_page_metalayouts = get_post_meta( $post->ID, 'accesspress_parallax_page_layouts', true );

if( empty($accesspress_parallax_page_metalayouts) ){
    $accesspress_parallax_page_metalayouts = 'rightsidebar';
}

if ( accesspress_parallax_of_get_option( 'enable_parallax' ) == 1 && is_front_page() && get_option( 'show_on_front' ) == 'page' ) {
    get_template_part( 'index', 'parallax' );
} else {
    ?>

    <div class="mid-content clearfix <?php echo esc_attr($accesspress_parallax_page_metalayouts);?>">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'page' ); ?>

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
<?php } ?>

<?php
get_footer();
