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
  <link rel="shortcut icon" href="assets/planta1.ico" >
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
            <input type="tel" id="cpf" name="cpf" class="form-control" placeholder="CPF 000.000.000-00" onKeyPress="return Apenas_Numeros(event);" onBlur="validaCPF(this);" required>

          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
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
</body>

</html>

<!-- <style type="text/css">


</style> -->
<script language=javascript>
  <!--
    function fone(obj,prox) {
      switch (obj.value.length) {
        case 1:
        obj.value = "(" + obj.value;
        break;
        case 3:
        obj.value = obj.value + ")";
        break;  
        case 8:
        obj.value = obj.value + "-";
        break;  
        case 13:
        prox.focus();
        break;
      }
    }
    function formata_data(obj,prox) {
      switch (obj.value.length) {
        case 2:
        obj.value = obj.value + "/";
        break;
        case 5:
        obj.value = obj.value + "/";
        break;
        case 9:
        prox.focus();
        break;
      }
    }
    function Apenas_Numeros(caracter)
    {
      var nTecla = 0;
      if (document.all) {
        nTecla = caracter.keyCode;
      } else {
        nTecla = caracter.which;
      }
      if ((nTecla> 47 && nTecla <58)
        || nTecla == 8 || nTecla == 127
  || nTecla == 0 || nTecla == 9  // 0 == Tab
  || nTecla == 13) { // 13 == Enter
        return true;
    } else {
      return false;
    }
  }
  function validaCPF(cpf) 
  {
    erro = new String;

    if (cpf.value.length == 11)
    { 
      cpf.value = cpf.value.replace('.', '');
      cpf.value = cpf.value.replace('.', '');
      cpf.value = cpf.value.replace('-', '');

      var nonNumbers = /\D/;

      if (nonNumbers.test(cpf.value)) 
      {
        erro = "A verificacao de CPF suporta apenas números!"; 
      }
      else
      {
        if (cpf.value == "00000000000" || 
          cpf.value == "11111111111" || 
          cpf.value == "22222222222" || 
          cpf.value == "33333333333" || 
          cpf.value == "44444444444" || 
          cpf.value == "55555555555" || 
          cpf.value == "66666666666" || 
          cpf.value == "77777777777" || 
          cpf.value == "88888888888" || 
          cpf.value == "99999999999") {

          erro = "Número de CPF inválido!"
      }

      var a = [];
      var b = new Number;
      var c = 11;

      for (i=0; i<11; i++){
        a[i] = cpf.value.charAt(i);
        if (i < 9) b += (a[i] * --c);
      }

      if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
        b = 0;
      c = 11;

      for (y=0; y<10; y++) b += (a[y] * c--); 

        if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

      if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {
        erro = "Número de CPF inválido.";

      }
    }
  }
  else
  {
    if(cpf.value.length == 0)
      return false
    else
      erro = "Número de CPF inválido.";
  }
  if (erro.length > 0) {
    alert(erro).click(erro);
    cpf.focus();
    return false;
  }   
  return true;  
}

 //envento onkeyup
 function maskCPF(CPF) {
  var evt = window.event;
  kcode=evt.keyCode;
  if (kcode == 8) return;
  if (CPF.value.length == 3) { CPF.value = CPF.value + '.'; }
  if (CPF.value.length == 7) { CPF.value = CPF.value + '.'; }
  if (CPF.value.length == 11) { CPF.value = CPF.value + '-'; }
 }
 
 // evento onBlur
 function formataCPF(CPF)
 {
  with (CPF)
  {
    value = value.substr(0, 3) + '.' + 
    value.substr(3, 3) + '.' + 
    value.substr(6, 3) + '-' +
    value.substr(9, 2);
  }
 }
 function retiraFormatacao(CPF)
 {
  with (CPF)
  {
    value = value.replace (".","");
    value = value.replace (".","");
    value = value.replace ("-","");
    value = value.replace ("/","");
  }
 }
//-->
</script>
<script type="text/javascript">
  setTimeout(function(){
    $('button.close').click()
  },5000);
</script>
