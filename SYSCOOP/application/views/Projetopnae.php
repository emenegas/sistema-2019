<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>
<body>
	

	<div class="container-fluid">

		<form enctype="multipart/form-data" class="needs-validation" action="<?php echo site_url('projetopnae/cadastrar') ?>"  method="post" novalidate>

			<div class="form-row">
				<div class="col-md-10 mb-3">	
					<label for="nomeEdital">Identificação da proposta de atendimento ao edital/chamada pública N°</label>
					<input type="text" class="form-control" id="nomeEdital" name="nomeEdital" placeholder="Digite aqui o nome/numero do Edital que este projeto sera baseado!" required>
					<div class="invalid-feedback">
					Numero obrigatório, digite o numero/nome do Edital para poder continuar.</div>
				</div>

				<div class="col-md-2 mb-3">
					<label for="dataEncerramento">Data de Encerramento</label>
					<input type="date" class="form-control" id="dataEncerramento" name="dataEncerramento" data-toggle="tooltip" title="Selecione a data de Encerramento do Edital!" required>
				</div>

				<div class="custom-file col-md-12 mb-4">
					<input type="file" class="custom-file-input" id="arquivoEdital" name="arquivoEdital" value="" data-toggle="tooltip" title="Clique para selecionar um arquivo no fomato .pdf" required>
					<label class="custom-file-label" for="customFile">Escolher arquivo</label>
					<div class="invalid-feedback">
					O Arquivo do Edital é obrigatório! O arquivo deve estar em formato .pdf!</div>
				</div>

				<div class="col-md-6 mb-4"> 
					<label for="entidadeExecutora">Entidade Executora:</label>
					<input list="entidadeExecutora" name="entidadeExecutora" class="form-control" data-toggle="tooltip" title="Selecione a Entidade Executora do Projeto!" required>
					<datalist id="entidadeExecutora" >
						<?php foreach ($entidadesExecutoras as $entidadeExecutora): ?>
							<option value="<?php echo $entidadeExecutora->id ?>"><?php echo $entidadeExecutora->nomeFantasia ?></option>
						<?php endforeach ?>
					</datalist>
					<div class="invalid-feedback">
					É necessário selecionar uma Entidade para continuar! Digite as inicias da Entidade que esta buscando.</div>
				</div>
				<div class="col-md-12 mb-4">
					<label form="caracteristicasCoop">Características da Cooperativa Fornecedora</label>
					<textarea type="text" name="caracteristicasCoop" id="caracteristicasCoop" placeholder="Digite aqui os detalhes de comercialização e entrega dos produtos para este Projeto" class="form-control" required></textarea>
					<div class="invalid-feedback">
					Campo obrigatório!</div>
				</div>

			</div>

			<div class="button" style="margin-top: 30px;float: right;">
				<button type="submit" data-toggle="tooltip" title="Clique para continuar o Cadastro!" class="btn btn-info">Continuar</button>
				<a href="<?php echo site_url('projetopnae') ?>" data-toggle="tooltip" title="Voltar para a listagem." class="btn btn-outline-danger">Cancelar</a>

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

<script type="text/javascript">var input = document.getElementById('dataEncerramento');
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
	},2000);
</script>
