<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends MY_Controller {

	function __construct(){
		parent:: __construct();
        
	}

	//----------------------------------------------------------------------------------
    public function index()
    {
    
        if($this->session->cooperativa == NULL){
            $this->load->view('Administrador');
        }else{
            
            $data['formerror'] = 'Voce não tem permissão para acessar este diretório!';
			
			show_404();
        }
        
    }

}