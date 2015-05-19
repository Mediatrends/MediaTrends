<?php 

function crispy_options(){
	global $crispy_options;
	
	
		echo '<style type="text/css"> 
			.admin-bar .header-sticky{
				top:32px;	
			}
		
		</style>';
	
	
	if( $crispy_options['sticky-header'] == '0' ){
		echo '<style type="text/css"> 
			.header-sticky{
				position:absolute;	
			}
		
		</style>';	
	}
	
	
	echo '<style type="text/css">
	
		
			/* Accent 1 */
		.btn-default , .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus, .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus, .panel-default > .panel-heading a, .panel-primary > .panel-heading a.collapsed, .header-search-toggle, .header-search-toggle:hover,  .portfolio-share-icon, .portfolio-share a:hover, .portfolio-share a:active, .portfolio-share a:focus, .post-tag-icon , .post-tag-icon a, .post-share a:hover, .post-share a:active, .post-share a:focus , .modern-link-hover, .page-navigation a:hover, .social-icons a:hover, .social-icons a:active, .social-icons a:focus, .comingsoon .subscribe-form .subscribe-submit, section i  {
			color:'.$crispy_options['color-1'].';
		}
		
		.btn-primary , .nav .open > a, .nav .open > a:hover, .nav .open > a:focus , .panel-primary > .panel-heading a, .back-to-top a , .nav-dots span , .owl-theme .owl-controls .owl-buttons div, .owl-theme .owl-controls .owl-page span, .nav-menu-content li >a.active, ul.nav-menu-content ul a:hover, .nav-menu-content ul ul a:hover, .toggle-nav-menu, .toggle-nav-menu:hover, .social-toggle, .fancy-line-inverse, .portfolio-filter .active, .portfolio-share a, .portfolio-navigation, .post_date, .post-share-icon, .post-navigation, .post-category-icon, .post-share a, .page-navigation a, .search-form .search-submit, .tagcloud a:hover, .pricing-top, .footer-bar .fancy-line-small, .footer-bar .search-form .search-submit, .footer-bar .tagcloud a:hover, .social-icons a, .dropcap-box, .dropcap-circle {
			background-color:'.$crispy_options['color-1'].';
		}
		
		.tagcloud a:hover, .footer-bar .tagcloud a:hover {
			border-color:'.$crispy_options['color-1'].';
		}
		
		.panel-primary > .panel-heading + .panel-collapse .panel-body {
		  border-top-color: '.$crispy_options['color-1'].';
		}
		.panel-primary > .panel-footer + .panel-collapse .panel-body {
		  border-bottom-color: '.$crispy_options['color-1'].';
		}
		
		/* Accent 2 */
		
		a , .btn-primary , .btn-link:hover, .btn-link:focus, .panel-default > .panel-heading a.collapsed, .panel-primary > .panel-heading a,  .back-to-top a, .text_slide h1 span, .video-background-controls button, .header-icon .logo-text , .nav-menu-content li >a:hover , .nav-menu-content li.current-menu-item > a, .nav-menu-content li ul li.current-menu-item > a, ul.nav-menu-content ul a:hover, .nav-menu-content li > a.active , .nav-menu-content ul ul a:hover, .tab-nav-menu a:hover, .tab-nav-menu a:active, .tab-nav-menu a:focus, .toggle-nav-menu, .toggle-nav-menu:hover, .toggle-nav-menu:active, .toggle-nav-menu:focus, .social-toggle, .social-toggle:hover, .social-toggle:active, .social-toggle:focus, section i:hover, .milestone .count, .portfolio-filter a:hover, .portfolio-filter .active, .portfolio-thumbnail-content a i, .portfolio-share a, .portfolio-controls i, .portfolio-close i, .portfolio-controls li:after, .member-link li:after, .member-link  i, .post-category-icon, .blog-controls li:after, .quote-symbol i, .required-alert li, .address-line a i, #countdown h1 , .dropcap-box , .dropcap-circle , .list-icon i, .big-number, .post-navigation, .post_date, .post-share-icon, .owl-theme .owl-controls .owl-buttons div, .owl-theme .owl-controls .owl-page span.owl-numbers{
			color:'.$crispy_options['color-2'].';
		}
		
		.btn-default, .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus, .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus, .header-search-toggle, .progress-bar, .panel-default > .panel-heading a, .fancy-line, .portfolio-share-icon, .portfolio-share a:hover, .portfolio-share a:active, .portfolio-share a:focus, .post-tag-icon , .post-share a:hover, .post-share a:active, .post-share a:focus, .modern-date-hover, .page-navigation a:hover, .fancy-line-small, .pricing-recommanded, .social-icons a:hover, .social-icons a:active, .social-icons a:focus, .comingsoon .subscribe-form .subscribe-submit, .white .owl-theme .owl-controls .owl-page span, .bx-wrapper .bx-pager.bx-default-pager a {
			background-color:'.$crispy_options['color-2'].';
		}
		
		blockquote , .blockquote-reverse, blockquote.pull-right, .nav-menu-content .sub-menu, .nav-menu-content .children, .comingsoon .subscribe-form {
			border-color:'.$crispy_options['color-2'].';
		}
		
		
		/* Default color  */
		
		body, .default-typo{
			color:'.$crispy_options['color-4'].'; 
		}
		
		/* primary color */
		
		h1, h2,h3,h4,h5,h6, .btn-link , .portfolio-filter a, #wp-calendar > thead > tr > th, #wp-calendar caption , .address-line i, .address-line i:hover {
			color:'.$crispy_options['color-3'].';
		}
		
		
		/*
		.section-bg-color{
			background-color:#f3f3f3;
		}
		*/
		
		.portfolio-nav-external{
			background-color:transparent;	
		}
		
		.comingsoon-logo{
			background:none !important;
		}
		</style>';
	
	//custom css
	if(!empty($crispy_options["css-code"])){
		echo '<style type="text/css">' . $crispy_options["css-code"] . '</style>';
	}
	
	//custom js
	if(!empty($crispy_options["js-code"])){
		echo '<script>' . $crispy_options["js-code"] . '</script>';
	}
	
	
}
add_action( 'wp_head', 'crispy_options' );

?>