<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    protected $user_level = '';
    protected $user_nama = '';
  	protected $data_user = '';


    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
        $this->user_nama = $this->session->userdata('name');
        if(array_key_exists("level",$this->session->userdata())){
          $this->data_user = $this->session->userdata();
        }
    }

	public function index(){
        $data['data'] = $this->Model_transaksi->get_data();
        $data['content'] = 'transaksi/index';
        $data['sidenav'] = 'transaksi';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
        $data['menu'] = 'transaksi';
        $data['header'] = 'transaksi';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function konf_bukti_pembayaran($id){
        // $data = $this->input->post();

        $data_pengiriman = [];

        $data_transaksi = array(
            'status_pembayaran' => $this->input->post('status_pembayaran'),
            'status_transaksi' => $this->input->post('status_pembayaran') - 1,
            'id_user_toko' => $this->data_user['id']
        );

        if($this->input->post('status_pembayaran') == 4){
            $data_pengiriman['status_pengiriman'] = 2;

            $this->Model_pengiriman->update_by_kd_transaksi($data_pengiriman, $id);
        }

        $this->Model_transaksi->update($data_transaksi,$id);
        redirect('transaksi','refresh');
    }

    public function add_data(){
        $data['opt_kd_pemesanan'] = $this->Model_pemesanan->get_data();
        $data['content'] = 'transaksi/add';
        $data['sidenav'] = 'transaksi';
        $data['identity'] = $this->user_nama." - ".$this->user_level;
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
        $data['identity'] = $this->user_nama." - ".$this->user_level;
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
