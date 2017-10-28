<?php
require_once 'autoload.php';

verificaAcesso();
$usuarioClass = new Usuarios();
$usuario = $usuarioClass->verUsuario($_GET['id']);
?>
<div class="row">
    <div class="page-header">
        <h1>
            <i class="fa fa-user"></i> Alterar dados de Usuário
            <a href="perfil-usuario.php?id=<?=$_SESSION['usuario_id']?>" class="btn btn-default pull-right">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="alterar-usuario.php" method="POST">
            <input type="hidden" name="id" value="<?=$usuario->id?>">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" class="form-control" value="<?=$usuario->login?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="novasenha">Senha</label>
                <input type="password" name="novasenha" id="novasenha" class="form-control" value="" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-check"></i> Salvar
            </button>
        </form>
    </div>
</div>
<?php include 'templates/footer.php';?>