<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itens_model extends CI_Model {


	public function cadastrar($idProjeto)
	{
		try{

			$this->load->model('Produto_model');
			$this->load->model('Agricultor_model');
			$this->load->model('Projetopnae_model');


			$produto = $this->Produto_model->getById($this->input->post('produto'));
			$agricultor = $this->Agricultor_model->getById($this->input->post('agricultor'));
			$projeto = $this->Projetopnae_model->getById($idProjeto);


			$data = [];
			$data['projeto']             = $idProjeto;
			$data['produto']             = $produto->id;
			$data['nomeProduto']        = $produto->nome;
			$data['unidadeMedida']      = $produto->unidadeMedida;
			$data['agricultor']      	 = $agricultor? $agricultor->id : NULL;
			$data['nomeAgricultor']     = $agricultor? $agricultor->nome : NULL;
			$data['cpf']				=$agricultor? $agricultor->cpf : NULL;
			$data['dapAgricultor']       = $agricultor? $agricultor->dapNumero : NULL;
			$data['quantidade'] 		= $this->input->post('quantidade');
			$data['cronogramaEntregaProd'] 		= $this->input->post('cronogramaEntregaProd');
			$data['descricaoProd'] 		= $this->input->post('descricaoProd');
			$data['precoUnidade'] 		= str_replace(',','.',$this->input->post('precoUnidade'));
			$data['totalItem']			= $data['precoUnidade'] * $data['quantidade'];
			$data['data'] 				= date('Y-m-d H:i:s');
			$total['totalProjeto1']	= $projeto->totalProjeto;
			$total2['totalProjeto'] = $total['totalProjeto1'] + $data['totalItem'];


			$this->db->insert('itens_do_projeto',$data);
			$this->db
			->where('id', $idProjeto)
			->update('projetos', $total2);

			return $this->db->insert_id();

		}catch(Exception $e){
			return false;
		}
	}

	//----------------------------------------------------------------------------------

	public function getByProjeto($id)
	{
		try{

			$itens = $this->db
			->where('projeto', $id)
			->get('itens_do_projeto')
			->result();

			return ($itens);

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function listar(){

		try{

			return $this->db->get('itens_do_projeto')->result();

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function remover($idProjeto){

		try{

			$this->db
			->where('projeto', $idProjeto)
			->where('id', $this->input->post('itemDoProjeto'))
			->delete('itens_do_projeto');

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function removerProjeto($id){

		try{

			$this->db
			->where('projeto', $id)
			->delete('itens_do_projeto');

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function alterar($idProjeto){

		try{

			$this->db
			->where('projeto', $idProjeto)
			->where('id', $this->input->post('itemDoProjeto'))
			->update('itens_do_projeto');
		
		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function incrementaGasto($itens){

		try{

			foreach ($itens as $item) {
				$this->db
				->where('id', $item->agricultor)
				->set('dapLimite', 'dapLimite + ' . $item->totalItem, FALSE)
				->update('agricultores');
			}
			return TRUE;
			
		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function decrementaGasto($itens){

		try{

			foreach ($itens as $item) {
				$this->db
				->where('id', $item->agricultor)
				->set('dapLimite', 'dapLimite - ' . $item->totalItem, FALSE)
				->update('agricultores');
			}
			return TRUE;
		
		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function existeItensSemAgricultor($id){

		try{

			$itens = $this->db
			->where('projeto', $id)
			->where('agricultor',NULL)
			->get('itens_do_projeto')
			->result_array();

			return !empty($itens);
		
		}catch(Exception $e){
			return TRUE;
		}
	}
}
