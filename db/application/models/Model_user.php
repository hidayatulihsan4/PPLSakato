<?php

class Model_user extends CI_Model {
    private $table_name = 'user';
    private $primary_key = 'username';

    function get_data(){
        return $this->db->get($this->table_name)->result();
    }

    function get_data_by_field($field, $value){
        $this->db->where($field, $value);
        $this->db->select("*");
        $this->db->from($this->table_name);
        return $this->db->get()->result();
    }

    function get_data_by_id($id){
        $this->db->where($this->primary_key, $id);
        $this->db->select("*");
        $this->db->from($this->table_name);
        return $this->db->get()->row();
    }

    function add($data){
        $this->db->insert($this->table_name, $data);
        // $insert_id = $this->db->insert_id();

        // return $insert_id;
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
    
    function check_password($id, $pass){
        $this->db->where($this->primary_key, $id);
        $this->db->where('password', $pass);
        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }

}