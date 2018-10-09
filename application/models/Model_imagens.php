<?php

class Model_imagens extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function addImagem($data){
        $this->db->insert('imagens',$data);
        return $this->db->insert_id();
    }

    public function addImagens($data){
        $this->db->insert_batch('imagens', $data);
        return $this->db->insert_id();
    }

    public function getImagens($idTicket){
        
        $this->db->select('img_id id, img_idTicket idTicket, img_img img');
        $this->db->where('img_idTicket',$idTicket);

        $result = $this->db->get('imagens');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function excluirImagem($id){
        $this->db->where('img_id',$id);
        return $this->db->delete('imagens');
    }

}
    