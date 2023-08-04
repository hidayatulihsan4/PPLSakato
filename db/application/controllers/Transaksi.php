<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    protected $user_level = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
    }

	public function index(){
        $data['data'] = $this->Model_transaksi->get_data();
        $data['content'] = 'transaksi/index';
        $data['sidenav'] = 'transaksi';
        $data['menu'] = 'transaksi';
        $data['header'] = 'transaksi';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function add_data(){
        $data['opt_kd_pemesanan'] = $this->Model_pemesanan->get_data();
        $data['content'] = 'transaksi/add';
        $data['sidenav'] = 'transaksi';
        $data['menu'] = 'transaksi';
        $data['header'] = 'transaksi';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_add(){
        $data = $this->input->post();
        $this->Model_transaksi->add($data);
        redirect('transaksi','refresh');
    }

    public function update_data($id){
        $data['opt_kd_pemesanan'] = $this->Model_pemesanan->get_data();
        $data['data'] = $this->Model_transaksi->get_data_by_id($id);
        $data['content'] = 'transaksi/update';
        $data['sidenav'] = 'transaksi';
        $data['menu'] = 'transaksi';
        $data['header'] = 'transaksi';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_update($id){
        $data = $this->input->post();
        $this->Model_transaksi->update($data,$id);
        redirect('transaksi','refresh');
    }

    public function do_delete($id){
        $this->Model_transaksi->delete($id);
        redirect('transaksi','refresh');
    }
}
