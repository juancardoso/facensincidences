<?php

class Model_login extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function loginUsuario($login,$password){
        $this->db->where('user_password',$password);
        $this->db->where('user_user',$login);
        $this->db->or_where('user_email',$login);
        $login = $this->db->get('user');
        
        if($login && $login->result_id->num_rows > 0){
            return $login->row();
        }

        return false;
    }

    public function loginAdmin($login,$password){
        $this->db->where('admin_password',$password);
        $this->db->where('admin_user',$login);
        $this->db->or_where('admin_email',$login);
        $login = $this->db->get('admin');
        
        if($login && $login->result_id->num_rows > 0){
            return $login->row();
        }

        return false;
    }

}
    