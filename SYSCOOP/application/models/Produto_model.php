<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model {

	
	public function cadastrar()
	{
		try{

			$data = [];
			$data['nome'] = $this->input->post('nome');
			$data['unidadeMedida'] = $this->input->post('unidadeMedida');
			$data['tipo'] = $this->input->post('tipo');
			$data['epoca'] = $this->input->post('epoca');

			return $this->db->insert('produtos',$data);

		}catch(Exception $e){
			return false;
		}
	}

	//----------------------------------------------------------------------------------

	public function listar(){

		try{

			return $this->db->get('produtos')->result();

		}catch(Exception $e){
			return false;
		}
	}

	//----------------------------------------------------------------------------------

	public function getById($id){

		try{

			$produto = $this->db
			->where('id', $id)
			->get('produtos')
			->result();

			return reset($produto);

		}catch(Exception $e){
			return false;
		}
	}

	//-----------------ALTERAR-----------------------------------------------------------------

	public function alterar($id,$data) {

		try{

			$this->db->where('id', $id);
			$this->db->set($data);
			return $this->db->update('produtos');

		}catch(Exception $e){
			return false;
		}
	}

	//----------------------------------------------------------------------------------

	public function remover($id){

		try{

			$this->db
			->where('id', $idProduto)
			->delete('produtos');

		}catch(Exception $e){
			return false;
		}
	}
}
