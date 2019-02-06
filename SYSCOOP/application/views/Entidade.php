<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php';
?>
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
		
    <script src="assets/cnpj.js" type="text/javascript"></script>
    <script src="assets/cpf.js" type="text/javascript"></script>
    <script src="assets/endereco.js" type="text/javascript"></script>
    <script src="assets/hasValidate.js" type="text/javascript"></script>
</body>


<script type="text/javascript">
	setTimeout(function(){
		$('button.close').click()
	},5000);
</script>
