<?php
/*
   Template Name: Portfolio
 *
 * The template for displaying all portfolio.
 *
 *
 * @package crispy
 */

get_header();  global $crispy_options; ?>
	<?php echo agni_page_header( $post ); ?>
    
    <?php switch( $crispy_options['portfolio-layout'] ){ 
	
		case '4' :
		case '6' : ?>    
            <div id="primary" class="works portfolio-container content-area">
                <main id="main" class="container site-main" role="main">                  	    
                    <div class="portfolio-filter"><?php portfolio_filter(); ?></div>    	
                    <div class="row portfolio-content-holder <?php if( $crispy_options['portfolio-layout'] == '4' ){ echo 'portfolio-3col'; }else{ echo 'portfolio-2col'; } ?>">
                        <div id="portfolio-page" class="portfolio-page portfolio-page-single">
                            <?php 
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(			
                                'post_type' => array( 'portfolio' ),			
                                'posts_per_page' => $crispy_options['portfolio-per-page'],
                                'order' => 'DESC',
                                'orderby' => 'date',	
                                'paged'=> $paged		
                            ); ?>			
                
                            <?php $query = new WP_Query( $args );
                            
                            // The Loop
                            if ( $query->have_posts() ) :
                                while ( $query->have_posts() ) : $query->the_post(); 
                                
                                $terms = get_the_terms( $post->ID, 'types' );
                                 
                                if ( $terms && ! is_wp_error( $terms ) ) :
                                    $links = array();
                
                                    foreach ( $terms as $term )
                                    {
                                        $links[] = $term->name;
                                    }
                                    $links = str_replace(' ', '-', $links);
                                    $tax = join( " ", $links );    
                                else : 
                                    $tax = ''; 
                                endif;
                                ?>
                            <article id="post-<?php the_ID(); ?>" class="<?php echo strtolower($tax); ?> all white portfolio-post col-sm-6 col-md-<?php echo $crispy_options['portfolio-layout']; ?> portfolio-thumbnail" >
                                
                                <div class="portfolio-thumbnail-container">
                                    <div class="thumbnail-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="portfolio-thumbnail-content">
                                        <h4><a class="portfolio-read-more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="fancy-line"></div>
                                        <a class="portfolio-attachment-link" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto" ><i class="icon ion-android-image"></i></a>
                                        <ul class="portfolio-category list-inline">
                                        <?php
                                            $terms = get_the_terms( $post->ID, 'types' );                         
                                            if ( $terms && ! is_wp_error( $terms ) ) :
                                                foreach ( $terms as $term )
                                                {											   
                                                    echo '<li>'.$term->name.'</li>';
                                                }   
                                            endif;
                                        ?>
                                        </ul>
                                    </div>
                                </div>                           
                            </article>
                            
                            <?php
                            endwhile;
                        endif;
                                    
                        // Reset Post Data
                        wp_reset_postdata();	?>
                    </div>
                </div>
            <?php break;
		case 'masonry':?>    
            <div id="primary" class="works portfolio-container content-area">
                <main id="main" class="container site-main" role="main">        
                    <div class="portfolio-filter"><?php portfolio_filter(); ?></div>
                    <div id="portfolio-page" class="portfolio-page portfolio-content-holder portfolio-masonry portfolio-page-single">
                        <?php 
                        
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(			
                            'post_type' => array( 'portfolio' ),			
                            'posts_per_page' => $crispy_options['portfolio-per-page'],
                            'order' => 'DESC',
                            'orderby' => 'date',	
                            'paged'=> $paged		
                        ); ?>			
            
                        <?php $query = new WP_Query( $args );
                        
                        // The Loop
                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) : $query->the_post(); 
							
							$portfolio_thumbnail_width = get_post_meta( $post->ID, 'portfolio_tile_width', true );
                        $portfolio_thumbnail_height = get_post_meta( $post->ID, 'portfolio_tile_height', true );
                            
                            $terms = get_the_terms( $post->ID, 'types' );
                             
                            if ( $terms && ! is_wp_error( $terms ) ) :
                                $links = array();
            
                                foreach ( $terms as $term )
                                {
                                    $links[] = $term->name;
                                }
                                $links = str_replace(' ', '-', $links);
                                $tax = join( " ", $links );    
                            else : 
                                $tax = ''; 
                            endif;
                            ?>
                        <article id="post-<?php the_ID(); ?>" class="<?php echo strtolower($tax); ?> white portfolio-post all portfolio-thumbnail " >
                            
                            <div class="portfolio-thumbnail-container">
                                <div class="thumbnail-image <?php echo $portfolio_thumbnail_width.' '.$portfolio_thumbnail_height; ?>">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="portfolio-thumbnail-content">
                                    <h4><a class="portfolio-read-more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="fancy-line"></div>
                                    <a class="portfolio-attachment-link" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto" ><i class="icon ion-android-image"></i></a>
                                    <ul class="portfolio-category list-inline">
                                    <?php
                                        $terms = get_the_terms( $post->ID, 'types' );                         
                                        if ( $terms && ! is_wp_error( $terms ) ) :
                                            foreach ( $terms as $term )
                                            {											   
                                                echo '<li>'.$term->name.'</li>';
                                            }   
                                        endif;
                                    ?>
                                    </ul>
                                </div>
                            </div>                           
                        </article>
                        
                        <?php
                        endwhile;
                    endif;
                                
                    // Reset Post Data
                    wp_reset_postdata();	?>
                </div>
            <?php break;
		case '3' :?>
        	<div id="primary" class="works portfolio-container content-area">
                <main id="main" class="site-main" role="main">
                	<div class="container ">
        				<div class="portfolio-filter"><?php portfolio_filter(); ?></div> 
                   	</div>
                    <div class="row no-margin-padding">
                        <div id="portfolio-page" class="portfolio-page portfolio-page-single">
                            <?php 
                            
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(			
                                'post_type' => array( 'portfolio' ),			
                                'posts_per_page' => $crispy_options['portfolio-per-page'],
                                'order' => 'DESC',
                                'orderby' => 'date',	
                                'paged'=> $paged		
                            ); ?>			
                
                            <?php $query = new WP_Query( $args );
                            
                            // The Loop
                            if ( $query->have_posts() ) :
                                while ( $query->have_posts() ) : $query->the_post(); 
                                
                                $terms = get_the_terms( $post->ID, 'types' );
                                 
                                if ( $terms && ! is_wp_error( $terms ) ) :
                                    $links = array();
                
                                    foreach ( $terms as $term )
                                    {
                                        $links[] = $term->name;
                                    }
                                    $links = str_replace(' ', '-', $links);
                                    $tax = join( " ", $links );    
                                else : 
                                    $tax = ''; 
                                endif;
                                ?>
                            <article id="post-<?php the_ID(); ?>" class="<?php echo strtolower($tax); ?> white portfolio-post all col-sm-6 col-md-3 portfolio-thumbnail no-margin-padding" >
                                
                                <div class="portfolio-thumbnail-container">
                                    <div class="thumbnail-image ">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="portfolio-thumbnail-content">
                                        <h4><a class="portfolio-read-more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="fancy-line"></div>
                                        <a class="portfolio-attachment-link" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto" ><i class="icon ion-android-image"></i></a>
                                        <ul class="portfolio-category list-inline">
                                        <?php
                                            $terms = get_the_terms( $post->ID, 'types' );                         
                                            if ( $terms && ! is_wp_error( $terms ) ) :
                                                foreach ( $terms as $term )
                                                {											   
                                                    echo '<li>'.$term->name.'</li>';
                                                }   
                                            endif;
                                        ?>
                                        </ul>
                                    </div>
                                </div>                           
                            </article>
                            
                            <?php
                            endwhile;
                        endif;
                                    
                        // Reset Post Data
                        wp_reset_postdata();	?>
                    </div>
             	</div>
            <?php break;
         } ?>
        <?php  $big = 999999999; // need an unlikely integer
             echo '<div class="portfolio-page-navigation page-navigation navigation text-center">'. paginate_links( array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $query->max_num_pages,
                'prev_text'    => __('Previous', 'crispy'),
                'next_text'    => __('Next', 'crispy'),
				'type' => 'list'
            ) ).'</div>'; ?>
        </main><!-- #main -->
    </div><!-- #primary -->  
    
<?php get_footer(); ?>
