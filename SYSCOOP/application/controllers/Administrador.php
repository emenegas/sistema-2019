<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends MY_Controller {

	function __construct(){
		parent:: __construct();
        
	}

	//----------------------------------------------------------------------------------
    public function index()
    {
        
        $name = $this->session->name;
        
        $this->load->view('Administrador', $name);
        
    }

}