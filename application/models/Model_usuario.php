<?php

class Model_usuario extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function admin(){
        $id = $this->session->userdata('login_idAdmin');
        $this->db->select('admin_id id, admin_name nome, admin_user usuario, admin_email email, admin_img img');
        $this->db->where('admin_id',$id);
        $result = $this->db->get('admin');

        return ($result && $result->num_rows()) ? $result->row() : FALSE;
    }

    public function user(){
        $id = $this->session->userdata('login_id');
        $this->db->select('user_id id, user_name nome, user_user usuario, user_email email, user_ra ra, user_img img');
        $this->db->where('user_id',$id);
        $result = $this->db->get('usuarios');

        return ($result && $result->num_rows()) ? $result->row() : FALSE;
    }

    public function getAllUsuarios($ativos = false){
        $this->db->select('user_id, user_user, user_name, user_email, user_ra');
        if($ativos){
            $this->db->where('user_status',1);
        }
        $result = $this->db->get('usuarios');

        return ($result && $result->num_rows()) ? $result->result() : FALSE;
    }

    public function getUsuarioByEmail($email){
        $this->db->where('user_email', $email);
        $result = $this->db->get('usuarios');

        return ($result && $result->num_rows()) ? $result->row() : FALSE;
    }

    public function addUsuario($data){
        $this->db->insert('usuarios',$data);
        return $this->db->insert_id();
    }

    public function updateUsuario($id,$data){
        $this->db->where('user_id', $id);
        $this->db->update('usuarios', $data);
    }

    public function updateAdmin($id,$data){
        $this->db->where('admin_id', $id);
        $this->db->update('admin', $data);
    }

    public function excluirUsuario($id){
        $this->db->where('user_id', $id);
        $this->db->update('usuarios', array('user_status'=> 2));
    }

}