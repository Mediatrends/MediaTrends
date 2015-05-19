<?php
/**
 * @package crispy
 */
?>
<?php global $crispy_options; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    	<?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-description blog-no-thumbnail">
            	<?php crispy_posted_on(); ?>
            </div>
		<?php endif; ?>
        <div class="post-thumbnail-area">
            <?php if( has_post_thumbnail() ){ 
                the_post_thumbnail(); 
            }elseif( get_post_format() == 'link' ){ 
                post_link($post->ID);        
            }elseif( get_post_format() == 'gallery' ){ 
                post_gallery($post->ID);        
            } elseif( get_post_format() == 'quote' ){ 
                post_quote($post->ID);        
            } elseif( get_post_format() == 'audio' ){ 
                post_audio($post->ID);        
            } elseif( get_post_format() == 'video' ){ 
                post_video($post->ID);        
            }  
			
			?> 
        </div>
	</header><!-- .entry-header -->
	
    <div class="post-entry-content">
        <div class="entry-title blog-info">
        	<?php if( $crispy_options['blog-layout'] == '1' ){ ?>       
				<?php the_title( sprintf( '<h1 class="heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
                <div class="fancy-line"></div>            
            <?php }
            else{ ?>
				<?php the_title( sprintf( '<h4 class="heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
                <div class="fancy-line-small"></div>
            <?php } ?>
        </div>
        
        <?php if( $crispy_options['blog-layout'] == '1' ){ ?>
        <div class="entry-content">
			<?php the_content( __( '. . .', 'crispy' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'crispy' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php }
        else{ ?>
        <div class="entry-summary">
			 <?php the_excerpt_length( 140 ); ?>
        </div><!-- .entry-summary -->
       <?php  } ?>
        
    </div>
	<footer class="entry-footer">    
    
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ' | ', 'crispy' ) );
				if ( $categories_list && crispy_categorized_blog() ) :
			?>
			<div class="post-category-items">
				<?php printf( __( '%1$s', 'crispy' ), $categories_list ); ?>
			</div>
			<?php endif; // End if categories ?>

		<?php endif; // End if 'post' == get_post_type() ?>

		<?php // edit_post_link( __( 'Edit', 'crispy' ), '<div class="edit-link text-right">', '</div>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<div class="seperator"></div>
