<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		$data['active'] = 'dashboard';    
		$data['arr'] = array();
		$this->load->view('admin/dashboard',$data);
	}

	public function editarPerfil(){
		$admin =  $this->usuario->admin();
		$this->load->model('Model_usuario','usuario');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required');
			
		if ($this->form_validation->run())
		{
			$db['admin_user'] =  $this->input->post('usuario');
			$db['admin_name'] =  $this->input->post('nome');
			$this->usuario->updateAdmin($admin->id,$db);
			$this->message->add_admin('Editado com sucesso!','sucess');
			$admin =  $this->usuario->admin();
		}
		$data['admin'] = $admin; 
		$data['active'] = 'editar';
		$this->load->view('admin/editar',$data);
	}
}
