<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package crispy
 */

get_header(); ?>

	<section id="primary" class="content-area archive-page">
		<main id="main" class="site-main container " role="main">
			<div class="row">
                <div class="col-md-9 blog-content">
				<?php if ( have_posts() ) : ?>
        
                    <header class="archive-page-header">
                        <h1 class="page-title heading">
                            <?php
                                if ( is_category() ) :
                                    single_cat_title();
        
                                elseif ( is_tag() ) :
                                    single_tag_title();
        
                                elseif ( is_author() ) :
                                    printf( __( 'Author: %s', 'crispy' ), '<span class="vcard">' . get_the_author() . '</span>' );
        
                                elseif ( is_day() ) :
                                    printf( __( 'Day: %s', 'crispy' ), '<span>' . get_the_date() . '</span>' );
        
                                elseif ( is_month() ) :
                                    printf( __( 'Month: %s', 'crispy' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'crispy' ) ) . '</span>' );
        
                                elseif ( is_year() ) :
                                    printf( __( 'Year: %s', 'crispy' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'crispy' ) ) . '</span>' );
        
                                elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                    _e( 'Asides', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                                    _e( 'Galleries', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                    _e( 'Images', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                    _e( 'Videos', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                    _e( 'Quotes', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                    _e( 'Links', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                                    _e( 'Statuses', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                                    _e( 'Audios', 'crispy' );
        
                                elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                                    _e( 'Chats', 'crispy' );
        
                                else :
                                    _e( 'Archives', 'crispy' );
        
                                endif;
                            ?>
                        </h1>
                        <?php
                            // Show an optional term description.
                            $term_description = term_description();
                            if ( ! empty( $term_description ) ) :
                                printf( '<div class="taxonomy-description">%s</div>', $term_description );
                            endif;
                        ?>
                    </header><!-- .page-header -->
        
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
	</section><!-- #primary -->

<?php get_footer(); ?>
