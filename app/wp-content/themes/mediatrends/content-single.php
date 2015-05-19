<?php
/**
 * @package crispy
 */
?>



<?php global $crispy_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="post-thumbnail-area">
           <?php  if( get_post_format() == 'link' ){ 
                post_link($post->ID);        
            }elseif( get_post_format() == 'gallery' ){ 
                post_gallery($post->ID);        
            } elseif( get_post_format() == 'quote' ){ 
                post_quote($post->ID);        
            } elseif( get_post_format() == 'audio' ){ 
                post_audio($post->ID);        
            } elseif( get_post_format() == 'video' ){ 
                post_video($post->ID);        
            } elseif( has_post_thumbnail() ){ 
                the_post_thumbnail(); 
            }			
			?>
        </div>
    </header>
    
    <div class="post-entry-content">
        <div class="entry-title blog-info">
            <?php the_title( '<h1 class="heading">', '</h1>' ); ?>
            <div class="fancy-line"></div>
        </div>
        <div class="entry-content">
			<?php the_content(); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'crispy' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
    </div>
	<footer class="entry-footer">
		<div class="entry-description">
            <?php crispy_posted_on(); ?>
            <div class="post-meta">
                <div class="post-category-icon toggle-icon"><a href="#"><i class="icon ion-bookmark"></i></a></div>
                <div class="post-tag-icon toggle-icon"><a href="#"><i class="icon ion-pricetag"></i></a></div>
            </div>
            <div class="post-additional">
                <?php crispy_post_nav(); ?>
                <div class="post-share-icon toggle-icon"><a href="#"><i class="icon ion-android-share"></i></a></div>
            </div>
        </div>
        
        <div class="post-meta-items">
            
            
            <?php
            /* translators: used between list items, there is a space after the comma */
            $category_list = get_the_category_list( __( ', ', 'crispy' ) );
    
            /* translators: used between list items, there is a space after the comma */
            $tag_list = get_the_tag_list( '', __( ', ', 'crispy' ) );
    
            if ( ! crispy_categorized_blog() ) {
                // This blog only has 1 category so we just need to worry about tags in the meta text
                if ( '' != $tag_list ) {
                    $meta_text = __( '<div class="meta-item"><div class="post-tag"> %2$s </div></div>', 'crispy' );
                } else {
                    $meta_text = __( ' ', 'crispy' );
                }
    
            } else {
                // But this blog has loads of categories so we should probably display them here
                if ( '' != $tag_list ) {
                    $meta_text = __( '<div class="meta-item"><div class="post-category"> %1$s </div> <div class="post-tag"> %2$s </div></div>', 'crispy' );
                } else {
                    $meta_text = __( '<div class="meta-item"><div class="post-category"> %1$s </div></div>', 'crispy' );
                }
    
            } // end check for categories on this blog
    
            printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink()
            );
        ?>
            <script type="text/javascript">
                // Popup window code
                function newPopup(url) {
                    popupWindow = window.open(
                        url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
                }
            </script> 
            <ul class="post-share list-inline">
            
                 <?php  if($crispy_options['blog-googleplus'] == '1'){ ?>             
                    <li><a href="JavaScript:newPopup('https://plus.google.com/share?url=<?php the_permalink();?>'); "><i class="fa fa-google-plus" ></i></a></li>
                <?php  }?>
                <?php  if($crispy_options['blog-twitter'] == '1'){ ?>
                    <li><a href="JavaScript:newPopup('http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>');"><i class="fa fa-twitter "></i></a></li>
                <?php  }?>
                <?php  if($crispy_options['blog-facebook'] == '1'){ ?>
                    <li><a href="JavaScript:newPopup('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>/&t=<?php the_title(); ?>');"><i class="fa fa-facebook "></i></a></li>
                <?php  }?>
            </ul>
        </div>

		<?php // edit_post_link( __( 'Edit', 'crispy' ), '<span class="edit-link">', '</span>' ); ?>
        
        
        <?php  if( $crispy_options['author-biography'] == '1' ){  ?>
        <div class="seperator"></div>
        <div class="author-bio">
            <div class="row">
                <div class="author-avatar col-xs-4 col-sm-3 col-md-2"><?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email') ); }?></div>
                <div class="author-details  col-xs-8 col-sm-9 col-md-10">
                    <h4><?php the_author(); ?></h4>                
                    <p><?php the_author_meta('description'); ?></p></div>
            </div>
        </div>
        
        <?php  } ?>	
        
        <div class="seperator"></div>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
