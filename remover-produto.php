<?php
require_once 'autoload.php';

verificaAcesso();
$id = $_GET['id'];
$produtosClass = new Produtos();
$status = $produtosClass->removerProduto($id);

header("Location: produtos.php?removido={$status}");
die();
?>