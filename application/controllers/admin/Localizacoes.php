<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacoes extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_localizacoes','localizacoes');
    }

    public function index(){
        redirect('admin/localizacoes/listar');
    }

    public function listar(){
        $localizacoes = $this->localizacoes->get();
		$data['localizacoes'] = $localizacoes;
		$data['titulo'] = 'Lista -> Localizacoes';
		$data['active'] = 'localizacoes';
		$this->load->view('admin/localizacoes/listar',$data);
    }

    public function adicionar(){
        
        $nome = $_POST['nome'];

        $result = $this->localizacoes->create([
            'loc_nome' => $nome,
        ]);

        if($result){
            $row = $this->localizacoes->get($result);
            echo json_encode($row[0]);
        }
    }

    public function editar(){
        $nome = $_POST['nome'];
        $id = $_POST['id'];

        $result = $this->localizacoes->update($id, [
            'loc_nome' => $nome,
        ]);

        if($result){
            $this->message->add_admin('Localização editada com sucesso!','success');
        }else{
            $this->message->add_admin('Ocorreu um erro ao editar a localização!','error');
        }
    }

    public function excluir(){
        $id = $_POST['id'];

        $result = $this->localizacoes->delete($id);

        if($result){
            $this->message->add_admin('Localização excluída com sucesso!','success');
        }else{
            $this->message->add_admin('Ocorreu um erro ao excluir a localização!','error');
        }
    }

}