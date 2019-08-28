<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

// ------------------------------------------------------------------------

if ( ! function_exists('base_url'))
{
	/**
	 * Base URL
	 *
	 * Create a local URL based on your basepath.
	 * Segments can be passed in as a string or an array, same as site_url
	 * or a URL to a file can be passed in, e.g. to an image file.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function base_url($uri = '', $protocol = NULL)
	{
		return get_instance()->config->base_url($uri, $protocol);
	}
}

// ------------------------------------------------------------------------

 if ( ! function_exists('assets_url'))
 {
 	/**
 	 * Base URL
 	 *
 	 * Create a local URL based on your basepath.
 	 * Segments can be passed in as a string or an array, same as site_url
 	 * or a URL to a file can be passed in, e.g. to an image file.
 	 *
 	 * @param	string	$uri
 	 * @param	string	$protocol
 	 * @return	string
 	 */
 	function assets_url($uri = '', $protocol = NULL)
 	{
 		return get_instance()->config->base_url($uri, $protocol)."assets/";
 	}
 }


?>