<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_customer extends CI_Controller {

    protected $user_level = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
    }

	public function index(){
        $data['data'] = $this->Model_user_customer->get_data();
        $data['content'] = 'user_customer/index';
        $data['sidenav'] = 'user_customer';
        $data['menu'] = 'user_customer';
        $data['header'] = 'user customer';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function add_data(){
        $data['opt_username'] = $this->Model_user->get_data();
        $data['content'] = 'user_customer/add';
        $data['sidenav'] = 'user_customer';
        $data['menu'] = 'user_customer';
        $data['header'] = 'user customer';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_add(){
        $data = $this->input->post();
        $data_user['username'] = $data['username'];
        $data_user['password'] = md5($data['password']);
        $data_user['level'] = 1;
        
        $data_user_customer['username'] = $data['username'];
        $data_user_customer['nama'] = $data['nama'];
        $data_user_customer['alamat'] = $data['alamat'];

        try {
            $this->Model_user->add($data_user);
            try {
                $this->Model_user_customer->add($data_user_customer);
            } catch (\Throwable $th) {
                print_r($th);
            }
        } catch (\Throwable $th) {
            print_r($th);
        }
        redirect('user_customer','refresh');
    }

    public function update_data($id){
        $data['opt_username'] = $this->Model_user->get_data();
        $data['data'] = $this->Model_user_customer->get_data_by_id($id);
        $data['data_customer'] = $this->Model_user->get_data_by_id($data['data']->username);
        $data['content'] = 'user_customer/update';
        $data['sidenav'] = 'user_customer';
        $data['menu'] = 'user_customer';
        $data['header'] = 'user customer';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_update($id){
        $data = $this->input->post();

        if($this->Model_user->check_password($data['username'], $data['password']) == 1){
            unset($data['password']);
        }else{
            $data['password'] = md5($data['password']);
        }

        $data_user['username'] = $data['username'];
        $data_user['level'] = $data['level'];
        
        $data_user_customer['username'] = $data['username'];
        $data_user_customer['nama'] = $data['nama'];
        $data_user_customer['jabatan'] = $this->Model_log->get_user_level($data['level']);

        try {
            
            $this->Model_user->update($data_user,$id);
            try {
                $this->Model_user_customer->update($data_user_customer,$id);
            } catch (\Throwable $th) {
                print_r($th);
            }
        } catch (\Throwable $th) {
            print_r($th);
        }
        redirect('user_customer','refresh');
    }

    public function do_delete($id){
        $this->Model_user_customer->delete($id);
        redirect('user_customer','refresh');
    }
}
