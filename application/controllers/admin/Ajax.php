<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Admin_Controller {

        // Exemplo de função
        public function sort_menus() {
            if (isset($_POST) && !empty($_POST)) {
                $i = 0;
                foreach($_POST['id'] as $id) {
                    $sql = "UPDATE menu SET ordem = '".$i."' WHERE id = '".$id."'";
                    $this->db->query($sql);
                    $i++;
                }
            }
        }


}