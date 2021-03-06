<?php
require_once 'autoload.php';

verificaAcesso();
$categoriaDAO = new CategoriaDAO();
$categoria = $categoriaDAO->verCategoria($_GET['id']);
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
                <h4><strong>ID: </strong> <span class="pull-right">#<?=$categoria->getId()?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Nome: </strong> <span class="pull-right"><?=$categoria->getNome()?></span></h4>
            </li>
        </ul>
    </div>
</div>
<?php include 'templates/footer.php';?>