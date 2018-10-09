<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_tickets','tickets');
		$this->load->model('Model_departamentos','departamentos');
		$this->load->model('Model_localizacoes','localizacoes');
		$this->load->model('Model_imagens','imagens');
    }

	public function adicionar()
	{   
		$this->form_validation->set_rules('titulo','Titulo','trim|required');
		$this->form_validation->set_rules('localizacao','Localização','trim|required');
		$this->form_validation->set_rules('departamento','Departamento','trim|required');
		$this->form_validation->set_rules('descricao','Descrição','trim|required');

		if($this->form_validation->run()){

			if(isset($_FILES["imagens"]) && $_FILES["imagens"]['name'][0] != "") {
				for($i = 0;$i < count($_FILES["imagens"]["name"]);$i++) {
					$target_dir = "uploads/";
					$target_file = $target_dir . basename($_FILES["imagens"]["name"][$i]);
					$uploadOk = 1;
					$extensaoDaImagem = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					$check = getimagesize($_FILES["imagens"]["tmp_name"][$i]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						$this->message->add_user("O arquivo {$_FILES["imagens"]['name'][$i]} não é uma imagem!",'error');
						$uploadOk = 0;
					}
					// verificar o tamanho do arquivo
					if ($_FILES["imagens"]["size"][$i] > 500000) {
						$this->message->add_user("O arquivo {$_FILES["imagens"]['name'][$i]} excedeu o tamanho permitido!",'eror');
						$uploadOk = 0;
					}
					// Permitir formatos expecificos de imagens
					if($extensaoDaImagem != "jpg" && $extensaoDaImagem != "png" && $extensaoDaImagem != "jpeg"
					&& $extensaoDaImagem != "gif" ) {
						$this->message->add_user('Somente arquivos do tipo JPG, JPEG, PNG & GIF são permitidos!','error');
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$this->message->add_user("A imagem {$_FILES["imagens"]['name'][$i]} não pode ser enviada!",'error');
						// if everything is ok, try to upload file
					} else {
						$imgs[] = base64_encode(file_get_contents($_FILES["imagens"]["tmp_name"][$i]));
					}
				}
			}

			$data = [
				'tic_titulo' => $_POST['titulo'],
				'tic_idlocalizacao' => $_POST['localizacao'],
				'tic_iddepartamento' => $_POST['departamento'],
				'tic_descricao' => $_POST['descricao'],
				'tic_status' => 'PENDENTE',
				'tic_idusuario' => $this->user->id,
			];

			$this->db->trans_begin();
			$id = $this->tickets->addTicket($data);


			if(isset($imgs)) {
				foreach($imgs AS $img){
					$dataimg[] = [
						'img_idTicket' => $id,
						'img_img' => $img,
					];
				}
	
				$this->imagens->addImagens($dataimg);
			}

			if($this->db->trans_status()){
				$this->db->trans_commit();
				$this->message->add_user('Seu ticket #'.$id.' foi enviado com sucesso!','success');
			}else{
				$this->db->trans_rollback();
				$this->message->add_user('Não foi possível adicionar seu ticket!','error');
			}

			redirect('usuarios/tickets/listar');
		}else{
			$data['localizacoes'] = $this->localizacoes->getSelect();
			$data['departamentos'] = $this->departamentos->getSelect();
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
		$data['imagens'] = $this->imagens->getImagens($ticket[0]->id);
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
            'tcm_mensagem' => $mensagem,
            'tcm_idticket' => $ticket,
            'tcm_idusuario' => $user,
            'tcm_visibilidade' => 'TODOS'
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
