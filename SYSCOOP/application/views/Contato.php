<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Menu');
?>
<style type="text/css">

body{
    background: #2F4F4F;
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
</style>
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