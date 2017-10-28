<?php
require_once 'autoload.php';

verificaAcesso();
$id = $_GET['id'];
$categoriaClass = new Categorias();
$status = $categoriaClass->removerCategoria($id);

header("Location: categorias.php?removido={$status}");
die();
?>