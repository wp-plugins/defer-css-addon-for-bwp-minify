<?php
/*
Plugin Name: Defer CSS Addon for BWP Minify
Plugin URI: http://blogestudio.com
Description: An add-on for BWP Minify plugin that can defer CSS load dynamically from the footer of the page.
Version: 1.0
Author: Pau Iglesias, Blogestudio
License: GPLv2 or later
*/

// Avoid script calls via plugin URL
if (!function_exists('add_action'))
	die;

// Quick context check
if (is_admin() || (DEFINED('DOING_AJAX') && DOING_AJAX))
	return;

// Check function name to avoid conflicts
if (!function_exists('be_defer_css__bwp_get_minify_tag')) {
	
	// Hook from main plugin (support old and new version filters)
	add_filter('bwp_get_minify_tag', 'be_defer_css__bwp_get_minify_tag', 10, 4);
	add_filter('bwp_minify_get_tag', 'be_defer_css__bwp_get_minify_tag', 10, 4);



	/**
	 * Hook response to BWM get minify tag
	 */
	function be_defer_css__bwp_get_minify_tag($return, $string, $type, $media) {
		
		// Check style and not conditional load
		if ('style' == $type && false === stripos($return, '[if')) {
			
			// Check URL
			$line = explode("href='", $return);
			$pos = strpos($line[1], "'");
			if ($pos > 0) {
				
				// Copy URL
				global $be_defer_css__url;
				$be_defer_css__url = substr($line[1], 0, $pos);
				
				// Disabled javascript mode
				$return = "\n\n".'<noscript><link href="'.$be_defer_css__url.'" rel="stylesheet" media="all" type="text/css" /></noscript>'."\n\n";
				
				// Extend this addon
				$return = apply_filters('be_defer_css__bwp_get_minify_tag', $return);
				
				// Load in footer
				add_action('wp_footer', 'be_defer_css__wp_footer', 0);
				
				// Login page support
				add_action('login_footer', 'be_defer_css__wp_footer', 0);
			}
		}
		
		// Done
		return $return;
	}



	/**
	 * Load javascript asynchronously in footer
	 */
	function be_defer_css__wp_footer() {
		global $be_defer_css__url;
		echo apply_filters('be_defer_css__async_load', "\n\n".'<script type="text/javascript">;var be_css_defer=document.createElement("link");be_css_defer.rel="stylesheet";be_css_defer.type="text/css";be_css_defer.href="'.$be_defer_css__url.'";document.getElementsByTagName("head")[0].appendChild(be_css_defer);</script>'."\n\n");
	}



}