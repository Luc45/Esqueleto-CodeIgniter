<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estatico extends Admin_Controller {

	public function index($page = 'dashboard') {
		if (!file_exists(APPPATH.'/views/admin/static/'.$page.'.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page);
		$data['page'] = $page;
		$data['menu_ativo'] = $page;

		$this->template->load_admin('static', $page, $data, 'default');

	}



}
