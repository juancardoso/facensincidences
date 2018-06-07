<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incidences extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('Model_incidences','incidences');
        $this->load->model('Model_departamentos','departamentos');
		$this->load->model('Model_localizacoes','localizacoes');
    }

    public function index(){
        redirect('usuarios/incidences/listar');
    }

    public function listar(){
        $incidences = $this->incidences->getAllIncidences();
        
        $data['incidences'] = $incidences;
		$data['titulo'] = 'Lista -> Incidences';
		$data['active'] = 'incidences';
		$this->load->view('usuarios/incidences/listar',$data);
    }

    public function ver($id){
        $incidence = $this->incidences->getAllIncidences($id, FALSE);

        if(!$incidence){
            $this->message->add_user('Não foi possível encontrar a incidência selecionada!','error');
            redirect('usuarios/incidences/listar');
        }
        $status = $this->incidences->getStatus();
        $data['incidence'] = $incidence[0];
        $data['status'] = $status;
        $data['localizacoes'] = $this->localizacoes->getSelect(false);
			$data['departamentos'] = $this->departamentos->getSelect(false);
        $data['titulo'] = 'Incidências -> Ver';
		$data['active'] = 'incidences';
		$this->load->view('usuarios/incidences/ver',$data);
    }

    public function addComentarioAjax(){
        $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
        $incidence = isset($_POST['incidence']) ? $_POST['incidence'] : '';
        $visible = 'TODOS';
        $user = $this->user->id;

        if(!$mensagem) { echo json_encode('<div class="alert alert-danger">Não é possivel adicionar um comentário vazio!</div>'); die; };

        $id = $this->incidences->addComentario([
            'icm_mensagem' => $mensagem,
            'icm_idincidencia' => $incidence,
            'icm_idusuario' => $user,
            'icm_visibilidade' => $visible
        ]);

        if($id){
            echo json_encode('<div class="alert alert-success">Comentário adicionado com sucesso!</div>');
        }else{
            echo json_encode('<div class="alert alert-danger">Não foi possivel adicionar seu comentário!</div>');
        }

    }

    public function getComentariosAjax(){
        $incidence = isset($_POST['incidence']) ? $_POST['incidence'] : '';

        $comentarios = $this->incidences->getComentarios($incidence, TRUE);

        echo json_encode($comentarios);

    }

}