<?php

class Pcdb_model extends CI_Model {
    
    //get the total number of lists from the lists table and return all of them(if they exist)
    function get_all_lists() {
        $lists = $this->db->get('lists');
        $data['total_lists'] = $lists->num_rows();
        if($data['total_lists'] > 0) {
            foreach ($lists->result() as $list) {
                $data[] = $list;
            }
        }
        return $data;
    }
    
    //get all the elements within a list and the details about the list
    function get_list_items() {
        $this->db->where('list_token' ,$this->uri->segment(3));
        $list = $this->db->get('lists');
        $list_id = $list->result()[0]->list_id;
        $data['list_name'] = $list->result()[0]->list_name;
//        var_dump($list->result());die();
        $this->db->where('list_id', $list_id);
        $this->db->order_by("item_added_at", "desc");
        $items = $this->db->get('items');
        $data['total_items'] = $items->num_rows();
        if($data['total_items'] > 0) {
            $data['items'] = $items->result();
        }
//        var_dump($data);die();
        return $data;
    }
    
    function get_all_items() {
        $this->db->order_by("item_added_at", "desc");
        $items = $this->db->get('items');
        $data = [];
//        $data['total_items'] = $lists->num_rows();
        if($items->num_rows() > 0) {
            foreach ($items->result() as $item) {
                $data[] = $item;
            }
        }
        return $data;
    }

    //get all the details about an item
    function get_item() {
        $this->db->where('item_token', $this->uri->segment(3));
        $item = $this->db->get('items');
        $data['item_info'] = $item->result();
//        var_dump($item->result()[0]->list_id);die();
        $this->db->where('list_id', $item->result()[0]->list_id);
        $list = $this->db->get('lists');
        $data['list_info'] = $list->result();
//        var_dump($list->result()[0]);die();
//        var_dump($data['list_info']->list_id);die();
//        var_dump($data);die();
        return $data;
    }
    
    function create_list($data) {
        $list_token = openssl_random_pseudo_bytes(10);
//        var_dump('li' . bin2hex($list_key));die();
        $this->db->where('list_token', bin2hex($list_token));
        $query = $this->db->get('lists');
        
        if($query->num_rows() > 0) {
            $list_token = openssl_random_pseudo_bytes(10);
            $this->create_list($data);
        } else {
            $data['list_token'] = 'li' . bin2hex($list_token);
//            var_dump($data);die();
            $this->db->insert('lists', $data);
        }
    }
    
    function delete_list() {
        $this->db->where('list_token', urldecode($this->uri->segment(3)));
        $result = $this->db->delete('lists');
        return $result;
    }
    
    function update_list($data) {
        $this->db->where('list_token', urldecode($this->uri->segment(3)));
        $this->db->update(lists, $data);
    }
    
    function add_item($data) {
        $item_token = openssl_random_pseudo_bytes(10);
        $this->db->where('item_token', bin2hex($item_token));
        $query = $this->db->get('items');
        
        if($query->num_rows() > 0) {
            $item_tokens = openssl_random_pseudo_bytes(10);
            $this->create_list($data);
        } else {
            $this->db->select('list_id');
            $this->db->where('list_token' ,$this->uri->segment(3));
            $list = $this->db->get('lists');
            $list_id = $list->result()[0]->list_id;
//            var_dump($list_id);die();
            $data['list_id'] = $list_id;
            $data['item_token'] = 'it' . bin2hex($item_token);
//            var_dump($data);die();
            $this->db->insert('items', $data);
        }
    }
    
    function get_item_info() {
        $this->db->where('item_token', $this->uri->segment(3));
        $query = $this->db->get('items');
        return $query->result()[0];
    }
    
    function update_item($data) {
        $this->db->where('item_token', $this->uri->segment(3));
        $this->db->update('items', $data);
    }
    
    function delete_item() {
        $this->db->select('list_id');
        $this->db->where('item_token', $this->uri->segment(3));
        $list_id = $this->db->get('items');
//        var_dump($list_id->result()[0]->list_id);die();
        $this->db->select('list_token');
        $this->db->where('list_id', $list_id->result()[0]->list_id);
        $list_token = $this->db->get('lists');
//        var_dump($list_token->result()[0]->list_token);die();
        $this->db->where('item_token', $this->uri->segment(3));
        $result = $this->db->delete('items');
        $data['list_token'] = $list_token->result()[0]->list_token;
        $data['result'] = $result;
        return $data;
    }
    
    //get the info for the list that has to be updated to populate the fields
    function get_list_info() {
        $this->db->where('list_token', $this->uri->segment(3));
        $query = $this->db->get('lists');
        return $query->result()[0];
    }
    
}
