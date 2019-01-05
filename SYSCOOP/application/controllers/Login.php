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
                    'cpf' => $this->input->post('cpf'),
                );
                $this->session->set_userdata($data);

                redirect('projetopnae');
            }
        }
    }
    public function sair(){
        $this->session->sess_destroy(); //destroi a sessao
        redirect('/login'); // redireciona para a raiz do sistema(pagina de login)
    }
}