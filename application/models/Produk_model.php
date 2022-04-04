<?php
class Produk_model extends CI_Model {

    public function getallproduk ()
    {
       
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('katagori', 'katagori.id_katagori = produk.id_katagori', 'left');
       // $this->db->where("mitra.id_mitra = '$id_mitra' ");
        //$q = $this->db->get_where('mitra', array('id_mitra' => $id_mitra));
        $q = $this->db->get();
        return $q->result();
    }

    public function getallprodukbyid ($id_produk)
    {
       
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('katagori', 'katagori.id_katagori = produk.id_katagori', 'left');
       $this->db->where("produk.id_produk = '$id_produk' ");
        //$q = $this->db->get_where('mitra', array('id_mitra' => $id_mitra));
        $q = $this->db->get();
        return $q->result();
    }
    
    public function insertproduk($data)
    {
        $insert =  $this->db->insert('produk', $data);
        if ($insert) {
            redirect('Admin/dataproduk');
        } 

    }
    public function getallkatagori ()
    {
        $this->db->select('*');
        $this->db->from('katagori');
        $q=$this->db->get();
        return $q->result();
       
    }
     

    public function getAlledit($id_produk)
    {
       $quwery=$this->db->get_where('produk',array('id_produk'=>$id_produk));
       return $quwery->row_array();
       
    
    }

    public function inserteditproduk($data,$id_produk){
        $quwery=$this->db->update('produk',$data,array('id_produk'=>$id_produk));
        if($quwery){
            redirect('admin/dataproduk');
        }
    }

    public function hapusproduk($id_produk)
    {
        $this->db->where('id_produk',$id_produk);
        $this->db->delete('produk');
    }
    

}