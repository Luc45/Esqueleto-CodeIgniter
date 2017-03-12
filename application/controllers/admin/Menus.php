<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('menus_model');
	}

	/**
	*	mostra uma lista de todos os depoimentos no painel de administração
	*/
	public function index() {

		$data['title'] = 'Menus';
		$data['menu_ativo'] = 'menus';
		$data['submenu_ativo'] = 'ver_menus';

		// Carrega um array com todas os menus
		$data['menus'] = $this->menus_model->getMenus();

		$this->template->load_admin('menus', 'index', $data, 'default');

	}

	/**
	*	carregar view para editar menus
	*
	*	@param string id
	*/
	public function editar($id) {

		$data['title'] = 'Editar Menu';
		$data['menu_ativo'] = 'menus';

		$data['menu'] = $this->menus_model->getMenu($id);		

		// Salva os dados
			if (isset($_POST) && !empty($_POST)) {
				// validate form input
				$this->form_validation->set_rules('name', 'Nome', 'required');

				if ($this->form_validation->run() === TRUE) {

					$form = array(
						'name' => $this->input->post('name'),
						'url'  => $this->input->post('url'),
					);

					$this->salvar($id, $form);

				} else {
					$this->session->set_flashdata('error', validation_errors());
					redirect(admin_url().'menus/editar/'.$id, 'location');
				}

			}
		// /Salva os dados

		$this->template->load_admin('menus', 'editar' , $data, 'default');

	}

	/**
	*	salva o menu
	*
	* 	@see Menus::editar()
	*
	*	@param string $id do menu
	*	@return redirect para a página menus
	*/
	public function salvar($id, $form) {
		$this->db->update('menu', $form, array('id'=>$id));
		$this->session->set_flashdata('success', 'Menu editado com sucesso!');
		redirect(admin_url().'menus', 'location');
	}

	/**
	*	deleta um menu
	*
	*	@param string $id do menu
	*	@return redirect para a página menus
	*/
	public function deletar($id) {
		$this->menus_model->delete_menu($id);
		$this->session->set_flashdata('success', 'Menu deletado com sucesso!');
		redirect(admin_url().'menus', 'location');
	}

	/**
	*	cadastra um menu
	*
	*	@see Menus::cadastrar()
	*
	*	@param string $id do depoimento
	*	@return redirect para a página menus
	*/
	public function inserir($form) {
		$this->db->insert('menu', $form);
		$this->session->set_flashdata('success', 'Menu criado com sucesso!');
		redirect(admin_url().'menus', 'location');
	}

}