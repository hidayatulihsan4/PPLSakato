<?php

class Model_user_customer extends CI_Model {
    private $table_name = 'user_customer';
    private $primary_key = 'id';

    function get_data(){
        return $this->db->get('v_user_customer')->result();
    }

    function get_data_by_id($id){
        $this->db->where($this->primary_key, $id);
        $this->db->select("*");
        $this->db->from('v_user_customer');
        return $this->db->get()->row();
    }
    
    function get_data_by_username($id){
        $this->db->where('username', $id);
        $this->db->select("*");
        $this->db->from('v_user_customer');
        return $this->db->get()->row();
    }

    function add($data){
        $this->db->insert($this->table_name, $data);
    }

    function update($data, $id){
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table_name, $data);
    }

    function delete($id){
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table_name);
    }

    function count_data(){
        return count($this->db->get($this->table_name)->result());
    }
}