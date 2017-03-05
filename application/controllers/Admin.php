<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function view($page = 'dashboard') {

		if (!file_exists(APPPATH.'/views/admin/pages/'.$page.'.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page);
		$data['page'] = $page;

		$this->template->load_admin('pages', $page, $data, 'default');

	}
}
