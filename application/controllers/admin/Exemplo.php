<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo extends Admin_Controller {

	/**
	*	mostra uma lista de todos os depoimentos no painel de administração
	*/
	public function index() {

		$data['title'] = ucfirst('depoimentos');
		$data['menu_ativo'] = 'depoimentos';
		$data['submenu_ativo'] = 'ver_depoimentos';

		// Carrega um array com todas as páginas
		$this->load->model('depoimentos_model');
		$data['depoimentos'] = $this->depoimentos_model->getDepoimentos('1000', 'id');

		$this->template->load_admin('depoimentos', 'index', $data, 'default');

	}

	/**
	*	carregar view para editar depoimentos
	*
	*	@param string id
	*/
	public function editar($id) {

		$data['menu_ativo'] = 'depoimentos';
		$data['submenu_ativo'] = 'ver_depoimentos';

		$this->load->model('depoimentos_model');
		$data['depoimento'] = $this->depoimentos_model->getDepoimento($id);
		$data['title'] = $data['depoimento']['nome'];
		

		// Salva os dados
			if (isset($_POST) && !empty($_POST)) {
				// validate form input
				$this->form_validation->set_rules('nome', 'Nome', 'required');
				$this->form_validation->set_rules('texto', 'Depoimento', 'required');

				if ($this->form_validation->run() === TRUE) {

					$form = array(
						'nome' => $this->input->post('nome'),
						'texto'  => $this->input->post('texto'),
					);

					if($this->salvar($id, $form)) {
						$this->session->set_flashdata('success', 'Depoimento editado com sucesso!');
						redirect(admin_url().'/depoimentos', 'refresh');
					}

				} else {
					$this->session->set_flashdata('error', validation_errors());
					redirect(admin_url().'/depoimentos/editar/'.$id, 'refresh');
				}

			}
		// /Salva os dados

		$this->template->load_admin('depoimentos', 'editar' , $data, 'default');

	}

	/**
	*	carrega uma view para cadastrar um novo depoimento
	*/
	public function cadastrar() {
		$data['title'] = 'Cadastrar Depoimento';
		$data['menu_ativo'] = 'depoimentos';
		$data['submenu_ativo'] = 'cadastrar_depoimento';

		// Salva os dados
			if (isset($_POST) && !empty($_POST)) {
				// validate form input
				$this->form_validation->set_rules('nome', 'Nome', 'required');
				$this->form_validation->set_rules('texto', 'Depoimento', 'required');

				if ($this->form_validation->run() === TRUE) {

					$form = array(
						'nome' => $this->input->post('nome'),
						'texto'  => $this->input->post('texto'),
					);

					$this->inserir($form);

				} else {
					$this->session->set_flashdata('error', validation_errors());
					redirect(admin_url().'/depoimentos/cadastrar', 'refresh');
				}

			}
		// /Salva os dados

		$this->template->load_admin('depoimentos', 'cadastrar', $data, 'default');
	}

	/**
	*	salva o depoimento
	*
	* 	@see Depoimentos::editar()
	*
	*	@param string $id do depoimento
	*	@return redirect para a página depoimentos
	*/
	public function salvar($id, $form) {
		$this->db->update('depoimentos', $form, array('id'=>$id));
		$this->session->set_flashdata('success', 'Depoimento editado com sucesso!');
		redirect(admin_url().'/depoimentos', 'refresh');
	}

	/**
	*	deleta um depoimento
	*
	*	@param string $id do depoimento
	*	@return redirect para a página depoimentos
	*/
	public function deletar($id) {
		$this->db->delete('depoimentos', array('id' => $id));
		$this->session->set_flashdata('success', 'Depoimento deletado com sucesso!');
		redirect(admin_url().'/depoimentos', 'refresh');
	}

	/**
	*	cadastra um depoimento
	*
	*	@see Depoimentos::cadastrar()
	*
	*	@param string $id do depoimento
	*	@return redirect para a página depoimentos
	*/
	public function inserir($form) {
		$this->db->insert('depoimentos', $form);
		$this->session->set_flashdata('success', 'Depoimento cadastrado com sucesso!');
		redirect(admin_url().'/depoimentos', 'refresh');
	}

}