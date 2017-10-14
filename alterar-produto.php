<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/produtos.class.php';

verificaAcesso();

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$usado = !empty($_POST['usado']) ? $_POST['usado'] : 'false';
$produtosClass = new Produtos();
$result = $produtosClass->alterarProduto($id, $nome, $preco, $descricao, $categoria, $usado);
?>
<div class="row">   
    <div class="col-md-12">
        <?php if($result){ ?>
            <div class="alert alert-success">
                <span>Produto: <?=$nome?> - R$ <?=number_format($preco, 2, ',', '.')?> - Alterado com sucesso!</span>
            </div>
        <?php }else{ ?>
            <div class="alert alert-danger">
                <span>Ocorreu um erro! Não foi possível alterar o produto.</span>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="produtos.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
</div>
<?php include 'templates/footer.php';?>