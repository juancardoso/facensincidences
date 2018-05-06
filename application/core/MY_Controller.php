<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $admin;
	var $user;

	public function __construct()
	{
		parent::__construct();
		$this->admin = $this->usuario->admin();
		$this->user = $this->usuario->user();
	}

}