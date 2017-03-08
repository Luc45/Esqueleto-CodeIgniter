<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url()')) {
	function asset_url(){ 
	  return base_url().'assets/';
	}
}

if (!function_exists('asset_url_admin()')) {
	function asset_url_admin(){ 
	  return base_url().'assets/admin/';
	}
}

if (!function_exists('admin_url()')) {
	function admin_url(){ 
	  return base_url().'admin/';
	}
}

if (!function_exists('show_my_404()')) {
	function show_my_404(){   
	    redirect('404', 'location');  
	}
}

/**
 * Get excerpt from string
 * 
 * @param String $str String to get an excerpt from
 * @param Integer $startPos Position int string to start excerpt from
 * @param Integer $maxLength Maximum length the excerpt may be
 * @return String excerpt
 */
if (!function_exists('getExcerpt()')) {
	function getExcerpt($str, $startPos=0, $maxLength=50) {
		if(strlen($str) > $maxLength) {
			$excerpt   = substr($str, $startPos, $maxLength-3);
			$lastSpace = strrpos($excerpt, ' ');
			$excerpt   = substr($excerpt, 0, $lastSpace);
			$excerpt  .= '...';
		} else {
			$excerpt = $str;
		}
		
		return $excerpt;
	}
}