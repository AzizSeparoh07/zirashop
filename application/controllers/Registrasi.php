<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Admin_model');
		$this->load->model('Pelanggan_model');
		$this->load->helper('url_helper');
	}
	
	public function index()
	{
		
		$this->load->view('vregistrasi');

	}
	public function add(){

        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
			'kecamatan' => $this->input->post('kecamatan'),
			'kota' => $this->input->post('kota'),
			'desa' => $this->input->post('desa'),
			'no_hp' => $this->input->post('no_hp'),
        );
        $this->Pelanggan_model-> insertpelanggan($data);

        $data1 = array(
            'nama_lengkap' => $this->input->post('nama_pelanggan'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
			'no_hp' => $this->input->post('no_hp'),
            'level' => $this->input->post('level')
        );
        $this->Admin_model->insertadmin($data1);

    }
	
	}	

