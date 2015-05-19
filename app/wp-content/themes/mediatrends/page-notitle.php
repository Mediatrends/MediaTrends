<?php
/**
  Template Name: Page No title/comment
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
		<main id="main" class="site-main" role="main">
			
					<?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'content', 'pageno' ); ?>
        
        
                    <?php endwhile; // end of the loop. ?>
				
		</main><!-- #main -->
	</div><!-- #primary -->
    <div class="clearfix"></div>
	
   <?php echo agni_contact_section( $post ); ?>
    
<?php get_footer(); ?>
