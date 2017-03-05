<?php

	class MY_Controller extends CI_Controller {

		public function __construct() {

			parent::__construct();

			// Seta o base_url de acordo com um valor da database (opcional)
	        $CI =& get_instance();
	        $row = $CI->db->get_where('config', array('name' => 'site_url'))->row();
	        $CI->config->set_item('base_url', $row->value);
	        
		}

	}