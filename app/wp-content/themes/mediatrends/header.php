<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package crispy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php global $crispy_options; if(!empty($crispy_options['favicon'])) { ?>
    <link rel="shortcut icon" href="<?php echo $crispy_options['favicon']['url']; ?>" >
<?php } ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mediatrends.css">
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="back-to-top"><a href="#back-to-top"><i class="icon ion-ios7-arrow-thin-up"></i></a></div> 
	
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
