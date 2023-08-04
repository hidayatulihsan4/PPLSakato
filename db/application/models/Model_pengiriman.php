<?php

class Model_pengiriman extends CI_Model {
    private $table_name = 'pengiriman';
    private $primary_key = 'kd_pengiriman';

    function get_data(){
        return $this->db->get('v_pengiriman')->result();
    }

    function get_data_by_id($id){
        $this->db->where($this->primary_key, $id);
        $this->db->select("*");
        $this->db->from('v_pengiriman');
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