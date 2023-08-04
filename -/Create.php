<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	public function index($table_name){
    $data['data'] = $this->db->query("DESC $table_name")->result();
    $data['table_name'] = $table_name;
    $this->load->view('create/index', $data);
	}

  public function add($table_name){
    $data['data'] = $this->db->query("DESC $table_name")->result();
    $data['table_name'] = $table_name;
    $this->load->view('create/add', $data);
  }

  public function update($table_name){
    $data['data'] = $this->db->query("DESC $table_name")->result();
    $data['table_name'] = $table_name;
    $this->load->view('create/update', $data);
  }
}
