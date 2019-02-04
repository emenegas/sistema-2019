<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends MY_Controller {

	function __construct(){
		parent:: __construct();
    }
    
    //----------------------------------------------------------------------------------

    public function index(){
        $this->load->view('Backup.php');  
    }
    
    //----------------------------------------------------------------------------------

	public function salvar(){

		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('zip');
		$this->load->dbutil();

		$db_format = array(
		        'format'        => 'txt',                       // gzip, zip, txt
		        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
		        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
		    );
		$backup = $this->dbutil->backup($db_format);
		$dbname ='backup-'.date('Y-m-d H.i.s').'.sql';
		$save='application/backups/'.$dbname;
		write_file($save,$backup);
		
		redirect('projetopnae');
		
	}
    
    //----------------------------------------------------------------------------------
    
    public function restaurar(){
        
    }
 }