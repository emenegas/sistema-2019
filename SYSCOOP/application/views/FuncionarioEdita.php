<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>
<body>
	<div class="container-fluid">
		<form action="<?php echo site_url('funcionario/' .$funcionario->id. '/alterar')?>" method="post" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label >CPF</label>
					<input class="form-control" disabled="on" type="cpf" name="cpf" value="<?php echo $funcionario->cpf?>">
				</div>
				<div class="col-md-4 mb-3"> 
					<label form="nome">Nome</label>
					<input type="text" name="nome" id="nome" class="form-control" value="<?php echo $funcionario->nome; ?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label form="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" value="<?php echo $funcionario->email; ?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label form="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $funcionario->telefone; ?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cep">CEP</label>
					<input type="text" name="cep" id="cep" class="form-control" value="<?php echo $funcionario->cep; ?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label form="uf">UF</label>
					<input type="text" name="uf" id="uf" class="form-control" value="<?php echo $funcionario->uf; ?>" required>
				</div>


				<div class="col-md-4 mb-3">
					<label form="cidade">Cidade</label>
					<input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $funcionario->cidade; ?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label form="endereco">Endereço</label>
					<input type="text" name="endereco" id="endereco" class="form-control" value="<?php echo $funcionario->endereco; ?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label form="senha">Senha</label>
					<input type="text" name="senha" id="senha" class="form-control" value="">
				</div>
				<div class="col-md-8 mb-3">
					<label for="cooperativa">Cooperativa:</label>
					<select name="cooperativa" class="form-control" required>
						<option  value="<?php echo $funcionario->cooperativa; ?>">Atual</option>
						<?php foreach ($cooperativas as $cooperativa)
						{
							echo'<option value="' . $cooperativa->id . '">' . $cooperativa->nomeFantasia . '</option>';
						}?>
					</select>
				</div>
				<div class="col-md-4 mb-3">
					<label for="status">Status</label>
					<select name="status" class="form-control">
						<option <?php echo $funcionario->status == 'ativo'?'selected':''; ?> value="ativo">Ativo</option>				
						<option <?php echo $funcionario->status == 'inativo'?'selected':''; ?> value="inativo">Inativo</option>				
					</select>
				</div>
				<div class="button" style="margin-top: 30px;float: right;">
					<input type="submit" name="alterar" value="Continuar" class="btn btn-outline-info"/>
					<a href="<?php echo site_url('funcionario') ?>" class="btn btn-outline-danger">Cancelar</a>
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
	},2000);
</script>
