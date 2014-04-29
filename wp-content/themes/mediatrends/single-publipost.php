<!DOCTYPE html>
<html>
	
<head>
	<?php

	$fb_like = types_render_field("fb_like", array("raw"=>"true")); 

	$tw_plugin = types_render_field("tw_plugin", array("raw"=>"true"));

	$analytics = types_render_field("analytics", array("raw"=>"true"));

	$link_campana = types_render_field("link-campana", array("raw"=>"true"));

	?>
	
	<style>
		@font-face {
		  font-family: 'Francois One';
		  font-style: normal;
		  font-weight: 400;
		  src: local('Francois One Regular'), local('FrancoisOne-Regular'), url(http://themes.googleusercontent.com/static/fonts/francoisone/v6/bYbkq2nU2TSx4SwFbz5sCOY5mlVXtdNkpsMpKkrDXP4.woff) format('woff');
		}
		body{
			margin: 0;
		}
		.content_publipost{
			width:100%;
			border-bottom:solid 1px #EB2025;
			border-top:solid 1px #EB2025;
		}
		.content_publipost .col{
			float: left;
			margin:5px 5px 3px;
			padding: 10px 5px 5px;
		}
		.content_publipost .col-r{
			float: right;
			padding: 10px 5px 0;
			font-family: 'Francois One';
			color: #ccc;
			font-size: 12px;
			font-weight: 600;
		}
		.content_publipost .col-r p{
			float: left;
			margin-right: 5px;
		}
		.content_publipost .col-r img{
			float: left;
		}
		.content_publipost .col #link_camp{
			border-right: 3px solid #FF2225;
			border-bottom: 3px solid #FF2225;
			color: #fff;
			background-color:#EB2025;
			display: block;
			padding: 2px 10px;
			font-size: 14px;
			font-family: 'Francois One';
			text-transform: uppercase;
			text-decoration: none;
			margin: -4px 0px 0px;
		}
		.content_publipost .clearfix{
			clear: both;
			display: table;
		}
	</style>
</head>

<body>
			
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="content_publipost">
			<div class="col">

				<div class="fb-like" data-href="<?php echo $fb_like; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>

			</div>
			<div class="col">

				<a href="<?php echo $tw_plugin; ?>" class="twitter-follow-button" data-dnt="true"></a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			</div>
			<div class="col">

				<a id="link_camp" href="<?php echo $link_campana; ?>" target="_blank">ver campaña</a>

			</div>
			<div class="col-r">
				<p>Power by</p><img src="http://mediatrends.cl/wp-content/themes/mediatrends/img/logo.png" alt="" width="50">
			</div>
			<div class="clearfix"></div>
		</div>
		
		
	<?php endwhile; // end of the loop. ?>


	<div id="fb-root"></div>

	<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=266876090132202";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?php echo $analytics; ?>', 'mediatrends.cl');
	  ga('send', 'pageview');

	</script>
</body>
</html>