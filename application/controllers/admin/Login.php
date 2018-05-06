<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $this->load->model('model_login','login');

        $this->form_validation->set_rules('login', 'Login', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run())
		{
				$login = $this->login->loginAdmin($_POST['login'],sha1($_POST['password']));
				
				if($login){
					$this->session->set_userdata('login_idAdmin',$login->admin_id);
					$this->session->set_userdata('login_admin',base64_encode("$login->admin_id:$login->admin_user:$login->admin_password"));
					redirect('admin/dashboard');
				}else{
					$data['errorLogin'] = true;
					$this->message->add('Usuário e/ou senha inválidos!','error');
				}
		}else{
			$data['errorLogin'] = false;
		}

        
		$this->load->view('admin/login/Login',$data);
	}

	public function sair(){
		$this->session->unset_userdata('login_idAdmin');
		$this->session->unset_userdata('login_admin');
		redirect('admin/login');
	}
}
