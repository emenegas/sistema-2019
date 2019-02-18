<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agricultor_model extends CI_Model {

	
	public function cadastrar($cooperativa)
	{	
		try{

			$data = [];
			$data['nome'] = $this->input->post('nome');
			$data['cpf'] = $this->input->post('cpf');
			$data['telefone'] = $this->input->post('telefone');
			$data['email'] = $this->input->post('email');
			$data['uf'] = $this->input->post('uf');
			$data['cep'] = $this->input->post('cep');
			$data['cidade'] = $this->input->post('cidade');
			$data['endereco'] = $this->input->post('endereco');
			$data['numero'] = $this->input->post('numero');
			$data['dapNumero'] = $this->input->post('dapNumero');
			$data['dapValidade'] = $this->input->post('dapValidade');

			$this->db->insert('agricultores',$data);
			$agricultorId = $this->db->insert_id();

			$this->load->model('Logs_model');
			$acao = 'Cadastro de um novo agricultor';
			$this->Logs_model->inserir($acao);

			if(!empty($this->input->post('produtos'))){

				foreach ($this->input->post('produtos') as $produtoId) {

					$data = [];
					$data['produto'] = $produtoId;
					$data['agricultor'] = $agricultorId;
					$this->db->insert('agricultores_has_produtos', $data);
				}	
			}		
			if(!empty($cooperativa)) {

				$data = [];
				$data['cooperativa'] = $cooperativa->id;
				$data['agricultor'] = $agricultorId;
				$this->db->insert('agricultores_has_cooperativas', $data);
			}	

		}catch(Exception $e){
			return false;
		}
	}

	//----------------------------------------------------------------------------------

	public function listar(){

		try{
			$status = $this->input->get('status') == 'inativo' ? 'inativo' : 'ativo';
	
			if ( !empty($this->session->cooperativa) )
			{
				$this->db
					->join('agricultores_has_cooperativas', 'id=agricultor')
					->where('cooperativa', $this->session->cooperativa);
			}
	
			return $this->db
				->where('status', $status)
				->get('agricultores')->result();
		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------


	public function getById($id){

		try{

			$agricultor = $this->db
			->where('id', $id)
			->get('agricultores')
			->result();

			return reset($agricultor);

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------
	
	public function getByProduto($id){

		try{

			$agricultor = $this->db
			->select('agricultores.id , agricultores.nome')
			->join('agricultores', 'agricultores.id = agricultores_has_produtos.agricultor')
			->where('produto', $id)
			->get('agricultores_has_produtos')
			->result();

			return ($agricultor);

		}catch(Exception $e){
			return FALSE;
		}
	}

	//-----------------ALTERAR-----------------------------------------------------------------

	public function alterar($id,$dados, $produtos, $cooperativa) {

		try{

			$this->db->where('id', $id);
			$this->db->set($dados);
			$this->db->update('agricultores');

			$this->db
			->where('agricultor', $id)
			->delete('agricultores_has_produtos');

			
			$this->db
			->where('agricultor', $id)
			->delete('agricultores_has_cooperativas');

			foreach((array)$produtos as $produtoId){

				$dados = [];
				$dados['produto'] = $produtoId;
				$dados['agricultor'] = $id;

				$this->db->set($dados);
				$this->db->replace('agricultores_has_produtos');
			}

			if(!empty($cooperativa)){
				
				$dados = [];
				$dados['cooperativa'] = $cooperativa ? $this->input->post('cooperativa') : NULL;
				$dados['agricultor'] = $id;

				$this->db->set($dados);
				$this->db->replace('agricultores_has_cooperativas');
			}

			$this->load->model('Logs_model');
			$acao = 'Alteração no Agricultor';
			$this->Logs_model->inserir($acao);

			return TRUE;		

		}catch(Exception $e){
			return false;
		}
	}
}
