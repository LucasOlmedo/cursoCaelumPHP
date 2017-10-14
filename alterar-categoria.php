<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/categorias.class.php';

verificaAcesso();

$id = $_POST['id'];
$nome = $_POST['nome'];
$categoriasClass = new Categorias();
$result = $categoriasClass->alterarCategoria($id, $nome);
?>
<div class="row">   
    <div class="col-md-12">
        <?php if($result){ ?>
            <div class="alert alert-success">
                <span>Categoria: <?=$nome?> - Alterada com sucesso!</span>
            </div>
        <?php }else{ ?>
            <div class="alert alert-danger">
                <span>Ocorreu um erro! Não foi possível alterar a categoria.</span>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="categorias.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
</div>
<?php include 'templates/footer.php';?>