<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function index(){
        $this->load->view('Login_view');
    }
    function entrar() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() == FALSE) {
            $data['formerror'] = validation_errors();
            $this->load->view('Login_view', $data);
        } else {

            $this->load->model('Funcionario_model');
            $usuario = $this->Funcionario_model->login($this->form_validation->set_value('cpf'), $this->form_validation->set_value('senha'));
            if(!$usuario){
                $data['formerror'] = 'CPF ou Senha inválidos!';
                $this->load->view('Login_view', $data);
            }else{
                $data = array(
                    'cpf' => $usuario->cpf,
                    'cooperativa' => $usuario->cooperativa,
                    'nome' => $usuario->nome,
                    'id' => $usuario->id
                );
                $this->session->set_userdata($data);
                
                if(($this->session->cooperativa == NULL) || ($this->session->cpf == '03024875069'))
                {
                    redirect('administrador');
                
                }else{
                    $this->load->model('Cooperativa_model');
                    
                    $cooperativaCentral = $this->Cooperativa_model->getById($this->session->cooperativa);
                    
                    if($cooperativaCentral->cooperativa == NULL)
                    {
                        redirect('projetopnae');
                    }else{
                        redirect('projetopnae');
                    }    
                }
            }
        }
    }
    public function sair(){
        $this->session->sess_destroy(); //destroi a sessao
        redirect('/login'); // redireciona para a raiz do sistema(pagina de login)
    }
}