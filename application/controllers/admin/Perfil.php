<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends Admin_Controller {

	public function editar($id) {

		$data['user'] = $this->user;
		$data['user_edit'] = $this->ion_auth->user()->row($id);
		$data['site_name'] = $this->site_name;
		$data['menu_ativo'] = 'user';
		$data['title'] = 'Editar Perfil';

		$this->template->load_admin('usuario', 'editar' , $data, 'default');

	}

}