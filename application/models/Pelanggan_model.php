<?php
class Pelanggan_model extends CI_Model {

    public function getAllpelanggan ()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $q=$this->db->get();
        return $q->result();
       
    
    }
    public function insertpelanggan($data)
    {
        $insert =  $this->db->insert('pelanggan', $data);
        return $insert;
    }
    public function getAlledit($id_pelanggan)
    {
       $quwery=$this->db->get_where('pelanggan',array('id_pelanggan'=>$id_pelanggan));
       return $quwery->row_array();
       
    
    }

    public function inserteditpelanggan($data,$id_pelanggan){
        $quwery=$this->db->update('pelanggan',$data,array('id_pelanggan'=>$id_pelanggan));
        if($quwery){
            redirect('admin/datap');
        }
    }

    public function hapuspelanggan($id_pelanggan)
    {
        $this->db->where('id_pelanggan',$id_pelanggan);
        $this->db->delete('pelanggan');
    }

    public function getAllpbyid($email)
    {
       $this->db->select('*');
        $this->db->from('pelanggan');
       $this->db->join('admin','admin.email=pelanggan.email','left');
        $this->db->where("pelanggan.email='$email'");
        $q=$this->db->get();
        return $q->result();
      ///return $this->db->get_where('pelanggan',array('email'=>$email))->result();
    }
}
