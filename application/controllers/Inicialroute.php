<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicialroute extends CI_Controller {

	public function index()
	{
        	redirect('usuarios/Login');
	}
}
