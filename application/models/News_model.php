<?php

	class News_model extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		public function get_list($uri = false) {

			if ($uri === false) {
				$query = $this->db->get('news');
				return $query->result_array();
			} else {
				$query = $this->db->get_where('news', array('uri'=>$uri));
				return $query->row_array();
			}

		}

		public function add() {

			$this->load->helper('url');

			$uri = url_title($this->input->post('title'), 'dash', TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'uri' => $uri,
				'text' => $this->input->post('text')
			);

			$this->db->insert('news', $data);

		}

	}