<?php
class Admin_model extends CI_Model {

    public function login_user($email, $password)
    {
        $result = $this->db->query("SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1 ");
        
        return $result;
    }
    public function insertadmin($data1){
        $insert=$this->db->insert('admin',$data1);
        if($insert){
            redirect('login');
        }
    }
}