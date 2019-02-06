<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include'Menu.php'; 
?>
<link rel="stylesheet" href="assets/styleContato.css">
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
    <?php if(isset($formInfo)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Informação...</strong>
            <div><?php echo $formInfo ?></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
            </button>
        </div>
    <?php endif; ?>
<div class="container contact-form">
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
    </div>
    <form id="form_contato" action="<?php echo $action ?>" method="post">
        <h3>Envie a sua sugestão</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Seu nome completo *" value="" required />
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Seu email *" value="" required />
                </div>
                <div class="form-group">
                    <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Seu numero de telefone *" value="" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Enviar Mensagem" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="assunto" id="assunto" class="form-control" placeholder="Assunto *" value="" required />
                </div>
                <div class="form-group">
                    <textarea name="mensagem" id="mensagem" class="form-control" placeholder="Sua mensagem *" style="width: 100%; height: 150px;" required></textarea>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
  setTimeout(function(){
    $('button.close').click()
},5000);
</script>