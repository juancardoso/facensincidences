<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

	public function criarTicket()
	{   
		$data['active'] = 'criarTicket';
		$this->load->view('usuarios/criarTicket',$data);
	}
}
