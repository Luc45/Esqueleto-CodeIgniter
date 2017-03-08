<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estatico extends Admin_Controller {

	public function index($page = 'dashboard') {
		if (!file_exists(APPPATH.'/views/admin/static/'.$page.'.php')) {
			show_404();
		}

		$data['user'] = $this->user;
		$data['site_name'] = $this->site_name;
		$data['title'] = ucfirst($page);
		$data['page'] = $page;
		$data['menu_ativo'] = $page;

		if (isset($_SESSION['message'])) {
			$data['message'] = $_SESSION['message'];
		}

		$this->template->load_admin('static', $page, $data, 'default');

	}



}
