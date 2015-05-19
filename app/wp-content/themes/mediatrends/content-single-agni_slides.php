<?php
/**
 * @package crispy
 */
?>

<?php global $crispy_options; ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php agni_slider( $post->ID ); ?>
   
</article><!-- #post-## -->

