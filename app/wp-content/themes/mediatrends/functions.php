<?php
/**
 * crispy functions and definitions
 *
 * @package crispy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'crispy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crispy_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on crispy, use a find and replace
	 * to change 'crispy' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'crispy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'crispy' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'quote','video','audio','gallery','link'
	) );

	// Setup the WordPress core custom background feature.
	/*
	add_theme_support( 'custom-background', apply_filters( 'crispy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	*/
}
endif; // crispy_setup
add_action( 'after_setup_theme', 'crispy_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function crispy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'crispy' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3 class="heading">',
		'after_title'   => '</h3><div class="fancy-line-small"></div></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footerbar', 'crispy' ),
		'id'            => 'footerbar-1',
		'description'   => '',
		'before_widget' => '<div class="col-sm-6 col-md-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<div class="widget-title"><h4 class="heading">',
		'after_title'   => '</h4><div class="fancy-line-small"></div></div>',
	) );
}
add_action( 'widgets_init', 'crispy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function crispy_scripts() {
	
	global $crispy_options;
	/* Enqueue styles */	
	wp_enqueue_style( 'crispy-bootstrap', get_template_directory_uri() .'/css/crispy.css' );
	wp_enqueue_style( 'crispy-ionicons', get_template_directory_uri() .'/css/ionicons.min.css' );
	wp_enqueue_style( 'crispy-font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css' );
	//wp_enqueue_style( 'crispy-animate', get_template_directory_uri() .'/css/animate.css' );
	wp_enqueue_style( 'crispy-superslide', get_template_directory_uri() .'/css/superslides.css' );
	wp_enqueue_style( 'crispy-bxslider', get_template_directory_uri() .'/css/bxslider.css' );
	wp_enqueue_style( 'crispy-sl-slider', get_template_directory_uri() .'/css/sl-slider.css' );
	wp_enqueue_style( 'crispy-owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css' );
	wp_enqueue_style( 'crispy-prettyphoto', get_template_directory_uri() .'/css/prettyPhoto.css' );
	wp_enqueue_style( 'crispy-preloader', get_template_directory_uri() .'/css/preloader.css' );
	wp_enqueue_style( 'crispy-style', get_stylesheet_uri() );
			
	// wp_enqueue_style( 'crispy-color-1', get_template_directory_uri() .'/css/colors/color-1.css' ); /* add css for different color schemes "color-1 to 6" */
	wp_enqueue_style( 'crispy-responsive', get_template_directory_uri() .'/css/responsive.css' );
	if( $crispy_options['header-style'] == '2' ){
		wp_enqueue_style( 'crispy-header-alt', get_template_directory_uri() .'/css/header/header-style-2.css' );
	}
	if( $crispy_options['header-shrink'] == '1' ){
		wp_enqueue_style( 'crispy-header-shrink', get_template_directory_uri() .'/css/header/header-shrink.css' );
	}
	/* Enqueue google web fonts */
	wp_enqueue_style( 'crispy-fonts', 'http://fonts.googleapis.com/css?family=Raleway:400,300%7CMontserrat' );
	
	
	
	/* Enqueue scripts */
	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script('cripsy-jquery', get_template_directory_uri().'/js/jquery.min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-modernizr', get_template_directory_uri().'/js/modernizr.js', array(), ' ', true );
	wp_enqueue_script('cripsy-bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), ' ', true );
	//wp_enqueue_script('cripsy-inview', get_template_directory_uri().'/js/inview.js', array(), ' ', true );
	wp_enqueue_script('cripsy-smoothscroll', get_template_directory_uri().'/js/smoothscroll.js', array(), ' ', true );
	wp_enqueue_script('cripsy-isotope', get_template_directory_uri().'/js/isotope.min.js', array(), ' ', true );		
	wp_enqueue_script('cripsy-imagesloaded', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array(), ' ', true );
	wp_enqueue_script('cripsy-animate-enhanced', get_template_directory_uri().'/js/jquery.animate-enhanced.min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-hammer', get_template_directory_uri().'/js/hammer.min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-superslides', get_template_directory_uri().'/js/superslides.js', array(), ' ', true );
	wp_enqueue_script('cripsy-owl-carousel', get_template_directory_uri().'/js/owl.carousel.js', array(), ' ', true );
	wp_enqueue_script('cripsy-localscroll', get_template_directory_uri().'/js/localscroll-1.2.7-min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-scrollTo', get_template_directory_uri().'/js/scrollTo-1.4.2-min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-bxslider', get_template_directory_uri().'/js/bxslider.min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-parallax', get_template_directory_uri().'/js/parallax-1.1.3.js', array(), ' ', true );
	wp_enqueue_script('cripsy-fitvides', get_template_directory_uri().'/js/jquery.fitvids.js', array(), ' ', true );
	wp_enqueue_script('cripsy-slit', get_template_directory_uri().'/js/jquery.slitslider.js', array(), ' ', true );
	wp_enqueue_script('cripsy-ba-cond', get_template_directory_uri().'/js/jquery.ba-cond.min.js', array(), ' ', true );
	wp_enqueue_script('cripsy-mb-YTP', get_template_directory_uri().'/js/jquery.mb.YTPlayer.js', array(), ' ', true );
	wp_enqueue_script('cripsy-prettyphoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array(), ' ', true );
	wp_enqueue_script('cripsy-countdown', get_template_directory_uri().'/js/countdown.js', array(), ' ', true );
	wp_enqueue_script('cripsy-script', get_template_directory_uri().'/js/script.js', array(), ' ', true );
	wp_enqueue_script('cripsy-googleapi', 'http://maps.google.com/maps/api/js?sensor=false');
	wp_enqueue_script('cripsy-googlemap', get_template_directory_uri().'/js/google-map.js', array(), ' ', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crispy_scripts' );


/**
 * One Page Menu 
 */

require get_template_directory() . '/agni/agni-nav-menu-template.php';


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load Options.
 */
require get_template_directory() . '/css/options-css.php';


/**
 * Redux framework 
 */
require get_template_directory() . '/agni/redux-framework/ReduxCore/framework.php';

require get_template_directory() . '/agni/redux-framework/options/options.php';

/**
 * Load Shortcodes file.
 */
require get_template_directory() . '/agni/AgniShortcode/core/load.php';

require get_template_directory() . '/agni/AgniShortcode/core/assets.php';

require get_template_directory() . '/agni/AgniShortcode/core/shortcodes.php';

require get_template_directory() . '/agni/AgniShortcode/core/tools.php';

require get_template_directory() . '/agni/AgniShortcode/core/data.php';

require get_template_directory() . '/agni/AgniShortcode/core/generator-views.php';

require get_template_directory() . '/agni/AgniShortcode/core/generator.php';

/**
 * Search form
 */

function agni_search_form( $form ) {
	
	$form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" >
	<label> <span class="screen-reader-text"  for="s">' . __( 'Search for:', 'crispy' ) . '</span>
	<input type="search"  title="Search for:" value="" placeholder="Search..." name="s" id="s" class="search-field" /></label>
	<input type="submit" id="searchsubmit" class="search-submit" value="" />
	
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'agni_search_form' );


function agni_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form class="post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><p>' . __( 'To view this protected post, enter the password below:', 'crispy' ) . '</p><span>' . __( 'Password:', 'crispy' ) . '</span><label for="' . $label . '"><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="" /></label></form>';
    return $o;
}
add_filter( 'the_password_form', 'agni_password_form' );



/**
 * excerpt
 */

function new_excerpt_more( $more ) {
	return '&nbsp;<a class="read-more clear" href="'. get_permalink( get_the_ID() ) . '">' . __( '. . .', 'crispy') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );



function the_excerpt_length($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '&nbsp;<a class="read-more clear" href="'. get_permalink( get_the_ID() ) . '">' . __( '. . .', 'crispy') . '</a>';
	} else {
		echo $excerpt;
	}
}



/**
 * Page Navigation
 */
 

function agni_page_navigation() {
 
	if( is_singular() )
		return;
	
	global $wp_query;
	
	/*......Stop execution if there's only 1 page ......*/
	if( $wp_query->max_num_pages <= 1 )
		return;
	
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	
	/*...... Add current page to the array .........*/
	if ( $paged >= 1 )
		$links[] = $paged;
	
	/*....... Add the pages around the current page to the array......... */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	
	echo '<div class="page-navigation navigation"><ul class="page-numbers list-inline">' . "\n";
	
	/*....... Previous Post Link .......*/
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( __('Previous', 'crispy') ) );
	
	/*........ Link to first page, plus ellipses if necessary .........*/
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
	
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
	
		if ( ! in_array( 2, $links ) )
			echo '<li>...</li>';
	}
	
	/*..... Link to current page, plus 2 pages in either direction if necessary........ */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	
	/*........ Link to last page, plus ellipses if necessary .........*/
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>...</li>' . "\n";
	
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	
	/*....... Next Post Link ........*/
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( __('Next', 'crispy') ) );
	
	echo '</ul></div>' . "\n";
	
}

/**
 * Breadcrumb navigation
 */
 

function breadcrumb_navigation() {
	$delimiter = '|';
	$home = get_bloginfo('name');
	$before = '<span>';
	$after = '</span>';
	
	echo '<p id="breadcrumb">';
	
	global $post;
	
	$homeLink = home_url();

	echo '<a href="' . $homeLink . '">Home</a> ' . $delimiter .' ';

	if ( is_category() ) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category($thisCat);
		$parentCat = get_category($thisCat->parent);
		if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . single_cat_title('', false)  . $after;
		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before  . get_the_time('d')  . $after;
		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before  . get_the_time('F')  . $after;
		} elseif ( is_year() ) {
			echo $before . get_the_time('Y')  . $after;
		} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} else {
			$cat = get_the_category(); $cat = $cat[0];
			echo ' ' . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . ' ';
			echo $before  . get_the_title()  . $after;
		}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id    = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title()  . $after;
		} elseif ( is_page() && !$post->post_parent ) {
			echo $before  . get_the_title()  . $after;
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id    = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title()  . $after;
		} elseif ( is_search() ) {
			echo $before . get_search_query()  . $after;
		} elseif ( is_tag() ) {
			echo $before. single_tag_title('', false)  . $after;
		} elseif ( is_author() ) {
		global $author;
			$userdata = get_userdata($author);
			echo $before . $userdata->display_name  . $after;
		} elseif ( is_404() ) {
			echo $before . ' 404 ' . $after;
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo ('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</p>';
}






/**
 * Meta Box file
 */
 
 
require get_template_directory() . '/agni/metaboxes/meta_box.php';

add_action( 'init', 'agni_meta_boxes', 9999 );
function agni_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'agni/metaboxes/init.php' );
    }
}

