<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<title>SYSCOOP</title>
<base href="<?php echo base_url(); ?>">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/icone.png" >
<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
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
      <?php if($this->session->cooperativa == NULL){ ?>
      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('Cooperativa')?>">Cooperativas</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('Produto')?>">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="text-white nav-link" href="<?php echo site_url('funcionario')?>">Funcionários</a>
      </li>
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
    </ul>
    <ul class="nav justify-content-end">

  
     <li class="nav-item">
       <a class="text-white nav-link" ><?php echo $this->session->nome; ?></a>    
          
     </li>
     <li class="nav-item navbar-right">
           <a class="btn btn-danger navbar-btn" href="<?php echo site_url('login/sair')?>">Sair</a>       
     </li>
   </ul>
 </div>
</div>

</nav>
 
  <script src="assets/bootstrap/js/jquery.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>





