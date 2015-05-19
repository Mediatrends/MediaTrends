<?php
/**
 * The template for displaying search results pages.
 *
 * @package crispy
 */

get_header(); ?>

	<section id="primary" class="content-area search-page">
		<main id="main" class="site-main container" role="main">
			 <div class="row">
                <div class="col-md-9 blog-content">
				<?php if ( have_posts() ) : ?>
        
                    <header class="search-page-header">
                        <h1 class="page-title heading"><?php printf( __( 'Search Results for: %s', 'crispy' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header><!-- .page-header -->
        
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'content', 'search' );
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
	</section><!-- #primary -->

<?php get_footer(); ?>
