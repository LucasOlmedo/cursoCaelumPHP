<?php
require_once 'autoload.php';

verificaAcesso();
$categoria = new Categoria($_POST);
$categoriaDAO = new CategoriaDAO();
$result = $categoriaDAO->insereCategoria($categoria);
?>
<div class="row">   
    <div class="col-md-12">
        <?php if($result){ ?>
            <div class="alert alert-success">
                <span>Categoria: <?=$categoria->getNome()?> - Adicionada com sucesso!</span>
            </div>
        <?php }else{ ?>
            <div class="alert alert-danger">
                <span>Ocorreu um erro! Não foi possível cadastrar a categoria.</span>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="categorias.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
</div>
<?php include 'templates/footer.php';?>