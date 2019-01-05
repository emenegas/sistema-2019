<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario_model extends CI_Model {

	
	public function cadastrar()
	{
		try{

			$data = [];
			$data['nome'] = $this->input->post('nome');
			$data['cpf'] = $this->input->post('cpf');
			$data['email'] = $this->input->post('email');
			$data['telefone'] = $this->input->post('telefone');
			$data['cep'] = $this->input->post('cep');
			$data['uf'] = $this->input->post('uf');
			$data['cidade'] = $this->input->post('cidade');
			$data['endereco'] = $this->input->post('endereco');
			$data['senha'] = password_hash($this->input->post('senha'),PASSWORD_DEFAULT);
			$data['cooperativa'] = $this->input->post('cooperativa')? $this->input->post('cooperativa') : NULL;

			return $this->db->insert('funcionarios',$data);

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------
	
	public function listar(){

		try{

			$status = $this->input->get('status') == 'inativo'? 'inativo': 'ativo';
			return $this->db
			->where('status',$status)
			->get('funcionarios')->result();

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------

	public function getById($id){

		try{

			$funcionario = $this->db
			->where('id', $id)
			->get('funcionarios')
			->result();

			return reset($funcionario);

		}catch(Exception $e){
			return FALSE;
		}
	}
	
	//-----------------ALTERAR-----------------------------------------------------------------

	public function alterar($id,$data) {

		try{

			if(isset($data['senha']) && !empty($data['senha'])){
				$data['senha'] = password_hash($data['senha'],PASSWORD_DEFAULT);
			}else{
				unset($data['senha']);
			}
			$this->db->where('id', $id);
			$this->db->set($data);
			return $this->db->update('funcionarios');

		}catch(Exception $e){
			return FALSE;
		}
	}
	
	//----------------------------------------------------------------------------------

	public function login($cpf, $senha) {

		try{

			$this->db->where('cpf', $cpf); 
			$this->db->where('status', 'ativo');

			$usuario = $this->db->get('funcionarios')->result();
			$usuario = reset($usuario);
			if(!$usuario){
				return FALSE;
			}
			if(!password_verify($senha, $usuario->senha)){
				return FALSE;
			}
			return $usuario;

		}catch(Exception $e){
			return FALSE;
		}
	}
}
