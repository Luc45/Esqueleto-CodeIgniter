<?php

	class MY_Controller extends CI_Controller {

		protected $user;

		public function __construct() {

			/*
				Esse controller pode ser usado se você quiser fazer uma table chamada config e configurá-la assim:
				
				id | nome | valor
				1 | site_name | meu_site
				2 | base_url | http://meusite.com.br
				
				E por aí vai. Você vai poder acessar esses valores em qualquer controller que extenda o MY_Controller pelo comando:
				$this->config->item('site_name');
			*/
			parent::__construct();

			// Instancia o CodeIgniter
			$CI =& get_instance();

			// Pega o Config da database
			$config = $CI->db->get('config')->result();

			// Seta no Config do CodeIgniter as seguintes configurações:
			foreach ($config as $key=>$obj) {
				$CI->config->set_item($obj->name, $obj->value);				
			}

			$this->load->library('ion_auth');
			// Torna os dados do usuário disponíveis nas páginas
			$this->user = $this->ion_auth->user()->row();
	        
		}

	}