<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php'; 
?>
<body>
<div class="container-fluid">
		<form action="<?php echo site_url('agricultor/' .$agricultor->id. '/alterar')?>" method="post" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="cpf">CPF</label>
					<input type="text" class="form-control" id="cpf" name="cpf" disabled="on" placeholder="000.000.000-00" value="<?php echo $agricultor->cpf?>" required>
				</div>
				<div class="col-md-4 mb-3">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" value="<?php echo $agricultor->nome; ?>" required>
					<div class="invalid-feedback">
						Campo Obrigatório!
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="email">Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupPrepend">@</span>
						</div>
						<input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com" aria-describedby="inputGroupPrepend"  value="<?php echo $agricultor->email; ?>" required>
						<div class="invalid-feedback">
							Digite um Email válido!
						</div>
					</div>
				</div>
			
				<div class="col-md-2 mb-3">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone" placeholder="00 000 000000" value="<?php echo $agricultor->telefone; ?>" required>
					<div class="invalid-feedback">
						Digite o numero do telefone!
					</div>
				</div>
				
				<div class="col-md-2 mb-3">
					<label for="status">Status</label>
					<select name="status" class="form-control">
						<option <?php echo $agricultor->status == 'ativo'?'selected':''; ?> value="ativo">Ativo</option>
						<option <?php echo $agricultor->status == 'inativo'?'selected':''; ?> value="inativo">Inativo</option>
					</select>
				</div>
			
			<div class="col-md-6 mb-3">
					<label for="dapNumero">Numero da DAP</label>
					<input type="text" class="form-control" id="dapNumero" name="dapNumero" value="<?php echo $agricultor->dapNumero; ?>" required>
					<div class="invalid-feedback">
						Digite uma DAP válida!
					</div>
				</div>
				<div class="col-md-2 mb-3">
					<label for="dapValidade">Validade da DAP</label>
					<input type="date" class="form-control" id="dapValidade" name="dapValidade" value="<?php echo $agricultor->dapValidade; ?>" required>
				</div>
				<?php if(count($cooperativas) > 1): ?>
                <div class="col-md-6 mb-3">
                    <label for="cooperativa">Cooperativa:</label>
                    <input list="cooperativa" name="cooperativa" class="form-control" data-toggle="tooltip" title="Selecione a Cooperativa Fornecedora para este Projeto!" required>
                    <datalist id="cooperativa">
                    
                        <?php foreach ($cooperativas as $cooperativa): ?>
                        <option value="<?php echo $cooperativa->id ?>">
                            <?php echo $cooperativa->nomeFantasia ?>
                        </option>
                        <?php endforeach ?>
                    </datalist>
                </div>
                <?php endif ?>
				<div class="col-md-3 mb-3">
					<label for="cep">CEP</label>
					<input type="text" class="form-control" id="cep" name="cep" placeholder="000.000-00" value="<?php echo $agricultor->cep; ?>" required>
					<div class="invalid-feedback">
						Digite um CEP válido!
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="uf">UF</label>
					<input type="text" class="form-control" id="uf" name="uf" placeholder="Estado" value="<?php echo $agricultor->uf; ?>" required>
					<div class="invalid-feedback">
						Digite o nome do Estado!
					</div>
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="cidade">Cidade</label>
					<input type="text" class="form-control" id="cidade" name="cidade" placeholder="cidade" value="<?php echo $agricultor->cidade; ?>" required>
					<div class="invalid-feedback">
						Digite uma cidade válida!
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="endereco">Endereço</label>
					<input type="text" class="form-control" id="endereco" name="endereco" placeholder="000.000-00" value="<?php echo $agricultor->endereco; ?>" required>
					<div class="invalid-feedback">
						Digite um endereco válido!
					</div>
				</div>
				<div class="col-md-1 mb-3">
					<label for="numero">Numero</label>
					<input type="text" class="form-control" id="numero" name="numero" value="<?php echo $agricultor->numero; ?>" required>
					<div class="invalid-feedback">
						Digite um endereco válido!
					</div>
				</div>
				<div class="form-check form-check-inline">
					<label for="produtos">Produtos:</label>
					<?php foreach ($produtos as $produto)
					{
						echo '<input type="checkbox" class="form-check-input" name="produtos[]" value="' .$produto->id.'">' .$produto->nome;
					}?>

				</div>
			</div>
			<div class="button" style="margin-top: 30px;float: right;">
				<input type="submit" name="alterar" value="Confirmar" class="btn btn-outline-success" />
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
