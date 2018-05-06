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
        
        $this->db->select('t.*, u.user_user usuario');
        $this->db->join('user u','user_id = id_usuario');
        
        if($idTicket){
            $this->db->where('id',$idTicket);
        }

        $this->db->where('id_usuario',$idUser);

        $result = $this->db->get('tickets t');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function getAllTickets($idTicket = FALSE, $status = FALSE){

        $this->db->select('t.*, u.user_user usuario');
        $this->db->join('user u','user_id = id_usuario');

        if($idTicket){
            $this->db->where('id',$idTicket);
        }

        if($status){
            $this->db->where('status',$status);
        }

        $result = $this->db->get('tickets t');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function excluirTicket($id){
        $this->db->where('id',$id);
        return $this->db->update('tickets',['status' => 'CANCELADO']);
    }

    public function getComentarios($idTicket, $usuario = FALSE, $idComentario = FALSE){
        $this->db->select('c.*, COALESCE(u.user_user, a.admin_user) usuario');
        $this->db->join('user u','u.user_id = c.id_usuario','LEFT');
        $this->db->join('admin a','a.admin_id = c.id_admin','LEFT');

        if($usuario)
            $this->db->where('visibilidade','TODOS');
        
        if($idComentario)
            $this->db->where('id',$idComentario);
        
        $this->db->where('id_ticket',$idTicket);
        $this->db->order_by('id desc');
        $result = $this->db->get('tickets_comentarios c');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function addComentario($data){
        $this->db->insert('tickets_comentarios',$data);
        return $this->db->insert_id();
    }

    public function aprovar($id){
        $this->db->where('id',$id);
        $this->db->where('status','PENDENTE');
        return $this->db->update('tickets',['status' => 'APROVADO']);
    }

}
    