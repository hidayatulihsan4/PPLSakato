<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    protected $user_level = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
    }

	public function index(){
        $data['data'] = $this->Model_transaksi->get_data();
        $data['content'] = 'pesanan/index';
        $data['sidenav'] = 'pesanan';
        $data['menu'] = 'pesanan';
        $data['header'] = 'pesanan';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function add_data(){
        $data['opt_kd_produk'] = $this->Model_produk->get_data();
        $data['opt_id_customer'] = $this->Model_user_customer->get_data();
        $data['content'] = 'pesanan/add';
        $data['sidenav'] = 'pesanan';
        $data['menu'] = 'pesanan';
        $data['header'] = 'pesanan';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_add(){
        $data = $this->input->post();
        $this->Model_pesanan->add($data);
        redirect('pesanan','refresh');
    }

    public function update_data($id){
        $data['opt_kd_produk'] = $this->Model_produk->get_data();
        $data['opt_id_customer'] = $this->Model_user_customer->get_data();
        $data['data'] = $this->Model_pesanan->get_data_by_id($id);
        $data['content'] = 'pesanan/update';
        $data['sidenav'] = 'pesanan';
        $data['menu'] = 'pesanan';
        $data['header'] = 'pesanan';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_update($id){
        $data = $this->input->post();
        $this->Model_pesanan->update($data,$id);
        redirect('pesanan','refresh');
    }

    public function do_delete($id){
        $this->Model_pesanan->delete($id);
        redirect('pesanan','refresh');
    }

    public function terima_pesanan($id,$id2){
        $data['status_pemesanan'] = 2; 
        $this->Model_pemesanan->update($data,$id);
        $data2['id_user_toko'] = $this->session->userdata('id');
        $data2['kd_transaksi'] = $id2;
        $data2['status_pengiriman'] = 1;
        $this->Model_pengiriman->add($data2);
        redirect('pesanan','refresh');
    }
    
    public function tolak_pesanan($id){
        $data['status_pemesanan'] = 1; 
        $this->Model_pemesanan->update($data,$id);
        redirect('pesanan','refresh');
    }
}
