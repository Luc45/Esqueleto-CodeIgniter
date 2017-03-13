<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page = 'home') {

		$this->load->model('menus_model');

		$data['title'] = '';

		if ($page == "home") {
			$data['title'] = 'Home';
		}

		$data['menus'] = $this->menus_model->getMenus();
		$data['menu_ativo'] = $page;

		$this->load->model('paginas_model');

		if (file_exists(APPPATH.'views/frontend/pages/'.$page.'.php')) {
			// Existe uma view com esse nome, vamos carregá-la
			$this->template->load('pages', $page, $data, 'default');
		} else {
			if ($this->paginas_model->paginaExisteNoDb($page) == true) {
				// Existe essa página no banco de dados, vamos carregá-la
				$data['menu_ativo'] = $this->menus_model->getPageMenuAtivo($page);
				$this->template->load_from_db('pages', $page, $data, 'default');
			} else {
				// Não exite nem view, nem no banco. Erro 404.
				$this->template->load('pages', 'not_found', $data, 'default');
			}
		}
	}

}
