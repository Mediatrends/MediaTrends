<?php
/**
 * The Template for displaying all single posts.
 *
 * @package crispy
 */

get_header(); ?>

<?php echo agni_page_header($post);?>
<div id="primary" class="content-area ">
    <main id="main" class="site-main portfolio-container container margin-bottom-100" role="main">        
        <div class="row">
            <div class="col-md-12">
    
            <?php while ( have_posts() ) : the_post(); ?>
    
                <?php get_template_part( 'content', 'single-portfolio' ); ?>
    
                
    
                <?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

    
            <?php endwhile; // end of the loop. ?>
            </div>
		</div>
    </main><!-- #main -->
</div><!-- #primary -->

	

<?php get_footer(); ?>