/**
 * Page Header
 */
  
/*
function agni_page_header_meta( $meta_boxes ) {
    $prefix = 'page_header_'; // Prefix for all fields
    $meta_boxes['page_header_option'] = array(
        'id' => 'page_header_options',
        'title' => 'Page Header Options',
        'pages' => array('page'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			
			array( 
				'name'	=> __('Background Color ', 'crispy' ), 
				'desc'	=> __('choose the Background color.. <strong>note.</strong> if you need background image.. just leave this field empty', 'crispy' ), 
				'id'	=> $prefix.'bg_color', 
				'type'	=> 'colorpicker'
			),
			
			
			array( 
				'name'	=> __('Background Image/pattern', 'crispy' ), 
				'id'	=> $prefix.'bg_image', 
				'type'	=> 'file',
			),	
			
			array ( 
				'name'	=> __('Background attachment', 'crispy' ),
				'desc'	=> __('Select the attachment type', 'crispy' ), 
				'id'	=> $prefix.'bg_attachment',
				'type'	=> 'radio_inline',
				'options' => array ( 
					'fixed' => __('Fixed', 'crispy' ),
					'scroll' => __('Scroll', 'crispy' ),
					'parallax' => __('Parallax', 'crispy' ),
				)
			),
			
			array( 
				'name'	=> __('Text alignment', 'crispy'),
				'id'	=> $prefix.'page_alignment',
				'type'	=> 'radio',
				'options' => array (
					'left' => __('Left', 'crispy' ), 
					'center' => __('Center', 'crispy' ), 
					'right' => __('Right', 'crispy' ),
				)
			),
						
			array( 
				'name'	=> __('Background size', 'crispy'),
				'id'	=> $prefix.'bg_size',
				'type'	=> 'radio',
				'options' => array (
					'cover' => __('Cover', 'crispy' ), 
					'auto' => __('Auto', 'crispy' ),
				)
			),
			
			array(
				'name' => __('Title', 'crispy' ),
				'id' => $prefix.'page_title',
				'type' => 'text_small'
			),
			
			array( 
				'name'	=> __('Title Color', 'crispy' ), 
				'desc'	=> __('Choose the color for the heading/title', 'crispy' ), 
				'id'	=> $prefix.'page_title_color', 
				'type'	=> 'colorpicker'
			),
			
			
			array( 
				'name'	=> __('Header Height', 'crispy' ), 
				'desc'	=> __('height of the page header!!..', 'crispy' ), 
				'id'	=> $prefix.'page_height', 
				'type'	=> 'text_small',
			),
			
			
			array(
				'name'	=> __('Navigation Links at header', 'crispy' ),
				'desc'	=> __('Enable this to show thenavigation link at header', 'crispy' ),
				'id'	=> $prefix.'page_nav',
				'type'	=> 'checkbox' 
			),
			
        ),
    );
	

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'agni_page_header_meta' );

*/

$prefix = 'page_header_';

$page_header_fields = array(	
		
	
	array( 
		'label'	=> __('Background Color ', 'crispy' ), 
		'desc'	=> __('choose the Background color.. <strong>note.</strong> if you need background image.. just leave this field empty', 'crispy' ), 
		'id'	=> $prefix.'bg_color', 
		'type'	=> 'color'
	),
	
	
	array( 
		'label'	=> __('Background Image/pattern', 'crispy' ), 
		'id'	=> $prefix.'bg_image', 
		'type'	=> 'image'
	),	
	
	array ( 
		'label'	=> __('Background attachment', 'crispy' ),
		'desc'	=> __('Select the attachment type', 'crispy' ), 
		'id'	=> $prefix.'bg_attachment',
		'type'	=> 'radio',
		'options' => array ( 
			'one' => array (
				'label' => __('Fixed', 'crispy' ), 
				'value'	=> 'fixed'
			),
			'two' => array (
				'label' => __('Scroll', 'crispy' ),
				'value'	=> 'scroll'
			),
			'three' => array (
				'label' => __('Parallax', 'crispy' ),
				'value'	=> 'parallax'
			)
		)
	),
	
	array( 
		'label'	=> __('Text alignment', 'crispy'),
		'id'	=> $prefix.'page_alignment',
		'type'	=> 'radio',
		'options' => array (
			'one' => array ( 
				'label' => __('Left', 'crispy' ), 
				'value'	=> 'left' 
			),
			'two' => array (
				'label' => __('Center', 'crispy' ),
				'value'	=> 'center'
			),
			'three' => array (
				'label' => __('Right', 'crispy' ),
				'value'	=> 'right'
			)
		)
	),
				
	array( 
		'label'	=> __('Background size', 'crispy'),
		'id'	=> $prefix.'bg_size',
		'type'	=> 'radio',
		'options' => array (
			'one' => array ( 
				'label' => __('cover', 'crispy' ), 
				'value'	=> 'cover' 
			),
			'two' => array (
				'label' => __('auto', 'crispy' ),
				'value'	=> 'auto'
			)
		)
	),
	
	array(
		'label' => __('Title', 'crispy' ),
		'id' => $prefix.'page_title',
		'type' => 'text'
	),
	
	array( 
		'label'	=> __('Title Color', 'crispy' ), 
		'desc'	=> __('Choose the color for the heading/title', 'crispy' ), 
		'id'	=> $prefix.'page_title_color', 
		'type'	=> 'color'
	),
	
	
	array( 
		'label'	=> __('Header Height', 'crispy' ), 
		'desc'	=> __('height of the page header!!..', 'crispy' ), 
		'id'	=> $prefix.'page_height', 
		'type'	=> 'slider',
		'min'	=> '200', 
		'max'	=> '1000', 
		'step'	=> '10' 
	),
	
	
	array(
		'label'	=> __('Navigation Links at header', 'crispy' ),
		'desc'	=> __('Enable this to show thenavigation link at header', 'crispy' ),
		'id'	=> $prefix.'page_nav',
		'type'	=> 'checkbox' 
	),
	
);

$page_header = new custom_add_meta_box( 'page_header_option', 'Header options', $page_header_fields, array( 'post', 'portfolio', 'page' ), true );


function agni_page_header( $post ){
	
	$page_header_bg_color = get_post_meta( $post->ID, 'page_header_bg_color', true );
	$page_header_bg_image = wp_get_attachment_url( get_post_meta( $post->ID, 'page_header_bg_image', true ) );
	$page_header_bg_attachment = get_post_meta( $post->ID, 'page_header_bg_attachment', true );
	$page_header_alignment = get_post_meta( $post->ID, 'page_header_page_alignment', true );
	$page_header_bg_size = get_post_meta( $post->ID, 'page_header_bg_size', true );
	$page_header_page_title = get_post_meta( $post->ID, 'page_header_page_title', true );
	$page_header_page_title_color = get_post_meta( $post->ID, 'page_header_page_title_color', true );
	$page_header_page_height = get_post_meta( $post->ID, 'page_header_page_height', true );
	$page_header_page_nav = get_post_meta( $post->ID, 'page_header_page_nav', true );
	
	if(  $page_header_bg_color != '#' && !empty($page_header_bg_color) || $page_header_bg_image != '0' && !empty($page_header_bg_image)){
		
		$parallax = $bread_nav = null;
		if( $page_header_bg_attachment == 'parallax'){
			$parallax = 'parallax';
			$page_header_bg_attachment = 'fixed';
							
		}
		
		if( $page_header_page_nav == '1' ){
			ob_start();
			breadcrumb_navigation();
			$bread_nav =ob_get_clean();
		}
		
		
		$output ='<div class="page-header '.$parallax.' text-'.$page_header_alignment.'" style=" height:'.$page_header_page_height.'px; background-color:'.$page_header_bg_color.'; background-image:url('.$page_header_bg_image.'); background-attachment:'.$page_header_bg_attachment.'; background-size:'.$page_header_bg_size.';  ">
			<div class="page-header-container container">
				<div class="page-header-content">
					<h1 style="color:'.$page_header_page_title_color.'">'.$page_header_page_title.'</h1>
					<div style="color:'.$page_header_page_title_color.'">'.$bread_nav.'</div>
				</div>
			</div>
		</div>	';
		
		return $output;
	}
	
}


$prefix = 'page_footer_';

$page_footer_fields = array(	
	
	
	
	array( 
		'label'	=> __('Agni Slider List', 'crispy' ),
		'desc'	=> __('Select your slider to show the top of the page!!..', 'crispy' ),
		'id'	=>  $prefix.'agni_sliders', 
		'type'	=> 'post_select', 
		'post_type' => array('agni_slides') 
	),
	
	array( 
		'label'	=> __('Home Slider List', 'crispy' ),
		'desc'	=> __('Select your slider to show the top of the page!!..', 'crispy' ),
		'id'	=>  $prefix.'home_sliders', 
		'type'	=> 'post_select', 
		'post_type' => array('home_slides') 
	),
	
	array(
		'label'	=> __('Contact section at the bottom!!', 'crispy' ),
		'desc'	=> __('Enable this to show contact section', 'crispy' ),
		'id'	=> $prefix.'contact_places',
		'type'	=> 'checkbox' 
	),
	
	
);

$page_footer = new custom_add_meta_box( 'page_footer_option', 'Page options', $page_footer_fields, array('page' ), true );


function agni_contact_section( $post ){
	
	global $crispy_options;
	$page_footer_contact = get_post_meta( $post->ID, 'page_footer_contact_places', true );
	
	
	if( $page_footer_contact == '1' ){
		
		$output = '
			<!-- Contact places -->
			<section id="contact-places" class="contact-places section-bg-color">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-md-offset-1 text-center margin-100">
							<i class="'.$crispy_options['general-info-icon1'] .' large-icon"></i><h5>'. $crispy_options['general-info-caption1'].'</h5><p>'. $crispy_options['general-info-text1'].'</p>
						</div>
						<div class="col-md-2 col-md-offset-2 text-center margin-100">
							<i class="'.$crispy_options['general-info-icon2'] .' large-icon"></i><h5>'. $crispy_options['general-info-caption2'].'</h5><p>'. $crispy_options['general-info-text2'].'</p>
						</div>
						<div class="col-md-2 col-md-offset-2 text-center margin-100">
							<i class="'.$crispy_options['general-info-icon3'] .' large-icon"></i><h5>'. $crispy_options['general-info-caption3'].'</h5><p>'. $crispy_options['general-info-text3'].'</p>
						</div>
					</div>
				</div>
			</section>
		';		
		return $output;
		
	}
	
}




/*
 * Post format
 */


