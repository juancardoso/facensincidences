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
            'inc_idlocalizacao' => $ticket->id_localizacao,
            'inc_iddepartamento' => $ticket->id_departamento,
        ];

        $this->db->insert('incidencias',$data);

        return $this->db->insert_id();
    }

    public function getAllIncidences($idIncidence = FALSE, $status = FALSE, $orderby = FALSE, $limit = FALSE){
        $this->db->select('inc_id id, inc_titulo titulo, dep_nome departamento, dep_id id_departamento, loc_nome localizacao, loc_id id_localizacao, inc_descricao descricao, inc_status status, inc_idticket idticket');
        $this->db->select('u.admin_user usuario, u.admin_name nome');
        $this->db->select('(SELECT img_img img FROM imagens WHERE inc_idticket = img_idTicket LIMIT 1) AS img');
        $this->db->join('admin u','admin_id = inc_idadmin');
        $this->db->join('localizacoes','loc_id = inc_idlocalizacao');
        $this->db->join('departamentos','dep_id = inc_iddepartamento');

        if($idIncidence){
            $this->db->where('inc_id',$idIncidence);
        }

        if($status){
            $this->db->where('inc_status',$status);
        }

        if($limit){
            $this->db->limit($limit);
        }

        if($orderby){
            $this->db->order_by($orderby);
        }
        
        $this->db->order_by('inc_id', 'DESC');

        $result = $this->db->get('incidencias i');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function getCountUserIncidences(){
        $this->db->select('COUNT(*) AS qtde,user_name AS nome,user_img AS img');
        $this->db->join('tickets','inc_idticket = tic_id','left');
        $this->db->join('usuarios','tic_idusuario = user_id','left');

        $this->db->group_by('user_id');
        $this->db->order_by('COUNT(*)', 'DESC');
        $this->db->limit(10);

        $result = $this->db->get('incidencias');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }


    public function getComentarios($idIncidence, $usuario = FALSE, $idComentario = FALSE){
        $this->db->select('icm_id id, icm_mensagem mensagem, icm_data data, icm_visibilidade visibilidade, icm_idadmin id_admin, icm_idusuario id_usuario');
        $this->db->select('COALESCE(u.user_user, a.admin_user) usuario, COALESCE(u.user_name, a.admin_name) nome');
        $this->db->join('usuarios u','u.user_id = c.icm_idusuario','LEFT');
        $this->db->join('admin a','a.admin_id = c.icm_idadmin','LEFT');

        if($usuario)
            $this->db->where('icm_visibilidade','TODOS');
        
        if($idComentario)
            $this->db->where('icm_id',$idComentario);
        
        $this->db->where('icm_idincidencia',$idIncidence);
        $this->db->order_by('icm_id desc');
        $result = $this->db->get('incidencias_comentarios c');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function addComentario($data){
        $this->db->insert('incidencias_comentarios',$data);
        return $this->db->insert_id();
    }

    public function getStatus(){
        return [
            'PENDENTE' => 'Pendente',
            'EM ANDAMENTO' => 'Em Andamento',
            'CONCLUIDO' => 'Concluída',
            'PAUSADO' => 'Pausada',
            'CANCELADO' => 'Cancelado'

        ];
    }

    public function update($id, $data){
        $this->db->where('inc_id',$id);
        return $this->db->update('incidencias',$data);
    }
}