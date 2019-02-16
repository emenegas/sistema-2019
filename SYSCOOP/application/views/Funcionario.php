<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php';
?>

<body>

<div class="container-fluid">
		<form class="needs-validation" action="<?php echo site_url('funcionario/cadastrar')?>" method="post"  novalidate>
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label form="nome">Nome</label>
					<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome completo do funcionário" value="<?php echo set_value('nome')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o nome completo do Funcionário!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="cpf">CPF</label>
					<input type="tel" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="11" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite um CPF válido! Obs: Não é permitida a duplicidade desta informação!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="exemplo@email.com" value="<?php echo set_value('email')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite um Email válido, exemplo@email.com!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="telefone">Telefone</label>
					<input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo set_value('telefone')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite um numero de telefone com DDD!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label form="senha">Senha</label>
					<input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a senha para acesso!" value="<?php echo set_value('senha')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite a senha para posteriormente o funcionário poder acessar o sistema!
					</div>
				</div>
            
			
				<div class="col-md-4 mb-3">
					<label form="cep">CEP</label>
					<input type="text" name="cep" id="cep" class="form-control" placeholder="00000-000" value="<?php echo set_value('cep')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite um CEP com 8 digitos!
					</div>
				</div>

				<div class="col-md-4 mb-3">
					<label form="uf">Estado</label>
					<input type="text" name="uf" id="uf" class="form-control" value="<?php echo set_value('uf')?>" required>
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
					<label form="bairro">Bairro</label>
					<input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo set_value('bairro')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>

				<div class="col-md-4 mb-3">
					<label form="endereco">Endereço</label>
					<input type="text" name="endereco" id="endereco" class="form-control" placeholder="Rua exemplo" value="<?php echo set_value('endereco')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
               <div class="col-md-3 mb-3">
					<label form="numero">Numero</label>
					<input type="text" name="numero" id="numero" class="form-control" placeholder="Ex. 0000" value="<?php echo set_value('numero')?>" >
				     <div class="invalid-feedback">
						Se não houver numero deixe o campo em branco.
					</div>
                </div>
            </div>
			
				<div class="button" style="margin-top: 30px;float: right;">
					<button type="submit" class="btn btn-outline-info">Cadastrar</button>
					<a href="<?php echo site_url('funcionario') ?>" class="btn btn-outline-danger">Cancelar</a>

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
	
<script type="text/javascript">
	setTimeout(function(){
		$('button.close').click()
	},2000);
</script>

<script src="assets/cpf.js" type="text/javascript"></script>
<script src="assets/endereco.js" type="text/javascript"></script>
<script src="assets/hasValidate.js" type="text/javascript"></script>

</body>







