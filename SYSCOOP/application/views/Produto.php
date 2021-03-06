<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php';
?>
  <body>
<div class="container-fluid">
	<form class="needs-validation" action="<?php echo site_url('produto/cadastrar')?>" method="post"  novalidate>
		<div class="form-row">
			<div class="col-md-4 mb-3">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" class="form-control" value="<?php echo set_value('nome')?>">
				<div class="invalid-feedback">
					Campo obrigatório!
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<label for="unidadeMedida">Unidade de medida</label>
				<select id="unidadeMedida" name="unidadeMedida" class="form-control">
					<option>Pacote 1KG</option>
					<option>Pacote 5KG</option>
					<option>KG</option>
					<option>Litro</option>
					<option>Unidade</option>
				</select>
			</div>
			<div class="col-md-4 mb-3">
				<label for="tipo">Tipo</label>
				<select id="tipo" name="tipo" class="form-control">
					<option>N/A</option>
					<option>Transgênico</option>
					<option>Orgânico</option>
				</select>
			</div>
			<div class="col-md-4 mb-3">
				<label for="epoca">Epoca</label>
				<select id="epoca" name="epoca" class="form-control">
					<option>N/A</option>
					<option>Verão</option>
					<option>Inverno</option>
					<option>Outono</option>
					<option>Primavera</option>
				</select>
			</div>
			<div class="button" style="margin-top: 30px;float: right;">
				<button type="submit" class="btn btn-info">Cadastrar</button>
				<a href="<?php echo site_url('produto') ?>" class="btn btn-outline-danger">Cancelar</a>

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
  
  <script type="text/javascript">
  setTimeout(function(){
    $('button.close').click()
  },5000);
</script>
<script src="assets/hasValidate.js" type="text/javascript"></script>

</body>


