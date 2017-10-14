<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/produtos.class.php';

verificaAcesso();

$produtoClass = new Produtos();
$produto = $produtoClass->verProduto($_GET['id']);
?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-tags"></i> Ver produto
            <a href="produtos.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <ul class="list-group">
            <li class="list-group-item">
                <h4><strong>ID: </strong> <span class="pull-right">#<?=$produto->id?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Nome: </strong> <span class="pull-right"><?=$produto->nome?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Preço: </strong> <span class="pull-right"><?='R$ ' . number_format($produto->preco, 2, ',', '.')?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Descrição: </strong> <span class="pull-right"><?=$produto->descricao?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Categoria: </strong> <span class="pull-right"><?=$produto->nome_categoria?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Usado: </strong> <span class="pull-right"><?=($produto->usado) ? 'Sim' : 'Não'?></span></h4>
            </li>
        </ul>
    </div>
</div>
<?php include 'templates/footer.php';?>