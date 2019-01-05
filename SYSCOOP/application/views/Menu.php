<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
    <title>SYSCOOP</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="shortcut icon" href="assets/planta1.ico" >

  <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="text-white navbar-brand" href="<?php echo site_url('projetopnae')?>">Projetos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('agricultor')?>">Agricultores<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('entidade')?>">Entidades Executoras</a>
      </li>
      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('Cooperativa')?>">Cooperativas</a>
      </li>
      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('Produto')?>">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('funcionario')?>">Funcionários</a>
      </li>
    </ul>
    <ul class="nav justify-content-end">

      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Relatórios
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo site_url('relatorio/indexPorProd')?>">Agricultores por Produto</a>
          <a class="dropdown-item" href="<?php echo site_url('relatorio/indexPorCooperativa')?>">Agricultores por Cooperativa</a>
          <a class="dropdown-item" href="<?php echo site_url('relatorio/indexPorDap')?>">Agricultores por valor de DAP</a>
          <a class="dropdown-item" href="<?php echo site_url('relatorio/indexFuncPorCoop')?>">Funcionários por Cooperativa</a>
        </div>

      </li>


      <li class="nav-item">
       <a class="text-white nav-link" href="<?php echo site_url('contato')?>">Contato</a>       
     </li>
     <li class="nav-item">
       <a class="text-white nav-link" href="<?php echo site_url('funcionario/backup')?>" onclick="return confirm('Fazer Backup? Você sera redirecionando para Projetos...')">Backup</a>       
     </li>
     <li class="nav-item navbar-right">
       <a class="btn btn-danger navbar-btn" href="<?php echo site_url('login/sair')?>">Sair</a>       
     </li>
   </ul>
 </div>
</div>

</nav>




