<?php
	
	class News extends MY_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('news_model');
			$this->load->helper('url_helper');
		}

		public function index() {
			$data['news'] = $this->news_model->get_list();
			$data['title'] = 'Todas as Notícias';
			$this->load->view('templates/header.php', $data);
			$this->load->view('news/index.php', $data);
			$this->load->view('templates/footer.php', $data);
		}

		public function view($uri) {
			if (isset($uri)) {
				$data['news_item'] = $this->news_model->get_list($uri);

				if (empty($data['news_item'])) {
					show_404();
				}
				$data['title'] = $data['news_item']['title'];
			$this->load->view('templates/header.php', $data);
			$this->load->view('news/view.php', $data);
			$this->load->view('templates/footer.php', $data);
			} else {
				show_404();
			}
		}

		public function create() {

			$this->load->helper("form");
			$this->load->library("form_validation");

			$data['title'] = "Crie uma nova notícia";

			$this->form_validation->set_rules('title', 'Titulo', 'required');
			$this->form_validation->set_rules('text', 'Texto', 'required');

			if ($this->form_validation->run() === false) {
				$this->load->view('templates/header.php', $data);
				$this->load->view('news/create.php', $data);
				$this->load->view('templates/footer.php', $data);
			} else {
				$this->news_model->add();
				$this->load->view('news/success.php', $data);
			}

		}

	}