<?php
class CosmeTheme {

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Register shortcodes
	 */
	public static function register() {
		// Loop through shortcodes
		foreach ( ( array ) Cosme_Data::shortcodes() as $id => $data ) {
			if ( isset( $data['function'] ) && is_callable( $data['function'] ) ) $func = $data['function'];
			elseif ( is_callable( array( 'Cosme_Shortcodes', $id ) ) ) $func = array( 'Cosme_Shortcodes', $id );
			else continue;
			// Register shortcode
			add_shortcode( $id, $func );
		}
		// Register [media] manually // 3.x
		add_shortcode( 'media', array( 'Cosme_Shortcodes', 'media' ) );
	}

}

/**
 * Register plugin function to perform checks that plugin is installed
 */
function CosmeTheme() {
	return true;
}

new CosmeTheme;
