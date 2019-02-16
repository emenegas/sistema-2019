<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>SYSCOOP</title>
  <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/icone.png" >
  <link rel="stylesheet" type="text/css" href="assets/styleLogin.css">
</head>
<body>
  <?php if(isset($formerror)): ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Aviso!</strong>
    <div><?php echo $formerror ?></div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span> 
    </button>
  </div>
  <?php endif; ?>

<div class="container">

  <div class="d-flex justify-content-center h-100">

    <div class="card">

      <div class="card-header">
        <h3>SYSCOOP</h3>  
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url('login/entrar')?>" id="form_login">  
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="tel" id="cpf" name="cpf" class="form-control" placeholder="CPF*" required>

          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha*" required>
          </div>

          <div class="form-group">
            <input type="submit" value="Acessar" class="btn float-right login_btn">
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script src="assets/bootstrap/js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/cpf.js" type="text/javascript"></script>
<script src="assets/endereco.js" type="text/javascript"></script>
<script src="assets/hasValidate.js" type="text/javascript"></script>

</body>

</html>


