<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_tickets','tickets');
    }

    public function listar(){
        $tickets = $this->tickets->getTickets();
		$data['tickets'] = $tickets;
		$data['titulo'] = 'Lista -> Tickets';
		$data['active'] = 'listarTicket';
		$this->load->view('admin/tickets/listar',$data);
    }

    public function ver($id){
        $ticket = $this->tickets->getTickets($id);

        if(!$ticket){
            $this->message->add('Não foi possível encontrar o ticket selecionado!','error');
            redirect('admin/tickets/listar');
        }

        $ticket = $ticket[0];
        $ticket->usuario = 'Teste';
        $usuario = (object)['id' => 2];
        
        $data['usuario'] = $usuario;
        $data['ticket'] = $ticket;
        $data['titulo'] = 'Tickets -> Ver';
		$data['active'] = 'listarTicket';
		$this->load->view('admin/tickets/ver',$data);
    }

    public function addComentarioAjax(){
        $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
        $ticket = isset($_POST['ticket']) ? $_POST['ticket'] : '';
        $visible = isset($_POST['visible']) ? 'ADM' : 'TODOS';
        $user = 1;

        if(!$mensagem) { echo json_encode('<div class="alert alert-danger">Não é possivel adicionar um comentário vazio!</div>'); die; };

        $id = $this->tickets->addComentario([
            'mensagem' => $mensagem,
            'id_ticket' => $ticket,
            'id_usuario' => $user,
            'visibilidade' => $visible
        ]);

        if($id){
            echo json_encode('<div class="alert alert-success">Comentário adicionado com sucesso!</div>');
        }else{
            echo json_encode('<div class="alert alert-danger">Não foi possivel adicionar seu comentário!</div>');
        }

    }

    public function getComentariosAjax(){
        $ticket = isset($_POST['ticket']) ? $_POST['ticket'] : '';

        $comentarios = $this->tickets->getComentarios($ticket);

        echo json_encode($comentarios);

    }

}