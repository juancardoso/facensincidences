<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{    
		$data['active'] = 'dashboard';    
		$this->load->view('usuarios/dashboard',$data);
	}
}