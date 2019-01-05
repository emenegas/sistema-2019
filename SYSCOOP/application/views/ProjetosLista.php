<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?> 

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
   <div id='table'>
      <table class= 'table table-hover'>
         <thead>
            <tr id="title"><th colspan=3 style="border: none;">Projetos <a href="<?php echo site_url('projetopnae/novo') ?>" data-toggle="tooltip" title="Clique para cadastrar um novo Projeto." class="btn btn-outline-info">NOVO</a> 
               <a  href="<?php echo site_url('projetopnae?status=inativo') ?>" data-toggle="tooltip" title="Clique para exibir os Projetos ja concluídos." class="btn btn-outline-success">Concluídos</a> 

            </th></tr>
         </thead>

         <tbody>
            <!--Create rows here -->
            <tr>
               <th style="border: 1px solid #dee2e6 ;">Código</th>
               <th style="border: 1px solid #dee2e6 ;">Edital</th>
               <th style="border: 1px solid #dee2e6 ;">Entidade Executora</th>
               <th style="border: 1px solid #dee2e6 ;">Cooperativa Fornecedora</th>
               <th style="border: 1px solid #dee2e6 ;">Data de Cadastro</th>
               <tr>
                  <tr>
                     <?php foreach ($projetos as $item): ?>
                        <tr>
                           <td style="border: 1px solid #dee2e6 ;"><?php echo $item->id ?></td>
                           <td style="border: 1px solid #dee2e6 ;"><?php echo $item->nomeEdital ?></td>
                           <td style="border: 1px solid #dee2e6 ;"><?php echo $item->entNomeFantasia ?></td>
                           <td style="border: 1px solid #dee2e6 ;"><?php echo $item->coopNomeFantasia ?></td>
                           <td style="border: 1px solid #dee2e6 ;"><?php echo $item->data ?></td>
                           <td style="border: 1px solid #dee2e6 ;">
                            <div class="btn-group" role="group" aria-label="Basic example">

                              <a href="<?php echo site_url('/projetopnae/'.$item->id.'/info') ?>" data-toggle="tooltip" title="Clique para Visualizar os detalhes do Projeto." class="btn btn-outline-info" >Visualizar</a>
                              <a href="<?php echo site_url('/projetopnae/'.$item->id.'/itens') ?>" data-toggle="tooltip" title="Clique para alterar os itens do Projeto." class="btn btn-outline-warning">Alterar</a>
                              <a href="<?php echo site_url('/projetopnae/'.$item->id.'/remover') ?>" data-toggle="tooltip" title="Clique para excluir o Projeto e seus itens." class="btn btn-outline-danger" onclick="return confirm('Deseja excluir esse projeto ?')" >Excluir</a>
                            </div>
                           </td>
                        </tr>
                     <?php endforeach ?>
                  </tr>  
               </tr> 
            </tr>
         </tbody>
      </table>
   </div>
</div>
<script type="text/javascript">
  setTimeout(function(){
    $('button.close').click()
  },2000);
</script>
