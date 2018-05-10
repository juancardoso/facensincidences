<?php

class Model_usuario extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function admin(){
        $id = $this->session->userdata('login_idAdmin');
        $this->db->select('adm_id id, adm_nome nome, adm_usuario usuario, adm_email email, adm_departamento departamento');
        $this->db->where('adm_id',$id);
        $result = $this->db->get('admin');

        return ($result && $result->num_rows()) ? $result->row() : FALSE;
    }

    public function user(){
        $id = $this->session->userdata('login_id');
        $this->db->select('usu_id id, usu_nome nome, usu_usuario usuario, usu_email email, usu_ra ra');
        $this->db->where('usu_id',$id);
        $result = $this->db->get('usuarios');

        return ($result && $result->num_rows()) ? $result->row() : FALSE;
    }

}