<?php

class Model_transaksi extends CI_Model {
    private $table_name = 'transaksi';
    private $primary_key = 'kd_transaksi';

    function get_data(){
        return $this->db->get('transaksi')->result();
    }

    function get_data_by_id($id){
        $this->db->where($this->primary_key, $id);
        $this->db->select("*");
        $this->db->from('transaksi');
        return $this->db->get()->row();
    }

    function get_data_by_customer($id){
        $this->db->where('id_customer', $id);
        $this->db->select("*");
        $this->db->from('transaksi');
        return $this->db->get()->result();
    }

    function add($data){
        $this->db->insert($this->table_name, $data);
    }

    function get_last_by_customer($id){
        $row = $this->db->select("*")->where('id_customer',$id)->limit(1)->order_by($this->primary_key,"DESC")->get($this->table_name)->row();
        return $row;
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