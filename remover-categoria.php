<?php
require_once 'autoload.php';

verificaAcesso();
$id = $_GET['id'];
$categoriaDAO = new CategoriaDAO();
$status = $categoriaDAO->removerCategoria($id);

header("Location: categorias.php?removido={$status}");
die();
?>