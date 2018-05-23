<?php

class Model_departamentos extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data){
        $this->db->insert('departamentos',$data);
        return $this->db->insert_id();
    }

    public function get($id = FALSE){
        $this->db->select('dep_id id, dep_nome nome, DATE(dep_data_criacao) data, dep_status status');
        $this->db->where('dep_status','ATIVO');
        if($id)
            $this->db->where('dep_id',$id);
        $result = $this->db->get('departamentos');
        return ($result && $result->num_rows()) ? $result->result() : [];
    }

    public function update($id, $data){
        $this->db->where('dep_id',$id);
        return $this->db->update('departamentos',$data);
    }

    public function delete($id){
        $this->db->where('dep_id',$id);
        return $this->db->update('departamentos',['dep_status' => 'EXCLUIDO']);
    }

    public function getSelect(){
        $result = $this->get();
        $departamentos = [];
        foreach($result as $row){
            $departamentos[$row->id] = $row->nome;
        }
        return $departamentos;
    }
}