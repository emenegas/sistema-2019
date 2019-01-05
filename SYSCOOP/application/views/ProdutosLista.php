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
    <tr id="title"><th colspan=3 style="border: none;">Produtos <a href="<?php echo site_url('produto/novo') ?>" class="btn btn-outline-info">NOVO</a> 

    </th></tr>
  </thead>

  <tbody>
    <!--Create rows here -->
    <tr>
     <th style="border: 1px solid #dee2e6;">Código</th>
     <th style="border: 1px solid #dee2e6;">Nome</th>
     <th style="border: 1px solid #dee2e6;">Unidade de Medida</th>
     <th style="border: 1px solid #dee2e6;">Tipo</th>
     <th style="border: 1px solid #dee2e6;">Epoca</th>
     <tr>
      <tr>
       <?php foreach ($produtos as $item): ?>
        <tr>

         <td style="border: 1px solid #dee2e6;">  <?php echo $item->id ?></td>
         <td style="border: 1px solid #dee2e6;">  <?php echo $item->nome ?></td>
         <td style="border: 1px solid #dee2e6;">  <?php echo $item->unidadeMedida ?></td>
         <td style="border: 1px solid #dee2e6;">  <?php echo $item->tipo ?></td>
         <td style="border: 1px solid #dee2e6;">  <?php echo $item->epoca ?></td>
         <td style="border: 1px solid #dee2e6;">

          <a href="<?php echo site_url('/produto/'.$item->id.'/editar') ?>" class="btn btn-outline-info" >Editar</a>
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
  },2000);
</script>
