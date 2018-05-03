<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_ticket','ticket');
    }

	public function adicionar()
	{   
		$this->form_validation->set_rules('titulo','Titulo','trim|required');
		$this->form_validation->set_rules('localizacao','Localização','trim|required');
		$this->form_validation->set_rules('categoria','Categoria','trim|required');
		$this->form_validation->set_rules('descricao','Descrição','trim|required');
		if($this->form_validation->run()){
			$data = [
				'titulo' => $_POST['titulo'],
				'localizacao' => $_POST['localizacao'],
				'categoria' => $_POST['categoria'],
				'descricao' => $_POST['descricao'],
				'status' => 'PENDENTE',
			];

			$this->db->trans_begin();
			$id = $this->ticket->addTicket($data);

			if($this->db->trans_status()){
				$this->db->trans_commit();
				$this->message->add('Seu ticket #'.$id.' foi enviado com sucesso!','success');
			}else{
				$this->db->trans_rollback();
				$this->message->add('Não foi possível adicionar seu ticket!','error');
			}

			redirect('usuarios/tickets/listar');
		}else{
			$data['active'] = 'criarTicket';
			$this->load->view('usuarios/tickets/adicionar',$data);
		}
	}

	public function listar(){
		$tickets = $this->ticket->getTickets();
		$data['tickets'] = $tickets;
		$data['titulo'] = 'Lista -> Tickets';
		$data['active'] = 'meusTicket';
		$this->load->view('usuarios/tickets/listar',$data);
	}

	public function excluir($id){
		$this->db->trans_begin();
		$ret = $this->ticket->excluirTicket($id);
		if($this->db->trans_status()){
			$this->db->trans_commit();
			$this->message->add('Seu ticket #'.$id.' foi excluído com sucesso!','success');
		}else{
			$this->db->trans_rollback();
			$this->message->add('Não foi possível excluir seu ticket!','error');
		}
	}
}
