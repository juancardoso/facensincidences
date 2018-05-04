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

    public function getTickets($id = FALSE){
        if($id){
            $this->db->where('id',$id);
        }

        $result = $this->db->get('tickets');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function excluirTicket($id){
        $this->db->where('id',$id);
        return $this->db->delete('tickets');
    }

    public function getComentarios($idTicket, $idComentario = FALSE){
        if($idComentario)
            $this->db->where('id',$idComentario);
        $this->db->where('id_ticket',$idTicket);
        $this->db->order_by('id desc');
        $result = $this->db->get('tickets_comentarios');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function addComentario($data){
        $this->db->insert('tickets_comentarios',$data);
        return $this->db->insert_id();
    }

}
    