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
     <tr id="title"><th colspan=3 style="border: none;">Agricultores <a href="<?php echo site_url('agricultor/novo') ?>" class="btn btn-outline-info">NOVO</a> 

      <a href="<?php echo site_url('agricultor?status=inativo') ?>" class="btn btn-outline-danger">Inativos</a> 

    </th></tr>
  </thead>

  <tbody>
   <!--Create rows here -->
   <tr style="width: 80px;">
    <th style="border: 1px solid #dee2e6 ;">Código</th>
    <th style="border: 1px solid #dee2e6 ;">Nome</th>
    <th style="border: 1px solid #dee2e6 ;">CPF</th>
    <th style="border: 1px solid #dee2e6 ;">Número DAP</th>
    <th style="border: 1px solid #dee2e6 ;">Validade DAP</th>
    <tr>
     <tr>
      <?php foreach ($agricultores as $item): ?>
       <tr>
        <td style="border: 1px solid #dee2e6 ;"><?php echo $item->id ?></td>
        <td style="border: 1px solid #dee2e6 ;"><?php echo $item->nome ?></td>
        <td style="border: 1px solid #dee2e6 ;"><?php echo $item->cpf ?></td>
        <td style="border: 1px solid #dee2e6 ;"><?php echo $item->dapNumero ?></td>
        <td style="border: 1px solid #dee2e6 ;"><?php echo $item->dapValidade ?></td>
        <td style="border: 1px solid #dee2e6 ;">
         <a href="<?php echo site_url('/agricultor/'.$item->id.'/editar') ?>" class="btn btn-outline-warning">Alterar</a>
         
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
</div>

<script type="text/javascript">
  setTimeout(function(){
    $('button.close').click()
  },5000);
</script>
