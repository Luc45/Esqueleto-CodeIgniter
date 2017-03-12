<?php

	class Imagens_model extends CI_Model {

		public function upload($arquivo) {
			$data = array(
					'arquivo' => $arquivo,
					'data_uploaded' => date('Y-m-d H:i:s')
				);
			$this->db->insert('imagens', $data);
		}

	}