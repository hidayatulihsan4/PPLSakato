<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	protected $data_user = '';

	function __construct(){
		parent::__construct();
		if(array_key_exists("level",$this->session->userdata())){
			$this->data_user = $this->session->userdata();
		}
	}

	public function index(){
		$data['produk'] = $this->Model_produk->get_data();
		$data['content'] = "index";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}

	public function login(){
		$data['content'] = "login";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}

	public function register(){
		$data['content'] = "register";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}
	
	public function produk($temp_offset){
		$data['now_page'] = $temp_offset;

		if($temp_offset > 1){
			$offset = ($temp_offset-1) * 12;
		}else{
			$offset = 0;
		}
		$data['produk'] = $this->Model_produk->get_data_limit($offset);
		$counter_produk = $this->Model_produk->count_data();
		
		$data['prev'] = 1;
		$data['next'] = 1;
		
		if($temp_offset <= 1){
			$data['prev'] = 0;
		}

		if(($temp_offset * 12) >= $counter_produk){
			$data['next'] = 0;
		}

		$data['content'] = "produk";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}

	public function pesan(){
		if($this->data_user['level'] == "customer"){
			$data = $this->input->post();
			$data['sub_total'] = $data['harga'] * $data['jumlah'];
			unset($data['harga']);
			$data['id_customer'] = $this->data_user['id'];
			// $data['tgl'] = date("Y-m-d");
			// $data['status_pemesanan'] = 1;
			$this->Model_pemesanan->add($data);
			redirect('main/pesanan','refresh');
		}
	}
	
	public function detail_produk($id){
		$data['produk'] = $this->Model_produk->get_data_by_id($id);
		$data['content'] = "detail_produk";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}
	
	public function pemesanan($id){
		$data['produk'] = $this->Model_produk->get_data_by_id($id);
		$data['content'] = "pemesanan";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}
	
	public function pesanan(){
		$data['pesanan'] = $this->Model_pesanan->get_data_by_customer($this->data_user['id']);
		$data['content'] = "pesanan";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}
	
	public function transaksi(){
		$data['transaksi'] = $this->Model_transaksi->get_data_by_customer($this->data_user['id']);
		$data['content'] = "transaksi";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}
	
	public function bukti_pembayaran($id){
		$data['pemesanan'] = $this->Model_pemesanan->get_data_by_id($id);
		$data['content'] = "bukti_pembayaran";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}

	public function checkout(){
		$temp['pesanan'] = $this->Model_pesanan->get_data_by_customer($this->data_user['id']);
		$data['pesanan'] = [];
		foreach($temp['pesanan'] as $pesanan){
			foreach($this->input->post('kd') as $kd){
				if($pesanan->kd_pemesanan == $kd){
					array_push($data['pesanan'], $pesanan);
				}
			}
		}
		$data['content'] = "checkout";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}

	public function do_checkout(){
		// print_r($this->input->post());
		$data_transaksi = array(
			'total_harga' => $this->input->post('total_harga'),
			'status_pembayaran' => 'Belum Dibayar',
			'status_transaksi' => 'Menunggu Pembayaran',
			'tgl' => date("Y-m-d"),
			'id_customer' => $this->data_user['id'],
			'total_biaya' => $this->input->post('total_biaya')
		);
		$this->Model_transaksi->add($data_transaksi,);
		$last_row = $this->Model_transaksi->get_last_by_customer($this->data_user['id']);
		print_r($last_id);
		// foreach($this->input->post('kd') as $kd){
		// 	print_r($kd);
		// }
	}

	public function up_bukti_pembayaran(){
		if($this->data_user['level'] == "customer"){
			$data = $this->input->post();
			$data['bukti_pembayaran'] = $this->Model_upload->do_upload('bukti_pembayaran');
			if($data['bukti_pembayaran'] == 1 || $data['bukti_pembayaran'] == 2){
				$data['bukti_pembayaran'] = 'default.jpg';
			}
			$data['status_pembayaran'] = "2";
			$data['tgl'] = date("Y-m-d");
			$this->Model_transaksi->add($data);
			redirect('main/transaksi','refresh');
		}
	}
	
	public function pengiriman(){
		$data['pengiriman'] = $this->Model_pengiriman->get_data();
		$data['content'] = "pengiriman";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}
	
	public function edit_pesanan($id){
		$data['pesanan'] = $this->Model_pesanan->get_data_by_id($id);
		$data['content'] = "edit_pesanan";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}
	
	public function do_edit_pesanan($id){
		$data = $this->input->post();
		$data['sub_total'] = $data['harga'] * $data['jumlah'];
		unset($data['harga']);
        $this->Model_pemesanan->update($data,$id);
		redirect('main/pesanan','refresh');
	}

	function batalkan_pesanan($id){
        $this->Model_pemesanan->delete($id);
        redirect('main/pesanan','refresh');
	}
}
