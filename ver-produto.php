<?php
require_once 'autoload.php';

verificaAcesso();
$produtoDAO = new ProdutoDAO();
$produto = $produtoDAO->verProduto($_GET['id']);
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
                <h4><strong>ID: </strong> <span class="pull-right">#<?=$produto->getId()?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Nome: </strong> <span class="pull-right"><?=$produto->getNome()?></span></h4>
            </li>
            <?php if($produto->temISBN()){ ?>
            <li class="list-group-item">
                <h4><strong>ISBN: </strong> <span class="pull-right"><?=$produto->getIsbn()?></span></h4>
            </li>
            <?php } ?>
            <li class="list-group-item">
                <h4><strong>Preço: </strong> <span class="pull-right"><?='R$ ' . number_format($produto->getPreco(), 2, ',', '.')?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Descrição: </strong> <span class="pull-right"><?=$produto->getDescricao()?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Categoria: </strong> <span class="pull-right"><?=$produto->getCategoria()->getNome()?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Usado: </strong> <span class="pull-right"><?=($produto->getUsado()) ? 'Sim' : 'Não'?></span></h4>
            </li>
        </ul>
    </div>
</div>
<?php include 'templates/footer.php';?>