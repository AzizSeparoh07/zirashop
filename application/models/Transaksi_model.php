<?php
class Transaksi_model extends CI_Model {

    public function getalltransaksi ()
    {
        $result = $this->db->query("SELECT * FROM transaksi ");
        
        return $result;
    }

    public function inserttransaksi($data)
    {
        $insert =  $this->db->insert('transaksi', $data);
        if ($insert) {
            redirect('Admin/datatransaksi');
        }

    }
    public function getAlledit($id_transaksi)
    {
       $quwery=$this->db->get_where('transaksi',array('id_transaksi'=>$id_transaksi));
       return $quwery->row_array();
       
    
    }

    public function insertedittransaksi($data,$id_transaksi)
    {
        $quwery=$this->db->update('transaksi',$data,array('id_transaksi'=>$id_transaksi));
        if($quwery){
            redirect('admin/datatransaksi');
        
    }
}

    public function hapustransaksi($id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('transaksi');
    }

}