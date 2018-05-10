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
            'inc_idticket' => $ticket->id,
            'inc_idadmin' => $admin,
            'inc_titulo' => $ticket->titulo,
            'inc_descricao' => $ticket->descricao,
            'inc_idlocalizacao' => $ticket->localizacao,
            'inc_iddepartamento' => $ticket->departamento,
        ];

        $this->db->insert('incidencias',$data);

        return $this->db->insert_id();
    }

    public function getAllIncidences($idIncidence = FALSE, $status = FALSE){

        $this->db->select('i.*, u.usu_usuario usuario');
        $this->db->join('userios u','usu_id = adm_id');

        if($idIncidence){
            $this->db->where('inc_id',$idIncidence);
        }

        if($status){
            $this->db->where('inc_status',$status);
        }

        $result = $this->db->get('incidencias i');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function getComentarios($idIncidence, $usuario = FALSE, $idComentario = FALSE){
        $this->db->select('c.*, COALESCE(u.usu_usuario, a.adm_usuario) usuario');
        $this->db->join('usuarios u','u.usu_id = c.icm_idusuario','LEFT');
        $this->db->join('admin a','a.adm_id = c.icm_idadmin','LEFT');

        if($usuario)
            $this->db->where('icm_visibilidade','TODOS');
        
        if($idComentario)
            $this->db->where('icm_id',$idComentario);
        
        $this->db->where('icm_idincidence',$idIncidence);
        $this->db->order_by('icm_id desc');
        $result = $this->db->get('incidencias_comentarios c');
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