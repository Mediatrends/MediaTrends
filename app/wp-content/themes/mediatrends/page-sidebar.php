<?php
/**
   Template Name: Page with Sidebar
	
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package crispy
 */

get_header(); ?>
	
    <?php echo agni_page_header( $post ); ?>
	<div id="primary" class="content-area page">
		<main id="main" class="site-main container page-container" role="main">
			<div class="row">
				<div class="col-md-9">
					<?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'content', 'pageno' ); ?>
        
                        <?php /*
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() ) :
                                comments_template();
                            endif;
                       */ ?>
        
                    <?php endwhile; // end of the loop. ?>
				</div>  
                <div class="col-md-3">
                    <?php get_sidebar(); ?>
                </div>              
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->
	
   <?php echo agni_contact_section( $post ); ?>
    
<?php get_footer(); ?>
