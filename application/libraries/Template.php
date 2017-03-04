<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Template {
        var $ci;
         
        function __construct()  {
            $this->ci =& get_instance();
        }

		function load($tipo_view, $pagina = null, $data = null, $template = 'default.php') {

		    if ( ! is_null( $pagina ) ) {
		        if ( file_exists( APPPATH.'views/frontend/'.$tipo_view.'/'.$pagina ) ) {
		            $body_view_path = 'frontend/'.$tipo_view.'/'.$pagina;
		        }
		        else if ( file_exists( APPPATH.'views/frontend/'.$tipo_view.'/'.$pagina.'.php' ) )  {
		            $body_view_path = 'frontend/'.$tipo_view.'/'.$pagina.'.php';
		        }
		        else if ( file_exists( APPPATH.'views/frontend/'.$pagina ) ) {
		            $body_view_path = 'frontend/'.$pagina;
		        }
		        else if ( file_exists( APPPATH.'views/frontend/'.$pagina.'.php' ) ) {
		            $body_view_path = 'frontend/'.$pagina.'.php';
		        }
		        else {
		            show_error('Unable to load the requested file: frontend/' . $tipo_view.'/'.$pagina.'.php');
		        }

		        $body = $this->ci->load->view($body_view_path, $data, TRUE);
		         
		        if ( is_null($data) ) {
		            $data = array('body' => $body);
		        }
		        else if ( is_array($data) ) {
		            $data['body'] = $body;
		        }
		        else if ( is_object($data) ) {
		            $data->body = $body;
		        }
		    }

		    $this->ci->load->view('frontend/templates/'.$template, $data);
		}

		function load_admin($tipo_view, $pagina = null, $data = null, $template = 'default.php') {

		    if ( ! is_null( $pagina ) ) {
		        if ( file_exists( APPPATH.'views/admin/'.$tipo_view.'/'.$pagina ) ) {
		            $body_view_path = 'admin/'.$tipo_view.'/'.$pagina;
		        }
		        else if ( file_exists( APPPATH.'views/admin/'.$tipo_view.'/'.$pagina.'.php' ) )  {
		            $body_view_path = 'admin/'.$tipo_view.'/'.$pagina.'.php';
		        }
		        else if ( file_exists( APPPATH.'views/admin/'.$pagina ) ) {
		            $body_view_path = 'admin/'.$pagina;
		        }
		        else if ( file_exists( APPPATH.'views/admin/'.$pagina.'.php' ) ) {
		            $body_view_path = 'admin/'.$pagina.'.php';
		        }
		        else {
		            show_error('Unable to load the requested file: admin/' . $tipo_view.'/'.$pagina.'.php');
		        }

		        $body = $this->ci->load->view($body_view_path, $data, TRUE);
		         
		        if ( is_null($data) ) {
		            $data = array('body' => $body);
		        }
		        else if ( is_array($data) ) {
		            $data['body'] = $body;
		        }
		        else if ( is_object($data) ) {
		            $data->body = $body;
		        }
		    }

		    $this->ci->load->view('admin/templates/'.$template, $data);
		}


    }