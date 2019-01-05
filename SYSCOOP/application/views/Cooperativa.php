<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('Menu');
?>


<body>
	<div class="container-fluid">
		<form class="needs-validation" action="<?php echo site_url('cooperativa/cadastrar')?>" method="post" novalidate>
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label form="cnpj">CNPJ</label>
					<input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="00.000.000/0000-00" onkeyup="FormataCnpj(this,event)" onblur="if(!validarCNPJ(this.value)){alert('CNPJ Informado é inválido')}" maxlength="18"  required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite um CNPJ válido. Obs: Não é permitido duplicidade de CNPJ!
					</div>
				</div>
				<div class="col-md-8 mb-3">
					<label form="nomeFantasia">Nome Fantasia</label>
					<input type="text" name="nomeFantasia" id="nomeFantasia" placeholder="Digite o nome fantasia completo" class="form-control" value="<?php echo set_value('nomeFantasia')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o Nome Fantasia da Cooperativa.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="responsavel">Responável Legal:</label>
					<input list="responsavel" name="responsavel" class="form-control" required>
					<datalist id="responsavel" >
						<?php foreach ($funcionarios as $funcionario): ?>	
							<option value="<?php echo $funcionario->id ?>"><?php echo $funcionario->nome ?></option>
						<?php endforeach ?>
					</datalist>
					<div class="invalid-feedback">
						Campo obrigatório! Selecione o funcionário que é o Representante/Presidente da Cooperativa.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="email">Email</label>
					<input type="email" name="email" id="email" placeholder="exemplo@email.com" class="form-control" value="<?php echo set_value('email')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite um Email válido, exemplo@email.com!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" placeholder="(00) 000000000" class="form-control" value="<?php echo set_value('telefone')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite um telefone com DDD!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="cooperativa">Cooperativa</label>
					<input list="cooperativa" name="cooperativa" class="form-control" required>
					<datalist id="cooperativa" >
						<?php foreach ($cooperativas as $item): ?>
							<option value="<?php echo $item->id ?>"><?php echo $item->nomeFantasia ?></option>
						<?php endforeach ?>
					</datalist>
					<div class="invalid-feedback">
						Campo obrigatório! Associe a Cooperativa que esta cadastrando a uma Central!
					</div>
				</div>

				<div class="col-md-2 mb-3">
					<label for="banco">Banco:</label>
					<select name="banco" class="form-control">
						<option>Itau</option>
						<option>Bradesco</option>
						<option>Cresol</option>
						<option>Santander</option>
						<option>Banrisul</option>
						<option>Caixa Federal</option>
						<option>Sicredi</option>
					</select>

				</div>
				<div class="col-md-2 mb-3">
					<label form="agencia">Agência</label>
					<input type="text" name="agencia" id="agencia" class="form-control" value="<?php echo set_value('agencia')?>">

				</div>
				<div class="col-md-2 mb-3">
					<label form="numeroContaCorrente">Numero Conta Corrente</label>
					<input type="text" name="numeroContaCorrente" id="numeroContaCorrente" class="form-control" value="<?php echo set_value('numeroContaCorrente')?>">
				</div>
				<div class="col-md-2 mb-3">
					<label form="cep">CEP</label>
					<input type="text" name="cep" id="cep" class="form-control" placeholder="00000-000" value="<?php echo set_value('cep')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o CEP da Cooperativa com 8 digitos!
					</div>
				</div> 
				<div class="col-md-4 mb-3">
					<label form="uf">UF</label>
					<input type="text" name="uf" id="uf" class="form-control" placeholder="Estado" value="<?php echo set_value('uf')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cidade">Cidade</label>
					<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" value="<?php echo set_value('cidade')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="endereco">Endereço</label>
					<input type="text" name="endereco" id="endereco" class="form-control" placeholder="Rua exemplo - 554, Bairro" value="<?php echo set_value('endereco')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Exempo: Rua exemplo - 554, Bairro!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="dapNumero">DAP Jurídica</label>
					<input type="text" name="dapNumero" id="dapNumero" class="form-control" value="<?php echo set_value('dapNumero')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o numero da DAP Jurídica!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="dapValidade">Validade DAP</label>
					<input type="date" name="dapValidade" id="dapValidade" class="form-control" value="<?php date('Y-m-d') ?>">
				</div>

				<div class="button" style="margin-top: 30px;float: right;">
					<button type="submit" class="btn btn-outline-info">Cadastrar</button>
					<a style="width: 100px;" href="<?php echo site_url('cooperativa') ?>" class="btn btn-outline-danger">Cancelar</a>

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

<script type="text/javascript">var input = document.getElementById('dapValidade');
input.addEventListener('change', function() {
	var agora = new Date();
	var escolhida = new Date(this.value);
	if (escolhida < agora) {
		this.value = [agora.getFullYear(), agora.getMonth() + 1, agora.getDate()].map(v => v < 10 ? '0' + v : v).join('-');
		alert("Não é permitida data retroativa!");
	}
});
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