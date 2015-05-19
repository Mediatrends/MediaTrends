<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package crispy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="page-header not-found">
				<div class="error-404"> <!-- Header Image  -->
                    <div class="page-header-container container white">
                        <div class="page-header-content">                        
                            <h1 class="page-title"><?php _e( 'Oops!!', 'crispy' ); ?></h1>
                            <div class="fancy-line"></div>
                            <h4><?php _e( 'PAGE NOT FOUND', 'crispy' ); ?></h4>
                            <p><?php _e( 'Apologies!!.. We are really working hard towards to fix the problem!!.. We will be get back you soon!!.. Keep in touch!!!..  ', 'crispy' ); ?></p>   
                            
                        </div>
                    </div>
                </div>
                
                <div id="error-search" class="error-search ">
                    <div class="container">				 
                        <div class="row">
                            <div class="col-md-6 margin-100">						
                                <p><?php _e( 'Sorry, the page you are looking for is not exist. Try someother keywords to search!!..', 'crispy' ); ?></p>
                                <?php get_search_form(); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>


			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
