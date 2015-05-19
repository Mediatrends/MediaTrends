<?php 
/**
 * The template used for displaying slider in your desired page...
 *
 * @package crispy
 */
?>


<div id="carousel-team" class="row carousel-container">	
    <?php 
	
	$args = array(
		'post_type' => 'team',
		'posts_per_page'	=> -1
	);
	// The Query
	$team_query = new WP_Query( $args );
	
	// Check if the Query returns any posts
	if ( $team_query->have_posts() ) {
		while( $team_query->have_posts() ) : $team_query->the_post();  
		
			$member_image_url = wp_get_attachment_url( get_post_meta( $post->ID , 'member_image_url' , true ) );
			$member_name = get_post_meta( $post->ID , 'member_name' , true );
			$member_description = get_post_meta( $post->ID , 'member_description' , true );
			
			$member_facebook_link = get_post_meta( $post->ID , 'member_facebooklink' , true );
			$member_twitter_link = get_post_meta( $post->ID , 'member_twitterlink' , true );
			$member_googleplus_link = get_post_meta( $post->ID , 'member_googlepluslink' , true );
			$member_behance_link = get_post_meta( $post->ID , 'member_behancelink' , true );
			
			$member_links = null;
			if( !empty($member_facebook_link) ){
				$member_links .= '<li><a href="'.$member_facebook_link.'"><i class=" fa fa-facebook" ></i></a></li>';
			}
			if( !empty($member_twitter_link) ){
				$member_links .= '<li><a href="'.$member_twitter_link.'"><i class=" fa fa-twitter" ></i></a></li>';
			}
			if( !empty($member_googleplus_link) ){
				$member_links .= '<li><a href="'.$member_googleplus_link.'"><i class=" fa fa-google-plus" ></i></a></li>';
			}
			if( !empty($member_behance_link) ){
				$member_links .= '<li><a href="'.$member_behance_link.'"><i class=" fa fa-behance" ></i></a></li>';
			}
			
			?>
            <div id="post-<?php the_ID(); ?>" class="col-sm-6 col-md-3  margin-bottom-50">
                <div class="member-image-container">
                    <div class="member-image"><img src="<?php echo $member_image_url; ?>" alt="<?php the_title(); ?>" /></div>
                    <div class="member-text-content">
                        <div class="member-text white">
                            <h4><?php echo  $member_name; ?></h4>
                            <div class="fancy-line"></div>
                            <p><?php echo  $member_description ?></p>
                            <ul class="member-link list-inline">
                                <?php echo $member_links ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
	<?php endwhile; } wp_reset_query(); ?>  
</div>