<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    protected $user_level = '';
    protected $user_nama = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
        $this->user_nama = $this->session->userdata('name');
    }

	public function index(){
        $data['data'] = $this->Model_produk->get_data();
        $data['content'] = 'produk/index';
        $data['sidenav'] = 'produk';
        $data['menu'] = 'produk';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
        $data['header'] = 'produk';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function add_data(){
        $data['content'] = 'produk/add';
        $data['sidenav'] = 'produk';
        $data['menu'] = 'produk';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
        $data['header'] = 'produk';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_add(){
        $data = $this->input->post();
        $data['foto_produk'] = $this->Model_upload->do_upload('produk');
        if($data['foto_produk'] == 1 || $data['foto_produk'] == 2){
            $data['foto_produk'] = 'default.jpg';
        }
        $this->Model_produk->add($data);
        redirect('produk','refresh');
    }

    public function update_data($id){
        $data['data'] = $this->Model_produk->get_data_by_id($id);
        $data['content'] = 'produk/update';
        $data['sidenav'] = 'produk';
        $data['menu'] = 'produk';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
        $data['header'] = 'produk';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_update($id){
        $data = $this->input->post();
        $data['foto_produk'] = $this->Model_upload->do_upload('produk');
        if($data['foto_produk'] == 1 || $data['foto_produk'] == 2){
            $data['foto_produk'] = 'default.jpg';
        }
        $this->Model_produk->update($data,$id);
        redirect('produk','refresh');
    }

    public function do_delete($id){
        $this->Model_produk->delete($id);
        redirect('produk','refresh');
    }
}
