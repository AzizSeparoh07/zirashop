<?php
class Laporan_model extends CI_Model {

    public function getalllaporan ()
    {
        $result = $this->db->query("SELECT * FROM laporan ");
        
        return $result;
    }

    public function insertlaporan($data)
    {
        $insert =  $this->db->insert('laporan', $data);
        if ($insert) {
            redirect('Admin/datalaporan');
        }

    }
    public function getAlledit($id_laporan)
    {
       $quwery=$this->db->get_where('laporan',array('id_laporan'=>$id_laporan));
       return $quwery->row_array();
       
    
    }

    public function inserteditlaporan($data,$id_laporan)
    {
        $quwery=$this->db->update('laporan',$data,array('id_laporan'=>$id_laporan));
        if($quwery){
            redirect('admin/datalaporan');
        
    }
}

    public function hapuslaporan($id_laporan)
    {
        $this->db->where('id_laporan',$id_laporan);
        $this->db->delete('laporan');
    }
}