<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_data extends CI_Controller {

    protected $user_level = '';
    protected $user_nama = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
        $this->user_nama = $this->session->userdata('name');
    }


    public function transaksi(){
		$data['data'] = $this->Model_transaksi->get_data();
        $this->load->view('print/transaksi',$data);
    }

    public function pemesanan(){
		$data['data'] = $this->Model_pemesanan->get_data();
        $this->load->view('print/pesanan',$data);
    }

    public function produk(){
		$data['data'] = $this->Model_produk->get_data();
        $this->load->view('print/produk',$data);
    }

    public function pengiriman(){
		$data['data'] = $this->Model_pengiriman->get_data();
        $this->load->view('print/pengiriman',$data);
    }

}
