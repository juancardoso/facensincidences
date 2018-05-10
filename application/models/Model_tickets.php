<?php

class Model_tickets extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function addTicket($data){
        $this->db->insert('tickets',$data);
        return $this->db->insert_id();
    }

    public function getTickets($idUser, $idTicket = FALSE){
        
        $this->db->select('tic_id id, tic_titulo titulo, tic_descricao descricao, tic_iddepartamento departamento, tic_idlocalizacao localizacao, tic_data data, tic_status status');
        $this->db->select('u.usu_usuario usuario');
        $this->db->join('usuarios u','usu_id = tic_idusuario');
        
        if($idTicket){
            $this->db->where('tic_id',$idTicket);
        }

        $this->db->where('tic_idusuario',$idUser);

        $result = $this->db->get('tickets t');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function getAllTickets($idTicket = FALSE, $status = FALSE){

        $this->db->select('tic_id id, tic_titulo titulo, tic_descricao descricao, tic_iddepartamento departamento, tic_idlocalizacao localizacao, tic_data data, tic_status status');
        $this->db->select('u.usu_usuario usuario');
        $this->db->join('usarios u','usu_id = tic_idusuario');

        if($idTicket){
            $this->db->where('tic_id',$idTicket);
        }

        if($status){
            $this->db->where('tic_status',$status);
        }

        $result = $this->db->get('tickets t');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function excluirTicket($id){
        $this->db->where('tic_id',$id);
        return $this->db->update('tickets',['tic_status' => 'CANCELADO']);
    }

    public function getComentarios($idTicket, $usuario = FALSE, $idComentario = FALSE){
        $this->db->select('tcm_id id, tcm_mensagem mensagem, tcm_data data, tcm_visibilidade visibilidade, tcm_idadmin id_admin, tcm_idusuario id_usuario');
        $this->db->select('COALESCE(u.usu_usuario, a.adm_usuario) usuario');
        $this->db->join('usarios u','u.usu_id = c.tcm_idusuario','LEFT');
        $this->db->join('admin a','a.adm_id = c.tcm_idadmin','LEFT');

        if($usuario)
            $this->db->where('tcm_visibilidade','TODOS');
        
        if($idComentario)
            $this->db->where('tcm_id',$idComentario);
        
        $this->db->where('tcm_idticket',$idTicket);
        $this->db->order_by('tcm_id desc');
        $result = $this->db->get('tickets_comentarios c');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function addComentario($data){
        $this->db->insert('tickets_comentarios',$data);
        return $this->db->insert_id();
    }

    public function aprovar($id){
        $this->db->where('tic_id',$id);
        $this->db->where('tic_status','PENDENTE');
        return $this->db->update('tickets',['tic_status' => 'APROVADO']);
    }

}
    