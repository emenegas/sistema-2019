<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>	
<body>
	
	

	<div class="container-fluid">
		<form action="<?php echo site_url('entidade/' .$entidade->id. '/alterar')?>" method="post" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-md-2 mb-3">
					<label>CNPJ</label>
					<input class="form-control" disabled="on" value="<?php echo $entidade->cnpj?>">
				</div>
				<div class="col-md-6 mb-3">
					<label form="nomeFantasia">Nome Fantasia</label>
					<input type="text" name="nomeFantasia" id="nomeFantasia" class="form-control" autocomplete="off" value="<?php echo $entidade->nomeFantasia; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" autocomplete="off" value="<?php echo $entidade->email; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" autocomplete="off" value="<?php echo $entidade->telefone; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="representante">representante</label>
					<input type="text" name="representante" id="representante" class="form-control" autocomplete="off" value="<?php echo $entidade->representante; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cpfRepresentante">CPF representante</label>
					<input type="text" name="cpfRepresentante" id="cpfRepresentante" class="form-control" autocomplete="off" value="<?php echo $entidade->cpfRepresentante; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cep">CEP</label>
					<input type="text" name="cep" id="cep" class="form-control" autocomplete="off" value="<?php echo $entidade->cep; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="uf">Uf</label>
					<input type="text" name="uf" id="uf" class="form-control" autocomplete="off" value="<?php echo $entidade->uf; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cidade">Cidade</label>
					<input type="text" name="cidade" id="cidade" class="form-control" autocomplete="off" value="<?php echo $entidade->cidade; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="endereco">Endereço</label>
					<input type="text" name="endereco" id="endereco" class="form-control" autocomplete="off" value="<?php echo $entidade->endereco; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="status">Status:</label>
					<select name="status" class="form-control">
						<option <?php echo $entidade->status == 'ativo'?'selected':''; ?> value="ativo">Ativo</option>			
						<option <?php echo $entidade->status == 'inativo'?'selected':''; ?> value="inativo">Inativo</option>				
					</select>
				</div>
				<div class="button" style="margin-top: 30px;float: right;">
					<input type="submit" name="alterar" value="Confirmar" class="btn btn-outline-info" />
					<a  href="<?php echo site_url('entidade') ?>" class="btn btn-outline-danger">Cancelar</a>
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
