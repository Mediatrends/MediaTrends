<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package crispy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <header class="entry-header">
    	<?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-description">
            	<?php crispy_posted_on(); ?>
            </div>
		<?php endif; ?>
	</header><!-- .entry-header -->
	
    <div class="post-entry-content">
        <div class="entry-title blog-info">
			<?php the_title( sprintf( '<h1 class="heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <div class="fancy-line"></div>
        </div>
        <div class="entry-content">
			<?php the_excerpt( ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'crispy' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        
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