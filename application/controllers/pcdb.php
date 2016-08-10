<?php

class Pcdb extends CI_Controller {
    
    function index() {
        $data['lists'] = $this->pcdb_model->get_all_lists();
        $data['items'] = $this->pcdb_model->get_all_items();
        $this->load->view('index', $data);
    }
    
    function get_list_name() {
        $data['list_name'] = $this->pcdb_model->get_list_name();
//        var_dump($data);die();
        $this->load->view('list_items', $data);
    }
    
    //display the details about the list and its items
    function list_items() {
        $data['list_items'] = $this->pcdb_model->get_list_items();
//        var_dump($data);die();
        $this->load->view('list_items', $data);
    }
    
    function item() {
        $data['item'] = $this->pcdb_model->get_item();
//        var_dump($data);die();
        $this->load->view('item', $data);
    }
    
    function load_create_list_form() {
        $this->load->view('forms/create_list');
    }
    
    function create_list() {
        $this->load->library('form_validation');
        //field name, error message, validation rules
        $this->form_validation->set_rules('lists-name', 'List Name', 'trim|required|min_length[4]|max_length[45]');
        
        if($this->form_validation->run() == FALSE) {
            $this->load_create_list_form();
        } else {
            $list_param['list_name'] = $this->input->post('lists-name');
            $this->pcdb_model->create_list($list_param);
            redirect('pcdb/index');
          }   
    }
    
    function delete_list() {
        $query = $this->pcdb_model->delete_list();
        if($query) {
            redirect('pcdb/index');
        } else {
            redirect('pcdb/list_items/' . $this->uri->segment(4));
        }
    }
    
    //get the info for the list that has to be updated to populate the fields
    function load_update_list_form() {
        $data['list_info'] = $this->pcdb_model->get_list_info();
//        var_dump($data);die();
        $this->load->view('forms/update_list', $data);
    }
    
    function update_list() {
        $this->load->library('form_validation');
        //field name, error message, validation rules
        $this->form_validation->set_rules('lists-name', 'List Name', 'trim|required|min_length[4]|max_length[45]');
        if($this->form_validation->run()) {
            $list_param['list_name'] = $this->input->post('lists-name');
            $this->pcdb_model->update_list($list_param);
            redirect('pcdb/list_items/' . $this->uri->segment(3));
          } else {
              $this->load_update_list_form();
          }
    }
    
    function load_add_item_form() {
        $this->load->view('forms/add_item');
    }
    
    function add_item() {
        $this->load->library('form_validation');
        //field name, error message, validation rules
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[20]');
        $this->form_validation->set_rules('director', 'Director', 'trim|required|min_length[6]|max_length[45]');
        $this->form_validation->set_rules('writer', 'Writer', 'trim|required|min_length[6]|max_length[45]');
        $this->form_validation->set_rules('genre', 'Genre', 'trim|required');
        $this->form_validation->set_rules('imdb', 'IMDb Link', 'trim|required');
        $this->form_validation->set_rules('ryear', 'Release Year', 'trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('eyear', 'Ending Year', 'trim|min_length[4]|max_length[45]');
        
        if($this->form_validation->run() == FALSE) {          
            $this->load_add_item_form();
        } else {
            
            $config['upload_path']          = 'img';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $cover = '';
            if ( ! $this->upload->do_upload('cover')) {
                $cover = 'default.png';
                $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $config['image_library'] = 'gd2';
                    $cover = $data['upload_data']['file_name'];
                    $config['source_image'] = 'img/' . $cover;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 250;
                    $config['height']   = 350;

                    $this->load->library('image_lib', $config); 
                    if ( ! $this->image_lib->resize()) {
                        var_dump($this->image_lib->display_errors());die();
                    }
                    
            }
            
            $item_param['item_title'] = $this->input->post('title');
            $item_param['item_description'] = $this->input->post('description');
            $item_param['item_genre'] = $this->input->post('genre');
            $item_param['item_cover'] = $cover;
            $item_param['item_director'] = $this->input->post('director');
            $item_param['item_writer'] = $this->input->post('writer');
            $item_param['item_release_year'] = $this->input->post('ryear');
            $item_param['item_end_year'] = $this->input->post('eyear');
            $item_param['item_imdb'] = $this->input->post('imdb');
            $this->pcdb_model->add_item($item_param);
            redirect('pcdb/list_items/' . $this->uri->segment(3));
//            $this->list_items();
          }   
    }
    
    function load_update_item_form() {
        $data['item_info'] = $this->pcdb_model->get_item_info();
//        var_dump($data);die();
        $this->load->view('forms/update_item', $data);
    }
    
    function update_item() {
        $this->load->library('form_validation');
        //field name, error message, validation rules
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[20]');
        $this->form_validation->set_rules('director', 'Director', 'trim|required|min_length[6]|max_length[45]');
        $this->form_validation->set_rules('writer', 'Writer', 'trim|required|min_length[6]|max_length[45]');
        $this->form_validation->set_rules('genre', 'Genre', 'trim|required');
        $this->form_validation->set_rules('imdb', 'IMDb Link', 'trim|required');
        $this->form_validation->set_rules('ryear', 'Release Year', 'trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('eyear', 'Ending Year', 'trim|min_length[4]|max_length[45]');
        
        if($this->form_validation->run() == FALSE) {          
            $this->load_update_item_form();
        } else {
            
            $config['upload_path']          = 'img';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $cover = '';
            if ( ! $this->upload->do_upload('cover')) {
                $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $config['image_library'] = 'gd2';
                    $cover = $data['upload_data']['file_name'];
                    $config['source_image'] = 'img/' . $cover;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 250;
                    $config['height']   = 350;

                    $this->load->library('image_lib', $config); 
                    if ( ! $this->image_lib->resize()) {
                        var_dump($this->image_lib->display_errors());die();
                    }
                    
            }
            
            $item_param['item_title'] = $this->input->post('title');
            $item_param['item_description'] = $this->input->post('description');
            $item_param['item_genre'] = $this->input->post('genre');
            if($cover != null) {
                $item_param['item_cover'] = $cover;
            }
            $item_param['item_director'] = $this->input->post('director');
            $item_param['item_writer'] = $this->input->post('writer');
            $item_param['item_release_year'] = $this->input->post('ryear');
            $item_param['item_end_year'] = $this->input->post('eyear');
            $item_param['item_imdb'] = $this->input->post('imdb');
            $this->pcdb_model->update_item($item_param);
            redirect('pcdb/item/' . $this->uri->segment(3));
//            $this->list_items();
          }   
    }
    
    function delete_item() {
        $query = $this->pcdb_model->delete_item();
//        var_dump($query['result']);die();
        if($query['result']) {
            redirect('pcdb/list_items/' . $query['list_token']);
        } else {
            redirect('pcdb/item/' . $this->uri->segment(3));
        }
    }
    
}
