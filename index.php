<?php
require_once 'autoload.php';
?>
<!-- NAO AUTORIZADO -->

<?php if(isset($_GET['nao-autorizado']) && !verificaSessaoUsuario()){ ?>
    <div class="alert alert-danger" role="alert">
        <strong>Aviso!</strong> Faça login para ter acesso.
    </div>
<?php } ?>

<!-- FALHA NO LOGIN -->

<?php if(falhaSessaoLogin()){ ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Erro!</strong> Usuário ou senha inválidos.
    </div>
<?php }elseif(sessaoLogin()) {?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Bem vindo <strong><?=$_SESSION['usuario']?></strong>!
    </div>
<?php } ?>

<!-- FORM LOGIN -->

<?php if(!verificaSessaoUsuario()){ ?>
    <div class="row">
        <div class="page-header">
            <h1>
                <i class="fa fa-user-o"></i> Autenticação
            </h1>
        </div>
    </div>
    <div class="row">
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Login do usuário" required>
            </div>
            <div class="form-group">
                <label for="senha">Password</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> Entrar</button>
        </form>
    </div>
<?php } else { ?>
<!-- DASHBOARD -->
    <div class="row">
        <div class="page-header">
            <h1>
                <i class="fa fa-shopping-cart"></i> Gerenciador de Lojas
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="produtos.php" class="btn btn-primary">
                <i class="fa fa-tags"></i> Gerenciar produtos
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="categorias.php" class="btn btn-primary">
                <i class="fa fa-th-list"></i> Gerenciar categorias
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="contas.php" class="btn btn-info">
                <i class="fa fa-calculator"></i> Acessar página de contas
            </a>
        </div>
    </div>
<?php }
include 'templates/footer.php'; 
?>