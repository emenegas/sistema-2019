<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php';
?>
<body>
    <div class="container">

        <form method="post" action="<?php echo site_url('projetopnae/cadastrar') ?>" enctype="multipart/form-data">

            <div class="form-row">
                <div class="col-md-10 mb-3">
                    <label for="nomeEdital">Identificação da proposta de atendimento ao edital/chamada pública N°</label>
                    <input type="text" class="form-control" id="nomeEdital" name="nomeEdital" placeholder="Digite aqui o nome/numero do Edital que este projeto sera baseado!" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="dataEncerramento">Data de Encerramento</label>
                    <input type="date" class="form-control" id="dataEncerramento" name="dataEncerramento" data-toggle="tooltip" title="Selecione a data de Encerramento do Edital!" required>
                </div>


                <div class="form-group col-md-12 mb-3">
                    <label for="exampleFormControlFile1">Arquivo do Edital</label>
                    <input type="file" class="form-control-file" id="arquivoEdital" name="arquivoEdital" required>
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
                <div class="col-md-6 mb-4">
                    <label for="entidadeExecutora">Entidade Executora:</label>
                    <input list="entidadeExecutora" name="entidadeExecutora" class="form-control" data-toggle="tooltip" title="Selecione a Entidade Executora do Projeto!" required>
                    <datalist id="entidadeExecutora">
                        <?php foreach ($entidadesExecutoras as $entidadeExecutora): ?>
                        <option value="<?php echo $entidadeExecutora->id ?>">
                            <?php echo $entidadeExecutora->nomeFantasia ?>
                        </option>
                        <?php endforeach ?>
                    </datalist>

                </div>

                <div class="col-md-12 mb-4">
                    <label form="caracteristicasCoop">Características da Cooperativa Fornecedora</label>
                    <textarea type="text" name="caracteristicasCoop" id="caracteristicasCoop" placeholder="Digite aqui os detalhes de comercialização e entrega dos produtos para este Projeto" class="form-control" required></textarea>

                </div>



                <div class="button" style="margin-top: 30px;float: right;">
                    <button type="submit" data-toggle="tooltip" title="Clique para continuar o Cadastro!" class="btn btn-info">Continuar</button>
                    <a href="<?php echo site_url('projetopnae') ?>" data-toggle="tooltip" title="Voltar para a listagem." class="btn btn-outline-danger">Cancelar</a>

                </div>


                <?php if(isset($formerror)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Aviso!</strong>
                    <div>
                        <?php echo $formerror ?>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>

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
