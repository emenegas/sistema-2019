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
					<input type="text" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" onKeyPress="return Apenas_Numeros(event);" onBlur="validaCPF(this);" maxlength="11">
					<div class="invalid-feedback">
						Campo obrigatório! Digite o numero do seu CPF sem pontos e traços.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" name="telefone" id="telefone" placeholder="(00)000000000" value="<?php echo set_value('telefone')?>" required>
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
					<label for="cep">CEP</label>
					<input type="text" class="form-control" name="cep" id="cep" placeholder="00000-000" value="<?php echo set_value('cep')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite o CEP da sua residência com 8 digitos!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="uf">UF</label>
					<input type="text" class="form-control" name="uf" id="uf" placeholder="Estado" value="<?php echo set_value('uf')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite aqui o Estado!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="cidade">Cidade</label>
					<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="<?php echo set_value('cidade')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Digite a sua cidade de moradia!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="endereco">Endereço</label>
					<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua - 000, centro" value="<?php echo set_value('endereco')?>" required>
					<div class="invalid-feedback">
						Campo obrigatório! Exemplo: Rua exemplo-142, centro!
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
			<!-- --------------------------------------------------- -->
			
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
<!--

<script type="text/javascript">
	setTimeout(function(){
		$('button.close').click()
	},5000);
</script>
-->
