<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package crispy
 */

if ( ! function_exists( 'crispy_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function crispy_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'crispy' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'crispy' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'crispy' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'crispy_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function crispy_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
    
        <nav class="post-navigation navlinks"  role="navigation">
            <ul class="blog-controls list-inline">
                <?php
                    previous_post_link( '<li>%link</li>', _x( '<i class="icon ion-ios7-arrow-thin-left"></i>', 'Previous post link', 'crispy' ) );
                    next_post_link(     '<li>%link</li>',     _x( '<i class="icon ion-ios7-arrow-thin-right"></i>', 'Next post link',     'crispy' ) );
                ?>
            </ul><!-- .nav-links -->
         </nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'crispy_portfolio_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function crispy_portfolio_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
    
            <ul class="portfolio-controls list-inline portfolio-nav-controls">
                <?php
                    previous_post_link( '<li>%link</li>', _x( '<i class="icon ion-ios7-arrow-thin-left large-icon"></i>', 'Previous post link', 'crispy' ) );
                    next_post_link(     '<li>%link</li>',     _x( '<i class="icon ion-ios7-arrow-thin-right large-icon"></i>', 'Next post link',     'crispy' ) );
                ?>
            </ul><!-- .nav-links -->
	<?php
}
endif;



if ( ! function_exists( 'crispy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function crispy_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('M j') ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date('M j') )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'crispy' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	echo '<div class="post-date-container"><h6 class="post_date">' . $posted_on . '</h6></div>';

}
endif;


if ( ! function_exists( 'crispy_posted_on_modern' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function crispy_posted_on_modern() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('M j') ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date('M j') )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'crispy' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	echo '<h4 class="post_date">' . $posted_on . '</h4>';
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function crispy_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'crispy_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'crispy_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so crispy_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so crispy_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in crispy_categorized_blog.
 */
function crispy_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'crispy_categories' );
}
add_action( 'edit_category', 'crispy_category_transient_flusher' );
add_action( 'save_post',     'crispy_category_transient_flusher' );
