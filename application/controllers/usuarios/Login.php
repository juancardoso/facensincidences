<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->model('model_login','login');
		$this->load->model('model_usuario','usuario');

		if($this->input->post('id')) {
			$user = $this->usuario->getUsuarioByEmail($this->input->post('email'));
			if($user){
				$this->session->set_userdata('login_id',$user->user_id);
				$this->session->set_userdata('login_user',base64_encode("$user->user_ra:$user->user_password"));
			} else {
				$db['user_ra'] = $this->input->post('id');
				$db['user_user'] =  $this->input->post('id');
				$db['user_password'] =  sha1($this->input->post('id'));
				$db['user_name'] =  $this->input->post('name');
				$db['user_email'] =  $this->input->post('email');
				$db['user_img'] =  $this->input->post('img');
				$this->usuario->addUsuario($db);
				$this->session->set_userdata('login_id',$user->user_id);
				$this->session->set_userdata('login_user',base64_encode("$user->user_ra:$user->user_password"));
			}
		} else {
			$this->form_validation->set_rules('login', 'Login', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run())
			{
					$login = $this->login->loginUsuario($_POST['login'],sha1($_POST['password']));
					
					if($login){
						$this->session->set_userdata('login_id',$login->user_id);
						$this->session->set_userdata('login_user',base64_encode("$login->user_ra:$login->user_password"));
						redirect('usuarios/dashboard');
					}else{
						$data['errorLogin'] = true;
						$this->message->add_user('Usuário e/ou senha inválidos!','error');
					}
			}else{
				$data['errorLogin'] = false;
			}
		
			$this->load->view('usuarios/login/Login',$data);
		}
	}

	public function sair(){
		$this->session->unset_userdata('login_id');
		$this->session->unset_userdata('login_user');
		redirect('usuarios/login');
	}
}
