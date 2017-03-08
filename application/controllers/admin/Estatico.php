<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estatico extends CI_Controller {

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

	public function index($page = 'dashboard') {

		if (!file_exists(APPPATH.'/views/admin/static/'.$page.'.php')) {
			show_404();
		}

		$data['user'] = $this->user;
		$data['title'] = ucfirst($page);
		$data['page'] = $page;
		$data['menu_ativo'] = $page;

		$this->template->load_admin('static', $page, $data, 'default');

	}



}
