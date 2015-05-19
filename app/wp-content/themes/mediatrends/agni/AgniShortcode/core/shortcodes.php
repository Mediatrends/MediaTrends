<?php
class Cosme_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;
	function __construct() {}	
	
	// Section
	public static function agni_section($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'bgcolor' => '#fbfbfb',
			'url' => '',
			'repeat' => 'no',
			'attachment' => 'scroll',
			'class' => '',
			'id' =>''
			
		),$atts, 'section' ); 
		if($atts['repeat'] == 'yes'){ 
			$atts['repeat'] = '';
		}
		else{
			$atts['repeat'] = 'no-repeat';	
		}
		
		$parallax = null;
		if($atts['attachment'] == 'parallax'){
			$parallax = 'parallax';
			$atts['attachment'] = 'fixed';
		}
		
		$output = '<section id="'.$atts['id'].'" class="section '.$atts['class'].' '.$parallax.'" style="background:url('.$atts['url'].'); background-repeat:'.$atts['repeat'].'; background-color:'.$atts['bgcolor'].' ; background-attachment:'.$atts['attachment'].'" >'. do_shortcode($content).'</section>';
		
		return $output ;
	}
	
	
	public static function agni_container( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(				
				'class' => ''
			), $atts, 'container' );
			
			$output = '<div class="container '.$atts['class'].' ">'.do_shortcode($content).'</div>';
			
		return $output;
	}
	
	public static function agni_row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'top' => '',
				'bottom' => '',
				'class' => ''
			), $atts, 'row' );
			
			$output = '<div class="'.$atts['class'].' row " style="margin-top:'.$atts['top'].'px; margin-bottom:'.$atts['bottom'].'px;" >'.do_shortcode($content).'</div>';
			
		return $output;
	}

	public static function agni_column( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'choice'   => '12',
				'align' => 'left',
				'offset' => '0',
				'top' => '',
				'bottom' => '',
				'class' => ''
			), $atts, 'column' );
			
			$output = '<div class="'.$atts['class'].' text-'.$atts['align'].' col-md-'.$atts['choice'].' col-md-offset-'.$atts['offset'].' columns margin-top-'.$atts['top'].' margin-bottom-'.$atts['bottom'].' ">'.do_shortcode($content).'</div>';
			
		return $output;
	}
	public static function agni_nested_row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'top' => '',
				'bottom' => '',
				'class' => ''
			), $atts, 'row' );
			
			$output = '<div class="'.$atts['class'].' row" style="margin-top:'.$atts['top'].'px; margin-bottom:'.$atts['bottom'].'px;" >'.do_shortcode($content).'</div>';
			
		return $output;
	}
	
	public static function agni_nested_column( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'choice'   => '12',
				'align' => 'left',
				'offset' => '0',
				'top' => '',
				'bottom' => '', 
				'class' => ''
			), $atts, 'column' );
			
			
			$output = '<div class="'.$atts['class'].' text-'.$atts['align'].' col-sm-'.$atts['choice'].' col-md-'.$atts['choice'].' col-sm-offset-'.$atts['offset'].' col-md-offset-'.$atts['offset'].' columns margin-top-'.$atts['top'].' margin-bottom-'.$atts['bottom'].'">'.do_shortcode($content).'</div>';
			
		return $output;
	}
	
	public static function agni_div( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'align' => 'left',
				'class'  => '',
				'id'  => ''
			), $atts, 'div' );
			
			if( !empty( $atts['id'] ) ){
				$atts['id'] ='id=" '.$atts['id'].'"';
			}
		
			$output= '<div '.$atts['id'].' class="' . $atts['class'] . ' text-'.$atts['align'].'">' . do_shortcode( $content ) . '</div>' ;	
		return $output;
	}
	
	public static function agni_image( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url' => '',
				'class'  => ''
			), $atts, 'image' );
			
		
			$output= '<img src="'.$atts['url'].'" class="' . $atts['class'] . '" />' ;	
		return $output;
	}
	
	
	public static function agni_sectionheading( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'choice'  => '1',
				'heading' => '',
				'additional' => '',
				'align' => 'left',
				'class'  => ''
			), $atts, 'heading' );
			
		if( $atts['choice'] == '1' ){
		
			$output='<div class="section-heading text-'.$atts['align'].'">
						<div class="additional-heading">'.$atts['additional'].'</div>
						<h1 class="heading">'.$atts['heading'].'</h1>
						<div class="fancy-line fancy-line-'.$atts['align'].' "></div>
					</div>' ;
		}
		else{
			$output='<div class="section-heading text-'.$atts['align'].'">
						<h1 class="heading">'.$atts['heading'].'</h1>
						<div class="additional-heading">'.$atts['additional'].'</div>
						<div class="fancy-line-inverse fancy-line-'.$atts['align'].'"></div>
					</div>' ;
			
		}
		return $output;
	}
	
	public static function agni_heading( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'choice'  => '3',
				'align' => 'left',
				'class'  => ''
			), $atts, 'heading' );
		
		if( $atts['choice'] != 'div' ){ 
			$output= '<h'.$atts['choice'].' class="' . $atts['class'] . ' text-'.$atts['align'].'">' . do_shortcode( $content ) . '</h'.$atts['choice'].'>' ;	
		}
		else{
			$output= '<'.$atts['choice'].' class="' . $atts['class'] . ' text-'.$atts['align'].'">' . do_shortcode( $content ) . '</'.$atts['choice'].'>' ;	
		}
		return $output;
	}
	

	public static function agni_tabs( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'active'   => 1,
				'class' => ''
			), $atts, 'tabs' );
		
		do_shortcode( $content );
		$return = '';
		$tabs = $panes = array();
		if ( is_array( self::$tabs ) ) {
			
			foreach ( self::$tabs as $tab ) {
				
				if( $tab['active'] == 'yes' ){
					$tab['active'] = 'active';	
				}
				else{
					$tab['active'] = '';	
				}
				
				$tabs[] = '<li class="'.$tab['active'].'"><a data-toggle="tab" href="#'.$tab['id'].'">' . su_scattr( $tab['title'] ) . '</a></li>';
				$panes[] = '<div id="'.$tab['id'].'" class="tab-pane fade '.$tab['active'].' in"><p>' . $tab['content'] . '</p></div>';
			}
			
			$return = '<ul class="nav nav-tabs h6">' . implode( "\n", $tabs ) . '</ul><div class="tab-content">' . implode( "\n", $panes ) . '</div>';
			
			
		}
		// Reset tabs
		self::$tabs = array();
		self::$tab_count = 0;
		return $return;
	}

	public static function agni_tab( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'    => 'Title',
				'active'   => 'no',
				'id'    => '',
				'class'    => ''
			), $atts, 'tab' );
		$x = self::$tab_count;
		self::$tabs[$x] = array(
			'id'    => $atts['id'],
			'title' => $atts['title'],
			'active'   => $atts['active'],
			'content' => do_shortcode( $content ),
			'class' => $atts['class']
		);
		self::$tab_count++;
	}

	public static function agni_toggle( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'  => 'Toggle',
				'open'   => 'no',
				'id' => '',
				'class' => ''
			), $atts, 'toggle' );
			$in =null;
		if ( $atts['open'] == 'no' ){ $atts['open'] = 'collapsed';}else{ $in = 'in';}
		
		return '<div class=" '.$atts['class'].' panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title"><a class="'.$atts['open'] .'" data-toggle="collapse" data-parent="#accordion" href="#'.$atts['id'].'">' . su_scattr( $atts['title'] ) . '<i class="icon ion-android-add pull-right"></i></a></h6>
			</div>
			<div id="'.$atts['id'].'" class="panel-collapse collapse '.$in.'">
				<div class="panel-body">
					<p>' . do_shortcode( $content ) . '	</p>
				</div>
			</div>
		</div>';
		
	}

	public static function agni_accordions( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'accordion' );
		return '<div id="accordion" class="panel-group">' . do_shortcode( $content ) . '</div>';
	}


	public static function agni_blockquote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'reverse' => 'no',
				'class'=> ''
			), $atts, 'blockquote' );
			
		if( $atts['reverse'] == 'yes' ){
			$output = '<blockquote class="blockquote-reverse '.$atts['reverse'].'">' . do_shortcode( $content ) . '</div>';	
		}
		else{
			$output = '<blockquote>' . do_shortcode( $content ) . '</div>';
		}
		return $output;
	}

	public static function agni_dropcap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'letter' => 'L',
				'choice' => 'default',
				'class' => ''
			), $atts, 'dropcap' );
			
		$output = '<div class="'.$atts['class'].' dropcap"><span class=" dropcap-' . $atts['choice'] . su_ecssc( $atts ) . ' dropcap-letter h1">'.$atts['letter'].'</span>'. do_shortcode( $content ) .'</div>';		
		return $output;
	}
	
	// lifecycle
	public static function agni_lifecycle($atts, $content=null){
		$atts=shortcode_atts(array(
			'number' => '1',
			'heading' => 'Heading',
			'desc' => 'description',
			'class' => '',
		),$atts, 'lifecycle');
		
		return '<div class=" '.$atts['class'].' col-sm-6 col-md-4 margin-top-50">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3">
							<h1 class="big-number">'.$atts['number'].'</h1>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9">
							<h4>'.$atts['heading'].'</h4>
							<p>'.$atts['desc'].'</p>
						</div>
					</div>
				</div>';
	}
	
	//icon
	public static function agni_service($atts=null, $content=null ){
		$atts = shortcode_atts(array(
			'icon' => 'icon: check',
			'choice' => 'default',
			'title' => 'Service',
			'size' =>'large-icon',
			'class'=>'',
		
		), $atts);
		
		$output ='<div class="'.$atts['class'].' service-icon">
					<i class="'.$atts['class'].' icon ' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '  '.$atts['size'].'"></i>
				</div>
				<div class="service-content">
					<h5>'.$atts['title'].'</h5><p>'.do_shortcode( $content ).'</p>
				</div>';
		
		return $output;
		
	}
	
	
	//progress bar
	public static function agni_progressbar( $atts, $content=null ){
		$atts=shortcode_atts(array(
			'value' =>'Progress',
			'percentage' =>'80',
			'type'   =>'',
			'class'=>''
		), $atts);		
			
		return '<div class=" '.$atts['class'].' col-md-6 columns">
					<h5 class="progress-heading">'.$atts['value'].'<span>'.$atts['percentage'].'%</span> </h5>
					<div class="progress progress-1">
						<div class="progress-bar progress-bar-'.$atts['type'].'" role="progressbar" aria-valuenow="'.$atts['percentage'].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$atts['percentage'].'%;">
							<span class="sr-only">'.$atts['percentage'].'% Complete</span>
						</div>
					</div>
				</div>';
	}
	
	//progress bar
	public static function agni_calltoaction( $atts, $content=null ){
		$atts=shortcode_atts(array(
			'quote' =>'Call to action',
			'button' =>'button',
			'url' =>'#',
			'class'=>''
		), $atts);		
			
		return '<div class="row '.$atts['class'].' ">					
					<div class="col-sm-9 col-md-9 margin-top-70 margin-bottom-100">														
						<h3>'.$atts['quote'].'</h3>
					</div>
					<div class="col-sm-3 col-md-3 margin-top-110 margin-bottom-100 text-right">
						<a href="'.$atts['url'].'" class=" btn btn-lg btn-default">'.$atts['button'].'</a>
					</div>
				</div>';
	}
	
	// list
	public static function agni_lists( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'icon' => 'icon: arrow',
				'class' => '',
			), $atts, 'lists' );
		
		$atts['icon'] = '<span><i class="icon ' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '"></i></span>';
				
		return '<div class="list-icon"><ul>' . str_replace( '<li>', '<li>' . $atts['icon'] . ' ', do_shortcode( $content ) ) . '</ul></div>';
	}

	public static function agni_button( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        => '#',
				'choice'       => 'primary',
				'size'       => '',
				'class'  => ''
			), $atts, 'button' );
			
		
		$output= '<a class=" '.$atts['class'].' btn btn-'.$atts['choice'].' btn-'.$atts['size'].'" href="'.$atts['url'].'"> '.$content.'</a>';
		
		return $output;
	}
	
	//icon
	public static function agni_icon($atts=null, $content=null ){
		$atts = shortcode_atts(array(
			'icon' => 'icon: check',
			'choice' => 'default',
			'size' =>'large-icon',
			'class'=>'',
		
		), $atts);
		
		$output = '<i class="'.$atts['class'].' icon ' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '  '.$atts['size'].'"></i>';
		
		return $output;
		
	}

	public static function agni_alerts( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'choice' => 'success',
				'dismissable' => 'yes',
				'class' => ''
			), $atts, 'alerts' );
			
			if($atts['dismissable']=='yes'){
				$output = '<div class="alert alert-'.$atts['choice'].' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.do_shortcode( $content ).'</div>';	
			}
			else{
				$output = '<div class="alert alert-'.$atts['choice'].'">'.do_shortcode( $content ).'</div>';	
			}
			
			return $output;
	}
	//pricing table
	public static function  agni_pricingtable($atts = null, $content = null){
		$atts = shortcode_atts(array(
				'featured' => 'no',
				// 'color' => '#303030', // featured color
				'heading' => 'Column 1',
				'currency' => '$',
				'price' => '100',
				'interval' => 'mo.',
				'value' => 'click',
				'class' => ''
		
		), $atts, 'pricingtable' );
		
		$recommand = $button = null;
		if($atts['featured']=='yes' ){ $recommand = 'pricing-recommanded'; $button = 'primary'; }else{ $button = 'default'; }		
		
			$output= '<div class="'.$atts['class'].' col-sm-6 col-md-3 margin-bottom-30">
								<div class="pricing-table text-center">
									<div class="pricing-top '.$recommand.' white">
										<h4>'.$atts['heading'].'</h4>
										<p>&nbsp;&nbsp;&nbsp;'.$atts['currency'].'<span class="pricing-number">'.$atts['price'].'</span>/'.$atts['interval'].'</p>
										<a href="#" class="btn btn-'.$button.'">'.$atts['value'].'</a>
									</div>
										'.$content.'
								</div>
							</div>';
		
		return $output;
	}

	
	
	public static function agni_youtube( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'class'      => ''
			), $atts, 'youtube' );
		if ( !$atts['url'] ) return Su_Tools::error( __FUNCTION__, __( 'please specify correct url', 'crispy' ) );
		$atts['url'] = su_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Su_Tools::error( __FUNCTION__, __( 'please specify correct url', 'crispy' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '?autoplay=1' : '';
		// Create player
		$return[] = '<div id="portfolio-video" class="portfolio-video post-video">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $id . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		// Return result
		return implode( '', $return );
		
	}

	public static function agni_vimeo( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'class'      => ''
			), $atts, 'vimeo' );
		if ( !$atts['url'] ) return '<p class="alert alert-danger">Vimeo: ' . __( 'please specify correct url', 'crispy' ) . '</p>';
		$atts['url'] = su_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return '<p class="alert alert-danger">Vimeo: ' . __( 'please specify correct url', 'crispy' ) . '</p>';
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '&amp;autoplay=1' : '';
		// Create player
		$return[] = '<div id="portfolio-video" class="portfolio-video post-video">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] .
			'" src="http://player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff' .
			$autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		
		// Return result
		return implode( '', $return );
		
	}



	// gmap
	public static function agni_gmap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'height'     => 400,
				'class' => ''
			), $atts, 'gmap' );		
			global $crispy_options;
			 
		return '<div id="map_canvas" style="height:'.$atts['height'].'px" data-lng="'.$crispy_options['google-map-lng'].'" data-lat="'.$crispy_options['google-map-lat'].'" data-add1="'.$crispy_options['google-address-1'].'" data-add2="'.$crispy_options['google-address-2'].'" data-add3="'.$crispy_options['google-address-3'].'" data-dir="'.get_template_directory_uri().'"></div>';
	}
	
	
	
	public static function agni_custom_slider( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'     => 'none',
				'class'      => ''
			), $atts, 'slider' );
		// Get slides
		
		$src = substr( $atts['source'], 6 );
		$slide = explode(",", $src);
		
		$src1 = null;
		foreach( (array) $slide as $key => $slide_src ){
			$src1 .= '<div>'. wp_get_attachment_image( $slide_src, 'full' ).'</div>';
		
		}
		$output ='<div id=" portfolio-slider-2" class="'.$atts['class'].'  slider portfolio-slider-container">
					'.$src1.'															
				</div>';
		
		return $output;
	}

	public static function agni_posts( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				//'template'            => 'templates/default-loop.php',
				//'sidebar' 			  => 'full',
				'layout'			  => '4',
				'column'			  => '3',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'post_type'           => 'post',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'author'              => '',
				'order'               => 'DESC',
				'orderby'             => 'date',
				'filter'			  => 'no',
				'fullwidth' 		  => 'no',
				'pagination'          => 'no',
				'ignore_sticky_posts' => 'no'
			), $atts, 'posts' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		
		if( $atts['pagination'] == 'yes' ){
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		else{
			$paged = '';
		}
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,	
            'paged'=> $paged
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term ) ) );
			
			$args = $tax_args;
		}
		
		$filter = ( bool ) ( $atts['filter'] === 'yes' ) ? true : false;
		$pagination = ( bool ) ( $atts['pagination'] === 'yes' ) ? true : false;
		
		global $post;
		
		// Save original posts
		global $shortcodeposts;
		$original_posts = $shortcodeposts;
		// Query posts
		$shortcodeposts = new WP_Query( $args );
		// Buffer output
		ob_start();
		
		if( $post_type == 'portfolio' ){ ?>
        
        	<?php switch( $atts['column'] ){ 
	
				case '4' :
				case '6' : ?>    
					<div  class="works portfolio-container content-area">
						<div  class="container site-main" role="main"> 
							<?php if( $atts['filter'] == 'yes' ){ ?><div class="portfolio-filter"><?php portfolio_filter(); ?></div><?php } ?> 
							<div class="row portfolio-content-holder <?php if( $atts['column'] == '4' ){ echo 'portfolio-3col'; }else{ echo 'portfolio-2col'; } ?>">
								<div id="portfolio-page" class="portfolio-page portfolio-page-single">
								   
									<?php $shortcodeposts = new WP_Query( $args );
									
									// The Loop
									if ( $shortcodeposts->have_posts() ) :
										while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); 
										
										$terms = get_the_terms( $post->ID, 'types' );
										 
										if ( $terms && ! is_wp_error( $terms ) ) :
											$links = array();
						
											foreach ( $terms as $term )
											{
												$links[] = $term->name;
											}
											$links = str_replace(' ', '-', $links);
											$tax = join( " ", $links );    
										else : 
											$tax = ''; 
										endif;
										?>
									<article id="post-<?php the_ID(); ?>" class="<?php echo strtolower($tax); ?> all white portfolio-post col-sm-6 col-md-<?php echo $atts['column']; ?> portfolio-thumbnail" >
										
										<div class="portfolio-thumbnail-container">
											<div class="thumbnail-image">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="portfolio-thumbnail-content">
												<h4><a class="portfolio-read-more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
												<div class="fancy-line"></div>
												<a class="portfolio-attachment-link" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto" ><i class="icon ion-android-image"></i></a>
												<ul class="portfolio-category list-inline">
												<?php
													$terms = get_the_terms( $post->ID, 'types' );                         
													if ( $terms && ! is_wp_error( $terms ) ) :
														foreach ( $terms as $term )
														{											   
															echo '<li>'.$term->name.'</li>';
														}   
													endif;
												?>
												</ul>
											</div>
										</div>                           
									</article>
									
									<?php
									endwhile;
								endif;
											
								// Reset Post Data
								wp_reset_postdata();	?>
							</div>
						</div>
					<?php break;
				case 'masonry':?>    
					<div  class="works portfolio-container content-area">
						<div  class="container site-main" role="main">        
							<?php if( $atts['filter'] == 'yes' ){ ?><div class="portfolio-filter"><?php portfolio_filter(); ?></div><?php } ?> 
							<div id="portfolio-page" class="portfolio-page portfolio-content-holder portfolio-masonry portfolio-page-single">
								
								<?php $shortcodeposts = new WP_Query( $args );
								
								// The Loop
								if ( $shortcodeposts->have_posts() ) :
									while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); 
									
									$portfolio_thumbnail_width = get_post_meta( $post->ID, 'portfolio_tile_width', true );
									$portfolio_thumbnail_height = get_post_meta( $post->ID, 'portfolio_tile_height', true );
									
									$terms = get_the_terms( $post->ID, 'types' );
									 
									if ( $terms && ! is_wp_error( $terms ) ) :
										$links = array();
					
										foreach ( $terms as $term )
										{
											$links[] = $term->name;
										}
										$links = str_replace(' ', '-', $links);
										$tax = join( " ", $links );    
									else : 
										$tax = ''; 
									endif;
									?>
								<article id="post-<?php the_ID(); ?>" class="<?php echo strtolower($tax); ?> white portfolio-post all portfolio-thumbnail " >
									
									<div class="portfolio-thumbnail-container">
										<div class="thumbnail-image <?php echo $portfolio_thumbnail_width.' '.$portfolio_thumbnail_height; ?>">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="portfolio-thumbnail-content">
											<h4><a class="portfolio-read-more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<div class="fancy-line"></div>
											<a class="portfolio-attachment-link" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto" ><i class="icon ion-android-image"></i></a>
											<ul class="portfolio-category list-inline">
											<?php
												$terms = get_the_terms( $post->ID, 'types' );                         
												if ( $terms && ! is_wp_error( $terms ) ) :
													foreach ( $terms as $term )
													{											   
														echo '<li>'.$term->name.'</li>';
													}   
												endif;
											?>
											</ul>
										</div>
									</div>                           
								</article>
								
								<?php
								endwhile;
							endif;
										
							// Reset Post Data
							wp_reset_postdata();	?>
						</div>
					<?php break;
				case '3' :?>
					<div  class="works portfolio-container content-area">
						<div  class="site-main" role="main">
							<div class="container ">
								<?php if( $atts['filter'] == 'yes' ){ ?><div class="portfolio-filter"><?php portfolio_filter(); ?></div><?php } ?> 
							</div>
							<div class="row no-margin-padding">
								<div id="portfolio-page" class="portfolio-page portfolio-page-single">
									
									<?php $shortcodeposts = new WP_Query( $args );
									
									// The Loop
									if ( $shortcodeposts->have_posts() ) :
										while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); 
										
										$terms = get_the_terms( $post->ID, 'types' );
										 
										if ( $terms && ! is_wp_error( $terms ) ) :
											$links = array();
						
											foreach ( $terms as $term )
											{
												$links[] = $term->name;
											}
											$links = str_replace(' ', '-', $links);
											$tax = join( " ", $links );    
										else : 
											$tax = ''; 
										endif;
										?>
									<article id="post-<?php the_ID(); ?>" class="<?php echo strtolower($tax); ?> white portfolio-post all col-sm-6 col-md-3 portfolio-thumbnail no-margin-padding" >
										
										<div class="portfolio-thumbnail-container">
											<div class="thumbnail-image ">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="portfolio-thumbnail-content">
												<h4><a class="portfolio-read-more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
												<div class="fancy-line"></div>
												<a class="portfolio-attachment-link" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" data-rel="prettyPhoto" ><i class="icon ion-android-image"></i></a>
												<ul class="portfolio-category list-inline">
												<?php
													$terms = get_the_terms( $post->ID, 'types' );                         
													if ( $terms && ! is_wp_error( $terms ) ) :
														foreach ( $terms as $term )
														{											   
															echo '<li>'.$term->name.'</li>';
														}   
													endif;
												?>
												</ul>
											</div>
										</div>                           
									</article>
									
									<?php
									endwhile;
								endif;
											
								// Reset Post Data
								wp_reset_postdata();	?>
							</div>
						</div>
					<?php break;
				 } ?>
				<?php if( $atts['pagination'] == 'yes' ){ $big = 999999999; // need an unlikely integer
					 echo '<div class="portfolio-page-navigation page-navigation navigation text-center">'. paginate_links( array(
						'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $query->max_num_pages,
						'prev_text'    => __('Previous', 'crispy'),
						'next_text'    => __('Next', 'crispy'),
						'type' => 'list'
					) ).'</div>'; } ?>
				</div><!-- #main -->
			</div><!-- #primary -->  
        
			
		<?php }else{ ?>
        
        	<?php switch( $atts[ 'layout' ] ){	

					case '2' :
					case '3' : ?>
					
					<div   class="blog blog-grid">			
						<div  class="blog-container container site-main" role="main">
							<div class="row <?php if( $atts['layout'] == '3' ) echo 'blog-masonry'; ?> ">
								<div class="col-md-12">
									<div class="row">
										
										<?php if ( $shortcodeposts->have_posts() ) : ?>
				
											<?php /* Start the Loop */ ?>
											<?php while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); ?>
											<div class="col-xs-12 col-sm-6 col-md-4 blog-content">
												<?php
													/* Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'content', 'shortcode' );
												?>
											</div>
											<?php endwhile; ?>  	
											
											
								
										<?php else : ?>
								
											<?php get_template_part( 'content', 'none' ); ?>
								
										<?php endif; ?>
										
									</div>
								</div>
								
							</div>
						</div>
						
						<div class="text-center">
							<?php if( $atts['pagination'] == 'yes' ){ $crispy_options; if( $crispy_options['blog-pagination'] == '2' ){ crispy_paging_nav(); }else{ agni_page_navigation(); } } ?>
						</div>
						
					</div>	
					<?php break; 
					case '4' : ?>
					
					<div   class="blog blog-modern">	
						<div  class="site-main" role="main">		
							<?php if ( $shortcodeposts->have_posts() ) : ?>
				
								<?php /* Start the Loop */ ?>
								<?php while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); ?>
									<?php
										/* Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'content','modern' );
									?>
								<?php endwhile; ?>  	
								
								
					
							<?php else : ?>
					
								<?php get_template_part( 'content', 'none' ); ?>
					
							<?php endif; ?>
							
						</div>
						
						<!-- <?php // global $crispy_options; if( $crispy_options['blog-pagination'] == '2' ){ crispy_paging_nav(); }else{ agni_page_navigation(); } ?>-->
					</div>
					
					<?php break; } ?>

        
			
		<?php }
				
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		
		return $output;
	}
	
	
	//team
	public static function agni_team($atts=null, $content=null){
		$atts = shortcode_atts( array(
				'class' => ''
			), $atts, 'posts' );	
		ob_start(); ?>
		 
                	<?php get_template_part( 'content', 'team' );  ?>
                
        <div class="clear"></div><?php

	
	$output = ob_get_contents();
	
	ob_end_clean();
		
		return $output ;
	}
	
	//Clients	
	public static function agni_clients($atts=null, $content=null){
		$atts = shortcode_atts( array(
				'class' => ''
			), $atts, 'posts' );	
		ob_start(); ?>
			
		<?php get_template_part( 'content', 'clients' );  ?>
    <?php

	$output = ob_get_contents();
	
	ob_end_clean();
		
		return $output ;
	}
	
	//Testimonials	
	public static function agni_testimonials($atts=null, $content=null){
		$atts = shortcode_atts( array(
				'class' => ''
			), $atts, 'posts' );	
		ob_start(); ?>
		 
		<?php get_template_part( 'content', 'testimonials' );  ?>
    
	<?php	$output = ob_get_contents();
	
	ob_end_clean();
		
		return $output ;
	}
	
			
	public static function agni_animate( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'      => 'bounceIn',
				//'duration'  => 1,
				//'delay'     => 0,
				'inline'    => 'no',
				'class'     => ''
			), $atts, 'animate' );
		$tag = ( $atts['inline'] === 'yes' ) ? 'span' : 'div';
		/*$style = array(
			'duration' => array(),
			'delay' => array()
		);
		foreach ( array( '-webkit-', '-moz-', '-ms-', '-o-', '' ) as $vendor ) {
			$style['duration'][] = $vendor . 'animation-duration:' . $atts['duration'] . 's';
			$style['delay'][] = $vendor . 'animation-delay:' . $atts['delay'] . 's';
		}*/
		$return = '<' . $tag . ' class="animate ' . $atts['type'] . su_ecssc( $atts ) . '"  data-animation="' . $atts['type'] . '">' . do_shortcode( $content ) . '</' . $tag . '>';
		su_query_asset( 'css', 'animate' );
		su_query_asset( 'js', 'inview' );
		su_query_asset( 'js', 'su-other-shortcodes' );
		return $return;
	}

}

new Cosme_Shortcodes;

class Cosme_Theme_Shortcodes extends Cosme_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}