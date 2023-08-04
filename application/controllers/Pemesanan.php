<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    protected $user_level = '';
    protected $user_nama = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
        $this->user_nama = $this->session->userdata('name');
    }

	public function index(){
        $data['data'] = $this->Model_pemesanan->get_data();
        $data['content'] = 'pemesanan/index';
        $data['sidenav'] = 'pemesanan';
        $data['menu'] = 'pemesanan';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
        $data['header'] = 'pesanan';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function add_data(){
        $data['opt_kd_produk'] = $this->Model_produk->get_data();
        $data['opt_id_customer'] = $this->Model_user_customer->get_data();
        $data['content'] = 'pemesanan/add';
        $data['sidenav'] = 'pemesanan';
        $data['menu'] = 'pemesanan';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
        $data['header'] = 'pemesanan';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_add(){
        $data = $this->input->post();
        $this->Model_pemesanan->add($data);
        redirect('pemesanan','refresh');
    }

    public function update_data($id){
        $data['opt_kd_produk'] = $this->Model_produk->get_data();
        $data['opt_id_customer'] = $this->Model_user_customer->get_data();
        $data['data'] = $this->Model_pemesanan->get_data_by_id($id);
        $data['content'] = 'pemesanan/update';
        $data['sidenav'] = 'pemesanan';
        $data['menu'] = 'pemesanan';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
        $data['header'] = 'pemesanan';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_update($id){
        $data = $this->input->post();
        $this->Model_pemesanan->update($data,$id);
        redirect('pemesanan','refresh');
    }

    public function do_delete($id){
        $this->Model_pemesanan->delete($id);
        redirect('pemesanan','refresh');
    }
}
