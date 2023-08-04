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
		$data['province'] = $this->Model_RO->get_all_province();
		$data['city'] = $this->Model_RO->get_all_city();
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
		}else{
      redirect('log/in');
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
		$data['pemesanan'] = $this->Model_pemesanan->get_data_by_kd_transaksi($id);
		$data['transaksi'] = $this->Model_transaksi->get_data_by_id($id);
		$data['content'] = "bukti_pembayaran";
		$data['data_user'] = $this->data_user;
		// print_r($data['transaksi']);
		$this->load->view('template_public/index',$data);
	}

	public function detail_transaksi($id){
		$data['pemesanan'] = $this->Model_pemesanan->get_data_by_kd_transaksi($id);
		$data['pengiriman'] = $this->Model_pengiriman->get_data_by_kd_transaksi($id);
		$data['sign'] = $this->Model_transaksi->get_sign($id);
		$data['transaksi'] = $this->Model_transaksi->get_data_by_id($id);
		$data['content'] = "detail_transaksi";
		$data['data_user'] = $this->data_user;
		// print_r($data['sign']);
		$this->load->view('template_public/index',$data);
	}
	
	public function print_detail_transaksi($id){
		$data['pemesanan'] = $this->Model_pemesanan->get_data_by_kd_transaksi($id);
		$data['pengiriman'] = $this->Model_pengiriman->get_data_by_kd_transaksi($id);
		$data['sign'] = $this->Model_transaksi->get_sign($id);
		$data['transaksi'] = $this->Model_transaksi->get_data_by_id($id);
		$data['content'] = "detail_transaksi";
		$data['data_user'] = $this->data_user;
		// print_r($data['transaksi']);
		$this->load->view('print/detail_transaksi',$data);
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
		$data_transaksi = array(
			'total_harga' => $this->input->post('total_harga'),
			'status_pembayaran' => '1',
			'bukti_pembayaran' => 'default.jpg',
			'status_transaksi' => '1',
			'tgl' => date("Y-m-d"),
			'id_customer' => $this->data_user['id'],
			'total_biaya' => $this->input->post('total_biaya')
		);
		
		$last_id = $this->Model_transaksi->add_last_id($data_transaksi);

		$data_pengiriman = array(
			'kd_transaksi' => $last_id,
			'status_pengiriman' => 1,
			'ekspedisi' => $this->input->post('ekspedisi'),
			'ekspedisi_service' => $this->input->post('service'),
			'ongkir' => $this->input->post('ongkir')
		);

		$this->Model_pengiriman->add($data_pengiriman);
		
		$data_pemesanan = array(
			'kd_transaksi' => $last_id,
		);

		foreach($this->input->post('kd') as $kd){
			$this->Model_pemesanan->update($data_pemesanan, $kd);
		}

		$data_flash = array(
			'is_message' => true,
			'title' => 'checkout',
			'message' => "checkout Berhasil",
		);

		$this->session->set_flashdata($data_flash);
			
		redirect('main/transaksi','refresh');
	}

	public function up_bukti_pembayaran($id){
		if($this->data_user['level'] == "customer"){
			$data = $this->input->post();
			$data['bukti_pembayaran'] = $this->Model_upload->do_upload('bukti_pembayaran');
			if($data['bukti_pembayaran'] == 1 || $data['bukti_pembayaran'] == 2){
				$data['bukti_pembayaran'] = 'default.jpg';
			}
			$data['status_pembayaran'] = 2;
			$data['status_transaksi'] = 2;
			
			$this->Model_transaksi->update($data,$id);
			
			$data_flash = array(
				'is_message' => true,
				'title' => 'Upload Bukti Pembayaran',
				'message' => "Upload Bukti Pembayaran Berhasil",
			);

			$this->session->set_flashdata($data_flash);
			redirect('main/transaksi','refresh');
		}
		
		$data_flash = array(
			'is_message' => true,
			'title' => 'Upload Bukti Pembayaran',
			'message' => "Upload Bukti Pembayaran Gagal",
		);

		$this->session->set_flashdata($data_flash);
		redirect('main/bukti_pembayaran/'.$id,'refresh');
	}
	
	public function pengiriman(){
		$data['pengiriman'] = $this->Model_pengiriman->get_data_by_customer($this->data_user['id']);
		$data['content'] = "pengiriman";
		$data['data_user'] = $this->data_user;
		$this->load->view('template_public/index',$data);
	}

	public function profile(){
		$data['content'] = "profile";
		$data['data_user'] = $this->data_user;
		$data['province'] = $this->Model_RO->get_all_province();
		$data['city'] = $this->Model_RO->get_all_city();
		$this->load->view('template_public/index',$data);
	}

	public function up_profile(){
		$data = $this->input->post();

    print_r($this->data_user);
		try {
			$this->Model_user_customer->update($data ,$this->data_user['id']);

			$data_flash = array(
				'is_message' => true,
				'title' => 'Profile',
				'message' => "Update Profile Berhasil",
			);

			$this->session->set_flashdata($data_flash);
			redirect('main/profile','refresh');
		} catch (\Throwable $th) {
			$data_flash = array(
				'is_message' => true,
				'title' => 'Profile',
				'message' => "Update Profile Gagal",
			);

			$this->session->set_flashdata($data_flash);
			redirect('main/profile','refresh');
		}

    $this->session->set_flashdata($data_flash);
    redirect('main/profile','refresh');
    exit;
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
	
	public function konf_pengiriman($id){
		$data = array(
			'status_pengiriman' => 4,
		);
		$this->Model_pengiriman->update($data, $id);
    
    
    $data_transaksi['status_transaksi'] = $data['status_pengiriman']+1;

    $temp_pengiriman = $this->Model_pengiriman->get_data_by_id($id);
		$this->Model_transaksi->update($data_transaksi, $temp_pengiriman->kd_transaksi);

		redirect('main/pengiriman','refresh');
	}

	function batalkan_pesanan($id){
        $this->Model_pemesanan->delete($id);
        redirect('main/pesanan','refresh');
	}
	
	public function get_cost(){
		// $origin = 236;
		$origin = 345;
		$destination = $this->data_user['kota'];
		$weight = $this->input->post('weight');
		$courier = $this->input->post('courier');

		$data = "origin=$origin&destination=$destination&weight=$weight&courier=$courier";
		
    // print_r($this->data_user);
		print_r(json_encode($this->Model_RO->ro_api("cost",$data)));
	}
}