function agni_post_format_meta( $meta_boxes ) {
    $prefix = 'post_format_'; // Prefix for all fields
    $meta_boxes['quote_post_option'] = array(
        'id' => 'quote_post_options',
        'title' => 'Quote Post Options',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			
			// Quote Post
			
			
			array(
				'name' => __('Quote Text', 'crispy' ),
				'id' => $prefix.'quote_text',
				'type' => 'textarea_small'
			),
			
			array(
				'name' => __('Quote author', 'crispy' ),
				'id' => $prefix.'quote_cite',
				'type' => 'text_small'
			),	
		),
	);
	
	$meta_boxes['link_post_option'] = array(
        'id' => 'link_post_options',
        'title' => 'link Post Options',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			
			// Link Post
			
			array( 
				'name'	=> __('Link', 'crispy' ), 
				'desc'	=> __('enter the href link to display to the post', 'crispy' ), 
				'id'	=> $prefix.'link_url', 
				'type'	=> 'text_url',
			),
			
		),
	);
	
	$meta_boxes['audio_post_option'] = array(
        'id' => 'audio_post_options',
        'title' => 'Audio Post Options',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
	
			// Audio Post
			
			array( 
				'name'	=> __('Self Hosted Audio Link', 'crispy' ), 
				'id'	=> $prefix.'audio_url', 
				'type'	=> 'file'
			),
			
		),
		
	);
	
	$meta_boxes['video_post_option'] = array(
        'id' => 'video_post_options',
        'title' => 'Video Post Options',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(	
			// Video Post
			
			array( 
				'name'	=> __('Self Hosted Video Link', 'crispy' ), 
				'desc'	=> __('Fill one of any video source info!!..', 'crispy' ), 
				'id'	=> $prefix.'video_url', 
				'type'	=> 'file'
			),
			array( 
				'name'	=> __('Video Poster', 'crispy' ), 
				'desc'	=> __('Only applicable for self hosted video', 'crispy' ), 
				'id'	=> $prefix.'video_poster', 
				'type'	=> 'file'
			),
			
			array( 
				'name'	=> __('Youtube Link', 'crispy' ), 
				'desc'	=> __('enter the youtube video link ', 'crispy' ), 
				'id'	=> $prefix.'video_youtube_url', 
				'type'	=> 'text_url',
			),
			
			array( 
				'name'	=> __('Vimeo Link', 'crispy' ), 
				'desc'	=> __('enter the vimeo video link', 'crispy' ), 
				'id'	=> $prefix.'video_vimeo_url', 
				'type'	=> 'text_url',
			),
			
		),
	);
	
	$meta_boxes['gallery_post_option'] = array(
        'id' => 'gallery_post_options',
        'title' => 'Gallery Post Options',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			// Gallery Post
			array(
				'id'          => $prefix . 'gallery_repeatable',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Gallery item {#}', 'crispy' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add another item', 'crispy' ),
					'remove_button' => __( 'Remove item', 'crispy' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
									
					array( 
						'name'	=> __('Choose Image ', 'crispy' ), 
						'id'	=> 'gallery_image', 
						'type'	=> 'file'
					),
					
				),
			),
			
        ),
    );
	

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'agni_post_format_meta' );

/**
 * Video post
 */
function post_video( $post ){
	$post_video_url = get_post_meta($post, 'post_format_video_url' , true);
	$post_video_poster = get_post_meta($post, 'post_format_video_poster' , true);
	$post_video_youtube_url = get_post_meta($post, 'post_format_video_youtube_url' , true);
	$post_video_vimeo_url = get_post_meta($post, 'post_format_video_vimeo_url' , true);
	$output = null;
	
	
	if(!empty($post_video_url)){
		$output = do_shortcode('[video mp4="'.$post_video_url.'" webm="'.$post_video_url.'" ogv="'.$post_video_url.'" mov="'.$post_video_url.'" poster="'.$post_video_poster.'"][/video]');
	}
	elseif(!empty($post_video_youtube_url)){
		$output = do_shortcode('[youtube_advanced url="'.$post_video_youtube_url.'" showinfo="no" rel="no" fs="no"]');
	}
	elseif(!empty($post_video_vimeo_url)){
		$output = do_shortcode('[vimeo url="'.$post_video_vimeo_url.'"]');
	}
	if( !empty( $output ) ){
		echo '<div class="post-video">'.$output.'</div>'; 
	}
}



/**
 * Audio post
 */
function post_audio( $post){	
	$post_audio_url = get_post_meta($post, 'post_format_audio_url' , true);
	if(!empty($post_audio_url)){
		$output = do_shortcode('[audio mp3="'.$post_audio_url.'" ogg="'.$post_audio_url.'" wmv="'.$post_audio_url.'" ][/audio]');	
	
	
	echo '<div class="post-format-indent">'.$output.'</div>';
	}
}


/**
 * Gallery post
 */

function post_gallery($post){
	$post_gallery_repeatable = get_post_meta( $post, 'post_format_gallery_repeatable', true );
	
	$gallery = $gallery_item = $output = null;
	foreach ( (array) $post_gallery_repeatable as $key => $gallery_item ){
		$post_gallery_image = null;
		
		if(isset( $gallery_item['gallery_image'] ))
			$post_gallery_image = $gallery_item['gallery_image'] ;
		
		if( !empty($post_gallery_image) ){	
		$gallery .= '<div>
					<img src="'.$post_gallery_image.'" />
				</div>';
		}
	}
	
	if( !empty( $gallery) ){
	$output = '<div id="gallery-slider-'.$post.'" class="slider gallery-slider-container">
				'.$gallery.'
				</div>';
	}
	
	echo $output;
}

/**
 * Link post
 */
 
function post_link( $post ){
	
	$post_link_text = get_post_meta($post, 'post_format_link_url' , true);	
	if( !empty($post_link_text) ){
		echo '<div class="post-format-indent"><i class="icon ion-link"></i><a class = "post-format-link" href="'.$post_link_text.'">'.$post_link_text.'</a></div>';
	}
}

/**
 * Quote post
 */

function post_quote( $post ){
	$post_quote_text = get_post_meta($post, 'post_format_quote_text' , true);
	$post_quote_cite = get_post_meta($post, 'post_format_quote_cite' ,true);
	
	$cite = null;
	if(!empty($post_quote_cite)){
		$cite = '<h5 class="quote-cite">&nbsp;&mdash;&nbsp;'.$post_quote_cite.'</h5>';
	}
	if( !empty( $post_quote_text ) ){
		echo '
			<div class="post-format-indent white">
				<p class="post-format-quote">' . $post_quote_text .'</p>'. $cite . '
			</div>
		';
	}
}




/*
 * Custom post type portfolio
 */


