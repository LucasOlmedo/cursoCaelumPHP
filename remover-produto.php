<?php
include 'functions/sessao.php';
require_once 'functions/produtos.class.php';

verificaAcesso();

$id = $_GET['id'];
$produtosClass = new Produtos();
$status = $produtosClass->removerProduto($id);

header("Location: produtos.php?removido={$status}");
die();
?>