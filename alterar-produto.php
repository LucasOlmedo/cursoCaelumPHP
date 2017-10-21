<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/produtos.class.php';
require_once 'models/produto.model.php';

verificaAcesso();
$id = $_POST['id'];
$produto = new ProdutoModel($_POST);
$produtosClass = new Produtos();
$result = $produtosClass->alterarProduto($id, $produto);
?>
<div class="row">   
    <div class="col-md-12">
        <?php if($result){ ?>
            <div class="alert alert-success">
                <span>Produto: <?=$produto->getNome()?> - R$ <?=number_format($produto->getPreco(), 2, ',', '.')?> - Alterado com sucesso!</span>
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