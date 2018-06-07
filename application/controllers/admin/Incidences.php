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
        redirect('admin/incidences/listar');
    }

    public function listar(){
        $incidences = $this->incidences->getAllIncidences();
        
        $data['incidences'] = $incidences;
		$data['titulo'] = 'Lista -> Incidences';
		$data['active'] = 'incidences';
		$this->load->view('admin/incidences/listar',$data);
    }

    public function ver($id){
        $incidence = $this->incidences->getAllIncidences($id, FALSE);
        
        if(!$incidence){
            $this->message->add_admin('Não foi possível encontrar a incidência selecionada!','error');
            redirect('admin/incidences/listar');
        }
        $status = $this->incidences->getStatus();
        $data['incidence'] = $incidence[0];
        $data['status'] = $status;
        $data['localizacoes'] = $this->localizacoes->getSelect(FALSE);
			$data['departamentos'] = $this->departamentos->getSelect(FALSE);
        $data['titulo'] = 'Incidências -> Ver';
		$data['active'] = 'incidences';
		$this->load->view('admin/incidences/ver',$data);
    }

    public function addComentarioAjax(){
        $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
        $incidence = isset($_POST['incidence']) ? $_POST['incidence'] : '';
        $visible = $_POST['visible'];
        $user = $this->admin->id;

        if(!$mensagem) { echo json_encode('<div class="alert alert-danger">Não é possivel adicionar um comentário vazio!</div>'); die; };

        $id = $this->incidences->addComentario([
            'icm_mensagem' => $mensagem,
            'icm_idincidencia' => $incidence,
            'icm_idadmin' => $user,
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

        $comentarios = $this->incidences->getComentarios($incidence);

        echo json_encode($comentarios);

    }

    public function atualizar($id){

        $this->form_validation->set_rules('titulo','Titulo','trim|required');
		$this->form_validation->set_rules('localizacao','Localização','trim|required');
		$this->form_validation->set_rules('departamento','Departamento','trim|required');
        $this->form_validation->set_rules('descricao','Descrição','trim|required');
        $this->form_validation->set_rules('status','Status','trim|required');
        
		if($this->form_validation->run()){
			$data = [
				'inc_idlocalizacao' => $_POST['localizacao'],
				'inc_iddepartamento' => $_POST['departamento'],
				'inc_descricao' => $_POST['descricao'],
				'inc_status' => $_POST['status'],
			];

			$this->db->trans_begin();
			$this->incidences->update($id,$data);

			if($this->db->trans_status()){
				$this->db->trans_commit();
				$this->message->add_admin('Incidência atualizada com sucesso','success');
			}else{
				$this->db->trans_rollback();
				$this->message->add_admin('Preenche todos os campos para atualziar a incidência','error');
			}

			redirect('admin/incidences/ver/'.$id);
		}else{
            $this->message->add_admin('Preenche todos os campos para atualziar a incidência!','error');
			redirect('admin/incidences/ver/'.$id);
		}
    }

}