function portfolio() {

	$labels = array(
		'name'                => _x( 'Portfolios', 'Portfolio General Name', 'crispy' ),
		'singular_name'       => _x( 'Portfolio', 'Portfolio Singular Name', 'crispy' ),
		'menu_name'           => __( 'Portfolio', 'crispy' ),
		'parent_item_colon'   => __( 'Parent Item:', 'crispy' ),
		'all_items'           => __( 'All Items', 'crispy' ),
		'view_item'           => __( 'View Item', 'crispy' ),
		'add_new_item'        => __( 'Add New Work', 'crispy' ),
		'add_new'             => __( 'Add New', 'crispy' ),
		'edit_item'           => __( 'Edit Item', 'crispy' ),
		'update_item'         => __( 'Update Item', 'crispy' ),
		'search_items'        => __( 'Search Item', 'crispy' ),
		'not_found'           => __( 'Not found', 'crispy' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'crispy' ),
	);
	$args = array(
		'label'               => __( 'portfolio', 'crispy' ),
		'description'         => __( 'Works', 'crispy' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'page-attributes', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'portfolio', 0 );

register_taxonomy('types', array('portfolio'), array('hierarchical' => true, 'label' => 'Categories', 'singular_label' => 'Category', 'show_ui' => true, 'show_admin_column' => true, 'query_var' => true, 'rewrite' => true));
 
function portfolio_filter(){

	$terms = get_terms( 'types' );
	$count = count($terms);
	echo '<ul id="filters" class="filter list-inline">';
	echo '<li><a class="active" href="#all" data-filter=".all" title="">All</a></li>';
	if ( $count > 0 ){	 
		foreach ( $terms as $term ) {			 
			$termname = strtolower($term->name);
			$termname = str_replace(' ', '-', $termname);
			echo '<li><a href="#'.$termname.'" data-filter=".'.$termname.'" title="">'.$term->name.'</a></li>';
		}
	}
	echo "</ul>";	
}

/*
 * Post format
 */


$prefix = 'portfolio_';

$portfolio_fields = array(
	
	// Portfolio
	
	
	array(
		'label' => __('Portfolio Description', 'crispy' ),
		'id' => $prefix.'description',
		'type' => 'textarea'
	),
	
	array(
		'label' => __('Client Name', 'crispy' ),
		'desc'	=> __('mention the client name who asked to do the work', 'crispy' ), 
		'id' => $prefix.'client',
		'type' => 'text'
	),		
	
	array(
		'label' => __('Project Date', 'crispy' ),
		'id' => $prefix.'date',
		'type' => 'text'
	),
	
	array( 
		'label'	=> __('Project External Link', 'crispy' ), 
		'desc'	=> __('enter the href link to display to the post', 'crispy' ), 
		'id'	=> $prefix.'external_link', 
		'type'	=> 'text',
	),
		
	array(
		'label'	=> __('Fullwidth Portfolio', 'crispy' ),
		'id'	=> $prefix.'fullwidth',
		'type'	=> 'checkbox' 
	),
	
		
	array(
		'label' => __( 'Masonry Setup','crispy' ),
		'type'	=> 'section',	
	),
	
	array ( 
		'label'	=> __('Masonry tile width', 'crispy' ),		
		'desc'	=> __('Choose your tile width.. <strong>Note. it works only for Portfolio masonry layout!!.. ', 'crispy' ), 
		'id'	=> $prefix.'tile_width',
		'type'	=> 'radio',
		'options' => array ( 
			'one' => array (
				'label' => __('1x', 'crispy' ), 
				'value'	=> 'width1'
			),
			'two' => array (
				'label' => __('2x', 'crispy' ),
				'value'	=> 'width2'
			),
		)
	),
	array ( 
		'label'	=> __('Masonry tile height', 'crispy' ),
		'desc'	=> __('Choose your tile height.. <strong>Note. it works only for Portfolio masonry layout!!.. ', 'crispy' ), 
		'id'	=> $prefix.'tile_height',
		'type'	=> 'radio',
		'options' => array ( 
			'one' => array (
				'label' => __('1x', 'crispy' ), 
				'value'	=> 'height1'
			),
			'two' => array (
				'label' => __('2x', 'crispy' ),
				'value'	=> 'height2'
			),
		)
	),
	
	
);

$portfolio = new custom_add_meta_box( 'portfolio_format', 'Portfolio Options', $portfolio_fields, array( 'portfolio'), true );



/**
 * Create Custom Post Type team
 */	
 
function register_team_posttype() {
	$labels = array(
		'name' 				=> _x( 'Team Member', 'post type general name','crispy' ),
		'singular_name'		=> _x( 'Member', 'post type singular name','crispy' ),
		'add_new' 			=> __( 'Add New Member','crispy' ),
		'add_new_item' 		=> __( 'Add New Member','crispy' ),
		'all_items' 		=> __( 'All Members','crispy' ),
		'edit_item' 		=> __( 'Edit Member','crispy' ),
		'new_item' 			=> __( 'New Member','crispy' ),
		'view_item' 		=> __( 'View Member','crispy' ),
		'search_items' 		=> __( 'Search Members','crispy' ),
		'not_found' 		=> __( 'Member','crispy' ),
		'not_found_in_trash'=> __( 'Member','crispy' ),
		'parent_item_colon' => __( 'Member','crispy' ),
		'menu_name'			=> __( 'Team Members','crispy' )
	);
	
	$taxonomies = array();
	
	
	$post_type_args = array(
		'labels' 			=> $labels,
		'singular_label' 	=> __('Member','crispy'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_nav_menus'	=> false,
		'publicly_queryable'=> true,
		'query_var'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'rewrite' 			=> array('slug' => 'team', 'with_front' => false ),
		'supports' 			=> 'title',
		'menu_position' 	=> 6, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
		'menu_icon' 		=> 'dashicons-businessman',
		'taxonomies'		=> $taxonomies
	 );
	 register_post_type('team',$post_type_args);
}
add_action('init', 'register_team_posttype');


$prefix = 'member_';
$team_fields = array( 
				
	array(
		'label'=> __('Image/photo URL', 'crispy'),
		'desc'  => __('Upload image link to display.. ', 'crispy'),
		'id'    => $prefix.'image_url',
		'type'  => 'image'
	),
	array(
		'label'=> __('Name', 'crispy'),
		'desc'  => __('Enter the text to display over the member photo', 'crispy'),
		'id'    => $prefix.'name',
		'type'  => 'text'
	),
	array(
		'label'=> __('Description', 'crispy'),
		'desc'  => __('Short intro of member', 'crispy'),
		'id'    => $prefix.'description',
		'type'  => 'textarea'
	),
	
	array(
		'label'=> __('Facebook', 'crispy'),
		'desc'  => __('facebook profile link', 'crispy'),
		'id'    => $prefix.'facebooklink',
		'type'  => 'text'
	),
	
	array(
		'label'=> __('Twitter', 'crispy'),
		'desc'  => __('Twitter profile link', 'crispy'),
		'id'    => $prefix.'twitterlink',
		'type'  => 'text'
	),
	
	array(
		'label'=> __('Google Plus', 'crispy'),
		'desc'  => __('Google plus link', 'crispy'),
		'id'    => $prefix.'googlepluslink',
		'type'  => 'text'
	),
	array(
		'label'=> __('behance', 'crispy'),
		'desc'  => __('Behance link', 'crispy'),
		'id'    => $prefix.'behancelink',
		'type'  => 'text'
	),
	
);			
			
$team = new custom_add_meta_box( 'team_member', 'Team Members', $team_fields, array( 'team'), true );


/**
 * Create Custom Post Type client
 */	
function register_clients_posttype() {
	$labels = array(
		'name' 				=> _x( 'Clients', 'post type general name','crispy' ),
		'singular_name'		=> _x( 'Client', 'post type singular name','crispy' ),
		'add_new' 			=> __( 'Add New Client','crispy' ),
		'add_new_item' 		=> __( 'Add New Client','crispy' ),
		'all_items' 		=> __( 'All Clients','crispy' ),
		'edit_item' 		=> __( 'Edit Client','crispy' ),
		'new_item' 			=> __( 'New Client','crispy' ),
		'view_item' 		=> __( 'View Client','crispy' ),
		'search_items' 		=> __( 'Search Clients','crispy' ),
		'not_found' 		=> __( 'Client','crispy' ),
		'not_found_in_trash'=> __( 'Client','crispy' ),
		'parent_item_colon' => __( 'Client','crispy' ),
		'menu_name'			=> __( 'Clients','crispy' )
	);
	
	$taxonomies = array();
	
	
	$post_type_args = array(
		'labels' 			=> $labels,
		'singular_label' 	=> __('Client','crispy'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_nav_menus'	=> false,
		'publicly_queryable'=> true,
		'query_var'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'rewrite' 			=> array('slug' => 'clients', 'with_front' => false ),
		'supports' 			=> 'title',
		'menu_position' 	=> 6, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
		'menu_icon' 		=> 'dashicons-smiley',
		'taxonomies'		=> $taxonomies
	 );
	 register_post_type('clients',$post_type_args);
}
add_action('init', 'register_clients_posttype');

$prefix = 'clients_';
$clients_fields = array( 
				
		array(
			'label'=> __('Image/photo URL', 'crispy'),
			'desc'  => __('Upload image link to display.. ', 'crispy'),
			'id'    => $prefix.'image',
			'type'  => 'image'
		),
		array(
			'label'=> __('Link', 'crispy'),
			'desc'  => __('href for the client', 'crispy'),
			'id'    => $prefix.'image_link',
			'type'  => 'url'
		),
	
);	

$clients = new custom_add_meta_box( 'clients_meta', 'Clients', $clients_fields, array( 'clients'), true );


/**
 * Create Custom Post Type testimonials
 */	
function register_testimonials_posttype() {
	$labels = array(
		'name' 				=> _x( 'Testimonials', 'post type general name','crispy' ),
		'singular_name'		=> _x( 'Testimonial', 'post type singular name','crispy' ),
		'add_new' 			=> __( 'Add New Testimonial','crispy' ),
		'add_new_item' 		=> __( 'Add New Testimonial','crispy' ),
		'all_items' 		=> __( 'All Testimonials','crispy' ),
		'edit_item' 		=> __( 'Edit Testimonial','crispy' ),
		'new_item' 			=> __( 'New Testimonial','crispy' ),
		'view_item' 		=> __( 'View Testimonial','crispy' ),
		'search_items' 		=> __( 'Search Testimonials','crispy' ),
		'not_found' 		=> __( 'Testimonial','crispy' ),
		'not_found_in_trash'=> __( 'Testimonial','crispy' ),
		'parent_item_colon' => __( 'Testimonial','crispy' ),
		'menu_name'			=> __( 'Testimonials','crispy' )
	);
	
	$taxonomies = array();
	
	
	$post_type_args = array(
		'labels' 			=> $labels,
		'singular_label' 	=> __('Testimonial','crispy'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_nav_menus'	=> false,
		'publicly_queryable'=> true,
		'query_var'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'rewrite' 			=> array('slug' => 'testimonials', 'with_front' => false ),
		'supports' 			=> 'title',
		'menu_position' 	=> 6, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
		'menu_icon' 		=> 'dashicons-testimonial',
		'taxonomies'		=> $taxonomies
	 );
	 register_post_type('testimonials',$post_type_args);
}
add_action('init', 'register_testimonials_posttype');


$prefix = 'testimonial_';
$testimonials_fields = array( 
	
	array( 
		'label'	=> __('Avatar of author', 'crispy' ), 		
		'desc'  => __('type the testimonial.. <strong>note</strong>.. Try to keep 340x400 ratio', 'crispy'),
		'id'	=> $prefix.'image', 
		'type'	=> 'image'
	),
					
	array(
		'label'=> __('Testimonial Text', 'crispy'),
		'desc'  => __('type the testimonial', 'crispy'),
		'id'    => $prefix.'quote',
		'type'  => 'textarea'
	),
	
	array(
		'label'=> __('Testimonial Color', 'crispy'),
		'desc'  => __('choose testimonial color', 'crispy'),
		'id'    => $prefix.'quote_color',
		'type'  => 'color'
	),
	array(
		'label'=> __('Author Name', 'crispy'),
		'desc'  => __('type the name who wrote the testimonial ', 'crispy'),
		'id'    => $prefix.'name',
		'type'  => 'text'
	),
	
	array(
		'label'=> __('Author color', 'crispy'),
		'desc'  => __('choose the color for name', 'crispy'),
		'id'    => $prefix.'name_color',
		'type'  => 'color'
	),
		
	
);			

$testimonials = new custom_add_meta_box( 'testimonials_meta', 'Testimonials', $testimonials_fields, array( 'testimonials'), true );

/**
 * Create Custom Post Type
 */	
function register_slides_posttype() {
	$labels = array(
		'name' 				=> _x( 'Slides', 'post type general name','crispy' ),
		'singular_name'		=> _x( 'Slide', 'post type singular name','crispy' ),
		'add_new' 			=> __( 'Add New Slide','crispy' ),
		'add_new_item' 		=> __( 'Add New Slide','crispy' ),
		'all_items' 		=> __( 'All Slides','crispy' ),
		'edit_item' 		=> __( 'Edit Slide','crispy' ),
		'new_item' 			=> __( 'New Slide','crispy' ),
		'view_item' 		=> __( 'View Slide','crispy' ),
		'search_items' 		=> __( 'Search Slides','crispy' ),
		'not_found' 		=> __( 'Slide','crispy' ),
		'not_found_in_trash'=> __( 'Slide','crispy' ),
		'parent_item_colon' => __( 'Slide','crispy' ),
		'menu_name'			=> __( 'Agni Slider','crispy' )
	);
	
	$taxonomies = array();
	
	
	$post_type_args = array(
		'labels' 			=> $labels,
		'singular_label' 	=> __('Slide','crispy'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_nav_menus'	=> false,
		'publicly_queryable'=> true,
		'query_var'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'rewrite' 			=> array('slug' => 'agni_slides', 'with_front' => false  ),
		'supports' 			=> array('title', 'author',),
		'menu_position' 	=> 6, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
		'menu_icon' 		=> 'dashicons-images-alt',
		'taxonomies'		=> $taxonomies
	 );
	 register_post_type('agni_slides',$post_type_args);
}
add_action('init', 'register_slides_posttype');


function agni_slider_meta( $meta_boxes ) {
    $prefix = 'agni_slides_'; // Prefix for all fields
    $meta_boxes['agni_slider_option'] = array(
        'id' => 'agni_slider_options',
        'title' => 'Agni Slider Options',
        'pages' => array('agni_slides'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(            
				
			array ( 
				'name'	=> __('SLIDER CHOICE', 'crispy' ), 
				'desc'	=> __('choose your slider type & fill the value below only for the respective slider fields!!.. <strong>note.</strong> other fields ignored!!.. ', 'crispy' ), 
				'id'	=> $prefix.'choice', 
				'type'	=> 'radio_inline',
				'options' => array ( 
					'slideshow' => __('Slideshow', 'crispy' ), 
					'textslider' => __('Text slider', 'crispy' ),
					'imageslider' => __('Image Slider', 'crispy' ),					
					'videobg' => __('Video BG', 'crispy' ),
				)
			),
			
        ),
    );
	
	$meta_boxes['slideshow_slider_option'] = array(
        'id' => 'slideshow_slider_options',
        'title' => 'Slideshow',
        'pages' => array('agni_slides'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(            
			
			array(
				'id'          => $prefix . 'slideshow_repeatable',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Slide {#}', 'crispy' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add another Slide', 'crispy' ),
					'remove_button' => __( 'Remove Slide', 'crispy' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array ( 
						'name'	=> __('Slider Text Alignment', 'crispy' ),
						'id'	=> 'slideshow_alignment',
						'type'	=> 'radio_inline',
						'options' => array ( 
							'left' => __('Left', 'crispy' ), 
							'center' => __('Center', 'crispy' ), 
							'right' => __('Right', 'crispy' ), 
						)
					),
					
					array( 
						'name'	=> __('Background Image/pattern', 'crispy' ), 
						'id'	=> 'slideshow_image', 
						'type'	=> 'file'
					),			
					
					array( 
						'name'	=> __('Background size', 'crispy'),
						'id'	=> 'slideshow_size',
						'type'	=> 'radio_inline',
						'options' => array (
							'cover' => __('cover', 'crispy' ), 
							'auto' => __('auto', 'crispy' ), 
						)
					),
					array(
						'name' => __('Title', 'crispy' ),
						'id' => 'slideshow_title',
						'type' => 'text'
					),
					array(
						'name' => __('Description', 'crispy' ),
						'id' => 'slideshow_desc',
						'type' => 'textarea_small',
						'sanitization_cb' => false
					),			
					array( 
						'name'	=> __('Button 1', 'crispy' ), 
						'desc'	=> __('button 1 info', 'crispy' ), 
						'id'	=> 'slideshow_button1', 
						'type'	=> 'text_small'
					),
					array( 
						'name'	=> __('Button 1 URL', 'crispy' ), 
						'desc'	=> __('button href', 'crispy' ), 
						'id'	=> 'slideshow_button1_url', 
						'type'	=> 'text_url',
					),
					array( 
						'name'	=> __('Button 2', 'crispy' ), 
						'desc'	=> __('button 2 info ', 'crispy' ), 
						'id'	=> 'slideshow_button2', 
						'type'	=> 'text_small'
					),
					array( 
						'name'	=> __('Button 2 URL', 'crispy' ), 
						'desc'	=> __('button href', 'crispy' ), 
						'id'	=> 'slideshow_button2_url', 
						'type'	=> 'text_url',
					),
					
					
				),
			),
			
			array( 
				'name'	=> __('Title Color', 'crispy' ), 
				'desc'	=> __('Choose the color for the heading/title', 'crispy' ), 
				'id'	=> $prefix.'slideshow_color_title', 
				'type'	=> 'colorpicker'
			),
			array( 
				'name'	=> __('Description Color ', 'crispy' ), 
				'desc'	=> __('choose the description color', 'crispy' ), 
				'id'	=> $prefix.'slideshow_color_desc', 
				'type'	=> 'colorpicker'
			),
			array( 
				'name'	=> __('Overlay BG Color', 'crispy' ), 
				'desc'	=> __('This layer will be the overlay of the slider!!', 'crispy' ), 
				'id'	=> $prefix.'slideshow_color_overlay', 
				'type'	=> 'colorpicker'
			),
			
			array( 
				'name'	=> __('Overlay Opacity', 'crispy' ), 
				'desc'	=> __('type or pick the opacity level of the overlay from 0 to 1..', 'crispy' ), 
				'id'	=> $prefix.'slideshow_opacity', 
				'type'	=> 'text_small',
			),
			
			array ( 
				'name'	=> __('Background attachment', 'crispy' ),
				'desc'	=> __('Select the attachment type', 'crispy' ), 
				'id'	=> $prefix.'slideshow_attachment',
				'type'	=> 'radio_inline',
				'options' => array ( 
					'fixed' => __('Fixed', 'crispy' ), 
					'scroll' => __('Scroll', 'crispy' ), 
					'parallax' => __('Parallax', 'crispy' ), 
				)
			),
			
			array( 
				'name'	=> __('Down arrow Link', 'crispy' ), 
				'desc'	=> __('href or id of the section to jump.. <strong>eg.#about<strong>', 'crispy' ), 
				'id'	=> $prefix.'slideshow_arrow_url', 
				'type'	=> 'text_url',
			),
			
        ),
    );
	
	$meta_boxes['text_slider_option'] = array(
        'id' => 'text_slider_options',
        'title' => 'Text Slider',
        'pages' => array('agni_slides'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(            
			
			array(
				'id'          => $prefix . 'textslider_repeatable',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Text Slide {#}', 'crispy' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add another Text Slide', 'crispy' ),
					'remove_button' => __( 'Remove Text Slide', 'crispy' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array ( 
						'name'	=> __('Slider Text Alignment', 'crispy' ),
						'id'	=> 'textslider_alignment',
						'type'	=> 'radio_inline',
						'options' => array ( 
							'left' => __('Left', 'crispy' ),
							'center' => __('Center', 'crispy' ),
							'right' => __('Right', 'crispy' ),
						)
					),
					array(
						'name' => __('Title', 'crispy' ),
						'id' => 'textslider_title',
						'type' => 'text_small',
						'sanitization_cb' => false
					),
					
					
				),
			),
			
			
			array( 
				'name'	=> __('Overlay BG Color', 'crispy' ), 
				'desc'	=> __('This layer will be the overlay of the slider!!', 'crispy' ), 
				'id'	=> $prefix.'textslider_overlay', 
				'type'	=> 'colorpicker'
			),
			
			array( 
				'name'	=> __('Overlay Opacity', 'crispy' ), 
				'desc'	=> __('type or pick the opacity level of the overlay from 0 to 1..', 'crispy' ), 
				'id'	=> $prefix.'textslider_opacity', 
				'type'	=> 'text_small',
			),
			
			array( 
				'name'	=> __('Background Image of the slider', 'crispy' ), 
				'desc'	=> __('choose the background image for the slider', 'crispy' ), 
				'id'	=> $prefix.'textslider_image', 
				'type'	=> 'file'
			),
			
			array( 
				'name'	=> __('Background size', 'crispy'),
				'desc'	=> __('background size of the image cover/auto.. <strong>note.</strong> choose auto for patterns', 'crispy' ),
				'id'	=> $prefix.'textslider_size',
				'type'	=> 'radio_inline',
				'options' => array (
					'cover' => __('cover', 'crispy' ), 
					'auto' => __('auto', 'crispy' ), 
				)
			),
			
			array ( 
				'name'	=> __('Background Attachment', 'crispy' ),
				'desc'	=> __('Select the attachment type', 'crispy' ), 
				'id'	=> $prefix.'textslider_attachment',
				'type'	=> 'radio_inline',
				'options' => array ( 
					'fixed' => __('Fixed', 'crispy' ), 
					'scroll' => __('Scroll', 'crispy' ), 
					'parallax' => __('Parallax', 'crispy' ), 
				)
			),
			
			array( 
				'name'	=> __('Mouse wheel Link', 'crispy' ), 
				'desc'	=> __('href or id of the section to jump.. <strong>eg.#about<strong>', 'crispy' ), 
				'id'	=> $prefix.'textslider_arrow_url', 
				'type'	=> 'text_url',
			),
			
        ),
			
		
    );
	
	$meta_boxes['image_slider_option'] = array(
        'id' => 'image_slider_options',
        'title' => 'Image Slider',
        'pages' => array('agni_slides'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(            
			
			array(
				'id'          => $prefix . 'imageslider_repeatable',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Image Slide {#}', 'crispy' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add another Image Slide', 'crispy' ),
					'remove_button' => __( 'Remove Image Slide', 'crispy' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array( 
						'name'	=> __('Background Image', 'crispy' ), 
						'id'	=> 'imageslider_image', 
						'type'	=> 'file'
					),
					
					array( 
						'name'	=> __('Background size', 'crispy'),
						'id'	=> 'imageslider_size',
						'type'	=> 'radio_inline',
						'options' => array (
							'cover' => __('cover', 'crispy' ), 
							'auto' => __('auto', 'crispy' ),
						)
					),
					
				),
			),
			
			
			array( 
				'name'	=> __('Title', 'crispy' ), 
				'desc'	=> __('title to show over the image slider', 'crispy' ), 
				'id'	=> $prefix.'imageslider_title', 
				'type'	=> 'text_small'
			),
			array( 
				'name'	=> __('Description', 'crispy' ), 
				'desc'	=> __('description to show over the image slider', 'crispy' ), 
				'id'	=> $prefix.'imageslider_description', 
				'type'	=> 'textarea_small',
				'sanitization_cb' => false
			),
			array( 
				'name'	=> __('Logo/image', 'crispy' ), 
				'desc'	=> __('logo to show over the image slider', 'crispy' ), 
				'id'	=> $prefix.'imageslider_image', 
				'type'	=> 'file'
			),		
			
			array( 
				'name'	=> __('Text Color', 'crispy' ), 
				'desc'	=> __('text color for text which is present in this slider!!', 'crispy' ), 
				'id'	=> $prefix.'imageslider_color_text', 
				'type'	=> 'colorpicker'
			),	
			array( 
				'name'	=> __('Button 1', 'crispy' ), 
				'desc'	=> __('button 1 info', 'crispy' ), 
				'id'	=> $prefix.'imageslider_button1', 
				'type'	=> 'text_small'
			),
			array( 
				'name'	=> __('Button 1 URL', 'crispy' ), 
				'desc'	=> __('button href', 'crispy' ), 
				'id'	=> $prefix.'imageslider_button1_url', 
				'type'	=> 'text_url',
			),
			array( 
				'name'	=> __('Button 2', 'crispy' ), 
				'desc'	=> __('button 2 info ', 'crispy' ), 
				'id'	=> $prefix.'imageslider_button2', 
				'type'	=> 'text_small'
			),
			array( 
				'name'	=> __('Button 2 URL', 'crispy' ), 
				'desc'	=> __('button href', 'crispy' ), 
				'id'	=> $prefix.'imageslider_button2_url', 
				'type'	=> 'text_url',
			),
			
			array( 
				'name'	=> __('Overlay BG Color', 'crispy' ), 
				'desc'	=> __('This layer will be the overlay of the slider!!', 'crispy' ), 
				'id'	=> $prefix.'imageslider_overlay', 
				'type'	=> 'colorpicker'
			),
			
			array( 
				'name'	=> __('Overlay Opacity', 'crispy' ), 
				'desc'	=> __('A description for the field.', 'crispy' ), 
				'id'	=> $prefix.'imageslider_opacity', 
				'type'	=> 'text_small',
			),
			
			
			array ( 
				'name'	=> __('Background Attachment', 'crispy' ),
				'desc'	=> __('Select the attachment type', 'crispy' ), 
				'id'	=> $prefix.'imageslider_attachment',
				'type'	=> 'radio_inline',
				'options' => array ( 
					'fixed' => __('Fixed', 'crispy' ), 
					'scroll' => __('Scroll', 'crispy' ), 
					'parallax' => __('Parallax', 'crispy' ),
				)
			),
			
			array( 
				'name'	=> __('Down arrow Link', 'crispy' ), 
				'desc'	=> __('href or id of the section to jump.. <strong>eg.#about<strong>', 'crispy' ), 
				'id'	=> $prefix.'imageslider_arrow_url', 
				'type'	=> 'text_url',
			),
			
        ),
		
		
    );
	
	
	$meta_boxes['Videobg_option'] = array(
        'id' => 'videobg_options',
        'title' => 'Video BG',
        'pages' => array('agni_slides'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(            
			
				array( 
					'name'	=> __('Video URL', 'crispy' ), 
					'desc'	=> __('video url only from youtube!!', 'crispy' ), 
					'id'	=> $prefix.'videobg_url', 
					'type'	=> 'text_url',
				),
				
				array( 
					'name'	=> __('Title 1', 'crispy' ), 
					'desc'	=> __('title overlay to the video ', 'crispy' ), 
					'id'	=> $prefix.'videobg_title1', 
					'type'	=> 'text_small'
				),
				array( 
					'name'	=> __('Title 2', 'crispy' ), 
					'desc'	=> __('title overlay to the video ', 'crispy' ), 
					'id'	=> $prefix.'videobg_title2', 
					'type'	=> 'text_small'
				),
				array( 
					'name'	=> __('Description', 'crispy' ), 
					'desc'	=> __('description overlay to the video ', 'crispy' ), 
					'id'	=> $prefix.'videobg_description', 
					'type'	=> 'textarea_small',
					'sanitization_cb' => false
					
				),
				
				array( 
					'name'	=> __('Text Color', 'crispy' ), 
					'desc'	=> __('text color for text which is present in this slider!!', 'crispy' ), 
					'id'	=> $prefix.'videobg_color_text', 
					'type'	=> 'colorpicker'
				),
				array( 
					'name'	=> __('Button 1', 'crispy' ), 
					'desc'	=> __('button 1 info', 'crispy' ), 
					'id'	=> $prefix.'videobg_button1', 
					'type'	=> 'text_small'
				),
				array( 
					'name'	=> __('Button 1 URL', 'crispy' ), 
					'desc'	=> __('button href', 'crispy' ), 
					'id'	=> $prefix.'videobg_button1_url', 
					'type'	=> 'text_url',
				),
				
				array( 
					'name'	=> __('Overlay BG Color', 'crispy' ), 
					'desc'	=> __('This layer will be the overlay of the slider!!', 'crispy' ), 
					'id'	=> $prefix.'videobg_overlay', 
					'type'	=> 'colorpicker'
				),
				
				array( 
					'name'	=> __('Overlay Opacity', 'crispy' ), 
					'desc'	=> __('Opacity of the video overlay layer!!..', 'crispy' ), 
					'id'	=> $prefix.'videobg_opacity', 
					'type'	=> 'text_small',
				),
			
			
        ),
		
		
		
    );
	

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'agni_slider_meta' );

global $crispy_options;

function agni_slider( $post ){
	global $crispy_options;
	
	$agni_slider_choice = get_post_meta( $post, 'agni_slides_choice', true );
	
	switch( $agni_slider_choice ){
	
		case 'slideshow' :
			
			$slideshow_title_color = get_post_meta( $post, 'agni_slides_slideshow_color_title', true );
			$slideshow_description_color = get_post_meta( $post, 'agni_slides_slideshow_color_desc', true );
			$slideshow_overlay = get_post_meta( $post, 'agni_slides_slideshow_overlay', true );
			$slideshow_overlay_opacity = get_post_meta( $post, 'agni_slides_slideshow_opacity', true );
			$slideshow_attachment = get_post_meta( $post, 'agni_slides_slideshow_attachment', true );
			$slideshow_arrowlink = get_post_meta( $post, 'agni_slides_slideshow_arrow_url', true );
			
			$slideshow_repeatable = get_post_meta( $post, 'agni_slides_slideshow_repeatable', true );
			
			$slideshow = $margin_button1 = $margin_button2 = $button1 = $button2 =  null;
			$parallax = null;
			foreach( (array) $slideshow_repeatable as $key => $slide ){
				$slideshow_alignment = $slideshow_image = $slideshow_size = $slideshow_title = $slideshow_description = $slideshow_button1 = $slideshow_button1_url = $slideshow_button2 = $slideshow_button2_url = '';
				
				if ( isset( $slide['slideshow_alignment'] ) )
					$slideshow_alignment = esc_html( $slide['slideshow_alignment'] );
					
				if ( isset( $slide['slideshow_image'] ) )
					$slideshow_image = esc_html( $slide['slideshow_image'] );
					
				if ( isset( $slide['slideshow_size'] ) )
					$slideshow_size = esc_html( $slide['slideshow_size'] );
					
				if ( isset( $slide['slideshow_title'] ) )
					$slideshow_title = esc_html( $slide['slideshow_title'] );
					
				if ( isset( $slide['slideshow_desc'] ) )
					$slideshow_description = esc_html( $slide['slideshow_desc'] );
					
				if ( isset( $slide['slideshow_button1'] ) )
					$slideshow_button1 = esc_html( $slide['slideshow_button1'] );
					
				if ( isset( $slide['slideshow_button1_url'] ) )
					$slideshow_button1_url = esc_html( $slide['slideshow_button1_url'] );
					
				if ( isset( $slide['slideshow_button2'] ) )
					$slideshow_button2 = esc_html( $slide['slideshow_button2'] );
					
				if ( isset( $slide['slideshow_button2_url'] ) )
					$slideshow_button2_url = esc_html( $slide['slideshow_button2_url'] );
					
				if( $slideshow_alignment != 'right' ){
					$margin_button1 = 'margin-right-15'	;			
				}
				else{
					$margin_button2 = 'margin-right-15'	;
				}
				
				if( !empty($slideshow_button1) ){
					$button1 = '<a class="btn btn-primary '.$margin_button1.'" href="'.$slideshow_button1_url.'">'.$slideshow_button1.' </a> ';
				}
				if( !empty($slideshow_button2) ){
					$button2 = '<a class="btn btn-default '.$margin_button2.'" href="'.$slideshow_button2_url.'">'.$slideshow_button2.' </a> ';
				}
				
				if( $slideshow_attachment == 'parallax' ){
					$parallax = 'parallax';
					$slideshow_attachment = 'fixed';	
				}
			
					
				$slideshow .= '<div class="slide">
						<div class="agni_slide agni_slide-bg-1 '.$parallax.'" style="background-image:url('.$slideshow_image.'); background-size:'.$slideshow_size.'; background-attachment:'.$slideshow_attachment.';"> <!-- Slide 1 bg -->
							<div class="agni_slide_bg_overlay" style="background-color:'.$slideshow_overlay.'; opacity:'.$slideshow_overlay_opacity.'"></div> <!-- overlay black layer -->
							<div class="slide-content">
								<div class="agni_slide-text container text-'.$slideshow_alignment.'">
									<h1 style="color:'.$slideshow_title_color.'">'.$slideshow_title.'</h1> <!-- Slide 1 text -->
									<p style="color:'.$slideshow_description_color.'">'.htmlspecialchars_decode($slideshow_description).'</p>
									'.$button1.$button2.'
								</div>
							</div>
						</div>		
					</div> ';
			}
			
			
			echo '<div id="slides-'.$post.'" class=" slides slider-area fullscreen-container" data-duration='.$crispy_options['slideshow-slider-duration'].' data-animation='.$crispy_options['slideshow-slider-animation'].'>
				<div class="slides-container">
					'.$slideshow.' 					       
				</div>
				<div class="Slides-nav-control">
					<nav class="slides-navigation">
						<a href="#" class="next right-arrow"><img src="'.get_template_directory_uri().'/img/right-arrow.png" alt="next" /></a>
						<a href="#" class="prev left-arrow"><img src="'.get_template_directory_uri().'/img/left-arrow.png" alt="prev" /></a>				
					</nav>
					<div class="down-arrow page-scroll"><a href="'.$slideshow_arrowlink.'"><img src="'.get_template_directory_uri().'/img/down-arrow.png" alt="Go ahead" /></a> </div>
				</div>			
			</div>';
			break;
			
		case 'imageslider':
		
			$imageslider_title = get_post_meta( $post, 'agni_slides_imageslider_title', true );
			$imageslider_description = get_post_meta( $post, 'agni_slides_imageslider_description', true );
			$imageslider_image = get_post_meta( $post, 'agni_slides_imageslider_image', true );
			$imageslider_color = get_post_meta( $post, 'agni_slides_imageslider_color_text', true );
			$imageslider_button1 = get_post_meta( $post, 'agni_slides_imageslider_button1', true );
			$imageslider_button1_url = get_post_meta( $post, 'agni_slides_imageslider_button1_url', true );
			$imageslider_button2 = get_post_meta( $post, 'agni_slides_imageslider_button2', true );
			$imageslider_button2_url = get_post_meta( $post, 'agni_slides_imageslider_button2_url', true );
			$imageslider_overlay = get_post_meta( $post, 'agni_slides_imageslider_overlay', true );
			$imageslider_opacity = get_post_meta( $post, 'agni_slides_imageslider_opacity', true );			
			$imageslider_attachment = get_post_meta( $post, 'agni_slides_imageslider_attachment', true );	
			$imageslider_arrowlink = get_post_meta( $post, 'agni_slides_imageslider_arrow_url', true );		
			$imageslider_repeatable = get_post_meta( $post, 'agni_slides_imageslider_repeatable', true );
			
			
			
			$imageslider = $imageslider_alignment = $button1 = $button2 = $margin_button1 = $margin_button2 = null;
			
			$parallax = null;
			if( $imageslider_attachment == 'parallax' ){
				$parallax = 'parallax';
				$imageslider_attachment = 'fixed';	
			}
			
			foreach( (array) $imageslider_repeatable as $key => $slide ){
				$imageslider_bg = $imageslider_size = '';
				
				
				
				if ( isset( $slide['imageslider_image'] ) )
					$imageslider_bg = esc_html( $slide['imageslider_image'] );				
					
				if ( isset( $slide['imageslider_size'] ) )
					$imageslider_size = esc_html( $slide['imageslider_size'] );
					
				$imageslider .='<div class="slide">
					<div class="agni_slide '.$parallax.' agni-image-bg-1" style="background-image:url('.$imageslider_bg.'); background-size:'.$imageslider_size.'; background-attachment:'.$imageslider_attachment.'" > <!-- Slide 1 bg -->
						<div class="agni_slide_bg_overlay"style="background-color:'.$imageslider_overlay.'; opacity:'.$imageslider_opacity.';" ></div> <!-- overlay black layer -->
						
					</div>		
				</div>';
					
			}
			
			if( $imageslider_alignment != 'right' ){
				$margin_button1 = 'margin-right-15'	;			
			}
			else{
				$margin_button2 = 'margin-right-15'	;
			}
			
			if( !empty($imageslider_button1) ){
				$button1 = '<a class="btn btn-primary '.$margin_button1.'" href="'.$imageslider_button1_url.'">'.$imageslider_button1.' </a> ';
			}
			if( !empty($imageslider_button2) ){
				$button2 = '<a class="btn btn-default '.$margin_button2.'" href="'.$imageslider_button2_url.'">'.$imageslider_button2.' </a> ';
			}
				
			
			echo '<div id="image_slides-'.$post.'" class="image_slides slider-area fullscreen-container" data-duration='.$crispy_options['image-slider-duration'].' data-animation='.$crispy_options['image-slider-animation'].'>
				<div class="slides-container">
					'.$imageslider.'       
				</div>
				<div class="slide-content">
					<div class="image_slide-text container slide-text ">			<!-- Slide text -->
						<h3 class="heading" style="color:'.$imageslider_color.'">'.$imageslider_title.'</h3>
						<div ><img src="'.$imageslider_image.'" alt=""/></div>
						<p style="color:'.$imageslider_color.'">'.htmlspecialchars_decode($imageslider_description).'</p>
						'.$button1.$button2.'
						
					</div>
				</div>
				
				<div class="Slides-nav-control">
					<nav class="slides-navigation">
						<a href="#" class="next right-arrow"><i class="icon ion-ios7-arrow-thin-right"></i></a>
						<a href="#" class="prev left-arrow"><i class="icon ion-ios7-arrow-thin-left"></i></a>				
					</nav>
					<div class="download-icon page-scroll"><a href="'.$imageslider_arrowlink.'"><i class="icon ion-ios7-download-outline"></i></a> </div>
				</div>	
							
			</div>';
			break;
			
		case 'textslider':
				
			$textslider_overlay = get_post_meta($post, 'agni_slides_textslider_overlay', true);			
			$textslider_opacity = get_post_meta($post, 'agni_slides_textslider_opacity', true);			
			$textslider_image = get_post_meta($post, 'agni_slides_textslider_image', true);			
			$textslider_size = get_post_meta($post, 'agni_slides_textslider_size', true);			
			$textslider_attachment = get_post_meta($post, 'agni_slides_textslider_attachment', true);
			$textslider_arrowlink = get_post_meta( $post, 'agni_slides_textslider_arrow_url', true );	
			$textslider_repeatable = get_post_meta($post, 'agni_slides_textslider_repeatable', true);
			
			$textslider = null;
			
			foreach( (array) $textslider_repeatable as $key => $slide ){
				$textslider_alignment = $textslider_title = '';
				
				if ( isset( $slide['textslider_alignment'] ) )
					$textslider_alignment = esc_html( $slide['textslider_alignment'] );				
					
				if ( isset( $slide['textslider_title'] ) )
					$textslider_title = esc_html( $slide['textslider_title'] );
					
				$textslider .= '<div class="slide">
						<div class="text_slide" >
							<div class="slide-content">
								<div class="text_slide-text container text-'.$textslider_alignment.'">
									<h1>'.htmlspecialchars_decode($textslider_title).'</h1> <!-- Slide 1 text -->
									
								</div>
							</div>
						</div>		
					</div>  ';
			}
			
			$parallax = null;
			if( $textslider_attachment == 'parallax' ){
				$parallax = 'parallax';
				$textslider_attachment = 'fixed';	
			}
			
			echo '<div id="text_slides-'.$post.'" class=" text_slides '.$parallax.' slider-area fullscreen-container" style="background-image:url('.$textslider_image.'); background-size:'.$textslider_size.'; background-attachment:'.$textslider_attachment.'; " data-duration='.$crispy_options['text-slider-duration'].' data-animation='.$crispy_options['text-slider-animation'].'><!-- Slide BG -->
				<div class="agni_slide_bg_overlay-2" style="background-color:'.$textslider_overlay.'; opacity:'.$textslider_opacity.'; "></div>
				<div class="slides-container">
					'.$textslider.'     
				</div>
				<div class="Slides-nav-control">
					<div class="mouse-wheel page-scroll"><a href="'.$textslider_arrowlink.'"><img src="'.get_template_directory_uri().'/img/mouse-dark.png" alt="mouse_wheel"/></a> </div>
				</div>			
			</div>';
			break;
			
		case 'videobg':
		
			if( $crispy_options['video-bg-controls'] == '1'){
				$crispy_options['video-bg-controls'] = 'true';
			}
			else{
				$crispy_options['video-bg-controls'] = 'false';
			}
			
			if( $crispy_options['video-bg-loop'] == '1'){
				$crispy_options['video-bg-loop'] = 'true';
			}
			else{
				$crispy_options['video-bg-loop'] = 'false';
			}
			
			if( $crispy_options['video-bg-autoplay'] == '1'){
				$crispy_options['video-bg-autoplay'] = 'true';
			}
			else{
				$crispy_options['video-bg-autoplay'] = 'false';
			}
			
			if( $crispy_options['video-bg-mute'] == '1'){
				$crispy_options['video-bg-mute'] = 'true';
			}
			else{
				$crispy_options['video-bg-mute'] = 'false';
			}
			
			$videobg_url = get_post_meta( $post, 'agni_slides_videobg_url', true );
			$videobg_title1 = get_post_meta( $post, 'agni_slides_videobg_title1', true );
			$videobg_title2 = get_post_meta( $post, 'agni_slides_videobg_title2', true );
			$videobg_description = get_post_meta( $post, 'agni_slides_videobg_description', true );
			$videobg_color = get_post_meta( $post, 'agni_slides_videobg_color_text', true );
			$videobg_button1 = get_post_meta( $post, 'agni_slides_videobg_button1', true );
			$videobg_button1_url = get_post_meta( $post, 'agni_slides_videobg_button1_url', true );
			$videobg_overlay = get_post_meta( $post, 'agni_slides_videobg_overlay', true );
			$videobg_opacity = get_post_meta( $post, 'agni_slides_videobg_opacity', true );
			
			$button1 = null;
			if( !empty($videobg_button1) ){
					$button1 = '<a class="btn btn-primary" href="'.$videobg_button1_url.'">'.$videobg_button1.' </a> ';
				}
			
			echo '<div id="video_background-'.$post.'" class="video_background slider-area fullscreen-container">
			<div class="slides-container">
				<div id="post-1" class="slide">
					<div class="video_slide"> <!-- Slide 1 bg -->
						<a id="bgndVideo" class="player" data-property="{videoURL:\''.$videobg_url.'\',containment:\'.video_slide\', showControls:'.$crispy_options['video-bg-controls'].', autoPlay:'.$crispy_options['video-bg-autoplay'].', loop:'.$crispy_options['video-bg-loop'].', vol:'.$crispy_options['video-bg-volume'].', mute:'.$crispy_options['video-bg-mute'].', startAt:'.$crispy_options['video-bg-start'].', stopAt:'.$crispy_options['video-bg-stop'].', opacity:1, addRaster:false, quality:\''.$crispy_options['video-bg-quality'].'\',}">My video</a>
						<div class="video_slide_bg_overlay agni_slide_bg_overlay" style="background-color:'.$videobg_overlay.'; opacity:'.$videobg_opacity.'"></div>
						<div class="slide-content">
							<div class="video_slide-text container text-center">
								<h1 style="color:'.$videobg_color.'"><span>'.$videobg_title1.'</span></h1>
								<h2 style="color:'.$videobg_color.'">'.$videobg_title2.'</h2>
								<p style="color:'.$videobg_color.'">'.htmlspecialchars_decode($videobg_description).'</p>
								'.$button1.'
							</div>
						</div>
					</div>		
				</div>  
			</div>
			<div class="Slides-nav-control">				
				<div class="video-background-controls">
					<a class="command command-play" href="#"><i class="icon ion-ios7-play"></i></a>
					<a class="command command-pause" href="#"><i class="icon ion-ios7-pause"></i></a>
					<a class="command-vol" href="#"><i class="icon ion-ios7-volume-high"></i></a>
				</div>
			</div>			
		</div>';
			break;
			
	}
	
}


function register_home_slides_posttype() {
	$labels = array(
		'name' 				=> _x( 'Slides', 'post type general name','crispy' ),
		'singular_name'		=> _x( 'Slide', 'post type singular name','crispy' ),
		'add_new' 			=> __( 'Add New Slide','crispy' ),
		'add_new_item' 		=> __( 'Add New Slide','crispy' ),
		'all_items' 		=> __( 'All Slides','crispy' ),
		'edit_item' 		=> __( 'Edit Slide','crispy' ),
		'new_item' 			=> __( 'New Slide','crispy' ),
		'view_item' 		=> __( 'View Slide','crispy' ),
		'search_items' 		=> __( 'Search Slides','crispy' ),
		'not_found' 		=> __( 'Slide','crispy' ),
		'not_found_in_trash'=> __( 'Slide','crispy' ),
		'parent_item_colon' => __( 'Slide','crispy' ),
		'menu_name'			=> __( 'Home Slider','crispy' )
	);
	
	$taxonomies = array();
	
	
	$post_type_args = array(
		'labels' 			=> $labels,
		'singular_label' 	=> __('Slide','crispy'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_nav_menus'	=> false,
		'publicly_queryable'=> true,
		'query_var'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'rewrite' 			=> array('slug' => 'home_slides', 'with_front' => false ),
		'supports' 			=> array('title', 'author',),
		'menu_position' 	=> 6, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
		'menu_icon' 		=> 'dashicons-camera',
		'taxonomies'		=> $taxonomies
	 );
	 register_post_type('home_slides',$post_type_args);
}
add_action('init', 'register_home_slides_posttype');


 
function home_slider_meta( $meta_boxes ) {
    $prefix = 'home_slides_'; // Prefix for all fields
    $meta_boxes['home_slider_option'] = array(
        'id' => 'home_slider_options',
        'title' => 'Home Slider Options',
        'pages' => array('home_slides'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			
			array(
				'id'          => $prefix . 'repeatable',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Slide {#}', 'crispy' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add another Slide', 'crispy' ),
					'remove_button' => __( 'Remove Slide', 'crispy' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					
					array( 
						'name'	=> __(' Slider Text alignment', 'crispy'),
						'id'	=> 'alignment',
						'type'	=> 'radio_inline',
						'options' => array (
							'left' => __('Left', 'crispy' ),
							'center' => __('Center', 'crispy' ),
							'right' => __('Right', 'crispy' ),
						)
					),
					
					array( 
						'name'	=> __('Background Image/pattern', 'crispy' ), 
						'id'	=> 'image', 
						'type'	=> 'file',
					),				
					array( 
						'name'	=> __('Background size', 'crispy'),
						'id'	=> 'size',
						'type'	=> 'radio_inline',
						'options' => array (
							'cover' => __('Cover', 'crispy' ),
							'auto' => __('Auto', 'crispy' ),
						)
					),
					
					array( 
						'name'	=> __('Slides Orientation', 'crispy'),
						'id'	=> 'orientation',
						'type'	=> 'radio_inline',
						'options' => array (
							'horizontal' => __('Horizontal', 'crispy' ),
							'vertical' => __('Vertical', 'crispy' ),
						)
					),
					
					
					array(
						'name' => __('Slice 1 Rotation', 'crispy' ),
						'desc'	=> __('angle for rotating a first half of slice.. <strong>note.</strong> value should be -360 to 360  ', 'crispy' ), 
						'id' => 'slice1_rot',
						'type' => 'text_small'
					),
					array(
						'name' => __('Slice 2 Rotation', 'crispy' ),
						'desc'	=> __('angle for rotating a second half of slice.. <strong>note.</strong> value should be -360 to 360 ', 'crispy' ), 
						'id' => 'slice2_rot',
						'type' => 'text_small'
					),
					
					
					array(
						'name' => __('Title', 'crispy' ),
						'id' => 'title',
						'type' => 'text'
					),	
					
					array(
						'name' => __('Description', 'crispy' ),
						'id' => 'desc',
						'type' => 'textarea_small'
					),			
					array( 
						'name'	=> __('Button 1', 'crispy' ), 
						'desc'	=> __('button 1 info', 'crispy' ), 
						'id'	=> 'button1', 
						'type'	=> 'text_small'
					),
					array( 
						'name'	=> __('Button 1 URL', 'crispy' ), 
						'desc'	=> __('button href', 'crispy' ), 
						'id'	=> 'button1_url', 
						'type'	=> 'text_url',
					),
					array( 
						'name'	=> __('Button 2', 'crispy' ), 
						'desc'	=> __('button 2 info ', 'crispy' ), 
						'id'	=> 'button2', 
						'type'	=> 'text_small'
					),
					array( 
						'name'	=> __('Button 2 URL', 'crispy' ), 
						'desc'	=> __('button href', 'crispy' ), 
						'id'	=> 'button2_url', 
						'type'	=> 'text_url',
					),
					
					
				),
			),
			
			
			array( 
				'name'	=> __('Title Color', 'crispy' ), 
				'desc'	=> __('Choose the color for the heading/title', 'crispy' ), 
				'id'	=> $prefix.'color_title', 
				'default'  => '#ffffff',
				'type'	=> 'colorpicker'
			),
			array( 
				'name'	=> __('Description Color ', 'crispy' ), 
				'desc'	=> __('choose the description color', 'crispy' ), 
				'id'	=> $prefix.'color_description',
				'default'  => '#ffffff', 
				'type'	=> 'colorpicker'
			),
			
			
			array ( 
				'name'	=> __('Background attachment', 'crispy' ),
				'desc'	=> __('Select the attachment type', 'crispy' ), 
				'id'	=> $prefix.'attachment',
				'type'	=> 'radio_inline',
				'options' => array ( 
					'fixed' => __('Fixed', 'crispy' ), 
					'scroll' => __('Scroll', 'crispy' ), 
					'Parallax' => __('Parallax', 'crispy' ), 
				)
			),
			
			
			array( 
				'name'	=> __('Slider Height', 'crispy' ), 
				'desc'	=> __('Height of the slider in px.. !!..', 'crispy' ), 
				'id'	=> $prefix.'height', 
                'type' => 'text_small'
			),
			
        ),
    );
	

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'home_slider_meta' );

function home_slider( $post ){
	$home_slider_title_color = get_post_meta( $post, 'home_slides_color_title', true);
	$home_slider_description_color = get_post_meta( $post, 'home_slides_color_description', true);
	$home_slider_attachment = get_post_meta( $post, 'home_slides_attachment', true);
	$home_slider_height = get_post_meta( $post, 'home_slides_height', true);
	$home_slider_repeatable = get_post_meta( $post, 'home_slides_repeatable', true);
	
	$parallax = null;
	if( $home_slider_attachment == 'parallax' ){
		
		$parallax = 'parallax';
		$home_slider_attachment = 'fixed';	
	}
	
	$slides_content = $margin_button1 = $margin_button2 = $button1 = $button2 = $span = null;
	
	foreach ( (array) $home_slider_repeatable as $key => $slide ) {

		$home_slider_alignment = $home_slider_image = $home_slider_orientation = $home_slider_slice1_rotation = $home_slider_slice2_rotation = $home_slider_title = $home_slider_desc = $home_slider_button1 = $home_slider_button1_url = $home_slider_button2 = $home_slider_button2_url = '';
	
		if ( isset( $slide['alignment'] ) )
			$home_slider_alignment = esc_html( $slide['alignment'] );
			
		if ( isset( $slide['image'] ) )
			$home_slider_image = esc_html( $slide['image'] );
			
		if ( isset( $slide['orientation'] ) )
			$home_slider_orientation = esc_html( $slide['orientation'] );
			
		if ( isset( $slide['slice1_rotation'] ) )
			$home_slider_slice1_rotation = esc_html( $slide['slice1_rotation'] );
			
		if ( isset( $slide['slice2_rotation'] ) )
			$home_slider_slice2_rotation = esc_html( $slide['slice2_rotation'] );
			
		if ( isset( $slide['title'] ) )
			$home_slider_title = esc_html( $slide['title'] );
			
		if ( isset( $slide['desc'] ) )
			$home_slider_desc = esc_html( $slide['desc'] );
			
		if ( isset( $slide['button1'] ) )
			$home_slider_button1 = esc_html( $slide['button1'] );
			
		if ( isset( $slide['button1_url'] ) )
			$home_slider_button_url = esc_html( $slide['button1_url'] );
			
		if ( isset( $slide['button2'] ) )
			$home_slider_button2 = esc_html( $slide['button2'] );
			
		if ( isset( $slide['button2_url'] ) )
			$home_slider_button2_url = esc_html( $slide['button2_url'] );
		
		if( $home_slider_alignment != 'right' ){
			$margin_button1 = 'margin-right-15'	;			
		}
		else{
			$margin_button2 = 'margin-right-15'	;
		}
		
		if( !empty($home_slider_button1) ){
			$button1 = '<a class="btn btn-primary '.$margin_button1.'" href="'.$home_slider_button1_url.'">'.$home_slider_button1.' </a> ';
		}
		if( !empty($home_slider_button2) ){
			$button2 = '<a class="btn btn-default '.$margin_button2.'" href="'.$home_slider_button2_url.'">'.$home_slider_button2.' </a> ';
		}
		
		
		$slides_content .= '
			<div class="sl-slide text-'.$home_slider_alignment.' " data-orientation="'.$home_slider_orientation.'" data-slice1-rotation="'.$home_slider_slice1_rotation.'" data-slice2-rotation="'.$home_slider_slice2_rotation.'" data-slice1-scale="2" data-slice2-scale="2">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-1" style="background-image:url( ' .$home_slider_image. ' ); background-attachment:'.$home_slider_attachment.'"></div>
					<div class="container sl-slide-text-inner">
						<div class="sl-slide-text">
							<h1 style="color:'.$home_slider_title_color.'">'.$home_slider_title.'</h1>
							<p style="color:'.$home_slider_description_color.'">'.htmlspecialchars_decode($home_slider_desc).'</p>
							'.$button1.$button2.'
						</div>
					</div>
				</div>
			</div>';
			
		$span .= '<span></span>';
	
	}
	
	$output = '<div id="slit_slider" class="slit-slider">
		<div id="slit_slides" class="sl-slider-wrapper " style="height:'.$home_slider_height.'px" >	
			<div class="sl-slider">			
				'.$slides_content.'				
			</div><!-- /sl-slider -->
	
			<nav id="nav-dots" class="nav-dots">
				'.$span.'
			</nav>
	
		</div><!-- /slider-wrapper -->
	
	</div>';
	
	echo $output;	
	
}

require_once dirname( __FILE__ ) . '/plugins/tgm/agni-plugin-activation.php';

add_action( 'tgmpa_register', 'agni_register_required_plugins' );

function agni_register_required_plugins() {

	$plugins = array(
		
		array(
			'name'     				=> 'Contact Form 7', 
			'slug'     				=> 'contact-form-7', 
			'source'   				=> get_stylesheet_directory() . '/plugins/contact-form-7.zip', 
			'required' 				=> true,
			'version' 				=> '3.9.1', 
			'force_deactivation' 	=> true, 
			'external_url' 			=> 'http://contactform7.com/',
		),
		
		array(
			'name'     				=> 'MailPoet Newsletters', 
			'slug'     				=> 'wysija-newsletters', 
			'source'   				=> get_stylesheet_directory() . '/plugins/wysija-newsletters.zip', 
			'required' 				=> false,
			'version' 				=> '2.6.11', 
			'force_deactivation' 	=> true, 
			'external_url' 			=> 'http://www.mailpoet.com/',
		),
		
		
	);
	$theme_text_domain = 'lite';

	$config = array(
		'domain'       		=> $theme_text_domain,         	
		'default_path' 		=> '',                         	
		'parent_menu_slug' 	=> 'themes.php', 				
		'parent_url_slug' 	=> 'themes.php', 				
		'menu'         		=> 'install-required-plugins', 	
		'has_notices'      	=> true,                       	
		'is_automatic'    	=> false,					   	
		'message' 			=> '',							
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
