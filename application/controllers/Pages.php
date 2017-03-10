<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	private $menus;

	public function __construct() {
		parent::__construct();
		$this->load->model('menu_model');
		$this->menus = $this->menu_model->getMenus();
	}

	public function home() {
		$data['title'] = 'Página Inicial'; // Usado no <title>
		$data['menu_ativo'] = 'home'; // Usado para identificar o menu "active"
		$data['menus'] = $this->menus;

		/*
		* function load()
		*
		* Carrega uma view da pasta application/views/frontend/$arg1/$arg2
		* $arg 3 = $data que será passada para a view
		* $arg 4 = Template que será carregado da pasta frontend/templates (padrão: default)
		*/
		$this->template->load('pages', 'home', $data, 'default');
	}

	public function contato() {
		$data['title'] = 'Contato';
		$data['menu_ativo'] = 'contato';
		$data['menus'] = $this->menus;
		$this->template->load('pages', 'contato', $data, 'default');
	}

	public function not_found() {
		$data['title'] = 'Página não encontrada';
		$data['menu_ativo'] = '';
		$data['menus'] = $this->menus;
		$this->template->load('pages', 'not_found', $data, 'default');
	}

}
