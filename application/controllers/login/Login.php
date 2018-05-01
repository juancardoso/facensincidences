<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $result = $this->db->get('usuarios');

        var_dump($this->db->affected_rows(),$result->result());
        die;
		$this->load->view('login/Login');
	}
}
