<?php

class Model_incidences extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function create($admin, $idTicket){
        $this->load->model('Model_tickets','tickets');

        $ticket = $this->tickets->getAllTickets($idTicket);

        if(!$ticket) return FALSE;

        $ticket = $ticket[0];

        $data = [
            'id_ticket' => $ticket->id,
            'id_admin' => $admin,
            'titulo' => $ticket->titulo,
            'descricao' => $ticket->descricao,
            'id_localizacao' => $ticket->localizacao,
            'id_categoria' => $ticket->categoria,
        ];

        $this->db->insert('incidences',$data);

        return $this->db->insert_id();
    }

    public function getAllIncidences($idIncidence = FALSE, $status = FALSE){

        $this->db->select('i.*, u.user_user usuario');
        $this->db->join('user u','user_id = id_admin');

        if($idIncidence){
            $this->db->where('id',$idIncidence);
        }

        if($status){
            $this->db->where('status',$status);
        }

        $result = $this->db->get('incidences i');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function getComentarios($idIncidence, $usuario = FALSE, $idComentario = FALSE){
        $this->db->select('c.*, COALESCE(u.user_user, a.admin_user) usuario');
        $this->db->join('user u','u.user_id = c.id_usuario','LEFT');
        $this->db->join('admin a','a.admin_id = c.id_admin','LEFT');

        if($usuario)
            $this->db->where('visibilidade','TODOS');
        
        if($idComentario)
            $this->db->where('id',$idComentario);
        
        $this->db->where('id_incidence',$idIncidence);
        $this->db->order_by('id desc');
        $result = $this->db->get('incidences_comentarios c');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function addComentario($data){
        $this->db->insert('incidences_comentarios',$data);
        return $this->db->insert_id();
    }

    public function getStatus(){
        return [
            'PENDENTE' => 'Pendente',
            'EM ANDAMENTO' => 'Em Andamento',
            'CONCLUÍDO' => 'Concluída',
            'PAUSADO' => 'Pausada',
            'CANCELADO' => 'Cancelado'

        ];
    }
}