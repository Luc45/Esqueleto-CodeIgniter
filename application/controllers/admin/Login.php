<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library('ion_auth');
        $this->load->remove_package_path(APPPATH.'third_party/ion_auth/');

	}

	public function index() {

		// Se estiver logado manda para a página de login
		if ($this->ion_auth->logged_in()) {
			redirect('admin');
		}

		// Usuário mandou dados para logar
		if (isset($_POST)) {

			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('senha', 'Senha', 'required');

			if ($this->form_validation->run() == TRUE) {
				// Form válido!
				$email = $this->input->post('email');
				$senha = $this->input->post('senha');
				$lembrar = $this->input->post('lembrar');

				$ip_usuario = $this->input->ip_address();

				if ($lembrar == "on") {
					$lembrar = TRUE;
				} else {
					$lembrar = FALSE;
				}

				// Brute Force Protection
				if ($this->ion_auth->is_max_login_attempts_exceeded($ip_usuario)) {
					$this->session->set_flashdata('message', 'Você errou a senha muitas vezes. Aguarde alguns minutos para tentar novamente...');
					redirect('login');
				}

				if (!$this->ion_auth->login($email, $senha, $lembrar)) {
					// Senha incorreta
					$this->ion_auth->increase_login_attempts($ip_usuario);
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				} else {
					// Senha correta
					redirect('admin');
				}



				//redirect('/admin');
			} else {
				$this->template->load_admin_login();
			}
		}

		// Caso contrário, carrega o view de login
		$this->template->load_admin_login();
	}

	public function logout() {
		$this->ion_auth->logout();
		redirect('login');
	}

}
