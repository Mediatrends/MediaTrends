<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package mediatrends
 */
?>

    	</div><!-- #content -->

    	<footer id="colophon" class="site-footer row text-center hide" role="contentinfo">
    		<!--div class="site-info">
    			<?php do_action( 'mediatrends_credits' ); ?>
    			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'mediatrends' ), 'WordPress' ); ?></a>
    			<span class="sep"> | </span>
    			<?php printf( __( 'Theme: %1$s by %2$s.', 'mediatrends' ), 'mediatrends', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
    		</div--><!-- .site-info -->
    	</footer><!-- #colophon -->
    </div>
</div><!-- #page -->

<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.sidr.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/greensock/TweenMax.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.superscrollorama.js"></script>
<script src="<?php bloginfo('template_directory')?>/js/main.js"></script>
<!--?php wp_footer(); ?-->

</body>
</html>