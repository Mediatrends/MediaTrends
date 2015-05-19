<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package crispy
 */
?>

<?php global $crispy_options; ?>

	</div><!-- #content -->

	<!-- footer -->
    <div id="footer-area" class="footer-bg <?php if( $crispy_options['footer-widget'] != '1' ){ echo 'text-center'; } ?> ">
        <div class="footer container">
        
        	
        
        	<?php if( $crispy_options['footer-widget'] == '1' ){ ?>
				<div class="footer-bar widget-area">
					<div class="row">
						<?php echo dynamic_sidebar( 'footerbar-1' ); ?>			
					</div>
				</div>
				
			<?php }
			else{
        
				if(!empty($crispy_options['footer-logo']['url'])){  ?>
				<a href="<?php echo home_url(); ?>" ><img src="<?php echo $crispy_options['footer-logo']['url'] ?>" alt="<?php echo get_bloginfo("name"); ?>" /></a>
				<?php }  ?>
				<ul class="social-icons list-inline">
					<?php if( $crispy_options['footer-facebook'] == '1' ){ ?><li><a href="<?php echo $crispy_options['facebook-link'];?>"> <i class="fa fa-facebook"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-twitter'] == '1' ){ ?><li><a href="<?php echo $crispy_options['twitter-link'];?>"> <i class="fa fa-twitter"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-googleplus'] == '1' ){ ?><li><a href="<?php echo $crispy_options['googleplus-link'];?>"> <i class="fa fa-google-plus"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-behance'] == '1' ){ ?><li><a href="<?php echo $crispy_options['behance-link'];?>"> <i class="fa fa-behance"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-dribbble'] == '1' ){ ?><li><a href="<?php echo $crispy_options['dribbble-link'];?>"> <i class="fa fa-dribbble"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-flickr'] == '1' ){ ?><li><a href="<?php echo $crispy_options['flickr-link'];?>"> <i class="fa fa-flickr"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-linkedin'] == '1' ){ ?><li><a href="<?php echo $crispy_options['linkedin-link'];?>"> <i class="fa fa-linkedin"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-tumblr'] == '1' ){ ?><li><a href="<?php echo $crispy_options['tumblr-link'];?>"> <i class="fa fa-tumblr"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-instagram'] == '1' ){ ?><li><a href="<?php echo $crispy_options['instagram-link'];?>"> <i class="fa fa-instagram"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-pinterest'] == '1' ){ ?><li><a href="<?php echo $crispy_options['pinterest-link'];?>"> <i class="fa fa-pinterest"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-github'] == '1' ){ ?><li><a href="<?php echo $crispy_options['github-link'];?>"> <i class="fa fa-github"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-stackoverflow'] == '1' ){ ?><li><a href="<?php echo $crispy_options['stackoverflow-link'];?>"> <i class="fa fa-stack-overflow"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-skype'] == '1' ){ ?><li><a href="<?php echo $crispy_options['skype-link'];?>"> <i class="fa fa-skype"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-youtube'] == '1' ){ ?><li><a href="<?php echo $crispy_options['youtube-link'];?>"> <i class="fa fa-youtube"></i></a></li><?php } ?>
						<?php if( $crispy_options['footer-vimeo'] == '1' ){ ?><li><a href="<?php echo $crispy_options['vimeo-link'];?>"> <i class="fa fa-vimeo-square"></i></a></li><?php } ?>
				</ul>
            <?php } ?>
            <footer id="colophon" class="footer-colophon text-center col-md-8 col-md-offset-2">
                <p class="site-info"><?php echo $crispy_options['footer-text'];?></p>
            </footer>
        </div>
    </div>
    
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div id="spinningSquaresG">
                <div id="spinningSquaresG_1" class="spinningSquaresG"></div>
                <div id="spinningSquaresG_2" class="spinningSquaresG"></div>
                <div id="spinningSquaresG_3" class="spinningSquaresG"></div>
                <div id="spinningSquaresG_4" class="spinningSquaresG"></div>
            </div>
        </div>				
    </div>

</div><!-- #page -->

<?php if(!empty( $crispy_options['analytics-tracking-code'] ) ) { echo '<script>'.$crispy_options['analytics-tracking-code'].'</script>'; }?>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/mediatrends.min.js"></script>
</body>
</html>
