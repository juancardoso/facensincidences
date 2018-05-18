<?php

class Model_usuario extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function admin(){
        $id = $this->session->userdata('login_idAdmin');
        $this->db->select('admin_id id, admin_name nome, admin_user usuario, admin_email email');
        $this->db->where('admin_id',$id);
        $result = $this->db->get('admin');

        return ($result && $result->num_rows()) ? $result->row() : FALSE;
    }

    public function user(){
        $id = $this->session->userdata('login_id');
        $this->db->select('user_id id, user_name nome, user_user usuario, user_email email, user_ra ra');
        $this->db->where('user_id',$id);
        $result = $this->db->get('usuarios');

        return ($result && $result->num_rows()) ? $result->row() : FALSE;
    }

    public function getAllUsuarios(){
        $this->db->select('user_id, user_user, user_name, user_email, user_ra');
        $result = $this->db->get('usuarios');

        return ($result && $result->num_rows()) ? $result->result() : FALSE;
    }

}