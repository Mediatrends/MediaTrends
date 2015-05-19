<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package crispy
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<div class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</div><!-- #secondary -->
