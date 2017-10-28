<?php
include 'functions/sessao.php';
include 'templates/header.php';
require_once 'functions/usuarios.class.php';

verificaAcesso();

$id = $_POST['id'];
$login = $_POST['login'];
$senha = !empty($_POST['novasenha']) ? $_POST['novasenha'] : null;
$usuarioClass = new Usuarios();
$result = $usuarioClass->alterarUsuario($id, $login, $senha);
?>
<div class="row">   
    <div class="col-md-12">
        <?php if($result){ 
            $_SESSION['usuario'] == $login;    
        ?>
            <div class="alert alert-success">
                <span>Usuário: <?=$login?> - Alterado com sucesso!</span>
            </div>
        <?php }else{ ?>
            <div class="alert alert-danger">
                <span>Ocorreu um erro! Não foi possível alterar o usuário.</span>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="perfil-usuario.php?id=<?=$_SESSION['usuario_id']?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
</div>
<?php include 'templates/footer.php';?>