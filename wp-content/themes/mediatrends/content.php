<?php
/**
 * @package mediatrends
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'mediatrends' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mediatrends' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php endif; ?>

</article><!-- #post-## -->
