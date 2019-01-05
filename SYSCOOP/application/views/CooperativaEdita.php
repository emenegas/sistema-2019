<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>
<body>


	<form action="<?php echo site_url('cooperativa/' .$cooperativa->id. '/alterar')?>" method="post" class="needs-validation" novalidate>
		<div class="container-fluid">
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="CNPJ" >CNPJ </label>
					<input type="text" name="CNPJ" disabled="on" class="form-control" value="<?php echo $cooperativa->cnpj?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-8 mb-3">
					<label form="nomeFantasia">Nome Fantasia</label>
					<input type="text" name="nomeFantasia" id="nomeFantasia" class="form-control" value="<?php echo $cooperativa->nomeFantasia; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="responsavel">Responável Legal</label>
					<input list="responsavel" name="responsavel" class="form-control" required>
					<datalist id="responsavel" >
						<?php foreach ($funcionarios as $item): ?>
							<option value="<?php echo $item->id; ?>"><?php echo $item->nome ?></option>
						<?php endforeach ?>
					</datalist>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" value="<?php echo $cooperativa->email; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $cooperativa->telefone; ?>">
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="cooperativa">Associar a Cooperativa</label>
					<input list="cooperativa" name="cooperativa" class="form-control">
					<datalist id="cooperativa" >
						<?php foreach ($cooperativas as $item): ?>
							<option value="<?php echo $item->id ?>"><?php echo $item->nomeFantasia ?></option>
						<?php endforeach ?>
					</datalist>
					
				</div>
				<div class="col-md-2 mb-3">
					<label for="banco">Banco</label><br/>
					<select name="banco" class="form-control">
						<option type="text" name="banco" value="<?php echo $cooperativa->banco; ?>"><?php echo $cooperativa->banco;?>(atual)</option>
						<option>Itau</option>
						<option>Bradesco</option>
						<option>Cresol</option>
						<option>Santander</option>
						<option>Banrisul</option>
						<option>Caixa Federal</option>
						<option>Banco do Brasil</option>
						<option>Sicredi</option>
					</select>
				</div>
				<div class="col-md-2 mb-3">
					<label form="agencia">Agência</label>
					<input type="text" name="agencia" id="agencia" class="form-control" value="<?php echo $cooperativa->agencia; ?>">
				</div>
				<div class="col-md-2 mb-3">
					<label form="numeroContaCorrente">Numero Conta Corrente</label>
					<input type="text" name="numeroContaCorrente" id="numeroContaCorrente" class="form-control" value="<?php echo $cooperativa->numeroContaCorrente; ?>">
				</div>
				<div class="col-md-2 mb-3">
					<label form="cep">CEP</label>
					<input type="text" name="cep" id="cep" class="form-control" value="<?php echo $cooperativa->cep; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="uf">UF</label>
					<input type="text" name="uf" id="uf" class="form-control" value="<?php echo $cooperativa->uf; ?>" required>
					<div class="invalid-feedback"> 
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cidade">Cidade</label>
					<input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $cooperativa->cidade; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="endereco">Endereço</label>
					<input type="text" name="endereco" id="endereco" class="form-control" value="<?php echo $cooperativa->endereco; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="dapNumero">DAP Jurídica</label>
					<input type="text" name="dapNumero" id="dapNumero" class="form-control" value="<?php echo $cooperativa->dapNumero; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="dapValidade">Validade DAP</label>
					<input type="date" name="dapValidade" id="dapValidade" class="form-control" value="<?php echo $cooperativa->dapValidade; ?>">
				</div>
				<div class="col-md-4 mb-3">
					<label form="status">Status</label>
					<select name="status" class="form-control">
						<option <?php echo $cooperativa->status == 'ativo'?'selected':''; ?> value="ativo">Ativo</option>				
						<option <?php echo $cooperativa->status == 'inativo'?'selected':''; ?> value="inativo">Inativo</option>				
					</select>
				</div>
			</div>

			<div class="button" style="margin-top: 30px;float: right;">
				<input type="submit" name="alterar" value="Confirmar" class="btn btn-outline-info"/>
				<a href="<?php echo site_url('Cooperativa') ?>" class="btn btn-outline-danger">Cancelar</a>
			</div>
		</div>
	</form>
	
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
