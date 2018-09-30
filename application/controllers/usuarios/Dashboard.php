<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{   
		// require __DIR__ . "/../../libraries/UploadImage.php";
		$this->load->model('Model_incidences','incidences');
		$data['ultimasIncidences'] = $this->incidences->getAllIncidences(FALSE,FALSE,FALSE,5);
		$data['ultimasIncidencesResolvidas'] = $this->incidences->getAllIncidences(FALSE,'CONCLUÍDO',FALSE,5);
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
			// $fileContent = base64_encode(file_get_contents($_FILES['imagemPerfil']['tmp_name']));
			// $fileContent = file_get_contents();
			
			if($_FILES['imagemPerfil']['size'] != 0){
				$upload = new UploadImage();
				$image = $upload->uploadImage($_FILES['imagemPerfil']['tmp_name']);
				if($image){
					$db['user_img'] = $image;
				}else{
					$this->message->add_user('Erro ao fazer upload da Imagem!','error');
					$errorImage = true;
				}
			}

			// var_dump($_POST,$_FILES);die;
			$db['user_ra'] = $this->input->post('ra');
			$db['user_user'] =  $this->input->post('usuario');
			$db['user_name'] =  $this->input->post('nome');
			
			if(!isset($errorImage)){
				$this->usuario->updateUsuario($user->id,$db);
				$this->message->add_user('Editado com sucesso!','sucess');
				$user =  $this->usuario->user();
			}
		}

		$data['user'] = $user; 
		$data['active'] = 'editar';
		$this->load->view('usuarios/editar',$data);
	}
}
