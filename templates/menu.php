<nav class="nav navbar-inverse navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">
				<i class="fa fa-home"></i> Home
			</a>
		</div>
		<?php if(verificaSessaoUsuario()){ ?>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="produtos.php">Produtos</a></li>
					<li><a href="categorias.php">Categorias</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"></i> <?=$_SESSION['usuario']?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="perfil-usuario.php?id=<?=$_SESSION['usuario_id']?>">Meu perfil</a></li>
						</ul>
					</li>
					<form class="navbar-form navbar-left" action="logout.php" method="POST" role="logout">
						<button type="submit" class="btn btn-link" style="text-decoration:none">Sair</button>
					</form>
				</ul>
			</div>
		<?php } ?>
	</div>
</nav>