<?php
//
//  global-functions.php
//  all-in-one-event-calendar
//
//  Created by The Seed Studio on 2012-02-28.
//

/**
 * Split input into a list of integers
 *
 * @param string $input     String containing integers
 * @param string $separator Separator for integers
 *
 * @return array List (map) of integers
 */
function ai1ec_make_ints_array( $input, $separator = ',' ) {
	$list   = explode( $separator, $input );
	$output = array();
	foreach ( $list as $value ) {
		$value = (int)$value;
		if ( $value > 0 ) {
			$output[$value] = $value;
		}
	}
	return $output;
}



/**
 * is_curl_available function
 *
 * checks if cURL is enabled on the system
 *
 * @return bool
 **/
function is_curl_available() { 
	
	if( ! function_exists( "curl_init" )   && 
      ! function_exists( "curl_setopt" ) && 
      ! function_exists( "curl_exec" )   && 
      ! function_exists( "curl_close" ) ) {
			
			return false; 
	}
	
	return true;
}

/**
 * ai1ec_utf8 function
 *
 * Encode value as safe UTF8 - discarding unrecognized characters.
 * NOTE: objects will be cast as array.
 *
 * @uses iconv               To change encoding
 * @uses mb_convert_encoding To change encoding if `iconv` is not available
 *
 * @param mixed $input Value to encode
 *
 * @return mixed UTF8 encoded value
 *
 * @throws Exception If no trans-coding method is available
 */
function ai1ec_utf8( $input ) {
	if ( NULL === $input ) {
		return NULL;
	}
	if ( is_scalar( $input ) ) {
		if ( function_exists( 'iconv' ) ) {
			return iconv( 'UTF-8', 'UTF-8//IGNORE', $input );
		}
		if ( function_exists( 'mb_convert_encoding' ) ) {
			return mb_convert_encoding( $input, 'UTF-8' );
		}
		throw new Exception(
			'Either `iconv` or `mb_convert_encoding` must be available.'
		);
	}
	if ( ! is_array( $input ) ) {
		$input = (array)$input;
	}
	return array_map( 'ai1ec_utf8', $input );
}
