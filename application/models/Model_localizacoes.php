<?php

class Model_localizacoes extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data){
        $this->db->insert('localizacoes',$data);
        return $this->db->insert_id();
    }

    public function get($id = FALSE, $ativos = TRUE){
        $this->db->select('loc_id id, loc_nome nome, DATE(loc_data_criacao) data, loc_status status');
        
        if($ativos){
            $this->db->where('loc_status','ATIVO');
        }
        if($id)
            $this->db->where('loc_id',$id);
        $result = $this->db->get('localizacoes');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function update($id, $data){
        $this->db->where('loc_id',$id);
        return $this->db->update('localizacoes',$data);
    }

    public function delete($id){
        $this->db->where('loc_id',$id);
        return $this->db->update('localizacoes',['loc_status' => 'EXCLUIDO']);
    }

    public function getSelect($ativos = TRUE){
        $result = $this->get(FALSE, $ativos);
        $localizacoes = [];
        foreach($result as $row){
            $localizacoes[$row->id] = $row->nome;
        }
        return $localizacoes;
    }
}