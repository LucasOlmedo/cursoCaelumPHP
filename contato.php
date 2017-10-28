<?php 
require_once 'autoload.php'
?>
<?php if(!empty($_GET['envio']) && $_GET['envio'] === 'true'){?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span>Mensagem enviada com sucesso!</span>
            </div>
        </div>
    </div>
<?php }elseif(!empty($_GET['envio']) && $_GET['envio'] === 'false'){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span>Não foi possível enviar a mensagem! Tente mais tarde.</span>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-envelope"></i> Fale conosco
            <a href="index.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="enviar-email.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="assunto">Assunto</label>
                <input type="text" name="assunto" id="assunto" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea rows="4" cols="50" class="form-control" name="mensagem"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-send"></i> Enviar
            </button>
        </form>
    </div>
</div>
<?php include 'templates/footer.php';?>