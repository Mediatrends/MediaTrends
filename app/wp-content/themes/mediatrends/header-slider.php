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
	