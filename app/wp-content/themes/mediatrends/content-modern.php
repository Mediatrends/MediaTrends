<?php
/**
 * @package crispy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'white' ); ?>>
    <div class="post-container">
        <div class="post-thumbnail">
            <?php if( has_post_thumbnail() ){ 
                the_post_thumbnail(); 
            }
            ?>  <!--<img src="img/image-1.jpg" alt="image_blog" />  -->
            <div class="post-image-overlay"></div>
            <div class="post-thumbnail-overlay"></div>
        </div>
        <div class="post-content-container">
            <div class="container post-inner">					
                <div class="post-content">
                    <?php crispy_posted_on_modern(); ?> <!--<h4  class="post-date"><a href="blog-single.html" target="_blank">JUL 19</a></h4> -->
                    <div class="post-entry-content">
                        <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
                        
                        <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                            <?php
                                /* translators: used between list items, there is a space after the comma */
                                $categories_list = get_the_category_list( __( ' | ', 'crispy' ) );
                                if ( $categories_list && crispy_categorized_blog() ) :
                            ?>
                            <div class="post-category-items list-inline">
                                <?php printf( __( '%1$s', 'crispy' ), $categories_list ); ?>
                            </div>
                            <?php endif; // End if categories ?>
                
                        <?php endif; // End if 'post' == get_post_type() ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
