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