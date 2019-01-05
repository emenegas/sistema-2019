<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends MY_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->helper('form');
		$this->load->model('Produto_model');
		
	}

	//----------------------------------------------------------------------------------

	public function novo(){
		
		$this->load->view('Produto');
	}

	//----------------------------------------------------------------------------------

	public function remover($id){

		$this->Produto_model->remover($id);
		redirect('produtoslista');
	}

	//----------------------------------------------------------------------------------

	public function index(){
		$dados=[
			'produtos'=> $this->Produto_model->listar()
		];
		$this->load->view('ProdutosLista', $dados);
	}
	//----------------------------------------------------------------------------------

	public function editar($id){
		$data = [];
		$produto = $this->Produto_model->getById($id);

		if(!$produto){
			show_404();
		}
		$data['produto'] = $produto;
		$this->load->view('ProdutoEdita', $data);
	}
	public function alterar($id){
		$data = [];
		$produto = $this->Produto_model->getById($id);

		if(!$produto){
			show_404();
		}
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$validations = array(
			array(
				'field' => 'nome',
				'label' => 'Nome',
				'rules' => 'required|min_length[1]|max_length[45]'
			),
			array(
				'field' => 'unidadeMedida',
				'label' => 'Unidade de Medida',
				'rules' => 'required|min_length[1]|max_length[45]'
			),
			array(
				'field' => 'tipo',
				'label' => 'Tipo',
				'rules' => 'required|min_length[1]|max_length[45]'
			),

			array(
				'field' => 'epoca',
				'label' => 'Epoca',
				'rules' => 'trim|required|max_length[45]'
			)
		);
		$this->form_validation->set_rules($validations);
		if ($this->form_validation->run() == FALSE) {
			$data['produto'] = $produto;
			$data['formerror'] = validation_errors();
			$this->load->view('ProdutoEdita', $data);
		} else {
			
			$data['nome'] = $this->input->post('nome');
			$data['unidadeMedida'] = $this->input->post('unidadeMedida');
			$data['tipo'] = $this->input->post('tipo');
			$data['epoca'] = $this->input->post('epoca');
			

			if ($this->Produto_model->alterar($id,$data)) {
				redirect('produto');
			} else {
				log_message('error', 'Erro na alteração...');
			}
		}
	}

	//----------------------------------------------------------------------------------

	public function cadastrar(){

		$this->load->library(array('form_validation'));
		
		$this->form_validation->set_rules('nome', 			   'Nome', 				'trim|required');
		$this->form_validation->set_rules('unidadeMedida',     'Unidade Medida',     'trim|required');
		$this->form_validation->set_rules('tipo',       	  'Tipo',          'trim|required');
		$this->form_validation->set_rules('epoca',    	     'Epoca',          'trim|required');
	

	if($this->form_validation->run()== FALSE){
		$dados['formerror'] = validation_errors();
		$this->load->view('Produto', $dados);
	}else{
		$dados['formerror'] = 'Validação OK';
		$this->Produto_model->cadastrar();
		redirect('produto');
	}

	
}

	//----------------------------------------------------------------------------------



}
