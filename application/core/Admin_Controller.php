<?php

	class Admin_Controller extends MY_Controller {

		protected $user;

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
			// Torna os dados do usuário disponíveis nas páginas
			$this->user = $this->ion_auth->user()->row();
	        
		}

	}