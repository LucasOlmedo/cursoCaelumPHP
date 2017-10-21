<?php
include 'functions/sessao.php';
require_once 'functions/categorias.class.php';

verificaAcesso();
$id = $_GET['id'];
$categoriaClass = new Categorias();
$status = $categoriaClass->removerCategoria($id);

header("Location: categorias.php?removido={$status}");
die();
?>