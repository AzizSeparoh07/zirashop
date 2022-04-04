<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Produk_model');
		$this->load->model('Pelanggan_model');
		$this->load->model('Katagori_model');
        $this->load->library('session');
		$this->load->helper('url_helper');
	}
	
	public function index()
	{
		$data=array(
			'katagori'=>$this->Produk_model->getallkatagori(),
			'produk'=>$this->Produk_model->getallproduk()
			
		);
		
		$this->load->view('pelanggan/vpelanggan',$data);

	}

	public function datacekout($id_produk)
	{
		$email=$this->session->userdata('email');
		//echo $email;
		$data=array(
			'pelanggan'=>$this->Pelanggan_model->getAllpbyid($email),
			'produk'=>$this->Produk_model->getallprodukbyid($id_produk)
		);
		$this->load->view('pelanggan/cekout',$data);

	}
	public function detailproduk($id_produk)
	{
		$data=array(
			'produk'=>$this->Produk_model->getallprodukbyid($id_produk)	
		);
		$this->load->view('pelanggan/detailproduk',$data);
	}

	public function getkatagori($id_katagori){

		$data=array(
			'katagori'=>$this->Katagori_model->getkatagoribyId($id_katagori)
		);
		$this->load->view('pelanggan/detailkatagori',$data);

	}
	}	

