<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>
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
		alert(erro);
		cpf.value = '';
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

<body>
		

	<div class="container-fluid">
		<form class="needs-validation" action="<?php echo site_url('entidade/cadastrar')?>" method="post"  novalidate>
			<div class="form-row">


				<div class="col-md-4 mb-3">
					<label form="cnpj">CNPJ</label>
					<input type="text" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" class="form-control" onblur="if(!validarCNPJ(this.value)){alert('CNPJ Informado é inválido');this.value = ''}" maxlength="18" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">

					<label form="nomeFantasia">Nome Fantasia</label>
					<input type="text" name="nomeFantasia" id="nomeFantasia" class="form-control" autocomplete="off" value="<?php echo set_value('nomeFantasia')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="representante">Representante</label>
					<input type="text" name="representante" id="representante" class="form-control" value="<?php echo set_value('representante')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>

				<div class="col-md-4 mb-3">
					<label form="cpfRepresentante">CPF Representante</label>
					<input type="text" class="form-control" name="cpfRepresentante" id="cpfRepresentante" placeholder="000.000.000-00" onKeyPress="return Apenas_Numeros(event);" onBlur="validaCPF(this);" maxlength="11">
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo set_value('telefone')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cep">CEP</label>
					<input type="text" name="cep" id="cep" class="form-control" value="<?php echo set_value('cep')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cidade">Cidade</label>
					<input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo set_value('cidade')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="uf">UF</label>
					<input type="text" name="uf" id="uf" class="form-control" value="<?php echo set_value('uf')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="endereco">Endereço</label>
					<input type="text" name="endereco" id="endereco" class="form-control" value="<?php echo set_value('endereco')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>

				<div class="button" style="margin-top: 30px;float: right;">
					<button type="submit" class="btn btn-outline-info">Cadastrar</button>
					<a href="<?php echo site_url('entidade') ?>" class="btn btn-outline-danger">Cancelar</a>
				</div>
			</div>
		</form> 
	</div>
	<?php if(isset($formerror)): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Aviso!</strong>
				<div><?php echo $formerror ?></div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span> 
				</button>
			</div>
		<?php endif; ?>
</body>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
	'use strict';
	window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    	form.addEventListener('submit', function(event) {
    		if (form.checkValidity() === false) {
    			event.preventDefault();
    			event.stopPropagation();
    		}
    		form.classList.add('was-validated');
    	}, false);
    });
}, false);
})();
</script>

<script type="text/javascript">
	setTimeout(function(){
		$('button.close').click()
	},5000);
</script>
<script type="text/javascript">
	function validarCNPJ(cnpj) {

		cnpj = cnpj.replace(/[^\d]+/g,'');

		if(cnpj == '') return false;

		if (cnpj.length != 14)
			return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
    	cnpj == "11111111111111" || 
    	cnpj == "22222222222222" || 
    	cnpj == "33333333333333" || 
    	cnpj == "44444444444444" || 
    	cnpj == "55555555555555" || 
    	cnpj == "66666666666666" || 
    	cnpj == "77777777777777" || 
    	cnpj == "88888888888888" || 
    	cnpj == "99999999999999")
    	return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
    	soma += numeros.charAt(tamanho - i) * pos--;
    	if (pos < 2)
    		pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
    	return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
    	soma += numeros.charAt(tamanho - i) * pos--;
    	if (pos < 2)
    		pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
    	return false;

    return true;
    
}
</script>