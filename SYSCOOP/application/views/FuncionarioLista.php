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
            <tr id="title"><th style="border: none;" colspan=3>Funcionários <a href="<?php echo site_url('funcionario/novo') ?>" class="btn btn-outline-info">Novo</a> 

               <a href="<?php echo site_url('funcionario?status=inativo') ?>" t" class="btn btn-outline-danger">Inativos</a> 

            </th></tr>
         </thead>

         <tbody>
            <tr>
               <th style="border: 1px solid #dee2e6 ;">Código</th>
               <th style="border: 1px solid #dee2e6 ;">Nome</th>
               <th style="border: 1px solid #dee2e6 ;">CPF</th>
               <th style="border: 1px solid #dee2e6 ;">Cooperativa</th>
               <tr>
                  <tr>
                     <?php foreach ($funcionarios as $item): ?>
                        <tr>
                           <td style="border: 1px solid #dee2e6 ;">  <?php echo $item->id ?></td>
                           <td style="border: 1px solid #dee2e6;">  <?php echo $item->nome ?></td>
                           <td style="border: 1px solid #dee2e6;">  <?php echo $item->cpf ?></td>
                           <td style="border: 1px solid #dee2e6;">  <?php echo $item->cooperativa ?></td>
                           <td style="border: 1px solid #dee2e6;">
                              <a href="<?php echo site_url('/funcionario/'.$item->id.'/editar') ?>" class="btn btn-outline-warning">Editar</a>  
                           </td> 
                        </tr>

                     <?php endforeach ?>
                  </tr>
               </tr>
            </tbody>
         </table>
      </div>

   </div>
</div>
<script type="text/javascript">
  setTimeout(function(){
    $('button.close').click()
  },5000);
</script>
