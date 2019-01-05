<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>
<body>

	<?php if(isset($formerror)): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Aviso!</strong>
			<div><?php echo $formerror ?></div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span> 
			</button>
		</div>
	<?php endif; ?>

	<div class="container-fluid">
		<div class="col-md-12 mb-3">
			<label>Cooperativa</label>
			<select name="cooperativa" class="form-control" id="cooperativa" >
				<option>Selecione a Cooperativa</option>
				<?php foreach ($cooperativas as $cooperativa): ?>
					<option value="<?php echo $cooperativa->id ?>"><?php echo $cooperativa->nomeFantasia ?></option>
				<?php endforeach ?>
			</select>
			<table class="table table-bordered table-condensed table-hover table-striped">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>CPF</th>
						<th>Email</th>
						<th>Cidade</th>
						<th>CEP</th>
						<th>Telefone</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody  id="funcionario" style="border: 1px solid #dee2e6;">

				</tbody>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	(function(){
		funcionario = $('#funcionario')
		$('#cooperativa').on('change', function(){
			$.get('<?php echo site_url('relatorio/FuncPorCoop/') ?>' + $(this).val(), function(funcionarios){
				funcionario.html('');
				console.log(funcionarios);
				$.each(funcionarios, function(count, vivente){
					tr = $('<tr/>');
					$('<td/>').text(vivente.id).appendTo(tr);
					$('<td/>').text(vivente.nome).appendTo(tr);
					$('<td/>').text(vivente.cpf).appendTo(tr);
					$('<td/>').text(vivente.email).appendTo(tr);
					$('<td/>').text(vivente.cidade).appendTo(tr);
					$('<td/>').text(vivente.cep).appendTo(tr);
					$('<td/>').text(vivente.telefone).appendTo(tr);
					$('<td/>').text(vivente.status).appendTo(tr);

					tr.appendTo(funcionario);
				})
			})
		})
	})()
</script>

<script type="text/javascript">
	setTimeout(function(){
		$('button.close').click()
	},2000);
</script>
