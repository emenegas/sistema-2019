<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>
<body>
	

	
	<div class="container-fluid">
		<form class="needs-validation" action="<?php echo site_url('relatorio/PorDap')?>" method="post"  novalidate>
			<div class="form-row">
				<label><h3>Digite o intervalo de valor da DAP</h3></label>
				<div class="col-md-2 mb-3">
					<input type="number" name="valor1" id="valor1" placeholder="Valor Inicial" class="form-control" required>
					<div class="invalid-feedback">
						Campo obrigatório!
					</div>
				</div>
				<div class="col-md-2 mb-3">
					<input type="number" name="valor2" id="valor2" placeholder="Valor Final" class="form-control" required>
				</div>
				<div class="invalid-feedback">
					Campo	 obrigatório!
				</div>
				<button type="submit" name="Buscar" class="btn btn-outline-warning">Buscar</button>
			</div>
		</form>
	</div>

	<table class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>CPF</th>
				<th>Gasto da DAP</th>
				<th>Numero da DAP</th>
				<th>Validade da DAP</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($agricultores)): ?>


				<?php foreach ($agricultores as $item): ?>
					<tr>
						<td> <?php echo $item->nome ?></td>
						<td>  <?php echo $item->cpf ?></td>
						<td>  <?php echo $item->dapLimite ?></td>
						<td>  <?php echo $item->dapNumero ?></td>
						<td>  <?php echo $item->dapValidade ?></td>

					</tr> 
				<?php endforeach ?>
			<?php endif; ?>
		</tbody>
	</table>
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
<script type="text/javascript">
	setTimeout(function(){
		$('button.close').click()
	},5000);
</script>
