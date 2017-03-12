<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Admin_Controller {

        /**
        *   função para certificar que um determinado $_POST é do tipo numérico
        *   pode ser passado uma string ou um array
        */
        public function apenas_numeros($post) {
                // Verifica que recebemos apenas números no $_POST
                if (is_array($post)) {
                    foreach ($post as $post_single) {
                        if (is_array($post_single)) {
                            foreach ($post_single as $post_single_array) {
                                if (!is_numeric($post_single_array)) {
                                    echo 'Valor ilegal: '.$post_single_array;
                                    exit;
                                }   
                            }
                        } else {
                            if (!is_numeric($post_single)) {
                                echo 'Valor ilegal: '.$post_single;
                                exit;
                            }
                        }
                    }
                } else {
                    if (!is_numeric($post)) {
                        echo 'Valor ilegal: '.$post;
                        exit;
                    }
                }
        }

        /**
        *   atualiza a ordem dos menus
        *   usado em /admin/menus
        */
        public function sort_menus() {
            if (isset($_POST) && !empty($_POST)) {
                $this->apenas_numeros($_POST);
                $i = 0;
                foreach($_POST['id'] as $id) {
                    $sql = "UPDATE menu SET ordem = '".$i."' WHERE id = '".$id."'";
                    $this->db->query($sql);
                    $i++;
                }
            }
        }
        
        /**
        *   atualiza a ordem dos submenus
        *   usado em /admin/menus/editar/$id
        */
        public function sort_submenus() {
            if (isset($_POST) && !empty($_POST)) {
                $this->apenas_numeros($_POST);
                $childs = implode(";", $_POST['id']);
                echo $childs."|".$_POST['extra_data'];
                $sql = "UPDATE menu SET child_id = '".$childs."' WHERE id = '".$_POST['extra_data']."'";
                $this->db->query($sql);
            }
        }

        /**
        *   cria um novo submenu
        *   usado em /admin/menus/editar/$id
        */
        public function adicionar_submenu() {

            $this->apenas_numeros($_POST['parent_id']);
            $parent_id = addslashes($_POST['parent_id']);
            $submenu = addslashes($_POST['submenu']);
            $slug = slugify($submenu);

            $data = array(
                    'name' => $submenu,
                    'url' => $slug,
                    'parent_id' => $parent_id,
                    'ordem' => 10
                );
            // Adiciona o submenu
            $this->db->insert('menu', $data);
            $child_id = $this->db->insert_id();

            // Edita o parent
            $parent_menu = $this->db->get_where('menu', array('id' => $parent_id))->result_array();

                // Verifica se o menu tem filhos
                $parent_menu_children = $parent_menu[0]['child_id'];
                if ($parent_menu_children != "") {
                    $parent_menu_children .= ';'.$child_id;
                } else {
                    $parent_menu_children = $child_id;
                }
                $data = array(
                        'child_id' => $parent_menu_children
                    );
                $this->db->where('id', $parent_id);
                $this->db->update('menu', $data);

                $return = array(
                        'name' => $submenu,
                        'slug' => $slug,
                        'id' => $child_id
                    );
                echo json_encode($return);
        }

        /**
        *   cria um novo menu
        *   usado em /admin/menus
        */
        public function adicionar_menu() {

            $menu = addslashes($_POST['menu']);
            $slug = slugify($menu);

            $data = array(
                    'name' => $menu,
                    'url' => $slug,
                    'ordem' => 10
                );

            // Adiciona o menu
            $this->db->insert('menu', $data);
        }

        /**
        *   upload de imagens integrado com CKEditor
        */
        public function upload_image() {
            if(!isset($_FILES['upload']) || empty($_FILES['upload']['tmp_name'])) {
                die('This file cannot be accessed directly.');
            }

            $imagem = $_FILES['upload'];

            if (in_array($imagem['type'], array('image/jpg', 'image/jpeg', 'image/png'))) {
                    $extensao = '.jpg';
                if ($imagem['type'] == 'image/png') {
                    $extensao = '.png';
                } elseif ($imagem['type'] == 'image/gif') {
                    $extensao = '.gif';
                }
                $md5imagem = md5(time().mt_rand(0,9999));
                $arquivo_imagem = $md5imagem.$extensao;
                move_uploaded_file($imagem['tmp_name'], FCPATH.'assets/img/uploaded/'.$arquivo_imagem);

                $this->load->model('imagens_model');
                $this->imagens_model->upload($arquivo_imagem);

                $retorno = array(
                        'uploaded' => 1,
                        "fileName" => $arquivo_imagem,
                        "url" => base_url()."assets/img/uploaded/".$arquivo_imagem
                    );

                /**
                *   @todo usuário fez upload pela toolbar
                *
                */
                echo json_encode($retorno);
            }

        }

}