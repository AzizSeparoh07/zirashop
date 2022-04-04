<?php
class Login_model extends CI_Model {

    public function login_user($email, $password)
    {
        $result = $this->db->query("SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1 ");
        
        return $result;
    }
}