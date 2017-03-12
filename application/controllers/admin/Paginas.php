<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('paginas_model');
	}


	/**
	*	carrega a view com a lista de páginas
	*/
	public function index() {

		$data['title'] = ucfirst('pagina');
		$data['menu_ativo'] = 'paginas';
		$data['submenu_ativo'] = 'ver_paginas';

		$data['paginas'] = $this->paginas_model->getPages();

		$this->template->load_admin('paginas', 'paginas', $data, 'default');

	}

	/**
	*	carrega a view de editar página
	*	@param string $id
	*/
	public function editar($id) {

		$data['menu_ativo'] = 'paginas';
		$data['submenu_ativo'] = 'ver_paginas';

		$data['scripts_adicionais'] = array('ckeditor/ckeditor.js');

		$data['pagina'] = $this->paginas_model->getPage($id);
		$data['title'] = $data['pagina']['titulo'];

		// Salva os dados
			if (isset($_POST) && !empty($_POST)) {

				// validate form input
				$this->form_validation->set_rules('titulo', 'Título', 'required');
				$this->form_validation->set_rules('url', 'URL', 'required');
				$this->form_validation->set_rules('corpo', 'Conteúdo', 'required');

				if ($this->form_validation->run() === TRUE) {
					$form = array(
						'titulo' => $this->input->post('titulo'),
						'url'  => $this->input->post('url'),
						'corpo'  => $this->input->post('corpo'),
					);

					$this->salvar($id, $form);

				} else {
					$this->session->set_flashdata('error', validation_errors());
					redirect(admin_url().'paginas/editar/'.$id, 'location');
				}

			}
		// /Salva os dados

		$this->template->load_admin('paginas', 'editar' , $data, 'default');
	}


	/**
	*	carrega a view de criar página
	*/
	public function criar() {
		$data['title'] = 'Criar Página';
		$data['menu_ativo'] = 'paginas';
		$data['submenu_ativo'] = 'criar_pagina';

		$data['scripts_adicionais'] = array('ckeditor/ckeditor.js');

		// Salva os dados
			if (isset($_POST) && !empty($_POST)) {

				// validate form input
				$this->form_validation->set_rules('titulo', 'Título', 'required');
				$this->form_validation->set_rules('url', 'URL', 'required');
				$this->form_validation->set_rules('corpo', 'Conteúdo', 'required');

				if ($this->form_validation->run() === TRUE) {
					$form = array(
						'titulo' => $this->input->post('titulo'),
						'url'  => $this->input->post('url'),
						'corpo'  => $this->input->post('corpo'),
					);

					$this->insert($form);

				} else {
					$this->session->set_flashdata('error', validation_errors());
					redirect(admin_url().'paginas/criar', 'location');
				}

			}
		// /Salva os dados

		$this->template->load_admin('paginas', 'criar' , $data, 'default');
	}

	/**
	*	insere um novo menu no banco
	*
	* 	@see Paginas::criar()
	*
	*	@param string $id
	*	@return redirect para a página de paginas
	*/
	public function insert($form) {
		$this->db->insert('paginas', $form);
		$this->session->set_flashdata('success', 'Página criada com sucesso!');
		$this->session->set_flashdata('message', 'Não se esqueça de criar o menu correspondente à esta página!');
		redirect(admin_url().'paginas', 'location');
	}

	/**
	*	salva o menu
	*
	* 	@see Paginas::editar()
	*
	*	@param string $id
	*	@return redirect para a página de paginas
	*/
	public function salvar($id, $form) {
		$this->db->update('paginas', $form, array('id'=>$id));
		$this->session->set_flashdata('success', 'Página editada com sucesso!');
		redirect(admin_url().'paginas', 'location');
	}

	/**
	*	deleta uma página
	*
	*	@param string $id
	*	@return redirect para a página de páginas
	*/
	public function deletar($id) {
		$this->paginas_model->delete_pagina($id);
		$this->session->set_flashdata('success', 'Página deletada com sucesso!');
		redirect(admin_url().'paginas', 'location');
	}

}