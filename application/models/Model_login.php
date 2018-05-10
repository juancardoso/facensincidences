<?php

class Model_login extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function loginUsuario($login,$password){
        $this->db->where('usu_senha',$password);
        $this->db->where('usu_usuario',$login);
        $this->db->or_where('usu_email',$login);
        $login = $this->db->get('usuarios');
        
        if($login && $login->result_id->num_rows > 0){
            return $login->row();
        }

        return false;
    }

    public function loginAdmin($login,$password){
        $this->db->where('adm_senha',$password);
        $this->db->where('adm_usuario',$login);
        $this->db->or_where('adm_email',$login);
        $login = $this->db->get('admin');
        
        if($login && $login->result_id->num_rows > 0){
            return $login->row();
        }

        return false;
    }

}
    