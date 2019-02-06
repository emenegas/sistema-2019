<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php';
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
					<input list="responsavel" name="responsavel" class="form-control" >
					<datalist id="responsavel" >
						<?php foreach ($funcionarios as $funcionario): ?>	
							<option value="<?php echo $funcionario->id ?>"><?php echo $funcionario->nome ?></option>
						<?php endforeach ?>
					</datalist>
					<div class="invalid-feedback">
						Campo obrigatório! Não se esqueça de selecionar o responsável posteriormente!
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
					<input list="cooperativa" name="cooperativa" class="form-control">
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
	
	<script src="assets/cnpj.js" type="text/javascript"></script>
	<script src="assets/endereco.js" type="text/javascript"></script>
    <script src="assets/hasValidate.js" type="text/javascript"></script>
</body>


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

