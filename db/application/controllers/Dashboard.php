<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    protected $user_level = '';

    function __construct(){
        parent::__construct();
        $this->user_level = $this->session->userdata('level');
    }

	public function index(){
        // $data['data'] = $this->Model_dashboard->get_data();
        $data['content'] = 'dashboard/index';
        $data['sidenav'] = 'dashboard';
        $data['menu'] = 'dashboard';
        $data['header'] = 'dashboard';
        $data['user_level'] = $this->user_level;
        $this->load->view('template/index', $data);
	}

}
