$(window).load(function(){
	$('#page, footer').delay(1000).fadeIn('slow', function(){
		$('.cont_index').delay(500).animate({
			top:100,
			opacity:1
		}, 500);
	}
	);
});
$(document).ready(function(){

	$('#view_camp').click(function(){
		$('#ads_cont').toggle('slow');
	});

	$('#header').affix({
		offset: {
		top: 5
		}
	});

    var offsetHeight = 230;

	$('body').scrollspy({
	    offset: offsetHeight
	});

	$('body #nav li a, .btn_contac').click(function (event) {
	    var scrollPos = $('body > .container').find($(this).attr('href')).offset().top - offsetHeight;
	    $('body,html').animate({
	        scrollTop: scrollPos
	    }, 1500);
	    return false;
	});

	$('body #nav2 li a').click(function (event) {
	    var scrollPos = $('body > .container').find($(this).attr('href')).offset().top - 60;
	    $('body,html').animate({
	        scrollTop: scrollPos
	    }, 1500);
	    return false;
	});

	$('#simple-menu').sidr({
		side: 'right'
	});

	var controller = $.superscrollorama();
    // individual element tween examples
    controller.addTween(800, TweenMax.from( $('.fadein'), .5, {css:{opacity: 0}}));
    controller.addTween(1200, TweenMax.from( $('.fadein2'), .5, {css:{opacity: 0}}));
    controller.addTween('.cont_adv', TweenMax.from( $('.fadein3'), .5, {css:{opacity: 0}}));

    controller.addTween(950, TweenMax.from( $('.fly-it'), .25, {css:{right:'1000px'}, ease:Quad.easeInOut}));
    controller.addTween(920, TweenMax.from( $('.fly-it2'), .25, {css:{right:'1500px'}, ease:Quad.easeInOut}));
    controller.addTween(920, TweenMax.from( $('.fly-it3'), .25, {css:{left:'2000px'}, ease:Quad.easeInOut}));
    controller.addTween(950, TweenMax.from( $('.fly-it4'), .25, {css:{left:'2500px'}, ease:Quad.easeInOut}));

    controller.addTween(1800, TweenMax.from( $('.spin-it'), .25, {css:{opacity:0, rotation: 300}, ease:Quad.easeOut}, 1300));
    controller.addTween(2500, TweenMax.from( $('.spin-it2'), .25, {css:{opacity:0, rotation: 300}, ease:Quad.easeOut}, 1300));
});