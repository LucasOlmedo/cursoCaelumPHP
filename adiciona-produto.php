<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/produtos.class.php';
require_once 'models/produto.model.php';

verificaAcesso();

$produto = new ProdutoModel();
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoriaId($_POST['categoria']);
$produto->setUsado(!empty($_POST['usado']) ? $_POST['usado'] : 'false');

$produtoClass = new Produtos();
$result = $produtoClass->insereProdutos($produto);
?>
<div class="row">   
    <div class="col-md-12">
        <?php if($result){ ?>
            <div class="alert alert-success">
                <span>Produto: <?=$produto->nome?> - R$ <?=number_format($produto->preco, 2, ',', '.')?> - Adicionado com sucesso!</span>
            </div>
        <?php }else{ ?>
            <div class="alert alert-danger">
                <span>Ocorreu um erro! Não foi possível cadastrar o produto.</span>
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