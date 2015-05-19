<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package crispy
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'crispy' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<ol class="comment-list">
		<?php
        
            class Walker_Agni_Comment extends Walker {
				/**
				 * What the class handles.
				 *
				 * @see Walker::$tree_type
				 *
				 * @since 2.7.0
				 * @var string
				 */
				var $tree_type = 'comment';
			
				/**
				 * DB fields to use.
				 *
				 * @see Walker::$db_fields
				 *
				 * @since 2.7.0
				 * @var array
				 */
				var $db_fields = array ('parent' => 'comment_parent', 'id' => 'comment_ID');
			
				/**
				 * Start the list before the elements are added.
				 *
				 * @see Walker::start_lvl()
				 *
				 * @since 2.7.0
				 *
				 * @param string $output Passed by reference. Used to append additional content.
				 * @param int $depth Depth of comment.
				 * @param array $args Uses 'style' argument for type of HTML list.
				 */
				function start_lvl( &$output, $depth = 0, $args = array() ) {
					$GLOBALS['comment_depth'] = $depth + 1;
			
					switch ( $args['style'] ) {
						case 'div':
							break;
						case 'ol':
							$output .= '<ol class="children">' . "\n";
							break;
						default:
						case 'ul':
							$output .= '<ul class="children">' . "\n";
							break;
					}
				}
			
				/**
				 * End the list of items after the elements are added.
				 *
				 * @see Walker::end_lvl()
				 *
				 * @since 2.7.0
				 *
				 * @param string $output Passed by reference. Used to append additional content.
				 * @param int    $depth  Depth of comment.
				 * @param array  $args   Will only append content if style argument value is 'ol' or 'ul'.
				 */
				function end_lvl( &$output, $depth = 0, $args = array() ) {
					$GLOBALS['comment_depth'] = $depth + 1;
			
					switch ( $args['style'] ) {
						case 'div':
							break;
						case 'ol':
							$output .= "</ol><!-- .children -->\n";
							break;
						default:
						case 'ul':
							$output .= "</ul><!-- .children -->\n";
							break;
					}
				}
			
				/**
				 * Traverse elements to create list from elements.
				 *
				 * This function is designed to enhance Walker::display_element() to
				 * display children of higher nesting levels than selected inline on
				 * the highest depth level displayed. This prevents them being orphaned
				 * at the end of the comment list.
				 *
				 * Example: max_depth = 2, with 5 levels of nested content.
				 * 1
				 *  1.1
				 *    1.1.1
				 *    1.1.1.1
				 *    1.1.1.1.1
				 *    1.1.2
				 *    1.1.2.1
				 * 2
				 *  2.2
				 *
				 * @see Walker::display_element()
				 * @see wp_list_comments()
				 *
				 * @since 2.7.0
				 *
				 * @param object $element           Data object.
				 * @param array  $children_elements List of elements to continue traversing.
				 * @param int    $max_depth         Max depth to traverse.
				 * @param int    $depth             Depth of current element.
				 * @param array  $args              An array of arguments.
				 * @param string $output            Passed by reference. Used to append additional content.
				 * @return null Null on failure with no changes to parameters.
				 */
				function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			
					if ( !$element )
						return;
			
					$id_field = $this->db_fields['id'];
					$id = $element->$id_field;
			
					parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			
					// If we're at the max depth, and the current element still has children, loop over those and display them at this level
					// This is to prevent them being orphaned to the end of the list.
					if ( $max_depth <= $depth + 1 && isset( $children_elements[$id]) ) {
						foreach ( $children_elements[ $id ] as $child )
							$this->display_element( $child, $children_elements, $max_depth, $depth, $args, $output );
			
						unset( $children_elements[ $id ] );
					}
			
				}
			
				/**
				 * Start the element output.
				 *
				 * @since 2.7.0
				 *
				 * @see Walker::start_el()
				 * @see wp_list_comments()
				 *
				 * @param string $output  Passed by reference. Used to append additional content.
				 * @param object $comment Comment data object.
				 * @param int    $depth   Depth of comment in reference to parents.
				 * @param array  $args    An array of arguments.
				 */
				function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
					$depth++;
					$GLOBALS['comment_depth'] = $depth;
					$GLOBALS['comment'] = $comment;
			
					if ( !empty( $args['callback'] ) ) {
						ob_start();
						call_user_func( $args['callback'], $comment, $args, $depth );
						$output .= ob_get_clean();
						return;
					}
			
					if ( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) {
						ob_start();
						$this->ping( $comment, $depth, $args );
						$output .= ob_get_clean();
					} elseif ( 'html5' === $args['format'] ) {
						ob_start();
						$this->html5_comment( $comment, $depth, $args );
						$output .= ob_get_clean();
					} else {
						ob_start();
						$this->comment( $comment, $depth, $args );
						$output .= ob_get_clean();
					}
				}
			
				/**
				 * Ends the element output, if needed.
				 *
				 * @since 2.7.0
				 *
				 * @see Walker::end_el()
				 * @see wp_list_comments()
				 *
				 * @param string $output  Passed by reference. Used to append additional content.
				 * @param object $comment The comment object. Default current comment.
				 * @param int    $depth   Depth of comment.
				 * @param array  $args    An array of arguments.
				 */
				function end_el( &$output, $comment, $depth = 0, $args = array() ) {
					if ( !empty( $args['end-callback'] ) ) {
						ob_start();
						call_user_func( $args['end-callback'], $comment, $args, $depth );
						$output .= ob_get_clean();
						return;
					}
					if ( 'div' == $args['style'] )
						$output .= "</div><!-- #comment-## -->\n";
					else
						$output .= "</li><!-- #comment-## -->\n";
				}
			
				/**
				 * Output a pingback comment.
				 *
				 * @access protected
				 * @since 3.6.0
				 *
				 * @see wp_list_comments()
				 *
				 * @param object $comment The comment object.
				 * @param int    $depth   Depth of comment.
				 * @param array  $args    An array of arguments.
				 */
				protected function ping( $comment, $depth, $args ) {
					$tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
			?>
					<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
						<div class="comment-body">
							<?php _e( 'Pingback:', 'crispy'  ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'crispy'  ), '<span class="edit-link">', '</span>' ); ?>
						</div>
			<?php
				}
			
				/**
				 * Output a single comment.
				 *
				 * @access protected
				 * @since 3.6.0
				 *
				 * @see wp_list_comments()
				 *
				 * @param object $comment Comment to display.
				 * @param int    $depth   Depth of comment.
				 * @param array  $args    An array of arguments.
				 */
				protected function comment( $comment, $depth, $args ) {
					if ( 'div' == $args['style'] ) {
						$tag = 'div';
						$add_below = 'comment';
					} else {
						$tag = 'li';
						$add_below = 'div-comment';
					}
			?>
					<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
					<?php if ( 'div' != $args['style'] ) : ?>
					<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					<?php endif; ?>
                    
                    
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						
						<div class="comment-author-details">
						<?php printf( __( '<h6 class="no-margin-padding">%s</h6>' ), get_comment_author_link() ); ?>
                        <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __( '%1$s at %2$s', 'crispy'  ), get_comment_date('M j, Y'),  get_comment_time('G:i') ); ?></a><?php edit_comment_link( __( '(Edit)', 'crispy'  ), '&nbsp;&nbsp;', '' );
						?>
					</div>
                        
                        </div>
					</div>
                    
                    
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'crispy' ) ?></em>
					<br />
					<?php endif; ?>
			
					
			
					<?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
					<?php if ( 'div' != $args['style'] ) : ?>
					</div>
					<?php endif; ?>
			<?php
				}
			
				/**
				 * Output a comment in the HTML5 format.
				 *
				 * @access protected
				 * @since 3.6.0
				 *
				 * @see wp_list_comments()
				 *
				 * @param object $comment Comment to display.
				 * @param int    $depth   Depth of comment.
				 * @param array  $args    An array of arguments.
				 */
				protected function html5_comment( $comment, $depth, $args ) {
					$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
			?>
					<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
						<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
							<footer class="comment-meta">
								<div class="comment-author vcard">
									<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
									<div class="comment-author-details">
										<?php printf(  sprintf( '<h6 class="no-margin-padding">%s</h6>', get_comment_author_link() ) ); ?>
                                    
                                        <div class="comment-metadata">
                                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                                                <time datetime="<?php comment_time( 'c' ); ?>">
                                                    <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'crispy'  ), get_comment_date('M j, Y'), get_comment_time('G:i') ); ?>
                                                </time>
                                            </a>
                                            <?php edit_comment_link( __( 'Edit', 'crispy'  ), '<span class="edit-link">', '</span>' ); ?>
                                        </div><!-- .comment-metadata -->
                                	</div>
                                </div><!-- .comment-author -->
			
								
			
								<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'crispy'  ); ?></p>
								<?php endif; ?>
							</footer><!-- .comment-meta -->
			
							<div class="comment-content">
								<?php comment_text(); ?>
							</div><!-- .comment-content -->
			
							<div class="reply">
								<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							</div><!-- .reply -->
                            <div class="seperator"></div>
						</article><!-- .comment-body -->
			<?php
				}
			}

                
            wp_list_comments( array(
                'walker'     => new Walker_Agni_Comment(), 
                'style'      => 'ol',
                'short_ping' => true,					
                'avatar_size' => 70,
                
            ) );
        ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'crispy' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '<i class="icon ion-ios7-arrow-thin-left"></i>', 'crispy' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( '<i class="icon ion-ios7-arrow-thin-right"></i>', 'crispy' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'crispy' ); ?></p>
	<?php endif; ?>

    
	<?php 
		global $required_text;
		comment_form($args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => __( 'Leave a Reply','crispy' ),
			'title_reply_to'    => __( 'Leave a Reply to %s','crispy' ),
			'cancel_reply_link' => __( 'Cancel Reply','crispy' ),
			'label_submit'      => __( 'Send' ,'crispy' ),
		
	  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p><div class="row">',
	  
	  'comment_notes_before' => '<p class="comment-notes">' .
		__( 'Your email address will not be published.','crispy' ) . ( $req ? $required_text : '' ) .
		'</p><div class="row">',
	
	  'comment_notes_after' => '' , 
	  'fields' => apply_filters( 'comment_form_default_fields', array(
	
		'author' =>
		  	'<div class="col-md-6">
				<div class="control-group">
					<div class="comment-form-author comment-field form-group col-xs-12 floating-label-form-group controls">
						<input class="form-control" id="author" name="author" type="text" placeholder="Name *" />
					</div>
				</div>',
	
		'email' =>
				'<div class="control-group">
					<div class="comment-form-email comment-field form-group col-xs-12 floating-label-form-group controls">
						<input class="form-control" id="email" name="email" type="text" placeholder="Email *" />
					</div>
				</div>',

		'url' =>
				'<div class="control-group">
					<div class="comment-form-url comment-field form-group col-xs-12 floating-label-form-group controls">
						<input class="form-control" id="url" name="url" type="text" placeholder="Website"/>
					</div>
				</div>
			</div>',
		)
	  ),
	  'comment_field' => 
		  	'<div class="col-md-6">
				<div class="control-group">
					<div class="form-group comment-form-comment comment-field col-xs-12 floating-label-form-group controls">
						<textarea rows="4"  name="comment" class="form-control" placeholder="Message *" id="message" aria-required="true"></textarea>
					</div>
				</div>'
	),''); ?>

	</div></div>
</div><!-- #comments -->
