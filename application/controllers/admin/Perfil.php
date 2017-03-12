<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends Admin_Controller {

	public function index() {

		$data['user'] = $this->user;
		$data['title'] = ucfirst('pagina');
		$data['menu_ativo'] = 'paginas';

		// Carrega um array com todas as páginas
		$this->load->model('paginas_model');
		$data['paginas'] = $this->paginas_model->getPages();

		$this->template->load_admin('paginas', 'paginas', $data, 'default');

	}

	public function editar($id) {

		$data['user'] = $this->user;
		$data['user_edit'] = $this->ion_auth->user()->row($id);
		$data['site_name'] = $this->site_name;
		$data['menu_ativo'] = 'user';
		$data['title'] = 'Editar Perfil';

		$this->template->load_admin('usuario', 'editar' , $data, 'default');

	}

}