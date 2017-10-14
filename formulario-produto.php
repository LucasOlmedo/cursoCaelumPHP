<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/produtos.class.php';
require_once 'functions/categorias.class.php';

verificaAcesso();

$alterar = false;
$categoria = new Categorias();
$listaCategoria = $categoria->listarCategorias();

if(!empty($_GET['id'])){
    $produtoClass = new Produtos();
    $produto = $produtoClass->verProduto($_GET['id']);
    $alterar = true;
}
?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-tags"></i> <?= ($alterar) ? 'Alterar' : 'Adicionar'?> produto
            <a href="produtos.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="<?= ($alterar) ? 'alterar-produto.php' : 'adiciona-produto.php'?>" method="POST">
            <input type="hidden" name="id" value="<?= ($alterar) ? $produto->id : ''?>">
            <div class="form-group">
                <label for="nome">Nome do produto</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= ($alterar) ? $produto->nome : ''?>" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço do produto</label>
                <input type="number" name="preco" id="preco" step="0.01" class="form-control" value="<?= ($alterar) ? $produto->preco : ''?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do produto</label>
                <textarea rows="4" cols="50" class="form-control" name="descricao"><?= ($alterar) ? $produto->descricao : ''?></textarea>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="usado" id="usado" value="true" <?= ($produto->usado) ? 'checked' : ''?>> <strong>Usado</strong>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                    <?php while ($categ = mysqli_fetch_assoc($listaCategoria)) {?>
                        <option value="<?=$categ['id']?>" <?= ($alterar && $produto->categoria_id == $categ['id']) ? 'selected' : ''?>><?=$categ['nome']?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-check"></i> Salvar
            </button>
        </form>
    </div>
</div>
<?php include 'templates/footer.php';?>