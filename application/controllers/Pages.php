<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function home() {
		$data['title'] = 'Página Inicial'; // Usado no <title>
		$data['menu_ativo'] = 'home'; // Usado para identificar o menu "active"
		$this->template->load('pages', 'home', $data, 'default'); // a função Load carrega application/views/frontend/(primeiro argumento = tipo de view)/(segundo argumento = nome do arquivo)... Terceiro argumento: Dados que serão passados para a view... Quarto argumento: Template que será carregado da pasta frontend/templates 
	}

	public function contato() {
		$data['title'] = 'Contato';
		$data['menu_ativo'] = 'contato';
		$this->template->load('pages', 'contato', $data, 'default');
	}

	public function not_found() {
		$data['title'] = 'Página não encontrada';
		$data['menu_ativo'] = '';
		$this->template->load('pages', 'not_found', $data, 'default');
	}

}
