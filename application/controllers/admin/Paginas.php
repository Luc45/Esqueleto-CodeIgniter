<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas extends CI_Controller {

	private $user;

	public function __construct() {
		parent::__construct();

        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library('ion_auth');
        $this->load->remove_package_path(APPPATH.'third_party/ion_auth/');

		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		}

		// Torna os dados do usuário disponíveis nas páginas
		$this->user = $this->ion_auth->user()->row();

	}

	/*
		Isso é só exemplo de código, pode deletar!
	*/

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
		$data['menu_ativo'] = 'paginas';

		// Carrega um array com todas as páginas
		$this->load->model('paginas_model');
		$data['pagina'] = $this->paginas_model->getPage($id);
		$data['title'] = $data['pagina']['titulo'];

		$this->template->load_admin('paginas', 'editar' , $data, 'default');

	}

}