<?php
require_once 'autoload.php';

verificaAcesso();
$alterar = false;
if(!empty($_GET['id'])){
    $categoriaClass = new Categorias();
    $categoria = $categoriaClass->verCategoria($_GET['id']);
    $alterar = true;
}
?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-tags"></i> <?= ($alterar) ? 'Alterar' : 'Adicionar'?> Categoria
            <a href="categorias.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="<?= ($alterar) ? 'alterar-categoria.php' : 'adiciona-categoria.php'?>" method="POST">
            <input type="hidden" name="id" value="<?= ($alterar) ? $categoria->getId() : ''?>">
            <div class="form-group">
                <label for="nome">Nome da categoria</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= ($alterar) ? $categoria->getNome() : ''?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-check"></i> Salvar
            </button>
        </form>
    </div>
</div>
<?php include 'templates/footer.php';?>