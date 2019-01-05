<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>

<body>

	<form action="<?php echo site_url('/projetopnae/'.$idProjeto.'/itens') ?>" method="post">

		<table class="table">
			<thead class="table-light">
				<tr>
					<th style="border: 1px solid #dee2e6 ;">Descrição</th>
					<th style="border: 1px solid #dee2e6 ;">Produto</th>
					<th style="border: 1px solid #dee2e6 ;">Agricultor</th>
					<th style="border: 1px solid #dee2e6 ; width: 10%;">Volumes</th>
					<th style="border: 1px solid #dee2e6 ;">Preço/Uni</th>
					<th style="border: 1px solid #dee2e6 ;">Total</th>
					<th style="border: 1px solid #dee2e6 ;">Cronograma de Entrega</th>
				</tr>
				<?php foreach ($itens_do_projeto as $item): ?>
					<tr>
						<td style="border: 1px solid #dee2e6 ; width: 35%;">	<?php echo $item->descricaoProd ?></td>
						<td style="border: 1px solid #dee2e6 ;"><?php echo $item->nomeProduto ?></td>
						<td style="border: 1px solid #dee2e6 ;">	<?php echo $item->nomeAgricultor ?></td>
						<td style="border: 1px solid #dee2e6 ; width: 10%;">	<?php echo $item->quantidade ?></td>
						<td style="border: 1px solid #dee2e6 ;">	<?php echo $item->precoUnidade ?></td>
						<td style="border: 1px solid #dee2e6 ;">	<?php echo $item->totalItem ?></td>
						<td style="border: 1px solid #dee2e6 ;">	<?php echo $item->cronogramaEntregaProd ?></td>
						<td style="border: 1px solid #dee2e6 ;"><button type="submit" name="itemDoProjeto" value="<?php echo $item->id ?>" formaction="<?php echo site_url('/projetopnae/'.$idProjeto.'/itens/remover') ?>" class="btn btn-outline-danger" >-</button></td>
					</tr>
				<?php endforeach ?>




				<td >
					<textarea style="height: 150px;"type="text" name="descricaoProd" id="descricaoProd" class="form-control" value="">PRODUTO - TIPO 1. ISENTO DE MATÉRIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA</textarea>
				</td>
				<td>
					<select name="produto" class="form-control" id="produto" data-toggle="tooltip" title="Clique para exibir os produtos" autocomplete="off">
						<?php foreach ($produtos as $produto): ?>
							<option value="<?php echo $produto->id ?>"><?php echo $produto->nome ?></option>
						<?php endforeach ?>
					</select>
				</td>
				<td> 
					<input list="agricultor" name="agricultor" class="form-control" data-toggle="tooltip" title="Clique para selecionar um agricultor ou deixe em branco." autocomplete="off">
					<datalist id="agricultor" >

					</datalist>
				</td>
				<td>

					<input type="text" name="quantidade" id="quantidade" class="form-control" data-toggle="tooltip" title="Digite a Quantidade de produtos!" autocomplete="off" value="<?php echo set_value('quantidade')?>">
				</td>
				<td>

					<input type="text"  name="precoUnidade" id="precoUnidade" class="form-control" data-toggle="tooltip" title="Digite o preço da unidade do Produto" autocomplete="off" value="<?php echo set_value('precoUnidade')?>">
				</td>
				<td></td>
				<td>
					<textarea style="height: 150px;"type="text" name="cronogramaEntregaProd" id="cronogramaEntregaProd" class="form-control" value="">Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.</textarea> 
				</td>

				<td>
					<div class="btn-group" role="group" aria-label="Basic example">

						<button type="submit" data-toggle="tooltip" title="Clique para adicionar o item no Projeto" class="btn btn-outline-primary">+</button> 

					</div>
				</td>

			</thead>
		</table>
	</form>
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
	(function(){
		agricultor = $('#agricultor')
		$('#produto').on('change', function(){
			$.get('<?php echo site_url('agricultor/PorProduto/') ?>' + $(this).val(), function(agricultores){
				agricultor.html('');
				$.each(agricultores, function(count, vivente){
					
					$('<option/>').attr('value',vivente.id).text(vivente.nome).appendTo(agricultor)
					
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