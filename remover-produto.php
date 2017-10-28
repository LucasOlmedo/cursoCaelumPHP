<?php
require_once 'autoload.php';

verificaAcesso();
$id = $_GET['id'];
$produtosDAO = new ProdutoDAO();
$status = $produtosDAO->removerProduto($id);

header("Location: produtos.php?removido={$status}");
die();
?>