<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itens extends MY_Controller {

	function __construct(){
		parent:: __construct();
		
		$this->load->helper('form');
		$this->load->model('Itens_model');
		$this->load->model('Projetopnae_model');
		$this->load->model('Produto_model');
		$this->load->model('Agricultor_model');
		

	}

	//----------------------------------------------------------------------------------

	public function index($idProjeto){

		$id = $idProjeto;
		$projeto = $this->Projetopnae_model->getById($id);

		if(!$projeto)
			show_404();

		$dados=[
			'produtos'=> $this->Produto_model->listar(),
			'itens_do_projeto' => $this->Itens_model->getByProjeto($id),
			'idProjeto' => $id
		];

		$this->load->view('Itens', $dados);

	} 
	
	//----------------------------------------------------------------------------------

	public function adicionar($idProjeto){

		$id = $idProjeto;
		$projeto = $this->Projetopnae_model->getById($id);

		if(!$projeto)
			show_404();

		$dados=[
			'produtos'=> $this->Produto_model->listar(),
			'itens_do_projeto' => $this->Itens_model->getByProjeto($id),
			'idProjeto' => $id
		];

		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('produto',     'Cod Produto',          			 'trim|required|is_natural');
		$this->form_validation->set_rules('agricultor',     'Cod Agricultor',     			 'trim|is_natural');
		$this->form_validation->set_rules('quantidade',     'Quantidade',      				 'trim|required|is_natural');
		$this->form_validation->set_rules('precoUnidade',     'Preço Unitário',     		 'trim|required');
		$this->form_validation->set_rules('descricaoProd',     'Descrição',     			 'trim|required');
		$this->form_validation->set_rules('cronogramaEntregaProd',     'Cronograma',      	 'trim|required');
		
		
		if($this->form_validation->run()== FALSE){

			$dados['formerror'] = validation_errors();

			$this->load->view('Itens', $dados);

		}else{
			// $agricultor = $this->Agricultor_model->getByProjeto($idProjeto)
			// if($agricultor->dapLimite){
				
			// }
			$this->Itens_model->Cadastrar($idProjeto);

			redirect('/projetopnae/'.$idProjeto. '/itens');
			
		}
		
	}

	//----------------------------------------------------------------------------------

	public function remover($idProjeto){

		$this->Itens_model->remover($idProjeto);
		redirect('/projetopnae/'.$idProjeto. '/itens');
	
	}

	//----------------------------------------------------------------------------------


}
