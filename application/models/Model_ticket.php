<?php

class Model_ticket extends CI_Model {
    
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

}
    