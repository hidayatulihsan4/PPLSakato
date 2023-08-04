<?php

class Model_produk extends CI_Model {
    private $table_name = 'produk';
    private $primary_key = 'id';

    function get_data(){
        return $this->db->get($this->table_name)->result();
    }

    function get_data_limit($offset){
        $this->db->select("*");
        $this->db->limit(12,$offset);
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