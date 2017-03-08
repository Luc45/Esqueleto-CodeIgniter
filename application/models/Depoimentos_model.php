<?php

	class Depoimentos_model extends CI_Model {

		public function getDepoimentos($limite = 3) {
			$this->db->order_by('rand()');
			$this->db->limit($limite);
			$depoimentos = $this->db->get('depoimentos')->result_array();
			return $depoimentos;
		}

	}