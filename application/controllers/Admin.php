<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Admin_model');
		$this->load->model('Pelanggan_model');
		$this->load->model('Katagori_model');
		$this->load->model('Produk_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Laporan_model');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		
		$this->load->view('admin/dashboard');
	}
	
	


	public function datap()
	{

		$data=array(
			'pelanggan'=>$this->Pelanggan_model->getAllpelanggan(),
		);
		$this->load->view('admin/datapelanggan',$data);
	}
	public function prosespelanggan()
	{
		$data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $this->Pelanggan_model->insertPelanggan($data);
	}

	public function hapuspelanggan ($id_pelanggan)
	{
		$this->Pelanggan_model->hapuspelanggan($id_pelanggan);
		redirect('admin/datap');
	}

	public function tambahp()
		{
			$this->load->view('admin/tambahpelanggan');
		}

	public function editpelanggan($id_pelanggan){

		$data=array(
			'pelanggan'=> $this->Pelanggan_model->getAlledit($id_pelanggan)
			
		);
		$this->load->view('admin/editpelanggan',$data);
	}

	public function proseseditpelanggan()
	{
		$id_pelanggan=$this->input->post('id_pelanggan');
		$data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $this->Pelanggan_model->inserteditpelanggan($data,$id_pelanggan);
	}

	






	public function datakatagori()
	{

		$data=array(
			'katagori'=>$this->Katagori_model->getallkatagori()
		);
		$this->load->view('admin/datakatagori',$data);
	}

	public function tambahkatagori()
	{
		$this->load->view('admin/tambahkatagori');
	}

	public function hapuskatagori ($id_katagori)
	{
		$this->Katagori_model->hapuskatagori($id_katagori);
		redirect('admin/datakatagori');
	}

	public function proseskatagori()
	{
		$data = array(
            'nama_katagori' => $this->input->post('nama_katagori'),
			
        );
        $this->Katagori_model->insertKatagori($data);
	}
	public function editkatagori($id_katagori){

		$data=array(
			'katagori'=> $this->Katagori_model->getAlledit($id_katagori)
			
		);
		$this->load->view('admin/editkatagori',$data);
	}

	public function proseseditkatagori()
	{
		$id_katagori=$this->input->post('id_katagori');
		$data = array(
            'nama_katagori' => $this->input->post('nama_katagori'),
        );
        $this->Katagori_model->inserteditkatagori($data,$id_katagori);
	}



	

	public function dataproduk()
	{

		$data=array(
			'produk'=>$this->Produk_model->getallproduk()
		);
		$this->load->view('admin/dataproduk',$data);
	}

	public function tambahproduk()
	{
		// $this->load->view('admin/tambahproduk');
		$data=array(
			'katagori'=>$this->Katagori_model->getallkatagori()
		);
	
		$this->load->view('admin/tambahproduk',$data);
		
	}

	
	
	public function prosesProduk(){
		
		$this->load->helper(array('form', 'url'));

		$config['upload_path'] = "./assets/img/";
		$config['allowed_types'] = 'gif|jpg|png';
		// $config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload("gambar")) {
			$data = array('upload_data' => $this->upload->data());

			$image = $data['upload_data']['file_name'];

			$data = array(
				'nama_produk' => $this->input->post('nama_produk'),
				'id_katagori' => $this->input->post('id_katagori'),
				'stok' => $this->input->post('stok'),
				'warna' => $this->input->post('warna'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
				'gambar' => $image,
				
			);

			$this->Produk_model->insertproduk($data);
		}
	
			  
			//$this->Produk_model->insertproduk($data); //memasukan data ke database
			 
	}
		  
	  
	

	public function hapusproduk ($id_produk)
	{
		$this->Produk_model->hapusproduk($id_produk);
		redirect('admin/dataproduk');
	}

	public function editproduk($id_produk)
	{

		$data=array(
			'produk'=> $this->Produk_model->getAlledit($id_produk)
			
		);
		$this->load->view('admin/editproduk',$data);
	}

	public function proseseditproduk()
	{
		$id_produk=$this->input->post('id_produk');
		$data = array(
            'nama_produk' => $this->input->post('nama_produk'),
			'nama_katagori' => $this->input->post('nama_katagori'),
            'stok' => $this->input->post('stok'),
            'warna' => $this->input->post('warna'),
			'keterangan' => $this->input->post('keterangan'),
			'harga' => $this->input->post('harga'),
			'gambar' => $image
        );
        $this->Produk_model->inserteditproduk($data,$id_produk);
	}

	


	


	public function datatransaksi()
	{

		$data=array(
			'produk'=>$this->Transaksi_model->getalltransaksi()
		);
		$this->load->view('admin/datatransaksi',$data);
	}
	public function tambahtransaksi()
	{
		$this->load->view('admin/tambahtransaksi');
	}

	public function prosesTransaksi()
	{
		$data = array(
            'nama_transaksi' => $this->input->post('nama_transaksi'),
			
        );
		
        $this->Transaksi_model->inserttransaksi($data);
	}

	public function hapustransaksi ($id_transaksi)
	{
		$this->Transaksi_model->hapustransaksi($id_transaksi);
		redirect('admin/datatransaksi');
	}

	public function edittransaksi($id_transaksi){

		$data=array(
			'transaksi'=> $this->Transaksi_model->getAlledit($id_transaksi)
			
		);
		$this->load->view('admin/edittransaksi',$data);
	}

	public function prosesedittransaksi()
	{
		$id_transaksi=$this->input->post('id_transaksi');
		$data = array(
            'nama_transaksi' => $this->input->post('nama_transaksi'),
			'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $this->Transaksi_model->insertedittransaksi($data,$id_transaksi);
	}




	public function datalaporan()
	{

		//$data=array(
		//	'laporan'=>$this->Laporan_model->getalllaporan()
		//);
		$this->load->view('admin/datalaporan',$data);
	}
}
