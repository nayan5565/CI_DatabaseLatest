<?php

class LoginModel extends CI_Model {

    public function canLogin($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

       return $this->db->get('login');

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function getData(){
        return $this->db->get('login')->result_array();
       
    }

}
