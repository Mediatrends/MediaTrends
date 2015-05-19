// JavaScript Document

(function($) {
  "use strict";

	// makes sure the whole site is loaded

	$(window).load(function() {
		// will first fade out the loading animation
		$("#status").fadeOut();
		// will fade out the whole DIV that covers the website.
		$("#preloader").delay(500).fadeOut("slow");
		
		
		
		
	})
	

	$(document).ready(function(){
		
		if($(window).width() < 1024){
			$("div").removeClass('animate');
		}
		
			
		var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
		var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
		var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
		var is_safari = navigator.userAgent.indexOf("Safari") > -1;
		var is_opera = navigator.userAgent.indexOf("Presto") > -1;
		if ((is_chrome)&&(is_safari)) {is_safari=false;}
		
		if( is_safari ){
			$('body').addClass('safari');	
		}
		else if( is_explorer ){
			$('body').addClass('ie');
		}
		else if( is_firefox ){
			$('body').addClass('firefox');	
		}
		else if( is_opera ){
			$('body').addClass('opera');	
		}
		else {
			$('body').addClass('chrome');
		}
		
		
		// back to top	
		
		$('.back-to-top').fadeOut(duration);
		var offset = 220;
		var duration = 1000;
		$(window).scroll(function() {
			if ($(this).scrollTop() > offset) {
				$('.back-to-top').fadeIn(duration);
			} else {
				$('.back-to-top').fadeOut(duration);
			}
		});
		
		$('.back-to-top').click(function(event) {
			event.preventDefault();
			$('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
		
		
		// parallax	
		
		$('.parallax').parallax("50%", 0.3);
			
		
		if( $('.slides, .image_slides, .text_slides').width() ){
			
			// super slider
			var $slideshow_duration = $('.slides').attr('data-duration');
			var $slideshow_animation = $('.slides').attr('data-animation');
			
			var $slides = $('.slides, .image_slides, .text_slides' );
			
			Hammer($slides[0]).on("swipeleft", function(e) {
				$slides.data('superslides').animate('next');
			});

			Hammer($slides[0]).on("swiperight", function(e) {
				$slides.data('superslides').animate('prev');
			});
			
			var $textslider_duration = $('.text_slides').attr('data-duration');
			var $textslider_animation = $('.text_slides').attr('data-animation');
			
			
			$('.text_slides').superslides({
				animation: $textslider_animation,
				pagination:false,
				play: $textslider_duration
			});
				
			var $imageslider_duration = $('.image_slides').attr('data-duration');
			var $imageslider_animation = $('.image_slides').attr('data-animation');
			
			$('.image_slides').superslides({
				animation: $imageslider_animation,
				pagination:false,
				play: $imageslider_duration ,
			});	

			$('.slides').superslides({
				animation: $slideshow_animation,
				pagination:false,
				play: $slideshow_duration ,
			});
			
		}
		if( $('.video_background').width() ){
			
			// Video bg
			
			$('.video_background').superslides();
			$(".player").mb_YTPlayer({
						
			});
			$('.command-play').click(function(event) {
				event.preventDefault();
				$("#bgndVideo").playYTP();
			})
			$('.command-pause').click(function(event) {
				event.preventDefault();
				$("#bgndVideo").pauseYTP();
			})
			$('.command-vol').click(function(event) {
				event.preventDefault();
				$("#bgndVideo").toggleVolume();
			})
			
		}
		
		if( $('.slit-slider').width() ){
		
			//slit slider
			
			var Page = (function() {
				$( '#nav-dots > span:first-child' ).addClass( 'active' );
				var $nav = $( '#nav-dots > span' ),
					slitslider = $( '#slit_slides' ).slitslider( {
						onBeforeChange : function( slide, pos ) {

							$nav.removeClass( 'active' );
							$nav.eq( pos ).addClass( 'active' );

						}
					} ),

					init = function() {

						initEvents();
						
					},
					initEvents = function() {

						$nav.each( function( i ) {
						
							$( this ).on( 'click', function( event ) {
								
								var $dot = $( this );
								
								if( !slitslider.isActive() ) {

									$nav.removeClass( 'active' );
									$dot.addClass( 'active' );
								
								}
								
								slitslider.jump( i + 1 );
								return false;
							
							} );
							
						} );

					};

					return { init : init };

			})();

			Page.init();
		}
		
		// bxslider
		
		$(".slider").bxSlider({
			auto : true,	
			
		});
		
		
		// Sticky Header
		
		if( $('.slides, .image_slides, .text_slides, .video_background').width() ){
			var offset = $(window).height();
			$(window).scroll(function() {
				
				if ($(this).scrollTop() < offset) {
					$('.header-menu-bg').removeClass('header-sticky');
				} 
				else{
					$('.header-menu-bg').addClass('header-sticky');
				}
			});
		}
		else{
			$('.header-menu-bg').addClass('header-sticky');
		}
		
		
		// tab-nav-menu
		
		$('.toggle-nav-menu').click(function(m){
			m.preventDefault();
			if ( $('.tab-nav-menu-content').is(':hidden') ) {		
				$('.tab-nav-menu-content').slideDown(400);
			}
			else{
				$('.tab-nav-menu-content').slideUp(400);	
			}
					
		});
		$('.tp-leftarrow').add("<i></i>");
		$('.tab-nav-menu-content .menu-item-has-children a').append("<a class=indicator href=#><i></i></a>");
		
		$('.tab-nav-menu-content .menu-item-has-children >a .indicator i').addClass("fa fa-angle-down");
		
		$('.tab-nav-menu-content .menu-item-has-children a.indicator').click(function(m){
			m.preventDefault();
			if ( $(this).parent(' a ').parent(' li ').children('.sub-menu').is(':hidden')  ) {		
				$(this).parent(' a ').parent(' li ').children('.sub-menu').slideDown(400);
			}
			else
			{
				$(this).parent(' a ').parent(' li ').children('.sub-menu').slideUp(400);
			}		
			
		});	
		
		
		
		// header Search, social, category, tag & share icons 
		
		$('.header-search-toggle').click(function(e){
			e.preventDefault();
			if ( $('.header-search').is(':hidden') ) {		
				$('.header-search').slideDown(300);
			}
			else{
				$('.header-search').slideUp(300);	
			}
					
		});
		
		$('.social-toggle').click(function(e){
			e.preventDefault();
			if ( $('.header-social').is(':hidden') ) {		
				$('.header-social').fadeIn();
			}
			else{
				$('.header-social').fadeOut();	
			}
					
		});
			
		$('.post-category-icon').click(function(e){
			e.preventDefault();
			if ( $(this).parent().parent().siblings().children().children('.post-category').is(':hidden') ) {		
				$(this).parent().parent().siblings().children().children('.post-category').fadeIn();
			}
			else{
				$(this).parent().parent().siblings().children().children('.post-category').fadeOut();	
			}
					
		});
		$('.post-tag-icon').click(function(e){
			e.preventDefault();
			if ( $(this).parent().parent().siblings().children().children('.post-tag').is(':hidden') ) {		
				$(this).parent().parent().siblings().children().children('.post-tag').fadeIn();
			}
			else{
				$(this).parent().parent().siblings().children().children('.post-tag').fadeOut();	
			}
					
		});
		$('.post-share-icon').click(function(e){
			e.preventDefault();
			if ( $(this).parent().parent().siblings().children('.post-share').is(':hidden') ) {		
				$(this).parent().parent().siblings().children('.post-share').fadeIn();
			}
			else{
				$(this).parent().parent().siblings().children('.post-share').fadeOut();	
			}
					
		});	
		
		
		
		$(".portfolio-video, .post-video").fitVids();	
		
		$('.portfolio-share-icon').click(function(e){
			e.preventDefault();
			if ( $('.portfolio-share').is(':hidden') ) {		
				$('.portfolio-share').fadeIn();
			}
			else{
				$('.portfolio-share').fadeOut();	
			}
					
		});	
		
		
		// tablet menu
		
		$(".nav-menu-content a").click(function(e){
			
			$(this).addClass('active');
			$(this).parent().siblings().find('a').removeClass('active');
		});

		
		// page scroll
		
		$('.page-scroll a').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top -80
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});

		 /**
		 * This part handles the highlighting functionality.
		 * We use the scroll functionality again, some array creation and 
		 * manipulation, class adding and class removing, and conditional testing
		 */
		var aChildren = $("nav li").children(); // find the a children of the list items
		var aArray = []; // create the empty aArray
		for (var i=0; i < aChildren.length; i++) {    
			var aChild = aChildren[i];
			var ahref = $(aChild).attr('href');
			aArray.push(ahref);
		} // this for loop fills the aArray with attribute href values

		$(window).scroll(function(){
			var windowPos = $(window).scrollTop()+85; // get the offset of the window from the top of page
			var windowHeight = $(window).height(); // get the height of the window
			var docHeight = $(document).height();

			for (var i=0; i < aArray.length; i++) {
				var theID = aArray[i];	
				
				var divPosid = $(theID);
				if (!divPosid.length) {
					return;
				}
				var divPos = divPosid.offset().top; // get the offset of the div from the top of page
				
				var divHeight = $(theID).height(); // get the height of the div in question
				if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
					$("a[href='" + theID + "']").addClass("active");
				} else {
					$("a[href='" + theID + "']").removeClass("active");
				}
			}

			if(windowPos + windowHeight == docHeight) {
				if (!$("nav li:last-child a").hasClass("active")) {
					var navActiveCurrent = $(".active").attr("href");
					$("a[href='" + navActiveCurrent + "']").removeClass("active");
					$("nav li:last-child a").addClass("active");
				}
			}
		});
		
		
		// initialize Isotope
		if( $('.portfolio-masonry').width() ){
			var $portfolio_container = $('.portfolio-masonry').isotope({
				itemSelector: '.portfolio-thumbnail',
				masonry: {
					columnWidth: 277.5,
					gutter:10,
				}
			});		
			$portfolio_container.imagesLoaded(function() {
				$portfolio_container.isotope('layout');
			});
		}
		
		
		// filter	

		$("#filters a").click(function(e){
			e.preventDefault();
			$(this).addClass('active');
			$(this).parent().siblings().find('a').removeClass('active');
		});
		
		var $portfolio_container = $('.portfolio-page');
		
		// filter items when filter link is clicked
		$('.filter a').click(function(){
			
			var selector = $(this).attr('data-filter');
			$portfolio_container.isotope({ 
				itemSelector: 'article.portfolio-thumbnail',
				filter: selector,
				
			});
			return false;  
		});
		
		
		// prettyphoto
		
		$("a[data-rel^='prettyPhoto']").prettyPhoto();	
		
		
		// Portfolio Single View

		/*$('.portfolio-page-single').on('click','.portfolio-read-more',function(event){
			event.preventDefault();

			var link = $(this).data('single_url');
			var full_url = '#portfolio-single-wrap',
				parts = full_url.split("#"),
				trgt = parts[1],
				target_top = $("#"+trgt).offset().top -80;

			$('html, body').animate({scrollTop:target_top}, 1200);
			$('#portfolio-single').slideUp(1000, function(){
				$(this).load(link,function(){
					$(this).slideDown(1000);
				});
			});
		});

		// Close Portfolio Single View
		
		$('#portfolio-single-wrap').on('click','.close-portfolio-item',function(){
			var full_url = '#works',
				parts = full_url.split("#"),
				trgt = parts[1],
				target_offset = $("#"+trgt).offset(),
				target_top = target_offset.top -80;

			$('html, body').animate({scrollTop:target_top}, 1400);

			$("#portfolio-single").slideUp(1000);
		});
		
		*/
		
		// carousel clients
		
		var owl = $("#carousel-clients");
		owl.owlCarousel({
			autoPlay : 4000,
			items : 6, //10 items above 1000px browser width
		
		});
		
		// carousel team
		
		/*var owl = $("#carousel-team");
		owl.owlCarousel({
			autoPlay : 5000,
			items : 4, //10 items above 1000px browser width
		
		});*/
		
		$("#carousel-testimonials").owlCarousel({
			autoPlay : 6000,
			slideSpeed : 700,
			paginationSpeed : 400,
			singleItem:true,
		});
		
		
		
		//	Blog hover
		
		$('.post-content-container').hover(
			function(){
				$(this).siblings('.post-thumbnail').children('.post-thumbnail-overlay').addClass( 'modern-overlay-hover' );//css({'background-color':'rgba(46,61,80,1)'});
				$(this).children('.post-inner').children('.post-content').children('.post_date').addClass( 'modern-date-hover' );//css({'background-color':'#1bbc9b'});
				$(this).children('.post-inner').children('.post-content').children('.post_date').children('a').addClass( 'modern-link-hover' );//css({'color':'#2e3d50'});
			},
			function(){
				$(this).siblings('.post-thumbnail').children('.post-thumbnail-overlay').removeClass( 'modern-overlay-hover' ); //css({'background-color':'rgba(46,61,80,0)'});
				$(this).children('.post-inner').children('.post-content').children('.post_date').removeClass( 'modern-date-hover' );//css({'background-color':'#2e3d50'});
				$(this).children('.post-inner').children('.post-content').children('.post_date').children('a').removeClass( 'modern-link-hover' );//css({'color':'#1bbc9b'});
			}
		)
		if( $('.blog-masonry').width() ){
			var $container = $('.blog-masonry').imagesLoaded( function() {
				$container.isotope({
					itemSelector: '.blog-content',
					layoutMode: 'masonry',
				});
			});
		}
		
		
		// widget
		$( '.widget-area li a:first-child' ).prepend( '<i class="icon ion-ios7-checkmark-empty"></i>' );
		
		if( $( '#countdown' ).width() ){ 
			// Coming Soon
			var $date = $( '#countdown' ).attr( 'data-counter' );		
			$("#countdown").countdown({
				date: $date, // add the countdown's end date (i.e. 3 november 2012 12:00:00)
				format: "on" // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
			},
			
			function() { 
				
				// the code here will run when the countdown ends
				alert("done!") 
	
			});
		}
		// Animate
		
		$('.animate').each(function () {
			$(this).one('inview', function (e) {
				$(this).addClass('animated').css('visibility', 'visible');
			});
		});
		
		
		
		if( $('#map_canvas').width() ){
		
			// google map
			var template_url = $( '#map_canvas' ).attr( 'data-dir' );
			var get_lat = $( '#map_canvas' ).attr( 'data-lat' );
			var get_lng = $( '#map_canvas' ).attr( 'data-lng' );
			var get_add1 =$( '#map_canvas' ).attr( 'data-add1' );
			var get_add2 =$( '#map_canvas' ).attr( 'data-add2' );
			var get_add3 =$( '#map_canvas' ).attr( 'data-add3' );
			
			var lat=get_lat;   // Latitude of location
			var lang=get_lng;  // Longitude  of location
			var desc='<div>'+
						  '<h6>'+get_add1+'</h6>'+
						  '<p>'+get_add2+'</p>'+
						  '<p>'+get_add3+'</p>'+
					 '</div>';
			var showImage=template_url+'/img/marker.png';
			var imageTitle=get_add1;
			var divId='map_canvas';
			initializeMap(lat,lang,desc,showImage,imageTitle,divId);
						
		}
		
	});


})(jQuery);
