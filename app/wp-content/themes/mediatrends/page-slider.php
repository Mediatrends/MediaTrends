<?php
/**
  Template Name: Page Slider
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package crispy
 */

get_header( 'slider' ); global $crispy_options; ?>
	<div id="home" class=""></div>
    <?php $agni_slides_post_id = get_post_meta($post->ID, 'page_footer_agni_sliders', true);
	
		foreach ( (array) $agni_slides_post_id as $key => $slider ) {
			agni_slider( $slider );
		}
	
	?>
	
	<header id="masthead" class="site-header" role="banner">
		<!-- Header -->
        <div class="header-menu-bg" data-bg-color="<?php  echo $crispy_options['header-background']['background-color']; ?>">
            <div id="header-menu" class="container">
                <div class="header-icon">
				<?php if(!empty($crispy_options['logo']['url'])){  ?>
                		<a href="<?php echo home_url(); ?>" class="logo-icon logo-text"><img src="<?php echo $crispy_options['logo']['url'] ?>" alt="<?php echo get_bloginfo("name"); ?>"></a><?php 
					}else{ ?>
						<a href="<?php echo home_url(); ?>" class="logo-text"><?php echo get_bloginfo("name"); ?></a>	
                <?php }  ?>
                </div>
                                                      
                <a href="#" class="toggle-nav-menu toggle-menu"><i class="icon ion-navicon"></i></a> 
                				
                <a href="#" class="header-search-toggle toggle-menu"><i class="icon ion-ios7-search-strong"></i></a>
                 
				<a href="#" class="social-toggle toggle-menu"><i class="icon ion-android-social"></i></a>					
				 
                
                <nav class="nav-menu page-scroll">                
				<?php 
                    if(has_nav_menu('primary')) {
                        wp_nav_menu(array( 'menu' => 'Primary Menu', 'menu_class' => 'nav-menu-content', 'menu_id' => 'navigation', 'container' => false, 'theme_location' => 'primary', 'walker' => ($crispy_options['onepage'] == '1')? new Agni_Walker_Nav_Menu( ) : '' ) ); 
                    }
                    else{
                        ?><a class="no-menu" href="#">You doesnt assign menu </a><?php			
                    }
                ?> 
                </nav>                        
            </div>   
            <div class="header-search">
				<div class="container">
					<form method="get" action="#" id="search"><input name="s" type="text" size="40" placeholder="Type & Hit Enter" /></form>
				</div>
			</div> 
            <div class="header-social container">
                <ul class="social-icons list-inline">
                    <?php if( $crispy_options['header-facebook'] == '1' ){ ?><li><a href="<?php echo $crispy_options['facebook-link'];?>"> <i class="fa fa-facebook"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-twitter'] == '1' ){ ?><li><a href="<?php echo $crispy_options['twitter-link'];?>"> <i class="fa fa-twitter"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-googleplus'] == '1' ){ ?><li><a href="<?php echo $crispy_options['googleplus-link'];?>"> <i class="fa fa-google-plus"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-behance'] == '1' ){ ?><li><a href="<?php echo $crispy_options['behance-link'];?>"> <i class="fa fa-behance"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-dribbble'] == '1' ){ ?><li><a href="<?php echo $crispy_options['dribbble-link'];?>"> <i class="fa fa-dribbble"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-flickr'] == '1' ){ ?><li><a href="<?php echo $crispy_options['flickr-link'];?>"> <i class="fa fa-flickr"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-linkedin'] == '1' ){ ?><li><a href="<?php echo $crispy_options['linkedin-link'];?>"> <i class="fa fa-linkedin"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-tumblr'] == '1' ){ ?><li><a href="<?php echo $crispy_options['tumblr-link'];?>"> <i class="fa fa-tumblr"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-instagram'] == '1' ){ ?><li><a href="<?php echo $crispy_options['instagram-link'];?>"> <i class="fa fa-instagram"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-pinterest'] == '1' ){ ?><li><a href="<?php echo $crispy_options['pinterest-link'];?>"> <i class="fa fa-pinterest"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-github'] == '1' ){ ?><li><a href="<?php echo $crispy_options['github-link'];?>"> <i class="fa fa-github"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-stackoverflow'] == '1' ){ ?><li><a href="<?php echo $crispy_options['stackoverflow-link'];?>"> <i class="fa fa-stack-overflow"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-skype'] == '1' ){ ?><li><a href="<?php echo $crispy_options['skype-link'];?>"> <i class="fa fa-skype"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-youtube'] == '1' ){ ?><li><a href="<?php echo $crispy_options['youtube-link'];?>"> <i class="fa fa-youtube"></i></a></li><?php } ?>
                    <?php if( $crispy_options['header-vimeo'] == '1' ){ ?><li><a href="<?php echo $crispy_options['vimeo-link'];?>"> <i class="fa fa-vimeo-square"></i></a></li><?php } ?>
                </ul>
            </div>	
            <nav class="tab-nav-menu page-scroll"> 
                <div class="tab-nav-menu-container">               
                <?php 
                    if(has_nav_menu('primary')) {
                        wp_nav_menu(array( 'menu' => 'Primary Menu', 'menu_class' => 'tab-nav-menu-content', 'menu_id' => 'tab-navigation', 'container' => false, 'theme_location' => 'primary', 'walker' => ($crispy_options['onepage'] == '1')? new Agni_Walker_Nav_Menu( ) : '' ) ); 
                    }
                    else{
                        ?><a href="#">You doesnt assign menu </a><?php	 			
                    }
                ?> 
                </div>
            </nav>
        </div>
		
		
		
        <div class="spacer"></div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

    
	<?php $home_slides_post_id = get_post_meta($post->ID, 'page_footer_home_sliders', true);
	
		foreach ( (array) $home_slides_post_id as $key => $slider ) {
			home_slider( $slider );
		}
	
	?>
	
    <?php echo agni_page_header( $post ); ?>
	<div id="primary" class="content-area page page-slider">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'pageno' ); ?>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    
    <?php echo agni_contact_section( $post ); ?>
    
<?php get_footer(); ?>
