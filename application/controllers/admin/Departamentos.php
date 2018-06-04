<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_departamentos','departamentos');
    }

    public function index(){
        redirect('admin/departamentos/listar');
    }

    public function listar(){
        $departamentos = $this->departamentos->get();
		$data['departamentos'] = $departamentos;
		$data['titulo'] = 'Lista -> Departamentos';
		$data['active'] = 'departamentos';
		$this->load->view('admin/departamentos/listar',$data);
    }

    public function adicionar(){
        
        $nome = $_POST['nome'];

        $result = $this->departamentos->create([
            'dep_nome' => $nome,
        ]);

        if($result){
            $row = $this->departamentos->get($result);
            echo json_encode($row[0]);
        }
    }

    public function editar(){
        $nome = $_POST['nome'];
        $id = $_POST['id'];

        $result = $this->departamentos->update($id, [
            'dep_nome' => $nome,
        ]);

        if($result){
            $this->message->add_admin('Departamento editado com sucesso!','success');
        }else{
            $this->message->add_admin('Ocorreu um erro ao editar o departamento!','error');
        }
    }

    public function excluir(){
        $id = $_POST['id'];

        $result = $this->departamentos->delete($id);

        if($result){
            $this->message->add_admin('Departamento excluído com sucesso!','success');
        }else{
            $this->message->add_admin('Ocorreu um erro ao excluir o departamento!','error');
        }
    }

}