<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>SYSCOOP</title>
  <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF*" onKeyPress="return Apenas_Numeros(event);" onBlur="validaCPF(this);" required>

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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="assets/cpf.js" type="text/javascript"></script>
<script src="assets/endereco.js" type="text/javascript"></script>
<script src="assets/hasValidate.js" type="text/javascript"></script>
<script type="text/javascript">
  setTimeout(function(){
    $('button.close').click()
  },5000);
</script>

</body>

</html>


