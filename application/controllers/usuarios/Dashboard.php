<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{    
		$data['active'] = 'dashboard';    
		$this->load->view('usuarios/dashboard',$data);
	}
}
