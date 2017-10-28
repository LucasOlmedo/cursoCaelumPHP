<?php 
session_start();

function verificaSessaoUsuario()
{
    return isset($_SESSION['usuario']);
}

function falhaSessaoLogin()
{
    return isset($_GET['logado']) && $_GET['logado'] == 'false' && !isset($_SESSION['usuario']);
}

function sessaoLogin()
{
    return isset($_GET['logado']) && $_GET['logado'] == 'true' && isset($_SESSION['usuario']);
}

function verificaAcesso()
{
    if(!verificaSessaoUsuario()){
        header('Location: index.php?nao-autorizado=true');
        die();
    }
}

function finalizarSessao()
{
    session_destroy();
}

?>