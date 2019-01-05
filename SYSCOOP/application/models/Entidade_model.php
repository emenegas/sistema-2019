<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entidade_model extends CI_Model {

	public function cadastrar()
	{
		try{

			$data = [];
			$data['nomeFantasia'] = $this->input->post('nomeFantasia');
			$data['email'] = $this->input->post('email');
			$data['cnpj'] = $this->input->post('cnpj');
			$data['telefone'] = $this->input->post('telefone');
			$data['representante'] = $this->input->post('representante');
			$data['cpfRepresentante'] = $this->input->post('cpfRepresentante');
			$data['cep'] = $this->input->post('cep');
			$data['uf'] = $this->input->post('uf');
			$data['cidade'] = $this->input->post('cidade');
			$data['endereco'] = $this->input->post('endereco');

			return $this->db->insert('entidadesexecutoras',$data);

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
			->get('entidadesexecutoras')->result();

		}catch(Exception $e){
			return FALSE;
		}
	}

	//----------------------------------------------------------------------------------
	
	public function getById($id){

		try{

			$entidade = $this->db
			->where('id', $id)
			->get('entidadesexecutoras')
			->result();

			return reset($entidade);

		}catch(Exception $e){
			return FALSE;
		}
	}

	//-----------------ALTERAR-----------------------------------------------------------------

	public function alterar($id,$data) {

		try{

			$this->db->where('id', $id);
			$this->db->set($data);
			return $this->db->update('entidadesexecutoras');

		}catch(Exception $e){
			return FALSE;
		}
	}
}
