<?php

	class Menu_model extends CI_Model {

		public function getMenus() {
			// Pega os menus na database
			$menus = $this->db->get('menu')->result_array();

			$childs = array(); // inizializa um array para removermos os menus child array

			foreach($menus as $key=>$menu) {
				// Manteremos apenas menus parent neste array
				if ($menu['is_parent'] == 1) {
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

	}