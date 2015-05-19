<?php
/**
 * To handle data
 */
class Cosme_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return ( array ) apply_filters( 'crispy/data/groups', array(
				'all'     => __( 'All', 'crispy' ),
				'content' => __( 'Content', 'crispy' ),
				'box'     => __( 'Box', 'crispy' ),
				'media'   => __( 'Media', 'crispy' ),
				'gallery' => __( 'Gallery', 'crispy' ),
				'data'    => __( 'Data', 'crispy' ),
				'other'   => __( 'Other', 'crispy' )
			) );
	}

	public static function borders() {
		return ( array ) apply_filters( 'crispy/data/borders', array(
				'none'   => __( 'None', 'crispy' ),
				'solid'  => __( 'Solid', 'crispy' ),
				'dotted' => __( 'Dotted', 'crispy' ),
				'dashed' => __( 'Dashed', 'crispy' ),
				'double' => __( 'Double', 'crispy' ),
				'groove' => __( 'Groove', 'crispy' ),
				'ridge'  => __( 'Ridge', 'crispy' )
			) );
	}

	public static function icons() {
		return apply_filters( 'crispy/data/icons', array( 'ion-loading-b', 'ion-loading-c', 'ion-loading-d', 'ion-looping', 'ion-refreshing', 'ion-ios7-reloading', 'ion-alert', 'ion-alert-circled', 'ion-android-add', 'ion-android-add-contact', 'ion-android-alarm', 'ion-android-archive', 'ion-android-arrow-back', 'ion-android-arrow-down-left', 'ion-android-arrow-down-right', 'ion-android-arrow-up-left', 'ion-android-arrow-up-right', 'ion-android-battery', 'ion-android-book', 'ion-android-calendar', 'ion-android-call', 'ion-android-camera', 'ion-android-chat', 'ion-android-checkmark', 'ion-android-clock', 'ion-android-close', 'ion-android-contact', 'ion-android-contacts', 'ion-android-data', 'ion-android-developer', 'ion-android-display', 'ion-android-download', 'ion-android-dropdown', 'ion-android-earth', 'ion-android-folder', 'ion-android-forums', 'ion-android-friends', 'ion-android-hand', 'ion-android-image', 'ion-android-inbox', 'ion-android-information', 'ion-android-keypad', 'ion-android-lightbulb', 'ion-android-locate', 'ion-android-location', 'ion-android-mail', 'ion-android-microphone', 'ion-android-mixer', 'ion-android-more', 'ion-android-note', 'ion-android-playstore', 'ion-android-printer', 'ion-android-promotion', 'ion-android-reminder', 'ion-android-remove', 'ion-android-search', 'ion-android-send', 'ion-android-settings', 'ion-android-share', 'ion-android-social', 'ion-android-social-user', 'ion-android-sort', 'ion-android-star', 'ion-android-stopwatch', 'ion-android-storage', 'ion-android-system-back', 'ion-android-system-home', 'ion-android-system-windows', 'ion-android-timer', 'ion-android-trash', 'ion-android-volume', 'ion-android-wifi', 'ion-archive', 'ion-arrow-down-a', 'ion-arrow-down-b', 'ion-arrow-down-c', 'ion-arrow-expand', 'ion-arrow-graph-down-left', 'ion-arrow-graph-down-right', 'ion-arrow-graph-up-left', 'ion-arrow-graph-up-right', 'ion-arrow-left-a', 'ion-arrow-left-b', 'ion-arrow-left-c', 'ion-arrow-move', 'ion-arrow-resize', 'ion-arrow-return-left', 'ion-arrow-return-right', 'ion-arrow-right-a', 'ion-arrow-right-b', 'ion-arrow-right-c', 'ion-arrow-shrink', 'ion-arrow-swap', 'ion-arrow-up-a', 'ion-arrow-up-b', 'ion-arrow-up-c', 'ion-at', 'ion-bag', 'ion-battery-charging', 'ion-battery-empty', 'ion-battery-full', 'ion-battery-half', 'ion-battery-low', 'ion-beaker', 'ion-beer', 'ion-bluetooth', 'ion-bookmark', 'ion-briefcase', 'ion-bug', 'ion-calculator', 'ion-calendar', 'ion-camera', 'ion-card', 'ion-chatbox', 'ion-chatbox-working', 'ion-chatboxes', 'ion-chatbubble', 'ion-chatbubble-working', 'ion-chatbubbles', 'ion-checkmark', 'ion-checkmark-circled', 'ion-checkmark-round', 'ion-chevron-down', 'ion-chevron-left', 'ion-chevron-right', 'ion-chevron-up', 'ion-clipboard', 'ion-clock', 'ion-close', 'ion-close-circled', 'ion-close-round', 'ion-cloud', 'ion-code', 'ion-code-download', 'ion-code-working', 'ion-coffee', 'ion-compass', 'ion-compose', 'ion-connection-bars', 'ion-contrast', 'ion-disc', 'ion-document', 'ion-document-text', 'ion-drag', 'ion-earth', 'ion-edit', 'ion-egg', 'ion-eject', 'ion-email', 'ion-eye', 'ion-eye-disabled', 'ion-female', 'ion-filing', 'ion-film-marker', 'ion-flag', 'ion-flash', 'ion-flash-off', 'ion-flask', 'ion-folder', 'ion-fork', 'ion-fork-repo', 'ion-forward', 'ion-game-controller-a', 'ion-game-controller-b', 'ion-gear-a', 'ion-gear-b', 'ion-grid', 'ion-hammer', 'ion-headphone', 'ion-heart', 'ion-help', 'ion-help-buoy', 'ion-help-circled', 'ion-home', 'ion-icecream', 'ion-icon-social-google-plus', 'ion-icon-social-google-plus-outline', 'ion-image', 'ion-images', 'ion-information', 'ion-information-circled', 'ion-ionic', 'ion-ios7-alarm', 'ion-ios7-alarm-outline', 'ion-ios7-albums', 'ion-ios7-albums-outline', 'ion-ios7-arrow-back', 'ion-ios7-arrow-down', 'ion-ios7-arrow-forward', 'ion-ios7-arrow-left', 'ion-ios7-arrow-right', 'ion-ios7-arrow-thin-down', 'ion-ios7-arrow-thin-left', 'ion-ios7-arrow-thin-right', 'ion-ios7-arrow-thin-up', 'ion-ios7-arrow-up', 'ion-ios7-at', 'ion-ios7-at-outline', 'ion-ios7-bell', 'ion-ios7-bell-outline', 'ion-ios7-bolt', 'ion-ios7-bolt-outline', 'ion-ios7-bookmarks', 'ion-ios7-bookmarks-outline', 'ion-ios7-box', 'ion-ios7-box-outline', 'ion-ios7-briefcase', 'ion-ios7-briefcase-outline', 'ion-ios7-browsers', 'ion-ios7-browsers-outline', 'ion-ios7-calculator', 'ion-ios7-calculator-outline', 'ion-ios7-calendar', 'ion-ios7-calendar-outline', 'ion-ios7-camera', 'ion-ios7-camera-outline', 'ion-ios7-cart', 'ion-ios7-cart-outline', 'ion-ios7-chatboxes', 'ion-ios7-chatboxes-outline', 'ion-ios7-chatbubble', 'ion-ios7-chatbubble-outline', 'ion-ios7-checkmark', 'ion-ios7-checkmark-empty', 'ion-ios7-checkmark-outline', 'ion-ios7-circle-filled', 'ion-ios7-circle-outline', 'ion-ios7-clock', 'ion-ios7-clock-outline', 'ion-ios7-close', 'ion-ios7-close-empty', 'ion-ios7-close-outline', 'ion-ios7-cloud', 'ion-ios7-cloud-download', 'ion-ios7-cloud-download-outline', 'ion-ios7-cloud-outline', 'ion-ios7-cloud-upload', 'ion-ios7-cloud-upload-outline', 'ion-ios7-cloudy', 'ion-ios7-cloudy-night', 'ion-ios7-cloudy-night-outline', 'ion-ios7-cloudy-outline', 'ion-ios7-cog', 'ion-ios7-cog-outline', 'ion-ios7-compose', 'ion-ios7-compose-outline', 'ion-ios7-contact', 'ion-ios7-contact-outline', 'ion-ios7-copy', 'ion-ios7-copy-outline', 'ion-ios7-download', 'ion-ios7-download-outline', 'ion-ios7-drag', 'ion-ios7-email', 'ion-ios7-email-outline', 'ion-ios7-eye', 'ion-ios7-eye-outline', 'ion-ios7-fastforward', 'ion-ios7-fastforward-outline', 'ion-ios7-filing', 'ion-ios7-filing-outline', 'ion-ios7-film', 'ion-ios7-film-outline', 'ion-ios7-flag', 'ion-ios7-flag-outline', 'ion-ios7-folder', 'ion-ios7-folder-outline', 'ion-ios7-gear', 'ion-ios7-gear-outline', 'ion-ios7-glasses', 'ion-ios7-glasses-outline', 'ion-ios7-heart', 'ion-ios7-heart-outline', 'ion-ios7-help', 'ion-ios7-help-empty', 'ion-ios7-help-outline', 'ion-ios7-infinite', 'ion-ios7-infinite-outline', 'ion-ios7-information', 'ion-ios7-information-empty', 'ion-ios7-information-outline', 'ion-ios7-ionic-outline', 'ion-ios7-keypad', 'ion-ios7-keypad-outline', 'ion-ios7-lightbulb', 'ion-ios7-lightbulb-outline', 'ion-ios7-location', 'ion-ios7-location-outline', 'ion-ios7-locked', 'ion-ios7-locked-outline', 'ion-ios7-medkit', 'ion-ios7-medkit-outline', 'ion-ios7-mic', 'ion-ios7-mic-off', 'ion-ios7-mic-outline', 'ion-ios7-minus', 'ion-ios7-minus-empty', 'ion-ios7-minus-outline', 'ion-ios7-monitor', 'ion-ios7-monitor-outline', 'ion-ios7-moon', 'ion-ios7-moon-outline', 'ion-ios7-more', 'ion-ios7-more-outline', 'ion-ios7-musical-note', 'ion-ios7-musical-notes', 'ion-ios7-navigate', 'ion-ios7-navigate-outline', 'ion-ios7-paperplane', 'ion-ios7-paperplane-outline', 'ion-ios7-partlysunny', 'ion-ios7-partlysunny-outline', 'ion-ios7-pause', 'ion-ios7-pause-outline', 'ion-ios7-people', 'ion-ios7-people-outline', 'ion-ios7-person', 'ion-ios7-person-outline', 'ion-ios7-personadd', 'ion-ios7-personadd-outline', 'ion-ios7-photos', 'ion-ios7-photos-outline', 'ion-ios7-pie', 'ion-ios7-pie-outline', 'ion-ios7-play', 'ion-ios7-play-outline', 'ion-ios7-plus', 'ion-ios7-plus-empty', 'ion-ios7-plus-outline', 'ion-ios7-pricetag', 'ion-ios7-pricetag-outline', 'ion-ios7-printer', 'ion-ios7-printer-outline', 'ion-ios7-rainy', 'ion-ios7-rainy-outline', 'ion-ios7-recording', 'ion-ios7-recording-outline', 'ion-ios7-redo', 'ion-ios7-redo-outline', 'ion-ios7-refresh', 'ion-ios7-refresh-empty', 'ion-ios7-refresh-outline', 'ion-ios7-reload', 'ion-ios7-rewind', 'ion-ios7-rewind-outline', 'ion-ios7-search', 'ion-ios7-search-strong', 'ion-ios7-skipbackward', 'ion-ios7-skipbackward-outline', 'ion-ios7-skipforward', 'ion-ios7-skipforward-outline', 'ion-ios7-snowy', 'ion-ios7-speedometer', 'ion-ios7-speedometer-outline', 'ion-ios7-star', 'ion-ios7-star-outline', 'ion-ios7-stopwatch', 'ion-ios7-stopwatch-outline', 'ion-ios7-sunny', 'ion-ios7-sunny-outline', 'ion-ios7-telephone', 'ion-ios7-telephone-outline', 'ion-ios7-thunderstorm', 'ion-ios7-thunderstorm-outline', 'ion-ios7-time', 'ion-ios7-time-outline', 'ion-ios7-timer', 'ion-ios7-timer-outline', 'ion-ios7-trash', 'ion-ios7-trash-outline', 'ion-ios7-undo', 'ion-ios7-undo-outline', 'ion-ios7-unlocked', 'ion-ios7-unlocked-outline', 'ion-ios7-upload', 'ion-ios7-upload-outline', 'ion-ios7-videocam', 'ion-ios7-videocam-outline', 'ion-ios7-volume-high', 'ion-ios7-volume-low', 'ion-ios7-wineglass', 'ion-ios7-wineglass-outline', 'ion-ios7-world', 'ion-ios7-world-outline', 'ion-ipad', 'ion-iphone', 'ion-ipod', 'ion-jet', 'ion-key', 'ion-knife', 'ion-laptop', 'ion-leaf', 'ion-levels', 'ion-lightbulb', 'ion-link', 'ion-load-a', 'ion-load-b', 'ion-load-c', 'ion-load-d', 'ion-location', 'ion-locked', 'ion-log-in', 'ion-log-out', 'ion-loop', 'ion-magnet', 'ion-male', 'ion-man', 'ion-map', 'ion-medkit', 'ion-mic-a', 'ion-mic-b', 'ion-mic-c', 'ion-minus', 'ion-minus-circled', 'ion-minus-round', 'ion-model-s', 'ion-monitor', 'ion-more', 'ion-music-note', 'ion-navicon', 'ion-navicon-round', 'ion-navigate', 'ion-no-smoking', 'ion-nuclear', 'ion-paper-airplane', 'ion-paperclip', 'ion-pause', 'ion-person', 'ion-person-add', 'ion-person-stalker', 'ion-pie-graph', 'ion-pin', 'ion-pinpoint', 'ion-pizza', 'ion-plane', 'ion-play', 'ion-playstation', 'ion-plus', 'ion-plus-circled', 'ion-plus-round', 'ion-pound', 'ion-power', 'ion-pricetag', 'ion-pricetags', 'ion-printer', 'ion-radio-waves', 'ion-record', 'ion-refresh', 'ion-reply', 'ion-reply-all', 'ion-search', 'ion-settings', 'ion-share', 'ion-shuffle', 'ion-skip-backward', 'ion-skip-forward', 'ion-social-android', 'ion-social-android-outline', 'ion-social-apple', 'ion-social-apple-outline', 'ion-social-bitcoin', 'ion-social-bitcoin-outline', 'ion-social-buffer', 'ion-social-buffer-outline', 'ion-social-designernews', 'ion-social-designernews-outline', 'ion-social-dribbble', 'ion-social-dribbble-outline', 'ion-social-dropbox', 'ion-social-dropbox-outline', 'ion-social-facebook', 'ion-social-facebook-outline', 'ion-social-freebsd-devil', 'ion-social-github', 'ion-social-github-outline', 'ion-social-googleplus', 'ion-social-googleplus-outline', 'ion-social-hackernews', 'ion-social-hackernews-outline', 'ion-social-linkedin', 'ion-social-linkedin-outline', 'ion-social-pinterest', 'ion-social-pinterest-outline', 'ion-social-reddit', 'ion-social-reddit-outline', 'ion-social-rss', 'ion-social-rss-outline', 'ion-social-skype', 'ion-social-skype-outline', 'ion-social-tumblr', 'ion-social-tumblr-outline', 'ion-social-tux', 'ion-social-twitter', 'ion-social-twitter-outline', 'ion-social-vimeo', 'ion-social-vimeo-outline', 'ion-social-windows', 'ion-social-windows-outline', 'ion-social-wordpress', 'ion-social-wordpress-outline', 'ion-social-yahoo', 'ion-social-yahoo-outline', 'ion-social-youtube', 'ion-social-youtube-outline', 'ion-speakerphone', 'ion-speedometer', 'ion-spoon', 'ion-star', 'ion-stats-bars', 'ion-steam', 'ion-stop', 'ion-thermometer', 'ion-thumbsdown', 'ion-thumbsup', 'ion-trash-a', 'ion-trash-b', 'ion-umbrella', 'ion-unlocked', 'ion-upload', 'ion-usb', 'ion-videocamera', 'ion-volume-high', 'ion-volume-low', 'ion-volume-medium', 'ion-volume-mute', 'ion-waterdrop', 'ion-wifi', 'ion-wineglass', 'ion-woman', 'ion-wrench', 'ion-xbox' ) );
	}

	public static function animations() {
		return apply_filters( 'crispy/data/animations', array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutLeft', 'slideOutRight', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut' ) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		$shortcodes = apply_filters( 'crispy/data/shortcodes', array(
				
				// parallax section
				'agni_section' => array(
					'name' => __( 'Section', 'crispy' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'bgcolor' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#fbfbfb',
							'name' => __( 'Background color', 'crispy' ),
							'desc' => __( 'Choose your background color..', 'crispy' ),
						),	
						'url' => array(
								'type' => 'upload',
								'default' => '',
								'name' => __( 'Background Image', 'crispy' ),
								'desc' => __( 'image will override the background color', 'crispy' ),
						),
						'repeat' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Repeat', 'crispy' ), 'desc' => __( 'do you want to repeat the background', 'crispy' )
						),
						'attachment' => array(
							'type' => 'select',
							'values' => array(
								'scroll' => __( 'Scroll', 'crispy' ),
								'parallax' => __( 'Parallax', 'crispy' ),
								'fixed' => __( 'Fixed', 'crispy' ),
								
							),
							'default' => 'scroll',
							'name' => __( 'Attachment', 'crispy' ),
							'desc' => __( 'how your image should be attached in your background', 'crispy' ),
						),
											
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						),						
						'id' => array(
							'default' => '',
							'name' => __( 'Id', 'crispy' ),
							'desc' => __( 'Extra id for this section useful at onepage', 'crispy' )
						)
					),
					'content' => __( 'Insert container', 'crispy' ),
					'desc' => __( 'Section with parallax feature', 'crispy' ),
					'icon' => 'ion-ios7-albums-outline'
				),
				
				// container
				'agni_container' => array(
					'name' => __( 'Container', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
											
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
						
					),
					'content' => __( 'add row', 'crispy' ),
					'desc' => __( 'container', 'crispy' ),
					'icon' => 'ion-ios7-drag'
				),	
				
				// row
				'agni_row' => array(
					'name' => __( 'Row', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'top' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Top', 'crispy' ),
							'desc' => __( 'Margin top in <b>px</b>!!...', 'crispy' ),
						),	
						'bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Bottom', 'crispy' ),
							'desc' => __( 'Margin bottom in <b>px</b>!!...', 'crispy' ),
						),
											
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
						
					),
					'content' => __( 'add columns', 'crispy' ),
					'desc' => __( 'Row', 'crispy' ),
					'icon' => 'ion-ios7-drag'
				),		
				// column
				'agni_column' => array(
					'name' => __( 'Column', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'choice' => array(
							'type' => 'select',
							'values' => array(
								'12' => __( 'Full width - Default', 'crispy' ),
								'6' => __( 'One half', 'crispy' ),
								'4' => __( 'One third', 'crispy' ),
								'8' => __( 'Two third', 'crispy' ),
								'3' => __( 'One fourth', 'crispy' ),
								'9' => __( 'Three fourth', 'crispy' ),
								'2' => __( 'One Sixth', 'crispy' ),
							),
							'default' => '12',
							'name' => __( 'Choice', 'crispy' ),
						),	
						'offset' => array(
							'type' => 'select',
							'values' => array(
								'0' => __( '0 - Default', 'crispy' ),
								'1' => __( '1', 'crispy' ),
								'2' => __( '2', 'crispy' ),
								'3' => __( '3', 'crispy' )
							),
							'default' => '0',
							'name' => __( 'offset Value', 'crispy' ),
						),					
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'crispy' ),
								'center' => __( 'Center', 'crispy' ),
								'right' => __( 'Right', 'crispy' ),
								'justify' => __( 'Justify', 'crispy' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'crispy' ),
						),
						'top' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 120,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Top', 'crispy' ),
							'desc' => __( 'Margin top in <b>px</b>!!...', 'crispy' ),
						),	
						'bottom' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 120,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Bottom', 'crispy' ),
							'desc' => __( 'Margin bottom in <b>px</b>!!...', 'crispy' ),
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
						
					),
					'content' => __( 'Column content', 'crispy' ),
					'desc' => __( 'Columns', 'crispy' ),
					'icon' => 'ion-ios7-drag'
				),
				
				// row
				'agni_nested_row' => array(
					'name' => __( 'Nested Row', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'top' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Top', 'crispy' ),
							'desc' => __( 'Margin top in <b>px</b>!!...', 'crispy' ),
						),	
						'bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Bottom', 'crispy' ),
							'desc' => __( 'Margin bottom in <b>px</b>!!...', 'crispy' ),
						),	
										
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
						
					),
					'content' => __( 'add columns', 'crispy' ),
					'desc' => __( 'Row within row', 'crispy' ),
					'icon' => 'ion-ios7-drag'
				),		
				// column
				'agni_nested_column' => array(
					'name' => __( 'Nested Column', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'choice' => array(
							'type' => 'select',
							'values' => array(
								'12' => __( 'Full width - Default', 'crispy' ),
								'6' => __( 'One half', 'crispy' ),
								'4' => __( 'One third', 'crispy' ),
								'8' => __( 'Two third', 'crispy' ),
								'3' => __( 'One fourth', 'crispy' ),
								'9' => __( 'Three fourth', 'crispy' ),
								'2' => __( 'One Sixth', 'crispy' ),
							),
							'default' => '12',
							'name' => __( 'Choice', 'crispy' ),
						),	
						'offset' => array(
							'type' => 'select',
							'values' => array(
								'0' => __( '0 - Default', 'crispy' ),
								'1' => __( '1', 'crispy' ),
								'2' => __( '2', 'crispy' ),
								'3' => __( '3', 'crispy' ),
								'4' => __( '4', 'crispy' ),
								'5' => __( '5', 'crispy' ),
								'6' => __( '6', 'crispy' )
							),
							'default' => '0',
							'name' => __( 'offset Value', 'crispy' ),
						),					
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'crispy' ),
								'center' => __( 'Center', 'crispy' ),
								'right' => __( 'Right', 'crispy' ),
								'justify' => __( 'Justify', 'crispy' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'crispy' ),
						),
						'top' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 120,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Top', 'crispy' ),
							'desc' => __( 'Margin top in <b>px</b>!!...', 'crispy' ),
						),	
						'bottom' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 120,
							'step' => 10,
							'default' => 0,
							'name' => __( 'Margin Bottom', 'crispy' ),
							'desc' => __( 'Margin bottom in <b>px</b>!!...', 'crispy' ),
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
						
					),
					'content' => __( 'Column content', 'crispy' ),
					'desc' => __( 'Columns within column', 'crispy' ),
					'icon' => 'ion-ios7-drag'
				),
				
				// div element
				'agni_div' => array(
					'name' => __( 'Div Element', 'crispy' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'crispy' ),
								'center' => __( 'Center', 'crispy' ),
								'right' => __( 'Right', 'crispy' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'crispy' ),
						),
						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						),
						
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'crispy' ),
							'desc' => __( 'id for div', 'crispy' )
						)
					),
					'content' => __( 'Div element content!!...', 'crispy' ),
					'desc' => __( 'Div', 'crispy' ),
					'icon' => 'ion-ios7-glasses-outline'
				),
				
				
				// image
				'agni_image' => array(
					'name' => __( 'Image', 'crispy' ),
					'type' => 'single',
					'group' => 'box',
					'atts' => array(
						
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Image element', 'crispy' ),
							'desc' => __( 'choose your image to display', 'crispy' ),
						),
						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Image', 'crispy' ),
					'icon' => 'ion-ios7-glasses-outline'
				),
				
				
				// section heading
				'agni_sectionheading' => array(
					'name' => __( 'Section Heading', 'crispy' ),
					'type' => 'single',
					'group' => 'box',
					'atts' => array(
						'choice' => array(
							'type' => 'select',
							'values' => array(
								'1' => __( 'style 1', 'crispy' ),
								'2' => __( 'style 2', 'crispy' ),
							),
							'default' => '1',
							'name' => __( 'Choice', 'crispy' ),
							'desc' => __( 'Choose Your Heading style!!..', 'crispy' )
						),	
						
						'heading' => array(
							'default' => '',
							'name' => __( 'heading', 'crispy' ),
						),	
						'additional' => array(
							'default' => '',
							'name' => __( 'Additional heading', 'crispy' ),
						),			
						
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'crispy' ),
								'center' => __( 'Center', 'crispy' ),
								'right' => __( 'Right', 'crispy' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'crispy' ),
						),
						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Headings', 'crispy' ),
					'icon' => 'ion-ios7-glasses-outline'
				),
				
				
				// heading
				'agni_heading' => array(
					'name' => __( 'Heading', 'crispy' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'choice' => array(
							'type' => 'select',
							'values' => array(
								'3' => __( 'H3', 'crispy' ),
								'1' => __( 'H1', 'crispy' ),
								'2' => __( 'H2', 'crispy' ),
								'4' => __( 'H4', 'crispy' ),
								'5' => __( 'H5', 'crispy' ),
								'6' => __( 'H6', 'crispy' ),								
								'div' => __( 'Div', 'crispy' ),
							),
							'default' => '3',
							'name' => __( 'Choice', 'crispy' ),
							'desc' => __( 'Choose Your Heading!!..', 'crispy' )
						),					
						
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'crispy' ),
								'center' => __( 'Center', 'crispy' ),
								'right' => __( 'Right', 'crispy' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'crispy' ),
						),
						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( 'Leave your heading here!!...', 'crispy' ),
					'desc' => __( 'Headings', 'crispy' ),
					'icon' => 'ion-ios7-glasses-outline'
				),
				
				
				// blockquote
				'agni_blockquote' => array(
					'name' => __( 'Blockquote', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'reverse' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Reverse', 'crispy' ), 'desc' => __( 'if you want to reverse blockquote', 'crispy' )
						),						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( 'Show your Infamous quote here!!..', 'crispy' ),
					'desc' => __( 'Infamous', 'crispy' ),
					'icon' => 'ion-ios7-compose-outline'
				),
				
				// dropcap
				'agni_dropcap' => array(
					'name' => __( 'Dropcap', 'crispy' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'letter' => array(
							'default' => '',
							'name' => __( 'Letter', 'crispy' ),
							'desc' => __( 'First letter of dropcap', 'crispy' )
						),
						
						'choice' => array(
							'type' => 'select',
							'values' => array(
								'box' => __( 'Box', 'crispy' ),
								'circle' => __( 'Circle', 'crispy' )
							),
							'default' => 'default',
							'name' => __( 'Choice', 'crispy' ), 'desc' => __( 'Dropcap preset', 'crispy' )
						),						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( 'Drop your content here', 'crispy' ),
					'desc' => __( 'Dropcap', 'crispy' ),
					'icon' => 'ion-ios7-filing-outline'
				),
				
				// Lifecycle
				'agni_lifecycle' => array(
					'name' => __( 'Life Cycle', 'crispy' ),
					'type' => 'single',
					'group' => 'box',
					'atts' => array(
						
						'number' => array(
							'default' => '',
							'name' => __( 'Lifecycle Text ', 'crispy' ),
							'desc' => __( 'Number or text as per your need!!..', 'crispy' )
						),
						
						'heading' => array(
							'default' => '',
							'name' => __( 'Lifecycle heading', 'crispy' ),
						),
						'desc' => array(
							'default' => '',
							'name' => __( 'Lifecycle description', 'crispy' ),
						),
												
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'lifecycle', 'crispy' ),
					'icon' => 'ion-ios7-reloading'
				),
				
				// service
				'agni_service' => array(
					'name' => __( 'Service', 'crispy' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'crispy' ),
							'desc' => __( 'You can pick the icon from this list', 'crispy' )
						),	
						'title' => array(
							'default' => '',
							'name' => __( 'Service Name', 'crispy' ),
						),			
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( "description of the service", 'crispy' ),
					'desc' => __( 'service', 'crispy' ),
					'icon' => 'ion-ios7-keypad-outline'
				),
				
				// progressbar
				'agni_progressbar' => array(
					'name' => __( 'Progressbar', 'crispy' ),
					'type' => 'single',
					'group' => 'box',
					'atts' => array(
						'value' => array(
							'default' => '',
							'name' => __( 'Title', 'crispy' ),
							'desc' => __( 'Title for the progressbar', 'crispy' )
						),
						'percentage' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 80,
							'name' => __( 'Percentage', 'crispy' ),
							'desc' => __( 'Percentage of progress bar', 'crispy' )
						),	
						'type' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'crispy' ),
								'success' => __( 'Success', 'crispy' ),
								'info' => __( 'Info', 'crispy' ),
								'danger' => __( 'Danger', 'crispy' ),
								'warning' => __( 'Warning', 'crispy' )
							),
							'default' => 'default',
							'name' => __( 'Choice', 'crispy' ), 'desc' => __( 'Dropcap preset', 'crispy' )
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Progress bar', 'crispy' ),
					'icon' => 'ion-ios7-bolt-outline'
				),
				
				// Call to action
				'agni_calltoaction' => array(
					'name' => __( 'Call to action', 'crispy' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'quote' => array(
							'default' => '',
							'name' => __( 'Call text', 'crispy' ),
							'desc' => __( 'quote or text to show!!..', 'crispy' )
						),
						'button' => array(
							'default' => '',
							'name' => __( 'Button Text', 'crispy' ),
							'desc' => __( 'value for the button', 'crispy' )
						),
						'url' => array(
							'values' => array( ),
							'default' => '#',
							'name' => __( 'Link', 'crispy' ),
						),
							
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Call to action', 'crispy' ),
					'icon' => 'ion-ios7-bolt-outline'
				),
				
								
				// list
				'agni_lists' => array(
					'name' => __( 'List', 'crispy' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'crispy' ),
							'desc' => __( 'You can pick the icon from this list', 'crispy' )
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( "<ul><br><li>List item</li><br><li>List item</li><br><li>List item</li><br></ul>", 'crispy' ),
					'desc' => __( 'List style', 'crispy' ),
					'icon' => 'ion-ios7-keypad-outline'
				),
				
				
				// button
				'agni_button' => array(
					'name' => __( 'Button', 'crispy' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '#',
							'name' => __( 'Link', 'crispy' ),
						),
						'Choice' => array(
							'type' => 'select',
							'values' => array(								
								'default' => __( 'Default', 'crispy' ),
								'primary' => __( 'Primary', 'crispy' ),
								'info' => __( 'Info', 'crispy' ),
								'success' => __( 'Success', 'crispy' ),
								'warning' => __( 'Warning', 'crispy' ),
								'danger' => __( 'Danger', 'crispy' ),
							),
							'default' => 'primary',
							'name' => __( 'Choice', 'crispy' ),
						),
						'size' => array(
							'type' => 'select',
							'values' => array(
								'' => '',							
								'lg' => __( 'Large', 'crispy' ),
								'sm' => __( 'Small', 'crispy' ),
								'xs' => __( 'Extra small', 'crispy' ),
								'block' => __( 'Block', 'crispy' ),
							),
							'default' => '',
							'name' => __( 'button Size', 'crispy' ),
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( 'Button', 'crispy' ),
					'desc' => __( 'Buttons', 'crispy' ),
					'icon' => 'ion-ios7-information-outline'
				),
				// icon
				'agni_icon' => array(
					'name' => __( 'Icon', 'crispy' ),
					'type' => 'single',
					'group' => 'box',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'crispy' ),
						),
						'size' => array(
							'type' => 'select',
							'values' => array(							
								'small-icon' => __( 'Small', 'crispy' ),
								'large-icon' => __( 'Large', 'crispy' ),
							),
							'default' => 'large-icon',
							'name' => __( 'Size', 'crispy' ),
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'icons', 'crispy' ),
					'icon' => 'ion-ios7-star-outline'
				),
				
				// Alerts
				'agni_alerts' => array(
					'name' => __( 'Alerts', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(						
						'choice' => array(
							'type' => 'select',
							'values' => array(
								'danger' => __( 'Danger', 'crispy' ),
								'warning' => __( 'Warning', 'crispy' ),
								'success' => __( 'Success', 'crispy' ),
								'info' => __( 'Notification', 'crispy' )
							),
							'default' => 'success',
							'name' => __( 'Choice', 'crispy' ),
						),
						'dismissable' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Dismissable', 'crispy' ), 'desc' => __( 'if you want close button keep it yes', 'crispy' )
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( 'Type your alert message', 'crispy' ),
					'desc' => __( 'Alert box', 'crispy' ),
					'icon' => 'ion-ios7-alarm-outline'
				),
				
				// tabs
				'agni_tabs' => array(
					'name' => __( 'Tabs', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(	
										
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( "<br>[agni_tab id=\"tab1\" active=\"yes\" title=\"Title 1\"]<br>Content 1<br>[/agni_tab]<br>[agni_tab id=\"tab2\" title=\"Title 2\"]<br>Content 2<br>[/agni_tab]<br>[agni_tab id=\"tab3\" title=\"Title 3\"]<br>Content 3<br>[/agni_tab]<br>", 'crispy' ),
					'desc' => __( 'Tabs', 'crispy' ),
					'icon' => 'ion-ios7-upload-outline'
				),
				// tab 		
				'agni_tab' => array(
					'name' => __( 'Tab', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Tab name', 'crispy' ),
							'name' => __( 'Title', 'crispy' ),
							'desc' => __( 'Enter tab name', 'crispy' )
						),		
						'active' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Active tab', 'crispy' ),
						),			
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'crispy' ),
							'desc' => __( 'id to open the tab for ref. note. mandatory', 'crispy' )
						),			
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( 'Tab content', 'crispy' ),
					'desc' => __( 'Single tab', 'crispy' ),
					'icon' => 'ion-ios7-upload'
				),
				// toggle
				'agni_toggle' => array(
					'name' => __( 'Toggle', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Toggle title', 'crispy' ),
							'name' => __( 'Title', 'crispy' ), 'desc' => __( 'Text in spoiler title', 'crispy' )
						),
						'open' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Open', 'crispy' ),
							'desc' => __( 'Is toggle content visible by default', 'crispy' )
						),					
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'crispy' ),
							'desc' => __( 'id to open the toggle for ref. note. mandatory ', 'crispy' )
						),				
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( 'Hidden content', 'crispy' ),
					'desc' => __( 'Toggle with hidden content', 'crispy' ),
					'icon' => 'ion-ios7-heart-outline'
				),
				// accordion
				'agni_accordions' => array(
					'name' => __( 'Accordions', 'crispy' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array( 	
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'content' => __( "<br>[agni_toggle id=\"collapse1\" open=\"yes\" title=\"Toggle\"]<br>Content<br>[/agni_toggle]<br>[agni_toggle id=\"collapse2\" title=\"Toggle\"]<br>Content<br>[/agni_toggle]<br>[agni_toggle id=\"collapse3\" title=\"Toggle\"]<br>Content<br>[/agni_toggle]<br>", 'crispy' ),
					'desc' => __( 'Accordion', 'crispy' ),
					'icon' => 'ion-ios7-heart'
				),
				
				
				//pricing table				
				'agni_pricingtable' => array(
					'name' => __('Pricing table', 'crispy'),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(														
						'featured' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Featured column', 'crispy' ),
							'desc' => __( 'If this is Featured column kindly set <b>yes</b>', 'crispy' )
						),		
												
						'heading' => array(
							'default' => '',
							'name' => __( 'Heading', 'crispy' ), 
							'desc' => __( 'heading of price table eg: standard', 'crispy' )
						),
						'currency' => array(
							'default' => '$',
							'name' => __( 'Currency', 'crispy' ), 
							'desc' => __( 'Currency symbol ', 'crispy' )
						),
						
						'price' => array(
							'default' => '',
							'name' => __( 'Price', 'crispy' ), 
							'desc' => __( 'Subscription charge without symbol and interval <b>eg:100</b>', 'crispy' )
						),
						
						'interval' => array(
							'default' => '',
							'name' => __( 'Interval', 'crispy' ), 
							'desc' => __( 'Interval of payment <b>eg: mo. or yr.</b>', 'crispy' )
						),
						
						'value' => array(
							'default' => '',
							'name' => __( 'Button Value', 'crispy' ), 
							'desc' => __( 'Button value <b>eg:sign up</b>', 'crispy' )
						),				
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						),
						
					
					),
					'content' => '<br><li>Content</li><li>Content</li><li>Content</li><li>Content</li></br>',
					'icon' => 'ion-ios7-minus-outline'				
				),
			
				
				// youtube
				'agni_youtube' => array(
					'name' => __( 'YouTube', 'crispy' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'crispy' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'crispy' )
						),
						
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'crispy' ),
							'desc' => __( 'Player width', 'crispy' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'crispy' ),
							'desc' => __( 'Player height', 'crispy' )
						),
						
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'crispy' ),
							'desc' => __( 'Play video automatically when page is loaded', 'crispy' )
						),
						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'YouTube video player with advanced settings', 'crispy' ),
					'example' => 'media',
					'icon' => 'ion-social-youtube'
				),
				// vimeo
				'agni_vimeo' => array(
					'name' => __( 'Vimeo', 'crispy' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'crispy' ), 'desc' => __( 'Url of Vimeo page with video', 'crispy' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'crispy' ),
							'desc' => __( 'Player width', 'crispy' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'crispy' ),
							'desc' => __( 'Player height', 'crispy' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'crispy' ),
							'desc' => __( 'Play video automatically when page is loaded', 'crispy' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Vimeo video', 'crispy' ),
					'example' => 'media',
					'icon' => 'ion-social-vimeo'
				),
				
						
				// gmap
				'agni_gmap' => array(
					'name' => __( 'Gmap', 'crispy' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'crispy' ),
							'desc' => __( 'Map height', 'crispy' )
						),
								
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Maps by Google', 'crispy' ),
					'icon' => 'ion-ios7-location-outline'
				),
				
				// slider
				'agni_custom_slider' => array(
					'name' => __( 'Slider', 'crispy' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'crispy' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'crispy' )
						),
						
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Customizable image slider', 'crispy' ),
					'icon' => 'ion-ios7-infinite-outline'
				),
				
			
				
				// posts
				'agni_posts' => array(
					'name' => __( 'Posts & Portfolio', 'crispy' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						
						
						'layout' => array(
							'type' => 'select',
							'values' => array(								
								'2' => __( 'Grid', 'crispy' ),
								'3' => __( 'Masonry', 'crispy' ),
								'4' => __( 'Modern', 'crispy' )
							),
							'default' => '4',
							'name' => __( 'Blog Post Layout', 'crispy' ),
							'desc' => __( 'These settings applicable only for <strong>post</strong> post type', 'crispy' )
						),
						'column' => array(
							'type' => 'select',
							'values' => array(								
								'6' => __( '2 Columns', 'crispy' ),
								'4' => __( '3 Columns', 'crispy' ),
								'3' => __( '4 Columns Fullwidth', 'crispy' ),
								'masonry' => __( 'Masonry', 'crispy' )
							),
							'default' => '3',
							'name' => __( 'Portfolio Layout', 'crispy' ),
							'desc' => __( 'These settings applicable only for <strong>portfolio</strong> post type', 'crispy' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'crispy' ),
							'desc' => __( 'Enter comma separated ID\'s of the posts that you want to show', 'crispy' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Posts per page', 'crispy' ),
							'desc' => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'crispy' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => array( 
								'post' => 'Posts',
								'portfolio' => 'Portfolio'
							),
							'default' => 'post',
							'name' => __( 'Post types', 'crispy' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple post types', 'crispy' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => array( 
								'post_tag' => 'Tags',
								'category' => 'Categories',
								'types' =>'Portfolio Categories'
							),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'crispy' ),
							'desc' => __( 'Select taxonomy to show posts from', 'crispy' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Su_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'crispy' ),
							'desc' => __( 'Select terms to show posts from', 'crispy' )
						),
						'author' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Su_Tools::get_users(),
							'default' => 'default',
							'name' => __( 'Authors', 'crispy' ),
							'desc' => __( 'Choose the authors whose posts you want to show.. its only appicable for <strong>"Post"</strong> post type', 'crispy' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'crispy' ),
								'asc' => __( 'Ascending', 'crispy' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'crispy' ),
							'desc' => __( 'Posts order', 'crispy' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'crispy' ),
								'id' => __( 'Post ID', 'crispy' ),
								'author' => __( 'Post author', 'crispy' ),
								'title' => __( 'Post title', 'crispy' ),
								'name' => __( 'Post slug', 'crispy' ),
								'date' => __( 'Date', 'crispy' ), 
								'modified' => __( 'Last modified date', 'crispy' ),
								'rand' => __( 'Random', 'crispy' ), 
								'comment_count' => __( 'Comments number', 'crispy' ),
								'menu_order' => __( 'Menu order', 'crispy' ), 
							),
							'default' => 'date',
							'name' => __( 'Order by', 'crispy' ),
							'desc' => __( 'Order posts by', 'crispy' )
						),
						
						'pagination' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Pagination', 'crispy' ),
							'desc' => __( 'If you want to display pagination make this yes, Its applicable only for Portfolio', 'crispy' )
						),
						
						'filter' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Filter', 'crispy' ),
							'desc' => __( 'Its applicable only for Portfolio', 'crispy' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'crispy' ),
							'desc' => __( 'Select Yes to ignore posts that is sticked', 'crispy' )
						)
					),
					'desc' => __( 'Customizable post & portfolio template', 'crispy' ),
					'icon' => 'ion-ios7-eye-outline'
				),
				
							
				// Team
				'agni_team' => array(
					'name' => __( 'Team Members', 'crispy' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(				
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'members in your team', 'crispy' ),
					'icon' => 'ion-ios7-people-outline'
				),
				
				// Clients
				'agni_clients' => array(
					'name' => __( 'Clients', 'crispy' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(				
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Clients', 'crispy' ),
					'icon' => 'ion-ios7-person-outline'
				),
				
				// testimonials
				'agni_testimonials' => array(
					'name' => __( 'Testimonials', 'crispy' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(				
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'crispy' ),
							'desc' => __( 'Extra CSS class', 'crispy' )
						)
					),
					'desc' => __( 'Testimonials', 'crispy' ),
					'icon' => 'ion-ios7-personadd'
				),
				
				// animate
				'agni_animate' => array(
					'name' => __( 'Animation', 'crispy' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array_combine( self::animations(), self::animations() ),
							'default' => 'bounceIn',
							'name' => __( 'Animation', 'crispy' ),
							'desc' => __( 'Select animation type', 'crispy' )
						),
						
						'inline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Inline', 'crispy' ),
							'desc' => __( 'This parameter determines what HTML tag will be used for animation wrapper. Turn this option to YES and animated element will be wrapped in SPAN instead of DIV. Useful for inline animations, like buttons', 'crispy' )
						),
					),
					'content' => __( 'Animated content', 'crispy' ),
					'desc' => __( 'animation', 'crispy' ),
					'icon' => 'ion-loading-d'
				),
				
			) );
		// Return recrispylt
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}
class Cosme_Theme_Data extends Cosme_Data {
	function __construct() {
		parent::__construct();
	}
}
