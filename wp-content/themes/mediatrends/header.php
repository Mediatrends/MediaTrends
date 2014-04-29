<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package mediatrends
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/less/jquery.sidr.dark.css">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  var pluginUrl = 
 '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  _gaq.push(['_setAccount', 'UA-45276685-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--ads google doubleclick-->
<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') +
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>
 
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/20099485/ballantines', [300, 250], 'div-gpt-ad-1398381682992-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
</head>

<body data-spy="scroll" data-target="#nav" <?php body_class(); ?>>
<div id="page" class="container hfeed site hide">
	<div class="col-md-12 col-no-padding">
	<?php do_action( 'before' ); ?>

	<header id="header" class="row header affix hidden-sm hidden-xs">
		
		<div id="ads_cont" class="hide text-center">
			<?php query_posts('cat=3'); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					the_content();
				?>

			<?php endwhile; wp_reset_query(); ?>
		</div>

		<div id="cont_nav" class="col-md-12 text-center">
			<div class="row">
				
				<div class="col-md-6">
					<ul class="list-inline text-center redes">
						<li><a href="https://www.facebook.com/mediatrendscl" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/icon_fb.gif" alt="Facebook"></a></li>
						<li><a href="https://twitter.com/mediatrendscl" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/icon_tw.gif" alt="Twitter"></a></li>
						<li><a href="#contacto" target="_blank" onClick="_gaq.push(['_trackEvent', 'Pages', 'Contacto', 'contacto']);" class="btn_contac"><img src="<?php bloginfo('template_directory');?>/img/icon_mail.gif" alt="Twitter"></a></li>
					</ul>
				</div>
				<div class="col-md-6">
					<div id="view_camp" class="btn_camp text-center">
						<span>VIEW LAST CAMPAING</span>
						<img src="<?php bloginfo('template_directory');?>/img/icon_dep.gif" alt="">
					</div>
				</div>

			</div>
			<ul id="nav" class="row list-inline menu">
				<li><a href="#about" onClick="_gaq.push(['_trackEvent', 'Pages', 'About', 'about']);">ABOUT</a></li>
				<li><a href="#products_service" onClick="_gaq.push(['_trackEvent', 'Pages', 'Advertising Specs', 'advertising_specs']);">ADVERTISING SPECS</a></li>
				<li class="no_effect"><a href="#home" onClick="_gaq.push(['_trackEvent', 'Pages', 'Home', 'home']);"><img src="<?php bloginfo('template_directory');?>/img/logo.png" alt="Media Trends"></a></li>
				<li><a href="#campaigns" onClick="_gaq.push(['_trackEvent', 'Pages', 'Campaigns', 'campaigns']);">CAMPAIGNS</a></li>
				<li><a href="#advertisers" onClick="_gaq.push(['_trackEvent', 'Pages', 'Advertisers', 'advertisers']);">ADVERTISERS</a></li>
			</ul>
		</div>

	</header>
	<header id="resp_menu" class="affix hidden-lg hidden-md">
		<div class="row">
			<div class="col-xs-4">
				
				<a href="#home"><img src="<?php bloginfo('template_directory');?>/img/logo.png" alt="Media Trens" class="img-responsive"></a>

			</div>
			<div class="col-xs-8">
				<a id="simple-menu" href="#sidr" class="text-right">
					<img src="<?php bloginfo('template_directory');?>/img/icon_menu.gif" alt="Menu">
				</a>	
			</div>
		</div>
	</header>
 
	<div id="sidr">
	  <ul id="nav2">
	    <li><a href="#about">ABOUT</a></li>
		<li><a href="#advertisers">ADVERTISERS</a></li>
		<li><a href="#contacto">CONTACTO</a></li>
	  </ul>
	</div>

	<div id="content" class="row site-content text-center">