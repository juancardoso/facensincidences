<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{   
		$this->load->model('Model_incidences','incidences');
		$data['ultimasIncidences'] = $this->incidences->getAllIncidences(FALSE,FALSE,5);
		$data['ultimasIncidencesResolvidas'] = $this->incidences->getAllIncidences(FALSE,'CONCLUÍDO',5);
		$data['ranking'] = $this->incidences->getCountUserIncidences();
		$data['active'] = 'dashboard';    
		$this->load->view('usuarios/dashboard',$data);
	}

	public function editarPerfil(){
		$user =  $this->usuario->user();
		$this->load->model('Model_usuario','usuario');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required');
		$this->form_validation->set_rules('ra', 'RA', 'trim|required');
			
		if ($this->form_validation->run())
		{
			$db['user_ra'] = $this->input->post('ra');
			$db['user_user'] =  $this->input->post('usuario');
			$db['user_name'] =  $this->input->post('nome');
			$this->usuario->updateUsuario($user->id,$db);
			$this->message->add_user('Editado com sucesso!','sucess');
			$user =  $this->usuario->user();
		}
		$data['user'] = $user; 
		$data['active'] = 'editar';
		$this->load->view('usuarios/editar',$data);
	}
}
