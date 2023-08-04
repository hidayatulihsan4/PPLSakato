<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    protected $user_level = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
    }

	public function index(){
        $data['data'] = $this->Model_user->get_data();
        $data['content'] = 'user/index';
        $data['sidenav'] = 'user';
        $data['menu'] = 'user';
        $data['header'] = 'User';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

    public function add_data(){
        $data['content'] = 'user/add';
        $data['sidenav'] = 'user';
        $data['menu'] = 'user';
        $data['header'] = 'User';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
    }

    public function do_add(){
        $data = $this->input->post();
        $data['password'] = md5($data['password']);
        $this->Model_user->add($data);
        redirect('user','refresh');
    }

    public function update_data($id){
        $data['data'] = $this->Model_user->get_data_by_id($id);
        $data['content'] = 'user/update';
        $data['sidenav'] = 'user';
        $data['menu'] = 'user';
        $data['header'] = 'User';
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
        $this->Model_user->update($data,$id);
        redirect('user','refresh');
    }

    public function do_delete($id){
        $this->Model_user->delete($id);
        redirect('user','refresh');
    }
}
