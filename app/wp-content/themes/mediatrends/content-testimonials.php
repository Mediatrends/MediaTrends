<?php 
/**
 * The template used for displaying slider in your desired page...
 *
 * @package crispy
 */
?>

<div id="carousel-testimonials" class="carousel-container">
    
<?php 

$args = array(
	'post_type' => 'testimonials',
	'posts_per_page'	=> -1
);
// The Query

$testimonials_query = new WP_Query( $args ); ?>

        <?php // Check if the Query returns any posts
       if ( $testimonials_query->have_posts() ) {
            while( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); 			
			
				$testimonial_image = wp_get_attachment_url( get_post_meta( $post->ID , 'testimonial_image' , true ) );
				$testimonial_quote = get_post_meta( $post->ID , 'testimonial_quote' , true );
				$testimonial_quote_color = get_post_meta( $post->ID , 'testimonial_quote_color' , true );
				$testimonial_author = get_post_meta( $post->ID , 'testimonial_name' , true );
				$testimonial_author_color = get_post_meta( $post->ID , 'testimonial_name_color' , true );  ?>    
            
            <div id="post-<?php the_ID(); ?>" class="row">
                <div class="col-sm-2 col-md-2">
                    <img src="<?php echo $testimonial_image; ?>" alt="<?php echo the_title(); ?>" />
                </div>
                <div class="col-sm-9 col-md-9">								
                    <div class="testimonial-quote">
                        <div class="quote-symbol">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/quote.png"  alt="" /> <!-- <i class="fa fa-quote-left"></i> -->
                        </div>
                        <h3 style="color:<?php  echo $testimonial_quote_color; ?>"><?php echo $testimonial_quote; ?></h3>
                        <p class="quote-cite" style="color:<?php  echo $testimonial_author_color; ?>"><?php echo $testimonial_author; ?></p>
                    </div>
                </div>
            </div> 
     <?php  endwhile; }  wp_reset_query(); ?> 
</div>
