<?php
require_once 'autoload.php';

verificaAcesso();
$produtosDAO = new ProdutoDAO();
$listaProdutos = $produtosDAO->listarProdutos();
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
            <th>Desconto 10%</th>
            <th>Imposto</th>
            <th>ISBN</th>
            <th>Categoria</th>
            <th>Usado</th>
            <th width="150">Opções</th>
        </thead>
        <tbody>
            <?php foreach($listaProdutos as $produto){ ?>
                <tr>
                    <td><?=$produto->getId()?></td>
                    <td><?=$produto->getNome()?></td>
                    <td><?='R$ '.number_format($produto->getPreco(), 2, ',', '.')?></td>
                    <td><?='R$ '.number_format($produto->calcularDesconto(0.1), 2, ',', '.')?></td>
                    <td><?='R$ '.number_format($produto->calcularImposto(), 2, ',', '.')?></td>
                    <td><?=$produto->temISBN() ? $produto->getIsbn() : '-'?></td>
                    <td><?=!empty($produto->getCategoria()->getNome()) ? $produto->getCategoria()->getNome() : '-' ?></td>
                    <td><?=$produto->getUsado() ? 'Sim' : 'Não'?></td>
                    <td>
                        <a href="ver-produto.php?id=<?=$produto->getId()?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="formulario-produto.php?id=<?=$produto->getId()?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="remover-produto.php?id=<?=$produto->getId()?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'templates/footer.php';?>