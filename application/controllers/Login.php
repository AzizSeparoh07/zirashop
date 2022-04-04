<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
		$this->load->helper('url_helper');
	}
	
	public function index()
	{
		$this->session->userdata('logged') !=true;
		$this->load->helper('url');
		$this->load->view('login');
	}

	public function cek_login()
	{
		$email   	= $this->input->post('email');
        $password   = $this->input->post('password');
        $row        = $this->Login_model->login_user($email, $password);
        if ($row->num_rows() > 0) {
			$x = $row->row_array();
            if($x['level'] == "1") {
				$this->session->set_userdata('logged', true);
				$this->session->set_userdata('email', $x['email']);
				$this->session->set_userdata('level', $x['level']);
				redirect('admin');
         
            } else {
				$this->session->set_userdata('logged', true);
				$this->session->set_userdata('email', $x['email']);
				$this->session->set_userdata('level', $x['level']);
				redirect('pelanggan');
         
            } 	
        } else {
            $this->session->set_flashdata('err_message', 'User tidak ditemukan');
			redirect('login');
			}
	}	
}
