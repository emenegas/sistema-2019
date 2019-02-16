<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agricultor_model extends CI_Model {

	
	public function inserir($acao)
	{	
		try{
            $data = [];
			$data['acao'] = $acao;
			$data['data'] = date('Y-m-d H:i:s');
			$data['funcionario'] = $this->session->cpf;
			
			$this->db->insert('Logs',$data);

        }catch(Exception $e){
			return false;
		}
    }
}