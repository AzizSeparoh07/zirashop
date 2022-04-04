<?php
class Katagori_model extends CI_Model {

    public function getallkatagori ()
    {
        $this->db->select('*');
        $this->db->from('katagori');
        $q=$this->db->get();
        return $q->result_array();
       
    }

    public function insertkatagori($data)
    {
        $insert =  $this->db->insert('katagori', $data);
        if ($insert) {
            redirect('Admin/datakatagori');
        }

    }
    public function getAlledit($id_katagori)
    {
       $quwery=$this->db->get_where('katagori',array('id_katagori'=>$id_katagori));
       return $quwery->row_array();
       
    
    }

    public function getkatagoribyId($id_katagori)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('katagori', 'katagori.id_katagori = produk.id_katagori', 'left');
       $this->db->where("produk.id_katagori = '$id_katagori' ");
        $q = $this->db->get();
        return $q->result();
    }

    public function inserteditkatagori($data,$id_katagori)
    {
        $quwery=$this->db->update('katagori',$data,array('id_katagori'=>$id_katagori));
        if($quwery){
            redirect('admin/datakatagori');
        
    }
}

    public function hapuskatagori($id_katagori)
    {
        $this->db->where('id_katagori',$id_katagori);
        $this->db->delete('katagori');
    }

}