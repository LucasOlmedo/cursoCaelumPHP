<?php
require_once 'autoload.php';

verificaAcesso();
if(strcasecmp($_POST['tipo-produto'], 'livro') == 0){
    $produto = new Livro($_POST);
}else{
    $produto = new Produto($_POST);
}
$produtoDAO = new ProdutoDAO;
$result = $produtoDAO->insereProdutos($produto);
?>
<div class="row">   
    <div class="col-md-12">
        <?php if($result){ ?>
            <div class="alert alert-success">
                <span>Produto: <?=$produto->getNome()?> - R$ <?=number_format($produto->getPreco(), 2, ',', '.')?> - Adicionado com sucesso!</span>
            </div>
        <?php }else{ ?>
            <div class="alert alert-danger">
                <span>Ocorreu um erro! Não foi possível cadastrar o produto.</span>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="produtos.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
</div>
<?php include 'templates/footer.php';?>