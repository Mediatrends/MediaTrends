<?php
/**
   Template Name: Coming Soon
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package crispy
 */

get_header( 'slider' ); ?>
	<?php global $crispy_options; ?>
	<!-- Header -->
		<div class="header-menu-bg comingsoon-logo">
            <div id="header-menu" class="container">
                <div class="header-icon">
                	<?php if(!empty($crispy_options['logo']['url'])){  ?>
                            <a href="<?php echo home_url(); ?>" class="logo-icon logo-text"><img src="<?php echo $crispy_options['logo']['url'] ?>" alt="<?php echo get_bloginfo("name"); ?>"></a><?php 
                        }else{ ?>
                            <a href="<?php echo home_url(); ?>" class="logo-text"><?php echo get_bloginfo("name"); ?></a>	
                    <?php }  ?>
                </div>
            </div>    
        </div>	
        <div id="content" class="site-content">	
		
		<!-- Page header -->
		<div class="page-header white comingsoon">  <!-- Header Image  -->
			<div class="page-header-container container">
				<div class="page-header-content">
					<!-- News Letter --> 
					<h1><?php echo $crispy_options['cs-newsletter-title']; ?></h1>
					<div class="fancy-line"></div>
					<p><?php echo $crispy_options['cs-newsletter-desc']; ?></p> 
					<div id="subscribe-form" class="subscribe-form" >
						<?php echo do_shortcode( $crispy_options['cs-mailpoet'] );?>	   
					</div>
				</div>
			</div>
		</div>
		
		<section class="Counter container">
			<div class="row">
				<div class="col-md-6  text-center countdown-half">
					<ul id="countdown" class="list-inline" data-counter="<?php echo $crispy_options['cs-deadline'];?>" >
						<li class="col-md-3 margin-30">
							<h1 class="days">00</h1>
							<p class="timeRefDays">days</p>
						</li>
						<li class="col-md-3 margin-30">
							<h1 class="hours">00</h1>
							<p class="timeRefHours">hours</p>
						</li>
						<li class="col-md-3 margin-30">
							<h1 class="minutes">00</h1>
							<p class="timeRefMinutes">minutes</p>
						</li>
						<li class="col-md-3 margin-30">
							<h1 class="seconds">00</h1>
							<p class="timeRefSeconds">seconds</p>
						</li>
					</ul>
				</div>
				<div class="col-md-6 contact-half ">
					<div class="row">
						<div class="col-md-6 text-center margin-65">
                        	<i class="<?php echo $crispy_options['cs-info-icon1']; ?> large-icon"></i><p><?php echo $crispy_options['cs-info-text1']; ?></p>
						</div>
						<div class="col-md-6 text-center margin-65">
							<i class="<?php echo $crispy_options['cs-info-icon2']; ?> large-icon"></i><p><?php echo $crispy_options['cs-info-text2']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>	
<?php get_footer(); ?>
