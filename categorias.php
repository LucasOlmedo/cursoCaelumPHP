<?php
require_once 'autoload.php';

verificaAcesso();
$categoriaDAO = new CategoriaDAO();
$listaCategorias = $categoriaDAO->listarCategorias();
?>
<?php if(!empty($_GET['removido']) && $_GET['removido'] === 'true'){?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span>Categoria removida!</span>
            </div>
        </div>
    </div>
<?php }elseif(!empty($_GET['removido']) && $_GET['removido'] === 'false'){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span>Não foi possível remover a categoria! Verifique se existem produtos atrelados.</span>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-th-list"></i> Gerenciador de categorias
            <a href="index.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="formulario-categoria.php" class="btn btn-primary">
            <i class="fa fa-plus"></i> Cadastrar categoria
        </a>
    </div>
</div>
<div class="row">
    <br>
    <table class="table table-responsive">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th width="150">Opções</th>
        </thead>
        <tbody>
            <?php foreach ($listaCategorias as $categoria) {?>
                <tr>
                    <td><?=$categoria->getId()?></td>
                    <td><?=$categoria->getNome()?></td>
                    <td>
                        <a href="ver-categoria.php?id=<?=$categoria->getId()?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="formulario-categoria.php?id=<?=$categoria->getId()?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="remover-categoria.php?id=<?=$categoria->getId()?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'templates/footer.php';?>