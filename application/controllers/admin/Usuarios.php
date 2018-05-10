<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_usuario','usuario');
    }

    public function listar(){
        $usuarios = $this->usuario->getAllUsuarios();
        $data['usuarios'] = $usuarios;
		$data['titulo'] = 'Lista -> usuarios';
		$data['active'] = 'listarUsuarios';
		$this->load->view('admin/usuarios/listar',$data);
    }

}