<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_ticket','ticket');
    }

    public function listar(){
        $tickets = $this->ticket->getTickets();
		$data['tickets'] = $tickets;
		$data['titulo'] = 'Lista -> Tickets';
		$data['active'] = 'listarTicket';
		$this->load->view('admin/tickets/listar',$data);
    }

    public function ver($id){
        $ticket = $this->ticket->getTickets($id);

        if(!$ticket){
            $this->message->add('Não foi possível encontrar o ticket selecionado!','error');
            redirect('admin/tickets/listar');
        }

        $ticket = $ticket[0];
        $ticket->usuario = 'Teste';
        $data['ticket'] = $ticket;
        $data['titulo'] = 'Tickets -> Ver';
		$data['active'] = 'listarTicket';
		$this->load->view('admin/tickets/ver',$data);
    }

}