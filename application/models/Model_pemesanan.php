<?php

class Model_pemesanan extends CI_Model {
    private $table_name = 'pemesanan';
    private $primary_key = 'kd_pemesanan';

    function get_data(){
        return $this->db->get('v_pemesanan')->result();
    }

    function get_data_by_id($id){
        $this->db->where($this->primary_key, $id);
        $this->db->select("*");
        $this->db->from('v_pemesanan');
        return $this->db->get()->row();
    }
    
    function get_data_by_kd_transaksi($id){
        $this->db->where('kd_transaksi', $id);
        $this->db->select("*");
        $this->db->from('v_pemesanan');
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