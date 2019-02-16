<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php'; 
?>

<body>
<div class="container-fluid">
		<form class="needs-validation" action="<?php echo site_url('agricultor/cadastrar')?>" method="post"  novalidate>
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="<?php echo set_value('nome')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o seu nome completo.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="cpf">CPF</label>
					<input type="tel" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="11" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o numero do seu CPF sem pontos e traços.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo set_value('telefone')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o seu telefone com DDD.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="email@exemplo.com" value="<?php echo set_value('email')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o seu Email, exemplo: exemplo@email.com!
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
				
				<div class="col-md-2 mb-3">
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
               <div class="col-md-2 mb-3">
					<label form="numero">Numero</label>
					<input type="text" name="numero" id="numero" class="form-control" placeholder="Ex. 0000" value="<?php echo set_value('numero')?>" >
				     <div class="invalid-feedback">
						Se não houver numero deixe o campo em branco.
					</div>
                </div>
				<div class="col-md-4 mb-3">
					<label for="dapNumero">Numero da DAP</label>
					<input type="text" class="form-control" name="dapNumero" id="dapNumero" placeholder="Numero" value="<?php echo set_value('dapNumero')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite a Declaração de Aptidão ao Pronaf!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="dapValidade">Validade da DAP</label>
					<input type="date" class="form-control" name="dapValidade" id="dapValidade" required>
				</div>
				<div class="col-md-8 mb-3">
					<label for="cooperativa">Cooperativa</label>
					<select name="cooperativa" class="custom-select custom-select mb-3">
						<option value=""></option>
						<?php foreach ($cooperativas as $cooperativa)
						{
							echo'<option value="' . $cooperativa->id . '">' . $cooperativa->nomeFantasia . '</option>';
						}?>
					</select>
				</div>

				<div class="form-check form-check-inline">
					<label for="produtos">Produtos:  </label>
					<?php foreach ($produtos as $produto)
					{
						echo '<input type="checkbox" class="form-check-input" name="produtos[]" value="' .$produto->id.'">' .$produto->nome;
					}?>

				</div>
				<div>
				 
                </div>
			</div>
			<div class="button" style="margin-top: 30px;float: right;">
				<button type="submit" data-toggle="tooltip" title="Clique para finalizar o Cadastro!" class="btn btn-outline-success">Cadastrar</button>
				<a href="<?php echo site_url('agricultor') ?>" class="btn btn-outline-danger">Cancelar</a>
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

<script src="assets/cpf.js" type="text/javascript"></script>
<script src="assets/endereco.js" type="text/javascript"></script>
<script src="assets/hasValidate.js" type="text/javascript"></script>

</body>


<script type="text/javascript">
    var input = document.getElementById('dapValidade');
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
