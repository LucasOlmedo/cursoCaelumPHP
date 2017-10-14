<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/produtos.class.php';

verificaAcesso();

$produtosClass = new Produtos();
$lista = $produtosClass->listarProdutos();
?>
<?php if(!empty($_GET['removido']) && $_GET['removido'] === 'true'){?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span>Produto removido!</span>
            </div>
        </div>
    </div>
<?php }elseif(!empty($_GET['removido']) && $_GET['removido'] === 'false'){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span>Não foi possível remover o produto!</span>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-tags"></i> Gerenciador de produtos
            <a href="index.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="formulario-produto.php" class="btn btn-primary">
            <i class="fa fa-plus"></i> Cadastrar produto
        </a>
    </div>
</div>
<div class="row">
    <br>
    <table class="table table-responsive">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Usado</th>
            <th width="150">Opções</th>
        </thead>
        <tbody>
            <?php while ($produto = mysqli_fetch_assoc($lista)) {?>
                <tr>
                    <td><?=$produto['id']?></td>
                    <td><?=$produto['nome']?></td>
                    <td><?='R$ ' . number_format($produto['preco'], 2, ',', '.')?></td>
                    <td><?= (!empty($produto['nome_categoria'])) ? $produto['nome_categoria'] : '-' ?></td>
                    <td><?=($produto['usado']) ? 'Sim' : 'Não'?></td>
                    <td>
                        <a href="ver-produto.php?id=<?=$produto['id']?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="formulario-produto.php?id=<?=$produto['id']?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="remover-produto.php?id=<?=$produto['id']?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'templates/footer.php';?>