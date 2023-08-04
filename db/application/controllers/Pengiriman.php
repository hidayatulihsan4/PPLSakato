<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

    protected $user_level = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
    }

	public function index(){
        $data['data'] = $this->Model_pengiriman->get_data();
        $data['content'] = 'pengiriman/index';
        $data['sidenav'] = 'pengiriman';
        $data['menu'] = 'pengiriman';
        $data['header'] = 'pengiriman';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function add_data(){
        $data['opt_kd_transaksi'] = $this->Model_transaksi->get_data();
        $data['opt_id_user_toko'] = $this->Model_user_toko->get_data();
        $data['content'] = 'pengiriman/add';
        $data['sidenav'] = 'pengiriman';
        $data['menu'] = 'pengiriman';
        $data['header'] = 'pengiriman';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_add(){
        $data = $this->input->post();
        $this->Model_pengiriman->add($data);
        redirect('pengiriman','refresh');
    }

    public function update_data($id){
        $data['opt_kd_transaksi'] = $this->Model_transaksi->get_data();
        $data['opt_id_user_toko'] = $this->Model_user_toko->get_data_by_jabatan('Kurir');
        $data['data'] = $this->Model_pengiriman->get_data_by_id($id);
        $data['content'] = 'pengiriman/update';
        $data['sidenav'] = 'pengiriman';
        $data['menu'] = 'pengiriman';
        $data['header'] = 'pengiriman';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_update($id){
        $data = $this->input->post();
        $this->Model_pengiriman->update($data,$id);
        redirect('pengiriman','refresh');
    }

    public function do_delete($id){
        $this->Model_pengiriman->delete($id);
        redirect('pengiriman','refresh');
    }
    
	function update_pengiriman($id, $sp){
        $data['status_pengiriman'] = $sp;
		$this->Model_pengiriman->update($data, $id);
        redirect('pengiriman','refresh');
	}
    
}
