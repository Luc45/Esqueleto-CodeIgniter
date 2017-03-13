<?php

	class Menus_model extends CI_Model {

		public function getMenus() {
			// Pega os menus na database
			$this->db->from('menu');
			$this->db->order_by('ordem', 'asc');
			$menus = $this->db->get()->result_array();

			$childs = array(); // inizializa um array para removermos os menus child array

			foreach($menus as $key=>$menu) {
				// Manteremos apenas menus parent neste array
				if ($menu['parent_id'] == '') {
					// Verifica se o menu tem filhos
					if ($menu['child_id'] != "") {
						$childs = explode(";", $menu['child_id']);
						foreach ($childs as $child) {
							$key_child = array_search($child, array_column($menus, 'id'));
							$child = $menus[$key_child];
							// Se tiver, cria um array childs ligado à esta chave com ele
							$menus[$key]['childs'][] = $child;
						}
					}
				} else {
					$childs[] = $key;
				}
			}

			// Remove os menus child do array de menus
			foreach ($childs as $child) {
				unset($menus[$child]);
			}
			
			return $menus;
		}

		public function getMenu($id) {
			// Pega os menus na database
			$menus = $this->db->get_where('menu', array('id'=>$id))->result_array();

			$childs = array(); // inizializa um array para removermos os menus child array

			foreach($menus as $key=>$menu) {
				// Verifica se o menu tem filhos
				if ($menu['child_id'] != "") {
					$childs = explode(";", $menu['child_id']);
					foreach ($childs as $child) {
						$child= $this->getSubmenuInfo($child);
						// Se tiver, cria um array childs ligado à esta chave com ele
						$menus[$key]['childs'][] = $child;
					}
				}
			}

			return $menus[0];
		}

		public function getSubmenuInfo($id) {
			$menu = $this->db->get_where('menu', array('id'=>$id))->result_array();
			return $menu[0];
		}

		public function getPageMenuAtivo($page) {
			$menu = $this->db->get_where('paginas', array('url'=>$page))->result_array();
			return $menu[0]['menu_ativo'];
		}

		public function delete_menu($id) {

			// Deleta os childs primeiro
			$menu = $this->db->get_where('menu', array('id' => $id))->result_array();
			$menu = $menu[0];
			$childs = array();

			// Verifica se o menu tem filhos
			if ($menu['child_id'] != "") {
				$childs = explode(";", $menu['child_id']);
				foreach ($childs as $child) {
					$this->db->delete('menu', array('id' => $child));
				}
			}

			// Verifica se é um submenu
			if ($menu['parent_id'] != '') {
				// Pega os dados do parent menu
				$parent_menu = $this->db->get_where('menu', array('id' => $menu['parent_id']))->result_array();
				$parent_menu = $parent_menu[0];
				// Transforma a string child_id 1;2;3 em um array
				$childs = explode(";", $parent_menu['child_id']);
				// Remove esse ID no array de childs
				if(($key = array_search($id, $childs)) !== false) {
				    unset($childs[$key]);
				}
				// Transforma o array em uma string novamente
				$childs = implode(';', $childs);
				// Atualiza o parent no banco de dados
				$data = array(
						'child_id' => $childs
					);
				$this->db->where('id', $menu['parent_id']);
				$this->db->update('menu', $data);
			}
		// Depois deleta o menu
		$this->db->delete('menu', array('id' => $id));
		}

	}
