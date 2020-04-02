<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package accesspress_parallax
 */
get_header();

if ( accesspress_parallax_of_get_option( 'enable_parallax' ) == 1 ) :
    get_template_part( 'index', 'parallax' );
else:
    ?>
    <div class="mid-content clearfix">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'content' );
                    endwhile;
                    the_posts_pagination();
                else :
                    get_template_part( 'content', 'none' );
                endif;
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->

        <?php get_sidebar(); ?>
    </div>

<?php
endif;
get_footer();
