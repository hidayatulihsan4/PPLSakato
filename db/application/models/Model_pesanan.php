<?php

class Model_pesanan extends CI_Model {
    private $table_name = 'v_pesanan';
    private $primary_key = 'kd_pemesanan';

    function get_data(){
        return $this->db->get($this->table_name)->result();
    }

    function get_data_by_id($id){
        $this->db->where($this->primary_key, $id);
        $this->db->select("*");
        $this->db->from($this->table_name);
        return $this->db->get()->row();
    }

    function get_data_by_customer($id){
        $this->db->where('id_customer', $id);
        $this->db->select("*");
        $this->db->from($this->table_name);
        return $this->db->get()->result();
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