<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_tickets','tickets');
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
				'id_usuario' => $this->user->id
			];

			$this->db->trans_begin();
			$id = $this->tickets->addTicket($data);

			if($this->db->trans_status()){
				$this->db->trans_commit();
				$this->message->add_user('Seu ticket #'.$id.' foi enviado com sucesso!','success');
			}else{
				$this->db->trans_rollback();
				$this->message->add_user('Não foi possível adicionar seu ticket!','error');
			}

			redirect('usuarios/tickets/listar');
		}else{
			$data['active'] = 'criarTicket';
			$this->load->view('usuarios/tickets/adicionar',$data);
		}
	}

	public function listar(){
		$tickets = $this->tickets->getTickets($this->user->id);
		$data['tickets'] = $tickets;
		$data['titulo'] = 'Lista -> Tickets';
		$data['active'] = 'meusTicket';
		$this->load->view('usuarios/tickets/listar',$data);
	}

	public function excluir($id, $redirect = FALSE){
		$this->db->trans_begin();
		$ret = $this->tickets->excluirTicket($id);
		if($this->db->trans_status()){
			$this->db->trans_commit();
			$this->message->add_user('Seu ticket #'.$id.' foi excluído com sucesso!','success');
		}else{
			$this->db->trans_rollback();
			$this->message->add_user('Não foi possível excluir seu ticket!','error');
		}

		if($redirect) redirect('usuarios/tickets/listar');
	}

	public function ver($id){
        $ticket = $this->tickets->getTickets($this->user->id,$id);

        if(!$ticket){
            $this->message->add_user('Não foi possível encontrar o ticket selecionado!','error');
            redirect('usuarios/tickets/listar');
        }
        
        $data['ticket'] = $ticket[0];
        $data['titulo'] = 'Tickets -> Ver';
		$data['active'] = 'meusTicket';
		$this->load->view('usuarios/tickets/ver',$data);
	}
	
	public function addComentarioAjax(){
        $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
        $ticket = isset($_POST['ticket']) ? $_POST['ticket'] : '';
        $user = $this->user->id;

        if(!$mensagem) { echo json_encode('<div class="alert alert-danger">Não é possivel adicionar um comentário vazio!</div>'); die; };

        $id = $this->tickets->addComentario([
            'mensagem' => $mensagem,
            'id_ticket' => $ticket,
            'id_usuario' => $user,
            'visibilidade' => 'TODOS'
        ]);

        if($id){
            echo json_encode('<div class="alert alert-success">Comentário adicionado com sucesso!</div>');
        }else{
            echo json_encode('<div class="alert alert-danger">Não foi possivel adicionar seu comentário!</div>');
        }

    }

    public function getComentariosAjax(){
        $ticket = isset($_POST['ticket']) ? $_POST['ticket'] : '';

        $comentarios = $this->tickets->getComentarios($ticket, TRUE);

        echo json_encode($comentarios);

    }

}
