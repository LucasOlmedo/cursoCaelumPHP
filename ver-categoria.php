<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/categorias.class.php';

verificaAcesso();

$categoriaClass = new Categorias();
$categoria = $categoriaClass->verCategoria($_GET['id']);
?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-th-list"></i> Ver categoria
            <a href="categorias.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <ul class="list-group">
            <li class="list-group-item">
                <h4><strong>ID: </strong> <span class="pull-right">#<?=$categoria->id?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Nome: </strong> <span class="pull-right"><?=$categoria->nome?></span></h4>
            </li>
        </ul>
    </div>
</div>
<?php include 'templates/footer.php';?>