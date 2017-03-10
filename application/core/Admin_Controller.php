<?php

	class Admin_Controller extends CI_Controller {

		public function __construct() {
			parent::__construct();

	        $this->load->library('ion_auth');

	        // Verifica se o usuário está logado
			if (!$this->ion_auth->logged_in()) {
				redirect(base_url().'login');
			}
			// Verifica se o usuário é administrador
			if (!$this->ion_auth->is_admin()) {
				redirect(base_url());
			}

			/*
			*	Opcional: Faz com que a variável $user possa ser chamada em qualquer view sem ter que ser passada no $data, e $site_name também.
			*/
			//$global_data = array('user'=>$this->ion_auth->user()->row(), 'site_name'=>$this->config->item('site_title'));
			//$this->load->vars($global_data);
	        
		}

	}