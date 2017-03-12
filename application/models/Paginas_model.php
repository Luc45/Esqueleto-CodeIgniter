<?php

	class Paginas_model extends CI_Model {

		public function paginaExisteNoDb($page) {
			$query = $this->db->get_where('paginas', array('url' => $page));
			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function getPages($limite = -1) {
			$paginas = $this->db->get('paginas')->result_array();
			return $paginas;
		}

		public function getPage($id) {
			$pagina = $this->db->get_where('paginas', array('id' => $id))->result_array();
			return $pagina[0];
		}

		public function delete_pagina($id) {
			$this->db->delete('paginas', array('id'=>$id));
		}

	}