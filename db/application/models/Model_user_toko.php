<?php

class Model_user_toko extends CI_Model {
    private $table_name = 'user_toko';
    private $primary_key = 'id';

    function get_data(){
        return $this->db->get('v_user_toko')->result();
    }

    function get_data_by_id($id){
        $this->db->where($this->primary_key, $id);
        $this->db->select("*");
        $this->db->from('v_user_toko');
        return $this->db->get()->row();
    }

    function get_data_by_username($id){
        $this->db->where('username', $id);
        $this->db->select("*");
        $this->db->from('v_user_toko');
        return $this->db->get()->row();
    }
    
    function get_data_by_jabatan($id){
        $this->db->where('jabatan', $id);
        $this->db->select("*");
        $this->db->from('v_user_toko');
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