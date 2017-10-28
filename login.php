<?php
require_once 'autoload.php';

$usuarioDAO = new UsuarioDAO();

$login = $_POST['login'];
$senha = $_POST['senha'];

$verificarUsuario = $usuarioDAO->login($login, $senha);

if($verificarUsuario != FALSE){
    $_SESSION['usuario'] = $verificarUsuario['login'];
    $_SESSION['usuario_id'] = $verificarUsuario['id'];
    header('Location: index.php?logado=true');
}else{
    header('Location: index.php?logado=false');
}
?>