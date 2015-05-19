<?php 
/**
 * The template used for displaying slider in your desired page...
 *
 * @package crispy
 */
?>


<div id="carousel-clients" class="carousel-container">
                    
<?php 

    $args = array(
        'post_type' => 'clients',
        'posts_per_page'	=> -1
    );
    // The Query
    $clients_query = new WP_Query( $args );
    
    // Check if the Query returns any posts
    if ( $clients_query->have_posts() ) {
        while( $clients_query->have_posts() ) : $clients_query->the_post(); ?> 
        
            <?php $clients_image = wp_get_attachment_url( get_post_meta( $post->ID , 'clients_image' , true ) );
            $clients_image_link = get_post_meta( $post->ID  , 'clients_image_link' , true ); ?>
            <div id="post-<?php the_ID(); ?>" class="client" >
                <a href="<?php echo $clients_image_link; ?>"><img src="<?php echo $clients_image; ?>" alt="<?php echo the_title(); ?>" /></a>
            </div>
        
    <?php endwhile; } wp_reset_query(); ?>   
</div>
