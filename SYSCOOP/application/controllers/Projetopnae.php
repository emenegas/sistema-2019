<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetopnae extends MY_Controller {

	function __construct(){

		parent:: __construct();
		$this->load->helper('form');
		$this->load->model('Projetopnae_model');
		$this->load->model('Cooperativa_model');
		$this->load->model('Entidade_model');
		$this->load->model('Itens_model');
		$this->load->model('Funcionario_model');

	}

//--------------------Listagem Total-----------------------------------------------

	public function index(){
		$dados=[
			'projetos'=> $this->Projetopnae_model->listar()
		];
		$this->load->view('ProjetosLista', $dados);

	}

//----------------------------------------------------------------------------------

	public function info($id){
		
		$data = [];
		$projeto = $this->Projetopnae_model->getById($id);
		$itens = $this->Itens_model->getByProjeto($id);

		if(!$projeto && !$itens){
			show_404();
		}

		$data['projeto'] = $projeto;
		$data['itens'] = $itens;
		$data['idProjeto'] = $id;

		$this->load->view('ProjetoPnaeInfo', $data);

	}

//----------------------------------------------------------------------------------


	public function novo(){
		$dados=[

			'cooperativas'=> $this->Cooperativa_model->listar(),
			'entidadesExecutoras' => $this->Entidade_model->listar()

		];
		$this->load->view('Projetopnae', $dados);

	}

//----------------------------------------------------------------------------------

	public function remover($id){

		$projeto = $this->Projetopnae_model->getById($id);

		if($projeto->status == 'ativo'){

			$this->Itens_model->removerProjeto($id);
			$this->Projetopnae_model->remover($id);
			redirect('projetopnae');

		}else{

			$data['formerror'] = 'Esse projeto não pode ser excluido porque já foi concluído';
			$data['projetos'] = $this->Projetopnae_model->listar();
			$this->load->view('ProjetosLista', $data);
		}

	}

//----------------------------------------------------------------------------------

	public function alterar($idProjeto){
		
		$projeto = $this->Projetopnae_model->getById($idProjeto);
		$itens   = $this->Itens_model->getByProjeto($idProjeto);

		if (!$projeto) {
			show_404();
		}

		$data = [
			'projeto' => $projeto,
			'itens'   => $itens,
		];

		$this->load->library('form_validation');

		$this->form_validation->set_rules('status',            'Status',               'trim|required');
		$this->form_validation->set_rules('homologacaoCodigo', 'Contrato',   'trim');
		$this->form_validation->set_rules('dataEncerramento',  'Data de Encerramento', 'trim|required');

		if ( !$this->form_validation->run() ) {
			$data['formerror'] = validation_errors();

			exit($this->load->view('ProjetoPnaeInfo', $data, TRUE));
		}
		if($this->input->post('dataEncerramento')){

			$dados['dataEncerramento'] = $this->input->post('dataEncerramento');
			$this->Projetopnae_model->alterar($idProjeto, $dados);
		}

		if ( $this->input->post('homologacaoCodigo') && $this->input->post('status') == 'ativo' && $projeto->status == 'ativo' ) {
			$data['formerror'] = 'Com numero de Contrato é necessário marcar projeto como "Concluído".';

			exit($this->load->view('ProjetoPnaeInfo', $data, TRUE));
		}


		if ( $this->input->post('status') == 'inativo' && $projeto->status == 'ativo' ) {

			if ( !$this->input->post('homologacaoCodigo') ) {
				$data['formerror'] = 'Faltou o numero do Contrato.';

				exit($this->load->view('ProjetoPnaeInfo', $data, TRUE));
			}

			if ( $this->Itens_model->existeItensSemAgricultor($idProjeto) ) {
				$data['formerror'] = 'Exitem produtos sem agricultor.';

				exit($this->load->view('ProjetoPnaeInfo', $data, TRUE));
			}

			if ( !$this->Itens_model->incrementaGasto($itens) ) {
				$data['formerror'] = 'Não foi possivel incrementar o gastos, chame o suporte.';

				exit($this->load->view('ProjetoPnaeInfo', $data, TRUE));
			}
			

			$dados['status']            = $this->input->post('status');
			$dados['homologacaoCodigo'] = $this->input->post('homologacaoCodigo');

			if ( !$this->Projetopnae_model->alterar($idProjeto, $dados) ) {
				$data['formerror'] = 'Não foi possivel alterar o Projeto, chame o suporte.';

				exit($this->load->view('ProjetoPnaeInfo', $data, TRUE));
			}

		} else
		if ($this->input->post('status') == 'ativo' && $projeto->status == 'inativo') {

			$this->Itens_model->decrementaGasto($itens);

			$dados['status']            = $this->input->post('status');
			$dados['homologacaoCodigo'] = NULL;

			$this->Projetopnae_model->alterar($idProjeto,$dados);
		}

		redirect('projetopnae');
	}


//----------------------------------------------------------------------------------

	public function cadastrar(){

		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('nomeEdital', 		'Nome Edital',         'trim|required');
		$this->form_validation->set_rules('arquivoEdital', 		'Arquivo Edital',         'trim');
		$this->form_validation->set_rules('cooperativa',    	 'Cooperativa',           'trim|required|is_natural');
		$this->form_validation->set_rules('caracteristicasCoop',  		  'caracteristicasCoop',   		'trim');
		$this->form_validation->set_rules('entidadeExecutora',     'Entidade Executora',      'trim|required|is_natural');
		$this->form_validation->set_rules('dataEncerramento',     'Data Encerramento',      'trim|required');


		$dados = ['formerror' => ''];
		if($this->form_validation->run()== FALSE){
			$dados['formerror'] .= validation_errors();
			$dados['cooperativas'] = $this->Cooperativa_model->listar();
			$dados['entidadesExecutoras'] = $this->Entidade_model->listar();
		}else{


			$pathToSave = $_SERVER["DOCUMENT_ROOT"] . "/application/arquivoEdital/";

			/*Checa se a pasta existe - caso negativo ele cria*/
			if(!file_exists($pathToSave))
			{
				mkdir($pathToSave);
			}

			if( $_FILES ){

				if( $_FILES['arquivoEdital'] ) 
				{ 

					$dir = $pathToSave; 
					$tmpName = $_FILES['arquivoEdital']['tmp_name'];
					$name = $_FILES['arquivoEdital']['name'];
					$pdf_path = "/application/arquivoEdital/".$_FILES['arquivoEdital']['name'];

					preg_match_all('/\.[a-zA-Z0-9]+/', $name , $extensao);
					if(!in_array(strtolower(current(end($extensao))), array('.txt','.pdf', '.doc', '.xls','.xlms')))
					{
						$dados['formerror'] = 'Permitido apenas arquivos doc,xls,pdf e txt.';
					}else{
						$name = $_FILES['arquivoEdital']['name'].date('Y-m-d H.i.s').'.pdf';
						move_uploaded_file( $tmpName, $dir . $name );   
					}          

				}

			}
			$cooperativa = $this->Cooperativa_model->getById(set_value('cooperativa'));

			if(!$cooperativa){
				$dados['formerror'] .= '<p>Esta cooperativa nÃ£o existe</p>';

			}
			$entidadeExecutora = $this->Entidade_model->getById(set_value('entidadeExecutora'));
			if(!$entidadeExecutora){
				$dados['formerror'] .= '<p>Esta entidadeExecutora nÃ£o existe</p>';
			}

			if(empty($dados['formerror']) ){
				$id = $this->Projetopnae_model->cadastrar($cooperativa, $entidadeExecutora,$pdf_path);
				if($id){
					redirect('projetopnae/'.$id.'/itens');
				}
				$dados['formerror'] .= '<p>NÃ£o foi possivel cadastrar este projeto!</p>';
			}
		}

		$this->load->view('Projetopnae', $dados);
	}
}
