<?php
/**
 * @package crispy
 */
?>

<?php global $crispy_options; 

$portfolio_full = get_post_meta( $post->ID, 'portfolio_fullwidth', true );

$portfolio_description = get_post_meta( $post->ID, 'portfolio_description', true );
$portfolio_client = get_post_meta( $post->ID, 'portfolio_client', true );
$portfolio_date = get_post_meta( $post->ID, 'portfolio_date', true );
$portfolio_external_link = get_post_meta( $post->ID, 'portfolio_external_link', true );
                        
                        
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( $portfolio_full == '1' ){ ?>
	
        <div class="portfolio-single-bg row no-margin-padding">    
            <div class="portfolio-content">
            	<?php the_content(); ?>
            </div>	<!-- .entry-content -->
            
            <div class="col-md-12 portfolio-description portfolio-description-full">
                <div class="row">
                    <div class="portfolio-info portfolio-info-full col-md-8">
                        
                        <?php the_title( '<h3 class="entry-title heading">', '</h3>' ); ?>
                        <div class="fancy-line"></div>
                        <?php 
                            
                        if( !empty($portfolio_description) ){                    
                            echo '<p class="portfolio-brief">'.$portfolio_description .'</p>';
                        }
                        
                        if( !empty( $portfolio_external_link ) ){
                            echo '<a href="'.$portfolio_external_link.'" class="portfolio-link btn btn-primary">Project Link</a>';
                        }
                    	?>
                    </div>
                    <div class="portfolio-details portfolio-details-full col-md-4">
                    
                        <h4 class="heading">DETAILS</h4>
                        <?php 
                            if( !empty($portfolio_client) ){                    
                                echo '<h6>CLIENT&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span class="default-typo">'.$portfolio_client .'</span></h6>';
                            }
                            if( !empty($portfolio_date) ){                    
                                echo '<h6>DATE&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span class="default-typo">'.$portfolio_date .'</span></h6>';
                            }
                        
                            echo '<h6>CATEGORY&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span class="default-typo">';	
                            $terms = get_the_terms( $post->ID, 'types' );                         
                            if ( $terms && ! is_wp_error( $terms ) ) :
                                foreach ( $terms as $term )
                                {											   
                                    echo $term->name.', ';
                                }   
                            endif;
                            echo '</span></h6>';
                        ?>
                    </div> 
                    
                </div>
            </div>
        </div>
        
    
        <footer class="entry-footer">
            <div class="portfolio-navigation portfolio-nav-external">
                <div class="portfolio-nav-container">
                    <?php crispy_portfolio_nav(); ?>
                    <a class="portfolio-share-icon portfolio-external-share-icon toggle-icon" href="#"><i class="icon ion-android-share small-icon"></i></a>
                </div>
            </div>
            <script type="text/javascript">
                
                // Popup window code
                function newPopup(url) {
                    popupWindow = window.open(
                        url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
                }
            </script> 
            <ul class="portfolio-share portfolio-external-share list-inline">
                <?php  if($crispy_options['portfolio-googleplus'] == '1'){ ?>             
                    <li><a href="JavaScript:newPopup('https://plus.google.com/share?url=<?php the_permalink();?>'); "><i class="fa fa-google-plus" ></i></a></li>
                <?php  }?>
                <?php  if($crispy_options['portfolio-twitter'] == '1'){ ?>
                    <li><a href="JavaScript:newPopup('http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>');"><i class="fa fa-twitter "></i></a></li>
                <?php  }?>
                <?php  if($crispy_options['portfolio-facebook'] == '1'){ ?>
                    <li><a href="JavaScript:newPopup('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>/&t=<?php the_title(); ?>');"><i class="fa fa-facebook "></i></a></li>
                <?php  }?>
            </ul>
        </footer><!-- .entry-footer -->
    <?php }
    else{ ?>
        <div class="portfolio-single-bg row no-margin-padding">
            <div class="col-md-9 portfolio-content">
            	<?php the_content(); ?>
            </div>
            <div class="col-md-3 portfolio-description">
                <div class="portfolio-info">
                    <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                    <div class="fancy-line"></div>
                   	<?php 
                            
                        if( !empty($portfolio_description) ){                    
                            echo '<p class="portfolio-brief">'.$portfolio_description .'</p>';
                        } ?>
                </div>
                <?php if( !empty( $portfolio_external_link ) ){
					echo '<a href="'.$portfolio_external_link.'" class="portfolio-link btn btn-primary">Project Link</a>';
				}
				?>
                
                <div class="seperator"></div>
                <div class="portfolio-details">
                    <h4>DETAILS</h4>
                    <?php 
						if( !empty($portfolio_client) ){                    
							echo '<h6>CLIENT&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span class="default-typo">'.$portfolio_client .'</span></h6>';
						}
						if( !empty($portfolio_date) ){                    
							echo '<h6>DATE&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span class="default-typo">'.$portfolio_date .'</span></h6>';
						}
					
						echo '<h6>CATEGORY&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<span class="default-typo">';	
						$terms = get_the_terms( $post->ID, 'types' );                         
						if ( $terms && ! is_wp_error( $terms ) ) :
							foreach ( $terms as $term )
							{											   
								echo $term->name.', ';
							}   
						endif;
						echo '</span></h6>';
					?>
                </div> 
                <div class="portfolio-navigation">
                    <div class="portfolio-nav-container">
                        <?php crispy_portfolio_nav(); ?>
                        <!--<div class="portfolio-close clearfix">										
                            <a class="close-portfolio-item" href="javascript:void(0)"><i class="icon ion-ios7-close-empty large-icon"></i></a>
                        </div> -->
                        <a class="portfolio-share-icon toggle-icon" href="#"><i class="icon ion-android-share small-icon"></i></a>
                    </div>
                </div>
                <script type="text/javascript">                   
                    // Popup window code
                    function newPopup(url) {
                        popupWindow = window.open(
                            url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
                    }
                </script> 
                <ul class="portfolio-share list-inline">
                    <?php  if($crispy_options['portfolio-googleplus'] == '1'){ ?>             
                        <li><a href="JavaScript:newPopup('https://plus.google.com/share?url=<?php the_permalink();?>'); "><i class="fa fa-google-plus" ></i></a></li>
                    <?php  }?>
                    <?php  if($crispy_options['portfolio-twitter'] == '1'){ ?>
                        <li><a href="JavaScript:newPopup('http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>');"><i class="fa fa-twitter "></i></a></li>
                    <?php  }?>
                    <?php  if($crispy_options['portfolio-facebook'] == '1'){ ?>
                        <li><a href="JavaScript:newPopup('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>/&t=<?php the_title(); ?>');"><i class="fa fa-facebook "></i></a></li>
                    <?php  }?>
                </ul>
            </div>
        </div>
    <?php } ?>
</article><!-- #post-## -->

