<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page = 'home') {

		if (!file_exists(APPPATH.'views/frontend/pages/'.$page.'.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page);

		$this->template->load('pages', $page, $data, 'default');

	}

}
