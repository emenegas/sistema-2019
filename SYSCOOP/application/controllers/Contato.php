<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends My_Controller {

  public function __construct() {
    parent:: __construct();
    $this->load->helper('Form');
    $this->load->helper('url');
    $this->load->library('curl');
  }

  public function index() {
    $data['action'] = site_url('Contato/enviaEmail');
    $this->load->view('Contato', $data);
  }

  public function enviaEmail() {

    $this->load->library(array('form_validation','email'));
    $this->form_validation->set_rules('email','email',    'trim|min_length[7]|valid_email');
    $this->form_validation->set_rules('nome','Nome Completo',  'trim');
    $this->form_validation->set_rules('telefone','Telefone',  'trim');
    $this->form_validation->set_rules('assunto','Assunto',  'trim');
    $this->form_validation->set_rules('mensagem','Mensagem',  'trim');

    if($this->form_validation->run()== FALSE){

      $dados['formerror'] = validation_errors();
      $dados['action'] = site_url('Contato/enviaEmail');

      exit($this->load->view('Contato', $dados, TRUE));

    }else{

      $email = $this->input->post('email', TRUE);
      $nome = $this->input->post('nome', TRUE);
      $telefone = $this->input->post('telefone', TRUE);
      $mensagem = $this->input->post('mensagem', TRUE);
      $assunto = $this->input->post('assunto', TRUE);

      $this->email->from($email, $nome);
      $this->email->to('ezequiel.menegas.vip2@gmail.com');

      $this->email->subject($assunto);
      $this->email->message('<html><head></head><body>
        Nome:       ' . $nome . ' <br />
        E-mail:     ' . $email . ' <br />
        Telefone:   ' . $telefone . ' <br />
        Assunto:    ' . $assunto . ' <br />
        Mensagem:   ' . $mensagem . ' <br />
        </body></html>');
      $em = $this->email->send();

      if (!$em) {
        $dados['formerror'] = 'Erro ao enviar o email. Favor enviar um e-mail para nucleofae@gmail.com';
        $this->load->view('Contato',$dados);
      }else{
        $dados['formInfo'] =  'Mensagem enviada com sucesso!';
    }
    $dados['action'] = site_url('Contato/enviaEmail');
    $this->load->view('Contato',$dados);
      }
  }
}