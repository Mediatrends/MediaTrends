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
 * @package crispy
 */

get_header(); ?>

<?php global $crispy_options;  ?>

<?php switch( $crispy_options[ 'blog-layout' ] ){	

	case '1' :?>
    
	<div id="primary" class="blog blog-classic content-area">
		<main id="main" class="blog-container container blog-classic-container site-main" role="main">		
            <div class="row">
                <div class="col-md-9 blog-content">
                    <?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
            
                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', get_post_format() );
                            ?>
            
                        <?php endwhile; ?>  	
						
                        <?php global $crispy_options; if( $crispy_options['blog-pagination'] == '2' ){ crispy_paging_nav(); }else{ agni_page_navigation(); } ?>
            
                    <?php else : ?>
            
                        <?php get_template_part( 'content', 'none' ); ?>
            
                    <?php endif; ?>
                    
                                
                </div>
                <div class="col-md-3">
                    <?php get_sidebar(); ?>                    
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
    <?php break; 
	
	case '2' :
	case '3' : ?>
    
	<div  id="primary" class="blog blog-grid">			
        <main id="main" class="blog-container container site-main" role="main">
            <div class="row <?php if( $crispy_options['blog-layout'] == '3' ) echo 'blog-masonry'; ?> ">
                <div class="col-md-12">
                    <div class="row">
                        
                      	<?php if ( have_posts() ) : ?>

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                			<div class="col-xs-12 col-sm-6 col-md-4 blog-content">
                                <?php
                                    /* Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'content', get_post_format() );
                                ?>
                			</div>
                            <?php endwhile; ?>  	
                            
                            
                
                        <?php else : ?>
                
                            <?php get_template_part( 'content', 'none' ); ?>
                
                        <?php endif; ?>
                        
                    </div>
                </div>
                
            </div>
        </main>
        
        <div class="text-center">
            <?php global $crispy_options; if( $crispy_options['blog-pagination'] == '2' ){ crispy_paging_nav(); }else{ agni_page_navigation(); } ?>
        </div>
        
    </div>	
    <?php break; 
	case '4' : ?>
	
	<div  id="primary" class="blog blog-modern">	
    	<main id="main" class="site-main" role="main">		
            <?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content','modern' );
                    ?>
                <?php endwhile; ?>  	
                
                
    
            <?php else : ?>
    
                <?php get_template_part( 'content', 'none' ); ?>
    
            <?php endif; ?>
            
       	</main>
        
        <!-- <?php // global $crispy_options; if( $crispy_options['blog-pagination'] == '2' ){ crispy_paging_nav(); }else{ agni_page_navigation(); } ?>-->
    </div>
	
    <?php break; } ?>
<?php get_footer(); ?>
