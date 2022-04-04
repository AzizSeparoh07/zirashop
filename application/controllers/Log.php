<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
	}
	
	public function index()
	{
		$this->session->userdata('logged') !=true;
		$this->load->helper('url');
		$this->load->view('view_login');
	}

	public function cek()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $row        = $this->Auth_model->login_user($username, $password);
        if ($row->num_rows() > 0) {
			$x = $row->row_array();
            if($x['level'] == "1") {
				$this->session->set_userdata('logged', true);
				$this->session->set_userdata('username', $x['username']);
				$this->session->set_userdata('level', $x['level']);
				redirect('admin');
         
            } else {
				$this->session->set_userdata('logged', true);
				$this->session->set_userdata('username', $x['username']);
				$this->session->set_userdata('level', $x['level']);
				redirect('mahasiswa');
         
            } 	
        } else {
            $this->session->set_flashdata('err_message', 'User tidak ditemukan');
			redirect('app');
        }
    }
}
