<?php

	class MY_Controller extends CI_Controller {

		public function __construct() {
			parent::__construct();

			/*
			*	controller integrado com database config
			*
			*	esse controler deve ser usado caso você use uma table config no seu banco de dados
			*	ele pega todas as configurações do banco e torna elas disponíveis para uso nos controllers.
			*
			*	examplo:
			*	table config
			*		id    nome        valor
			*   	0     template    default
			*
			* 	controller Pages.php
			*		$this->load->template('pages', 'home', $data, $this->config->item('template'));
			*/

			// Instancia o CodeIgniter
			$CI =& get_instance();

			// Pega o Config da database
			$config = $CI->db->get('config')->result();

			// Seta no Config do CodeIgniter as seguintes configurações:
			foreach ($config as $key=>$obj) {
				$CI->config->set_item($obj->name, $obj->value);				
			}

			$this->load->library('ion_auth');
			
			$global_data = array('user'=>$this->ion_auth->user()->row(), 'site_name'=>$this->config->item('site_title'));
			$this->load->vars($global_data);
	        
		}

	}