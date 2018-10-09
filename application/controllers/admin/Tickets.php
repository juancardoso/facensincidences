<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_tickets','tickets');
		$this->load->model('Model_imagens','imagens');
    }

    public function index(){
        redirect('admin/tickets/listar');
    }

    public function listar(){
        $tickets = $this->tickets->getAllTickets();
		$data['tickets'] = $tickets;
		$data['titulo'] = 'Lista -> Tickets';
		$data['active'] = 'ticket';
		$this->load->view('admin/tickets/listar',$data);
    }

    public function ver($id){
        $ticket = $this->tickets->getAllTickets($id, FALSE);

        if(!$ticket){
            $this->message->add_admin('Não foi possível encontrar o ticket selecionado!','error');
            redirect('admin/tickets/listar');
        }
        
        $data['ticket'] = $ticket[0];
		$data['imagens'] = $this->imagens->getImagens($ticket[0]->id);
        $data['titulo'] = 'Tickets -> Ver';
		$data['active'] = 'ticket';
		$this->load->view('admin/tickets/ver',$data);
    }

    public function addComentarioAjax(){
        $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
        $ticket = isset($_POST['ticket']) ? $_POST['ticket'] : '';
        $visible = $_POST['visible'];
        $user = $this->admin->id;

        if(!$mensagem) { echo json_encode('<div class="alert alert-danger">Não é possivel adicionar um comentário vazio!</div>'); die; };

        $id = $this->tickets->addComentario([
            'tcm_mensagem' => $mensagem,
            'tcm_idticket' => $ticket,
            'tcm_idadmin' => $user,
            'tcm_visibilidade' => $visible
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

    public function aprovar($id){

        $this->load->model('Model_incidences','incidences');

        if(!$this->tickets->aprovar($id)){
            $this->message->add_admin('Não foi possível aprovar o ticket #'.$id,'error');
            redirect('admin/tickets/listar');
        }

        $retorno = $this->incidences->create($this->admin->id,$id);

        if($retorno){
            $this->message->add_admin('Incidência criada com sucesso!','success');
            redirect('admin/incidences/ver/'.$retorno);
        }

        $this->message->add_admin("Não foi possível aprovar o ticket #{$id}!",'error');
        redirect('admin/tickets/listar');

    }

}