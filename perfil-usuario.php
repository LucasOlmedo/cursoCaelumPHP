<?php
require_once 'autoload.php';

verificaAcesso();
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->verUsuario($_GET['id']);
?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-user"></i> Meu perfil
            <a href="index.php" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <ul class="list-group">
            <li class="list-group-item">
                <h4><strong>ID: </strong> <span class="pull-right">#<?=$usuario->id?></span></h4>
            </li>
            <li class="list-group-item">
                <h4><strong>Login: </strong> <span class="pull-right"><?=$usuario->login?></span></h4>
            </li>
        </ul>
        <div class="text-center">
            <a href="perfil-alterar.php?id=<?=$usuario->id?>" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Alterar dados</a>
        </div>
    </div>
</div>
<?php include 'templates/footer.php';?>